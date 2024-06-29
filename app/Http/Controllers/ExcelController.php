<?php

namespace App\Http\Controllers;

use App\Exports\CategoryExport;
use App\Exports\ProductExport;
use App\Imports\CategoryImport;
use App\Imports\ProductImport;
use App\Models\MenuCategoryProduct;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index()
    {
        return view('business.import-export.index');
    }

    public function categoryExport()
    {
        $categories = authUser()->place()->activeMenu()->categories;
        return Excel::download(new CategoryExport($categories), 'kategoriler.xlsx');
    }

    public function productExport()
    {
        $categories = authUser()->place()->activeMenu()->categories()->pluck('id');
        $products = MenuCategoryProduct::whereIn('category_id', $categories)->get();

        return Excel::download(new ProductExport($products), 'urunler.xlsx');
    }

    public function categoryImport(Request $request)
    {
        $categories = authUser()->place()->activeMenu()->categories;
        $import = new CategoryImport($categories);
        Excel::import($import, $request->file('category_import'));
        return back()->with('response', [
           'status' => "success",
           'message' => "{$import->importedCount} Kategori İçeri Aktarıldı.<br>  {$import->skippedCount} Kategori Kayıtlarda Mevcut Olduğu için aktarılmadı"
        ]);
    }

    public function productImport(Request $request)
    {
        $categories = authUser()->place()->activeMenu()->categories;
        $import = new ProductImport($categories);
        Excel::import($import, $request->file('product_import'));
        return back()->with('response', [
            'status' => "success",
            'message' => "{$import->importedCount} Ürün İçeri Aktarıldı.<br>  {$import->skippedCount} Ürün Kayıtlarda Mevcut Olduğu için aktarılmadı"
        ]);
    }
}
