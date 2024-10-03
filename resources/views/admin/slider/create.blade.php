@extends('admin.layouts.master')

@section('title')
    Tambah Produk (Slider)
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.slider.index') }}">Produk (Slider)</a></li>
                            <li class="breadcrumb-item active">Tambah Produk (Slider)</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tambah Produk (Slider)</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Judul *</label>
                                        <input type="text" id="title" name="title" class="form-control" placeholder="Judul" maxlength="255" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sub_title" class="form-label">Sub Judul *</label>
                                        <input type="text" id="sub_title" name="sub_title" class="form-control" placeholder="Sub Judul" maxlength="255" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi *</label>
                                <input type="text" id="description" name="description" class="form-control" placeholder="Deskripsi" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar Produk *</label>
                                <input type="file" id="image" name="image" class="dropify" data-max-file-size="3M" data-allowed-file-extensions="png jpg jpeg" accept="image/png, image/jpeg">
                                <span class="help-block"><small>* ukuran gambar maksimal 3072 KB (3 MB)</small></span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="offer" class="form-label">Diskon (Persentase)</label>
                                        <div class="input-group">
                                            <input type="number" id="offer" name="offer" class="form-control" placeholder="Diskon (Persentase)" min="1" max="100">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="button_link" class="form-label">Link (Tombol) *</label>
                                        <input type="text" id="button_link" name="button_link" class="form-control" placeholder="Link (Tombol)" maxlength="255" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->
@endsection

@push('scripts')

    <!-- Dropify js -->
    <script src="{{ asset('admin/assets/libs/dropify/js/dropify.min.js') }}"></script>

    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop gambar kesini atau klik disini untuk memilih gambar',
                'replace': 'Drag and drop gambar kesini atau klik untuk menggantikan gambar ini',
                'remove' :  'Hapus',
                'error'  :  'Ooops, sesuatu yang buruk terjadi.',
            },
            error: {
                'fileSize': 'Ukuran file terlalu besar. Maksimal 3 MB'
            }
        });

        $(document).ready(function () {
            $('#offer').on('input', function () {
                if (this.value.length > 3) {
                    this.value = this.value.slice(0, 3);
                }
            })
        });
    </script>
@endpush
