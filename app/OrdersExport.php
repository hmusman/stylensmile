<?php

namespace App;
use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithMapping, WithHeadings
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'Order Number',
            'Customer',
            'Phone',
            'City',
            'Address',
            'Number Of Products',
            'Number Of Pieces',
            'Weight (kg)',
            'Amount',
            'Shipping Cost',
            'Total Amount',
            'Payment Status'
        ];
    }

    /**
    * @var Product $product
    */
    public function map($product): array
    {
        $productList;
        $qty = 0;
        foreach ($product->orderDetails as $item) { $qty+=$item->quantity;}
        $address = json_decode($product->shipping_address);
        $productList[] = 
        [
            $product->code,
            $address->name,
            $address->phone,
            $address->city,
            $address->address,
            $product->orderDetails->count(),
            $qty,
            $qty * 0.5,
            intval($product->grand_total),
            $product->orderDetails[0]->shipping_cost,
            intval($product->grand_total + $product->orderDetails[0]->shipping_cost),
            $product->payment_status
        ];
        return $productList;
    }
}
