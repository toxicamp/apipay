<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\TableExcel;
use Illuminate\Http\Request;

class TableExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $excel = new TableExcel;
        $tabEx = $excel->getFillable();
        $tabEc = $excel-> select('*')->get();
        return view('table.table' , ['tableEx'=>$tabEx , 'tableEc'=>$tabEc->toArray()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $excelSave = $request->except('_token');
        $column = key($excelSave);
        $id = key($excelSave[$column]);
        $value = $excelSave[$column][$id];

        $excel = TableExcel::find($id);
        $excel->{$column} = $value;
        $excel->save();
        return $value;

    }


}
