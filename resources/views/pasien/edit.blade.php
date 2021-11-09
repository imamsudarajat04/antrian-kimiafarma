@extends('layouts.master')

@section('title','Halaman Pasien')   
@section('pasien','active')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Pasien</h1>
        <div class="pull-right">
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('pasien.index') }}"><i class="fas fa-caret-left"></i> Back</a>
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
                    <form action="{{ route('pasien.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Nomor Antrian</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="noAntrian" placeholder="Masukan Nomor Antrian" value="{{ old('noAntrian', $data->noAntrian) }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Nama Pasien</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Dokter" value="{{ old('nama', $data->nama) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Tempat Lahir</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="tempat" placeholder="Masukan Tempat Lahir Dokter" value="{{ old('tempat', $data->tempat) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Tanggal Lahir</label>
                                <div class="col-12">
                                    <input type="date" class="form-control" name="tglLahir" value="{{ old('password', $data->tglLahir) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Jenis Kelamin</label>
                                <div class="col-12">
                                    <select class="form-control" name="jenisKelamin">
                                        <option value="" disabled="disabled" selected="selected">Pilih</option>
                                        @if ($data->jenisKelamin == 'Laki-laki')
                                            <option value="Laki-laki" selected>Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        @endif
                                        @if ($data->jenisKelamin == 'Perempuan')
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan" selected>Perempuan</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Umur Pasien</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="umur" id="umur" placeholder="Masukan Umur Pasien" value="{{ old('umur', $data->umur) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Alamat Pasien</label>
                                <div class="col-12">
                                    <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10">{{ old('alamat', $data->alamat) }}</textarea>
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