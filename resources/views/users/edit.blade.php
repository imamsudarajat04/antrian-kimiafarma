@extends('layouts.master')

@section('title','Halaman Pasien')   
@section('users','active')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data User</h1>
        <div class="pull-right">
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('user.index') }}"><i class="fas fa-caret-left"></i> Back</a>
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
                    <form action="{{ route('user.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Nama</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="name" placeholder="Masukan Nama User" value="{{ old('name', $data->name) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Email</label>
                                <div class="col-12">
                                    <input type="email" class="form-control" placeholder="Masukan Email User" value="{{ old('email', $data->email) }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Password</label>
                                <div class="col-12">
                                    <input type="password" class="form-control" name="password" placeholder="Masukan Password Baru" value="{{ old('password') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Konfirmasi Password</label>
                                <div class="col-12">
                                    <input type="password" class="form-control" name="confirm-password" placeholder="Konfirmasi Password Baru" value="{{ old('confirm-password') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Roles</label>
                                <div class="col-12">
                                    <select name="level" class="form-control">
                                        <option value="" disabled="disabled" selected="selected">Pilih</option>
                                        @if ($data->level == 'admin')
                                            <option value="admin" selected>Admin</option>
                                            <option value="dokter">Dokter</option>
                                            <option value="apotek">Apotek</option>
                                        @endif
                                        @if ($data->level == 'dokter')
                                            <option value="admin">Admin</option>
                                            <option value="dokter" selected>Dokter</option>
                                            <option value="apotek">Apotek</option>
                                        @endif
                                        @if ($data->level == 'apotek')
                                            <option value="admin">Admin</option>
                                            <option value="dokter">Dokter</option>
                                            <option value="apotek" selected>Apotek</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="Status" class="col-12 control-label">Status</label>
                                <div class="col-12">
                                    <select name="status" id="status" class="form-control">
                                        <option value="" disabled="disabled" selected="selected">Pilih</option>
                                        @if ($data->status == 'Aktif')    
                                            <option value="Aktif" selected>Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        @endif
                                        @if ($data->status == 'Tidak Aktif')
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif" selected>Tidak Aktif</option>
                                        @endif
                                    </select>
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