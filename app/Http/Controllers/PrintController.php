<?php

namespace App\Http\Controllers;

use App\Http\Resources\TableResource;
use App\Models\Place;
use App\Models\PlaceTemplate;
use App\Models\Table;
use App\Models\Template;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class PrintController extends Controller
{
    private $business;
    private $user;

    public function __construct()
    {
        $this->user = auth('web')->user();
        $this->business = $this->user->place();
    }
    public function index()
    {
        return view('business.print.index');
    }

    public function store(Request $request)
    {
        if ($request->apply == 0){ // masa yazdırma
            $table = Table::find($request->table_id);
            $tableName = $table->region->name."-".$table->name;
            $result = base64Convertor2($request->input('menuCardBase64'), 'themeTypes/'.$this->business->id, $tableName);
            $existTable = $this->business->templates()->where('table_id', $table->id)->first();
            if (isset($existTable)){
                $existTable->image = $result;
                $existTable->save();
            } else{
                $newTemplate = new PlaceTemplate();
                $newTemplate->place_id = $this->business->id;
                $newTemplate->table_id = $table->id;
                $newTemplate->table_name = $tableName;
                $newTemplate->image = $result;
                $newTemplate->save();
            }
        } else{
            $tableName = $this->business->name;
            $result = base64Convertor2($request->input('menuCardBase64'), 'themeTypes/'.$this->business->id, $tableName);
            $this->business->templates()->delete();
            $newTemplate = new PlaceTemplate();
            $newTemplate->place_id = $this->business->id;
            $newTemplate->table_id = 0;
            $newTemplate->table_name = $tableName;
            $newTemplate->image = $result;
            $newTemplate->save();
        }

        return response()->json([
           'status' => "success",
           'message' => $result,
        ]);
    }

    public function create(Request $request)
    {
        $place = $this->business;
        $place->templates()->delete();
        Storage::deleteDirectory('themeTypes/'.$place->id);
        if ($request->apply == 0){ // masa yazdırma
            $tables = $this->business->tables()->get();
            return response()->json(TableResource::collection($tables));
        } else{ // mekan yazdırma
            $place = $this->business;
            $image = generateTextQrCode(route('place.show', $place->slug));
            return [
              [
                  "id" => $place->id,
                  "image" => $image,
                  "name" => $place->name
              ],
            ];
        }

    }

    public function insertFiligran($file)
    {
        $img = Image::read($file);
        $addedImage = Image::read(public_path('/business/test/masa1.png'));
        //$img = $img->resize(150, 150);
        $img->place(// eklenecek qr
            $addedImage,
            'top-left',
            ($img->width() - $addedImage->width()) / 2,
            ($img->height() - $addedImage->height()) / 2 + 50,
            100
        );
        $tempPath = 'temp/' . uniqid().".jpg";

        $img->save(storage_path('app/' . $tempPath));
        $tempFile = new \Illuminate\Http\File(storage_path('app/' . $tempPath));

        // Geçici dosyayı yükleme sınıfına gönder
        $response = Storage::put('themeFiles', $tempFile);
        // Geçici dosyayı sil
        Storage::delete($tempPath);
        return $response;
    }
}
