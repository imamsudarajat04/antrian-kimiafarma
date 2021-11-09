@extends('layouts.master')

@section('title','Halaman Permohonan')   
@section('permohonan','active')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Permohonan</h1>
        <div class="pull-right">
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('permohonan.index') }}"><i class="fas fa-caret-left"></i> Back</a>
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
                    <form action="{{ route('permohonan.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Nama Pasien</label>
                                <div class="col-12">
                                    <select name="pasien_id" class="form-control" id="pasien_id" value="{{ old('pasien_id') }}" multiple>
                                        @foreach ($pasien as $item)
                                            @if ($data->pasien_id == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endif
                                        @endforeach                 
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Nama Dokter</label>
                                <div class="col-12">
                                    <select name="dokter_id" class="form-control" id="dokter_id" value="{{ old('dokter_id') }}" multiple>
                                        @foreach ($dokter as $item)
                                            @if ($data->dokter_id == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Nomor Antrian Pasien</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="noAntrian" placeholder="Masukan Nomor Antrian Baru" value="{{ old('noAntrian', $data->noAntrian) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Keluhan Pasien</label>
                                <div class="col-12">
                                    <textarea name="keluhan" class="form-control" id="keluhan" cols="30" rows="10">{{ $data->keluhan }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Tanggal Permohonan</label>
                                <div class="col-12">
                                    <input type="date" name="tglPermohonan" id="tglPermohonan" class="form-control" value="{{ old('tglPermohonan', $data->tglPermohonan) }}" required>
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