@extends('layouts.master')

@section('title','Halaman Permohonan')   
@section('permohonan','active')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Permohonan Baru</h1>
            <a href="{{ route('permohonan.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left"></i> Kembali</a>
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
                        <form action="{{ route('permohonan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Nama Pasien</label>
                                    <div class="col-12">
                                        {{-- <input type="text" class="form-control" name="name" placeholder="Masukan Nama User" value="{{ old('name') }}" required> --}}
                                        <select name="pasien_id" class="form-control" id="pasien_id" value="{{ old('pasien_id') }}" multiple>
                                            @foreach ($pasien as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Nama Dokter</label>
                                    <div class="col-12">
                                        {{-- <input type="email" class="form-control" name="email" placeholder="Masukan Email User" value="{{ old('email') }}" required> --}}
                                        <select name="dokter_id" class="form-control" id="dokter_id" value="{{ old('dokter_id') }}" multiple>
                                            @foreach ($dokter as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Nomor Antrian</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="noAntrian" placeholder="Masukan Nomor Antrian Pasien" value="{{ old('noAntrian') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Keluhan Pasien</label>
                                    <div class="col-12">
                                        {{-- <input type="password" class="form-control" name="confirm-password" placeholder="Konfirmasi Password User" value="{{ old('confirm-password') }}" required> --}}
                                        <textarea name="keluhan" id="keluhan" class="form-control" cols="30" rows="10">{{ old('keluhan') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Tanggal Permohonan</label>
                                    <div class="col-12">
                                        <input type="date" name="tglPermohonan" id="tglPermohonan" class="form-control" value="{{ old('tglPermohonan') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block px-5"><i class="fas fa-plus"></i> Tambah Permohonan</button>
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