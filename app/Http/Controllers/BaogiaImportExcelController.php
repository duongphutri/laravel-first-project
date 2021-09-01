<?php

namespace App\Http\Controllers;

use Excel;
use App\Imports\BaogiaImportExcel;
use Illuminate\Http\Request;

class BaogiaImportExcelController extends Controller
{
    public function index()
    {
        return view('backend.excel.baogiaimport');
    }

    public function store(Request  $request)
    {
        $data =  $request->file('excel')->store('excel');
        
        Excel::import(new BaogiaImportExcel, $data);

        return redirect()->back();
    }
}
