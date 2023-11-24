<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\kriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index() {
        $alternatif = Alternatif::all();
        $kriteria = kriteria::all();
        $alternatif_kriteria = AlternatifKriteria::all();
        $alternatifKriteriaGrouped = $alternatif_kriteria->groupBy(['id_alternatif', 'id_kriteria']);

        // menghitung nilai av dengan rumus (jumlah nilai per kriteria / jumlah alternatif)
        $av = [];
        foreach ($kriteria as $k) {
            $av[$k->id] = $alternatif_kriteria->where('id_kriteria', $k->id)->sum('value') / $alternatif->count();
        }

        // menghitung nilai pda dengan rumus max(0, (nilai - av) / (av)) untuk benefit, dan max(0, (av - nilai) / (av)) untuk cost
        $pda = [];
        foreach ($alternatifKriteriaGrouped as $ak) {
            foreach ($ak as $a) {
                // dd($a[0]->id_kriteria);
                $k = $kriteria->where('id', $a[0]->id_kriteria)->first();
                if ($k->jenis == 0) {
                    $pda[$a[0]->id_alternatif][$a[0]->id_kriteria] = max(0, ($a[0]->value - $av[$a[0]->id_kriteria]) / ($av[$a[0]->id_kriteria]));
                } else {
                    $pda[$a[0]->id_alternatif][$a[0]->id_kriteria] = max(0, ($av[$a[0]->id_kriteria] - $a[0]->value) / ($av[$a[0]->id_kriteria]));
                }
            }
        }

        // menghitung nilai pda dengan rumus max(0, (nilai - av) / (av)) untuk cost, dan max(0, (av - nilai) / (av)) untuk benefit
        $nda = [];
        foreach ($alternatifKriteriaGrouped as $ak) {
            foreach ($ak as $a) {
                // dd($a[0]->id_kriteria);
                $k = $kriteria->where('id', $a[0]->id_kriteria)->first();
                if ($k->jenis == 1) {
                    $nda[$a[0]->id_alternatif][$a[0]->id_kriteria] = max(0, ($a[0]->value - $av[$a[0]->id_kriteria]) / ($av[$a[0]->id_kriteria]));
                } else {
                    $nda[$a[0]->id_alternatif][$a[0]->id_kriteria] = max(0, ($av[$a[0]->id_kriteria] - $a[0]->value) / ($av[$a[0]->id_kriteria]));
                }
            }
        }
        // dd($pda);
        return view('perhitungan.perhitungan')
            ->with('kriteria', $kriteria)
            ->with('alternatif', $alternatif)
            ->with('alternatif_kriteria', $alternatif_kriteria)
            ->with('alternatifKriteriaGrouped', $alternatifKriteriaGrouped)
            ->with('av', $av)
            ->with('pda', $pda)
            ->with('nda', $nda);
    }
}
