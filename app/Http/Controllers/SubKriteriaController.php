<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $sub_kriteria=SubKriteria::orderBy('value', 'asc')->get();
        $kriteria=kriteria::all();
        return view('sub_kriteria.sub_kriteria')
            ->with('kriteria',$kriteria)
            ->with('sub_kriteria',$sub_kriteria);
    }

    public function store(Request $request)
    {
        SubKriteria::create($request->all());

        return redirect('sub_kriteria')
            ->with('success','Sub Kriteria berhasil ditambahkan');
    }
}
