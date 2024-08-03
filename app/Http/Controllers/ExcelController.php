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
        $activeMenu = authUser()->place()->activeMenu();
        if (!isset($activeMenu) && $activeMenu->categories->count() == 0){
            return to_route('business.menu.index')->with('response', [
                'status' => "error",
                'message' => "Hiç kategori eklemediniz.Ayrıca Menünüz Yok. Menü Eklemeniz Gerekmektedir",
            ]);
        }
        $categories = $activeMenu->categories;
        return Excel::download(new CategoryExport($categories), 'kategoriler.xlsx');
    }

    public function productExport()
    {
        $activeMenu = authUser()->place()->activeMenu();
        if (!isset($activeMenu)){
            return to_route('business.menu.index')->with('response', [
                'status' => "error",
                'message' => "Hiç kategori eklemediniz.Ayrıca Menünüz Yok. Menü Eklemeniz Gerekmektedir",
            ]);
        }
        $categories = $activeMenu->categories()->pluck('id');
        $products = MenuCategoryProduct::whereIn('category_id', $categories)->get();
        if ($products->count() == 0){
            return to_route('business.menu.edit', $activeMenu->id)->with('response', [
                'status' => "error",
                'message' => "Hiç ürün eklemediniz. Ürün Eklemeniz Gerekmektedir",
            ]);
        }
        return Excel::download(new ProductExport($products), 'urunler.xlsx');
    }

    public function categoryImport(Request $request)
    {
        $activeMenu = authUser()->place()->activeMenu();
        if (!isset($activeMenu)){
            return to_route('business.menu.index')->with('response', [
               'status' => "error",
               'message' => "Kategori Eklemeden Önce Menü Eklemeniz Gerekmektedir",
            ]);
        }
        $categories = $activeMenu->categories;
        $import = new CategoryImport($categories, $activeMenu->id);
        Excel::import($import, $request->file('category_import'));
        return back()->with('response', [
           'status' => "success",
           'message' => "{$import->importedCount} Kategori İçeri Aktarıldı.  {$import->skippedCount} Kategori Kayıtlarda Mevcut Olduğu için aktarılmadı"
        ]);
    }

    public function productImport(Request $request)
    {
        $activeMenu = authUser()->place()->activeMenu();
        if (!isset($activeMenu)){
            return to_route('business.menu.index')->with('response', [
                'status' => "error",
                'message' => "Kategori Eklemeden Önce Menü Eklemeniz Gerekmektedir",
            ]);
        }
        $categories = $activeMenu->categories;
        $import = new ProductImport($categories, $activeMenu->id);
        Excel::import($import, $request->file('product_import'));
        return back()->with('response', [
            'status' => "success",
            'message' => "{$import->importedCount} Ürün İçeri Aktarıldı. {$import->skippedCount} Ürün Kayıtlarda Mevcut Olduğu için aktarılmadı"
        ]);
    }
}
