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
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Harga (Diskon)</th>
                                    <th>Status</th>
                                    <th>Tampilkan di Homepage ?</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset("admin/uploads/product_images/$item->thumb_image") }}" alt="" height="60" width="60"></td>
                                        <td>{{ $item->name }}</td>
                                        <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($item->offer_price, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->show_at_home == 1)
                                                <span class="badge bg-success">Ya</span>
                                            @else
                                                <span class="badge bg-danger">Tidak</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.product.edit', $item->id) }}"
                                                class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.product.destroy', $item->id) }}"
                                                class="btn btn-danger btn-sm" data-confirm-delete="true" title="Hapus"><i class="fas fa-trash"></i></a>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false" title="Opsi Lainnya">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <form action="{{ route('admin.product.status', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="dropdown-item" type="submit">
                                                                {{ $item->status == 1 ? 'Nonaktifkan produk ini' : 'Aktifkan produk ini' }}
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('admin.product.show-at-home', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="dropdown-item" type="submit">
                                                                {{ $item->show_at_home == 1 ? 'Jangan tampilkan produk ini pada homepage' : 'Tampilkan produk ini pada homepage' }}
                                                            </button>
                                                        </form>
                                                        <li><a class="dropdown-item" href="#">Galeri Produk</a></li>
                                                        <li><a class="dropdown-item" href="#">Varian Produk</a></li>
                                                    </ul>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
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
