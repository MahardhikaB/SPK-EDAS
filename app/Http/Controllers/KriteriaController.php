<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $data=kriteria::all();
        return view('kriteria.kriteria')
            ->with('data',$data);
    }

    public function store(Request $request)
    {

        $request['jenis'] = $request->jenis == 'on' ? true : false;
        kriteria::create($request->all());

        return redirect('kriteria')
            ->with('success','Kriteria berhasil ditambahkan');
    }
}
