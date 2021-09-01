<?php

namespace App\Http\Controllers;
use Excel;
use App\Exports\BaogiaExportExcel;
use Illuminate\Http\Request;

class BaogiaExportExcelController extends Controller
{
    public function export()
    {

        return Excel::download(new BaogiaExportExcel, 'baogia.xlsx');
    }
}
