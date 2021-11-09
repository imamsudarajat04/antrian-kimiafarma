@extends('layouts.master')

@section('title','Halaman Dokter')   
@section('dokter','active')

@push('customcss')
    <link rel="stylesheet" href="{{ asset('assetsdashboard/css/custom.css') }}">
@endpush

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail : {{ $data->nama }}</h1>
        <div class="pull-right">
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('dokter.index') }}"><i class="fas fa-caret-left"></i> Kembali</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row details-pendaftaran">
                        {{-- <div class="col-12 col-md-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="title mb-2">Foto</div>
                                </div>
                                <div class="col-12 image-wrapper mb-3">
                                    <div class="image" style="background-image : url('{{ Storage::exists('public/' . $data->foto) && $data->foto ? Storage::url($data->foto) : asset('images/user.png') }}')"></div>
                                </div>
                                <div class="col-12">
                                    <div class="title mb-2">Swafoto</div>
                                </div>
                                <div class="col-12 image-wrapper">
                                    <div class="image" style="background-image : url('{{ Storage::exists('public/' . $data->swafoto) && $data->swafoto ? Storage::url($data->swafoto) : asset('images/user.png') }}')"></div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12 col-md-10">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="title">Nama Lengkap :</div>
                                    <div class="subtitle">{{ $data->nama }}</div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="title">NIP :</div>
                                    <div class="subtitle">{{ $data->nip }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="title">Tempat Lahir :</div>
                                    <div class="subtitle">{{ $data->tempat }}</div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="title">Tanggal Lahir :</div>
                                    <div class="subtitle">{{ \Carbon\Carbon::parse($data->tglLahir)->format('d/m/Y') }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="title">Jenis Kelamin :</div>
                                    <div class="subtitle">{{ $data->jenisKelamin }}</div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="title">Bidang Keahlian :</div>
                                    <div class="subtitle">{{ $data->bidangKeahlian }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

