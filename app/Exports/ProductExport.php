<?php

namespace App\Exports;

use App\Models\Product;
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
        return Product::whereMonth('created_at', $this->time)->get();
    }
    public function headings() :array {
    	return ["STT", "Tên tài khoản", "Email", "Loại"];
    }
}
