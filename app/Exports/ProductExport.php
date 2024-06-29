<?php

namespace App\Exports;

use App\Models\MenuCategoryProduct;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ProductExport implements FromCollection,WithColumnFormatting, WithMapping, WithHeadings, WithColumnWidths
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->data;
    }

    public function map($product): array
    {
        return [
            $product->category->name,
            $product->order_number,
            $product->name,
            $product->price,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
            'D' => '#,##0.00', //or '[$₺-tr-TR]#,##0.00' Turkish Lira
        ];
    }

    public function headings(): array
    {
        return [
            'Kategori Adı',
            'Ürün Sırası',
            'Ürün Adı',
            'Ürün Fiyatı'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 14,
            'B' => 14,
            'C' => 14,
            'D' => 14,
        ];
    }
}

