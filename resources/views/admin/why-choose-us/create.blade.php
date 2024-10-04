@extends('admin.layouts.master')

@section('title')
    Tambah Card "Mengapa Memilih Kita"
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.why-choose-us.index') }}">Card "Mengapa Memilih Kita"</a></li>
                            <li class="breadcrumb-item active">Tambah Card "Mengapa Memilih Kita"</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tambah Card "Mengapa Memilih Kita"</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.why-choose-us.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="IconInput" class="form-label d-block">Ikon *</label>
                                <button type="button" id="GetIconPicker" data-iconpicker-input="input#IconInput"
                                    data-iconpicker-preview="i#IconPreview" class="btn btn-primary">Pilih Ikon</button>
                                <div class="ms-2 d-inline-block" style="vertical-align: middle; width: 32px; height: 32px; line-height: 32px;">
                                    <i id="IconPreview" style="transform: scale(2)"></i>
                                </div>
                                <input type="hidden" id="IconInput" name="icon">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul *</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Judul" maxlength="100" value="{{ old('title') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="short_description" class="form-label">Deskripsi Singkat *</label>
                                <input type="text" id="short_description" name="short_description" class="form-control" placeholder="Deskripsi Singkat" maxlength="255" value="{{ old('short_description') }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->
@endsection

@push('styles')
    <!-- Iconpicker css -->
    <link href="{{ asset('admin/assets/libs/IconPicker/iconpicker-1.5.0.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Iconpicker js -->
    <script src="{{ asset('admin/assets/libs/IconPicker/iconpicker-1.5.0.js') }}"></script>

    <script>
        // Select your Button element (ID or Class)
        IconPicker.Run('#GetIconPicker');

        // Default options
        IconPicker.Init({
            jsonUrl: '{{ asset("admin/assets/libs/IconPicker/iconpicker-1.5.0.json") }}',
            searchPlaceholder: 'Cari Ikon (dalam Bahasa Inggris)',
            showAllButton: 'Tampilkan Semua',
            cancelButton: 'Batal',
            noResultsFound: 'Tidak ditemukan.', // v1.5.0 and the next versions
            borderRadius: '20px', // v1.5.0 and the next versions
        });
    </script>
@endpush
