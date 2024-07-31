<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Region;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;
use Illuminate\Support\Facades\File;

class TableController extends Controller
{
    private $business;
    private $user;

    public function __construct()
    {
        $this->user = auth('web')->user();
        $this->business = $this->user->place();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $place = $this->business;
        $regions = $place->regions;
        return view('business.table.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $region = Region::find($request->region_id);
        if (!isset($region)){
            return back()->with('response', [
               'status' => "error",
               'message' => "Bölge Bulunamadı"
            ]);
        }
        $place = $this->business;
        if($request->filled('table_single')){
            $uniqueString = (string) Str::uuid();
            $table = new Table();
            $table->place_id = $place->id;
            $table->region_id = $region->id;
            $table->name = $request->table_single;
            $table->qr_name = $uniqueString;
            $table->save();
            $url = route('table.show', $uniqueString);
            $table->qr_code = generateQrCode($url, Str::slug($region->name), Str::slug($table->name), $place->id);
            $table->save();
        } else{
            for ($i = 1; $i <= $request->table_count; $i++){
                $uniqueString = (string) Str::uuid();
                $table = new Table();
                $table->place_id = $place->id;
                $table->region_id = $request->region_id;
                $table->name = $request->table_multi. " ".$i;
                $table->qr_name = $uniqueString;
                $table->save();
                $url = route('table.show', $uniqueString);
                $table->qr_code = generateQrCode($url, Str::slug($region->name), Str::slug($table->name), $place->id);
                $table->save();
            }
        }

        return to_route('business.table.index')->with('response', [
           'status' => "success",
           'message' => "Masa Belirlenene Bölgeye Eklendi"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table)
    {
        //
    }

    public function downloadZip(Region $region)
    {
        if ($region->tables->count()  > 0){
            return Response::download($this->zipAndDownload($region->place_id, Str::slug($region->name)));
        } else{
            return to_route('business.table.index')->with('response', [
                'status' => "error",
                'message' => "İndirme Yapabilmek İçin En az 1 Masa Eklemelisiniz"
            ]);
        }
    }

    public function downloadTable(Table $table)
    {
        return Response::download(storage_path('app/public/'.$table->qr_code));
    }
    public function zipAndDownload($placeId, $regionName)
    {
        $folderPath = storage_path('app/public/places/'.$placeId.'/'.$regionName); // Zip'lenecek klasörün yolu

        $zipFileName = $regionName.'.zip'; // Zip dosyasının adı

        $zip = new ZipArchive;
        if ($zip->open(storage_path($zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
            // Klasördeki dosyaları zip dosyasına ekleyin
            $files = File::files($folderPath);
            foreach ($files as $file) {
                $relativeName = str_replace($folderPath . DIRECTORY_SEPARATOR, '', $file);
                $zip->addFile($file, $relativeName);
            }
            $zip->close();
        }

        // Zip dosyasının yolunu döndürüyoruz
        return storage_path($zipFileName);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        if ($table->delete()){
            return response()->json([
               'status' => "success",
               'message' => "Masa Kaydı Başarılı Bir Şekilde Silindi"
            ]);
        }
    }
}
