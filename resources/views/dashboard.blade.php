@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')

        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Dashboard</h1>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</h3>
            </div>
            <div class="card-body">
              <object data="{{ asset('document/JURNAL EDAS.pdf') }}" type="application/pdf" width="100%" height="700px" class="mt-2">
                <p>Unable to display PDF file. <a href="{{ asset('document/JURNAL EDAS.pdf') }}" target="_blank">Download</a> instead.</p>
            </object>
            </div>
        <!-- /.card -->

        </section>
@endsection

@push('css')

@endpush

@push('scripts')

{{--    <script>--}}
{{--        alert('Selamat Datang');--}}
{{--    </script>--}}

@endpush