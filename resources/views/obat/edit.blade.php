@extends('layouts.master')

@section('title','Halaman Obat')   
@section('obat','active')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Obat</h1>
        <div class="pull-right">
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('obat.index') }}"><i class="fas fa-caret-left"></i> Back</a>
        </div>
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
                    <form action="{{ route('obat.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Kode Produksi Obat</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="kodeProduksi" placeholder="Masukan Kode Produksi" value="{{ old('kodeProduksi', $data->kodeProduksi) }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Nama Obat</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="namaObat" placeholder="Masukan Nama Obat" value="{{ old('namaObat', $data->namaObat) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Jenis Obat</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="jenisObat" placeholder="Masukan Jenis Obat" value="{{ old('jenisObat', $data->jenisObat) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Satuan Obat</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="satuan" placeholder="Masukan Satuan Obat" value="{{ old('satuan', $data->satuan) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Stok Obat</label>
                                <div class="col-12">
                                    <input type="number" class="form-control" name="stok" placeholder="Masukan Stok Obat" value="{{ old('stok', $data->stok) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Tanggal Expired Obat</label>
                                <div class="col-12">
                                    <input type="date" class="form-control" name="tglExpired" id="tglExpired" placeholder="Masukan Tanggal Expired Obat" value="{{ old('tglExpired', $data->tglExpired) }}" required>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block px-5"><i class="fas fa-edit"></i> Ubah</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection