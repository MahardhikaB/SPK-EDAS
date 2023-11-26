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

    <!-- Table AS -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"><i class="nav-icon fas fa-tachometer-alt my-2"></i>NSP & NSN</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Alternatif</th>
                            <th>AS</th>
                            <th>Ranking</th>
                        </tr>   
                    </thead>
                    <tbody>
                        {{-- @foreach ($alternatif as $item_alternatif)
                            <tr>
                                <td>{{ $item_alternatif->nama_alternatif }}</td>
                                <td>{{ $as[$item_alternatif->id] }}</td>
                            </tr>
                        @endforeach --}}
                        @foreach ($as as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $value }}</td>
                                <td>{{$loop->iteration}}</td>
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
