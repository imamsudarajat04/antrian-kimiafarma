@extends('layouts.master')

@section('title','Halaman Obat')   
@section('obat','active')
@section('main','show')

@push('customcss')
    <!-- Custom styles for this page -->
    <link href="{{ asset('assetsdashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Obat</h1>
            <a href="{{ route('obat.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>

        <!-- Alert -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="delete-response">

        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered dt-responsive nowrap w-100 display" id="tableObat">
                                <thead>
                                    <tr>
                                        <th width="70px">No</th>
                                        <th>Kode Produksi</th>
                                        <th>Nama Obat</th>
                                        <th>Jenis Obat</th>
                                        <th>Satuan Obat</th>
                                        <th>Stok Obat</th>
                                        <th>Tanggal Expired</th>
                                        <th width="150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus data obat ini ?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger delete-obat" value="">
                            <strong>
                                Hapus
                            </strong>
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('customjs')
    <!-- Page level plugins -->
    <script src="{{ asset('assetsdashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assetsdashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assetsdashboard/js/demo/datatables-demo.js') }}"></script>

    <script>
        $(document).ready( function () {
            $('#tableObat').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('obat.index') }}",
                    type: 'GET'
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        width: '1%',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'kodeProduksi',
                        name: 'kodeProduksi'
                    },
                    {
                        data: 'namaObat',
                        name: 'namaObat',
                    },
                    {
                        data: 'jenisObat',
                        name: 'jenisObat'
                    },
                    {
                        data: 'satuan',
                        name: 'satuan'
                    },
                    {
                        data: 'stok',
                        name: 'stok'
                    },
                    {
                        data: 'tglExpired',
                        name: 'tglExpired'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '1%',
                    }
                ],
                order: [[1, 'asc']],
                sDom: '<"secondBar d-flex flex-wrap justify-content-between mb-2"lf>rt<"bottom"p>',

                "fnCreatedRow": function(nRow, data) {
                    $(nRow).attr('id', 'obat' + data.id);
                },
            });
        } );

        $(document).on("click", ".delete_modal", function() {
            var id = $(this).data('id');
            $(".modal-footer .delete-obat").val(id);
        });

        jQuery(document).ready(function($) {
            ////----- DELETE a link and remove from the page -----////
            jQuery('.delete-obat').click(function() {
                var obat_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: 'delete-obat/' + obat_id,
                    success: function(data) {
                        setTimeout(function () {
                        $('#exampleModal').modal('hide'); //sembunyikan konfirmasi modal
                        $(".delete-response").append(
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Obat Berhasil Di Hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"> &times; </span></button></div>'
                        );
                        var oTable = $('#tableObat').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                        // $('#exampleModal').modal('hide');
                        // $("#user" + user_id).remove();
                        // $(".delete-response").append(
                        //     '<div class="alert alert-success alert-dismissible fade show" role="alert">Data User Berhasil Di Hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"> &times; </span></button></div>'
                        // )
                    },
                    error: function(data) {
                        if (data.status === 403) {
                            $('#exampleModal').modal('hide');
                            $(".delete-response").append(
                                '<div class="alert alert-danger alert-dismissible fade show" role="alert">Unauthorized : Anda Tidak Memiliki Akses Untuk Menghapus Data<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"> &times; </span></button></div>'
                            )
                        }
                    }
                });
            });
        });
    </script>
@endpush