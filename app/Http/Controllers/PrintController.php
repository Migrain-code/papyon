<?php

namespace App\Http\Controllers;

use App\Http\Resources\TableResource;
use App\Models\Place;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class PrintController extends Controller
{
    public function index()
    {
        return view('business.print.index');
    }

    public function store(Request $request)
    {
        $result = base64Convertor2($request->menuCardBase64, 'themeTypes');

        return response()->json([
           'status' => "success",
           'message' => $result,
        ]);
    }

    public function create(Request $request)
    {
        $tables = Place::find(1)->tables()->take(5)->get();
        return response()->json(TableResource::collection($tables));
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
