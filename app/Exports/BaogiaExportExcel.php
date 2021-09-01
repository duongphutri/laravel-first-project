<?php

namespace App\Exports;

use App\Models\baogia;
use Maatwebsite\Excel\Concerns\FromCollection;

class BaogiaExportExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return baogia::all();
    }
}
