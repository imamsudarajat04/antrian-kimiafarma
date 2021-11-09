@extends('layouts.master')

@section('title','Halaman Pasien')   
@section('pasien','active')

@push('customcss')
    <!-- Custom styles for this page -->
    <link href="{{ asset('assetsdashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Pasien Baru</h1>
            <a href="{{ route('pasien.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left"></i> Kembali</a>
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
                        <form action="{{ route('pasien.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Nomor Antrian</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="noAntrian" placeholder="Masukan Nomor Antrian" value="{{ old('noAntrian') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Nama Lengkap</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama User" value="{{ old('nama') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Tempat Lahir</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="tempat" placeholder="Masukan Tempat Lahir" value="{{ old('tempat') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Tanggal Lahir</label>
                                    <div class="col-12">
                                        <input type="date" class="form-control" name="tglLahir" value="{{ old('tglLahir') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Jenis Kelamin</label>
                                    <div class="col-12">
                                        <select name="jenisKelamin" class="form-control">
                                            <option value="" disabled="disabled" selected="selected">Pilih</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Umur Pasien</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="umur" placeholder="Masukan Umur Pasien" value="{{ old('umur') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Alamat</label>
                                    <div class="col-12">
                                        {{-- <input type="text" class="form-control" name="bidangKeahlian" placeholder="Masukan Bidang Keahlian" value="{{ old('bidangKeahlian') }}" required> --}}
                                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" required>{{ old('alamat') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block px-5"><i class="fas fa-plus"></i> Tambah Pasien</button>
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