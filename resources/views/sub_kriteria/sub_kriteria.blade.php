@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kriteria</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    

        <!-- Default box -->
        @foreach ($kriteria as $item)
        <section class="content">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title"><i class="nav-icon fas fa-tachometer-alt my-2"></i>{{ $item->nama_kriteria }}</h3>
                    <button type="button" class="btn btn-sm btn-success ml-auto" data-toggle="modal"
                        data-target="#kriteriaModal" onclick='setKriteria(@json($item))' >
                        + Tambah Data
                    </button>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Rentang Kriteria</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($sub_kriteria as $sub_item)
                            @if ($sub_item->id_kriteria == $item->id)
                            @php
                                $i++;
                            @endphp
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$sub_item->range_kriteria}}</td>
                            <td>{{$sub_item->value}}</td>
                            <td>
                                <a href="{{url('kriteria/'.$sub_item->id.'/edit')}}" class="btn btn-warning">Edit</a>
                                <form action="{{url('kriteria/'.$sub_item->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @endforeach
        <!-- Modal -->
        <div class="modal fade" id="kriteriaModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nama_kriteria"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('sub_kriteria') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Rentang Kriteria</label>
                                <input type="text" class="form-control" id="nama"
                                    placeholder="Masukkan Rentang Kriteria" name="range_kriteria">
                            </div>
                            <div class="form-group">
                                <label for="bobot">Nilai</label>
                                <input type="number" step="0.01" class="form-control" id="bobot"
                                    placeholder="Masukkan Nilai" name="value">
                            </div>
                            <input type="hidden" class="form-control" id="id_kriteria" name="id_kriteria" value="">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let kriteria;
    
            function setKriteria(newkriteria) {
                kriteria = newkriteria;
                console.log(kriteria);
                document.getElementById('nama_kriteria').innerHTML = kriteria.nama_kriteria;
                document.getElementById('id_kriteria').value = kriteria.id;
            }
        </script>
@endsection

@push('css')
@endpush

@push('scripts')
    {{--    <script> --}}
    {{--        alert('Selamat Datang'); --}}
    {{--    </script> --}}
@endpush
