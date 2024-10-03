@extends('admin.layouts.master')

@section('title')
    Produk (Slider)
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
                            <li class="breadcrumb-item active">Produk (Slider)</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Produk (Slider)</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Semua Produk (Slider)</h4>
                        <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">Tambah Baru</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="basic-datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('admin/uploads/slider_images/' . $item->image) }}" alt="" height="100" width="100">
                                        </td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.slider.status', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-{{ $item->status == 1 ? 'danger' : 'success' }} btn-sm" title="{{ $item->status == 1 ? 'Nonaktifkan produk (slider) ini' : 'Aktifkan produk (slider) ini' }}" type="submit">
                                                    <i class="fas fa-{{ $item->status == 1 ? 'times' : 'check' }}"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('admin.slider.edit', $item->id) }}"
                                                class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.slider.destroy', $item->id) }}"
                                                class="btn btn-danger btn-sm" data-confirm-delete="true" title="Hapus"><i class="fas fa-trash"></i></a>
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
