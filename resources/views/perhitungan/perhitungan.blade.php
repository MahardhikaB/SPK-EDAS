@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Perhitungan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Menampilkan Bobot -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"><i class="nav-icon fas fa-tachometer-alt my-2"></i>Bobot</h3>
            </div>


            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            @foreach ($kriteria as $item)
                                <th>{{ $item->nama_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriteria as $item)
                            <td>{{ $item->bobot }}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </section>

    <!-- Table Keputusan -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"><i class="nav-icon fas fa-tachometer-alt my-2"></i>Matrix Keputusan</h3>
            </div>


            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Alternatif</th>
                            @foreach ($kriteria as $krt)
                                <th>C{{ $loop->iteration }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $item)
                            <tr>
                                <td>{{ $item->nama_alternatif }}</td>
                                @foreach ($kriteria as $krt)
                                    <td>
                                        @php
                                            $ak = $alternatifKriteriaGrouped[$item->id][$krt->id] ?? null;
                                        @endphp

                                        @if ($ak)
                                            {{ $ak[0]->value }}
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </section>

    <!-- Table AV -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"><i class="nav-icon fas fa-tachometer-alt my-2"></i>Matrix AV</h3>
            </div>


            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            @foreach ($av as $item_av)
                                <th>AV{{ $loop->iteration }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($av as $item_av)
                            <td>{{ $item_av }}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </section>

    <!-- Table PDA -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"><i class="nav-icon fas fa-tachometer-alt my-2"></i>PDA</h3>
            </div>


            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Alternatif</th>
                            @foreach ($kriteria as $krt)
                                <th>C{{ $loop->iteration }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $item_alternatif)
                            <tr>
                                <td>{{ $item_alternatif->nama_alternatif }}</td>
                                @foreach($kriteria as $item_kriteria)
                                    <td>{{ $pda[$item_alternatif->id][$item_kriteria->id] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </section>

    <!-- Table NDA -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"><i class="nav-icon fas fa-tachometer-alt my-2"></i>NDA</h3>
            </div>


            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Alternatif</th>
                            @foreach ($kriteria as $krt)
                                <th>C{{ $loop->iteration }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $item_alternatif)
                            <tr>
                                <td>{{ $item_alternatif->nama_alternatif }}</td>
                                @foreach($kriteria as $item_kriteria)
                                    <td>{{ $nda[$item_alternatif->id][$item_kriteria->id] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </section>
    <script></script>
@endsection

@push('css')
@endpush

@push('scripts')
@endpush
