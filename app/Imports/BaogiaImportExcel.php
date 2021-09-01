<?php

namespace App\Imports;

use App\Models\baogia;
use Maatwebsite\Excel\Concerns\ToModel;

class BaogiaImportExcel implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new baogia([
            'ten' => $row[0],
            'chungloai' => $row[1],
            'hang' => $row[2],
            'soluong' => $row[3],
            'thongtin' => $row[4],
            'dongia' => $row[5],
            'ghichu' => $row[6],
        ]);
    }
}
