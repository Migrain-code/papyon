<?php

namespace App\Imports;

use App\Models\MenuCategory;
use App\Models\MenuCategoryProduct;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductImport implements ToModel, WithStartRow
{
    private $activeCategories;
    private $menuId;

    public $importedCount = 0; // Counter for imported categories
    public $skippedCount = 0;  // Counter for skipped categories

    public function __construct($categories, $menuId)
    {
        $this->activeCategories = $categories;
        $this->menuId = $menuId;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try {
            $existCategory = $this->activeCategories->where('name', $row[0])->first();
            if (isset($existCategory)) {
                $productNames = $existCategory->products()->pluck('name')->toArray();
                $menuCategoryProduct = new MenuCategoryProduct();
                $menuCategoryProduct->menu_id = $this->menuId;
                $menuCategoryProduct->category_id = $existCategory->id;
                $menuCategoryProduct->name = $row[2];
                $menuCategoryProduct->order_number = $row[1];
                $menuCategoryProduct->price = $row[3] ?? 0;
                $menuCategoryProduct->description = $row[4] ?? "";
                if (in_array($menuCategoryProduct->name, $productNames)){
                    $this->skippedCount++;
                } else{
                    $menuCategoryProduct->save();
                    $this->importedCount++;
                }
            } else{
                /*$menuCategory = new MenuCategory();
                $menuCategory->order_number = $row[0];
                $menuCategory->menu_id = $this->menuId;
                $menuCategory->name = $row[1];
                $menuCategory->save();*/
                $this->skippedCount++;
            }
        } catch (\Exception $exception) {
            $row['error'] = $exception->getMessage();
            dump($row);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}

