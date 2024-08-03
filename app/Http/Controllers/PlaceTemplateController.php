<?php

namespace App\Http\Controllers;

use App\Models\PlaceTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use ZipArchive;

class PlaceTemplateController extends Controller
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
        return view('business.template.index');
    }

    public function show(PlaceTemplate $placeTemplate)
    {
        return Response::download(Storage::path($placeTemplate->image));
    }
    public function create()
    {
        return Response::download($this->zipAndDownload($this->business->id, $this->business->name."_masa_sablonlar"));
    }
    public function zipAndDownload($placeId, $regionName)
    {
        $folderPath = storage_path('app/public/themeTypes/'.$placeId); // Zip'lenecek klasörün yolu

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
    public function datatable()
    {
        $adverts = $this->business->templates;
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Souce', 'Duyurları', 'orderChecks');
            })
            ->editColumn('table_name', function ($q) {
                return $q->table_name;
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i');
            })
            ->editColumn('image', function ($q) {
                return html()->img(storage($q->image))->style('width:35px');
            })

            ->addColumn('action', function ($q) {
                $html = "";
                $buttons = [
                    [
                        'buttonText' => "İndir",
                        'buttonLink' => route('business.placeTemplate.show', $q->id),
                        'id' => 0,
                    ],
                ];
                $html.= create_dropdown_button($buttons, $q->id, 'updateStatus');

                return $html;
            })
            ->rawColumns(['id', 'action', 'name', 'status'])
            ->make(true);

    }

}
