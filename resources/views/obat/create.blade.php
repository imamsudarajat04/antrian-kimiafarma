@extends('layouts.master')

@section('title','Halaman Obat')   
@section('obat','active')

@push('customcss')
    <!-- Custom styles for this page -->
    <link href="{{ asset('assetsdashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Obat Baru</h1>
            <a href="{{ route('obat.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left"></i> Kembali</a>
        </div>

        <!-- Alert -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="my-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ route('obat.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Kode Produksi</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="kodeProduksi" placeholder="Masukan Kode Produksi Obat" value="{{ old('kodeProduksi') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Nama Obat</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="namaObat" placeholder="Masukan Nama Obat" value="{{ old('namaObat') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Jenis Obat</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="jenisObat" placeholder="Masukan Jenis Obat" value="{{ old('jenisObat') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Satuan Obat</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="satuan" placeholder="Masukan Satuan Obat" value="{{ old('satuan') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Stok Obat</label>
                                    <div class="col-12">
                                        <input type="number" class="form-control" name="stok" placeholder="Masukan Stok Obat" value="{{ old('stok') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Tanggal Expired Obat</label>
                                    <div class="col-12">
                                        <input type="date" class="form-control" name="tglExpired" value="{{ old('tglExpired') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block px-5"><i class="fas fa-plus"></i> Tambah Obat</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection