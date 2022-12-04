<?php

namespace App\Exports;

use App\Models\VnpayTest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ProductExport implements FromCollection, WithHeadings
{
    private $time;

    public function __construct(int $time) {
    	$this->time = $time;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return VnpayTest::select(
            'vnp_OrderType',
            'vnp_Amount',
            'vnp_Bill_Email',
            'vnp_Bill_Address'
        )->whereMonth('created_at', $this->time)->where('status_order','success')->get();
    }
    public function headings() :array {
    	return ["Loại", "Giá", "Email", "Địa chỉ"];
    }
}
