<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatif=Alternatif::all();
        return view('alternatif.alternatif')
            ->with('alternatif',$alternatif);
    }

    public function store(Request $request)
    {
        Alternatif::create($request->all());

        return redirect('alternatif')
            ->with('success','Alternatif berhasil ditambahkan');
    }
}
