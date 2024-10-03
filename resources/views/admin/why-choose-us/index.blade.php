@extends('admin.layouts.master')

@section('title')
    Card "Mengapa Memilih Kita"
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
                            <li class="breadcrumb-item active">Card "Mengapa Memilih Kita"</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Card "Mengapa Memilih Kita"</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header mt-0" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <h4>Bagian Judul "Mengapa Memilih Kita"</h4>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form action="{{ route('admin.why-choose-us.title-update') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="why_choose_us_title" class="form-label">Judul</label>
                                                    <input type="text" id="why_choose_us_title" name="why_choose_us_title" class="form-control" placeholder="Judul" maxlength="50" value="{{ @$title['why_choose_us_title'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="why_choose_us_sub_title" class="form-label">Sub Judul</label>
                                                    <input type="text" id="why_choose_us_sub_title" name="why_choose_us_sub_title" class="form-control" placeholder="Sub Judul" maxlength="150" value="{{ @$title['why_choose_us_sub_title'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="why_choose_us_description" class="form-label">Deskripsi</label>
                                            <input type="text" id="why_choose_us_description" name="why_choose_us_description" class="form-control" placeholder="Deskripsi" value="{{ @$title['why_choose_us_description'] }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Semua Card "Mengapa Memilih Kita"</h4>
                        <a href="{{ route('admin.why-choose-us.create') }}" class="btn btn-primary">Tambah Card "Mengapa Memilih Kita"</a>
                    </div>
                    <div class="card-body">
                        <div class="card-body table-responsive">
                            <table id="basic-datatable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ikon</th>
                                        <th>Judul</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($whyChooseUs as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><i style="transform: scale(2);" class="{{ $item->icon }}"></i></td>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Tidak Aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.why-choose-us.status', $item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-{{ $item->status == 1 ? 'danger' : 'success' }} btn-sm" title="{{ $item->status == 1 ? 'Nonaktifkan card ini' : 'Aktifkan card ini' }}" type="submit">
                                                        <i class="fas fa-{{ $item->status == 1 ? 'times' : 'check' }}"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.why-choose-us.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.why-choose-us.destroy', $item->id) }}"
                                                    class="btn btn-danger btn-sm" data-confirm-delete="true" title="Hapus"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div>
                </div>
            </div>
        </div>

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
