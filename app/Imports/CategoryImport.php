<?php

namespace App\Imports;

use App\Models\MenuCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

ini_set('max_execution_time', 0);

class CategoryImport implements ToModel, WithStartRow
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
            $existCategory = $this->activeCategories->where('name', $row[1])->first();
            if (!isset($existCategory)) {
                $menuCategory = new MenuCategory();
                $menuCategory->order_number = $row[0];
                $menuCategory->menu_id = $this->menuId;
                $menuCategory->name = $row[1];
                $menuCategory->save();
                $this->importedCount++;
            } else{
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
