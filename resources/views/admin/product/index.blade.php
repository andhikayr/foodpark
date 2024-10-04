@extends('admin.layouts.master')

@section('title')
    Produk
@endsection

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Produk</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Produk</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Semua Produk</h4>
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Tambah Baru</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="basic-datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div> <!-- container -->
@endsection

@push('scripts')
    <script>
        $('#basic-datatable').DataTable({
            "language": {
                url: '{{ asset("admin/assets/libs/datatables.net/id.json") }}',
            },
        });
    </script>
@endpush
