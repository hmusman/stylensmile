<?php

namespace App;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithMapping, WithHeadings
{
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Brand',
            'Unit',
            'Category',
            'Sub Category',
            'Sub Sub Category',
            'Tag',
            'Barcode Type',
            'Manage Stock',
            'Alert Security',
            'Expores In',
            'Expiry Period Unit',
            'Applicable Tax',
            'Selling Price Tax Type',
            'Product Type',
            'Variation Name',
            'Variation Value',
            'Purchase Price',
            'Profit Margin',
            'Selling Price',
            'Opening Stock',
            'Location',
            'Expiry Date',
            'Serial Number',
            'Weight',
            'Rack',
            'Row',
            'Position',
            'Image',
            'Description',
            'No For Selling',
        ];
    }

    /**
    * @var Product $product
    */
    public function map($product): array
    {
        $productList;
        foreach ($product->stocks as $row)
        {

            if($product->subsubcategory_id){ $subsubcategory = $product->subsubcategory->name; }else{ $subsubcategory = '';}
            $productList[] = 
            [
                $product->name,
                $product->brand->name,
                'Each',
                $product->category->name,
                $product->subcategory->name,
                $subsubcategory,
                $product->tags,
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                'Size',
                $row->variant,
                $product->purchase_price,
                '',
                $row->price,
                $row->qty,
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                $product->description,
                '',
            ];
        }
        return $productList;
    }
}
