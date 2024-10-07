@extends('admin.layouts.master')

@section('title')
    Edit Produk
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Produk</a></li>
                            <li class="breadcrumb-item active">Edit Produk</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Produk</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="thumb_image" class="form-label">Gambar Produk (Thumbnail) *</label>
                                <input type="file" id="thumb_image" name="thumb_image" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="png jpg jpeg" accept="image/png, image/jpeg" data-default-file="{{ $product->thumb_image ? url('admin/uploads/product_images/'. $product->thumb_image) : '' }}">
                                <span class="help-block"><small>* ukuran gambar maksimal 1024 KB (1 MB)</small></span>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Produk *</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nama Produk" maxlength="255" value="{{ $product->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Kategori Produk *</label>
                                <select id="category_id" name="category_id" data-toggle="select2" data-width="100%" required>
                                    <option value="">--- Pilih Kategori ---</option>
                                    @foreach($productCategories as $productCategory)
                                        <option value="{{ $productCategory->id }}" @selected($productCategory->id == $product->category_id)>{{ $productCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Harga *</label>
                                        <input type="number" id="price" name="price" class="form-control" placeholder="Harga" min="1" value="{{ $product->price }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="offer_price" class="form-label">Harga (Diskon)</label>
                                        <input type="number" id="offer_price" name="offer_price" class="form-control" placeholder="Harga (Diskon)" min="1" value="{{ $product->offer_price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="short_description" class="form-label">Deskripsi Singkat *</label>
                                <textarea id="short_description" name="short_description" class="form-control" placeholder="Deskripsi Singkat" rows="3" required>{{ $product->short_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi Lengkap *</label>
                                <textarea id="description" name="description" required>{!! $product->description !!}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" id="sku" name="sku" class="form-control" placeholder="SKU" maxlength="255" value="{{ $product->sku }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="seo_title" class="form-label">Judul (SEO)</label>
                                        <input type="text" id="seo_title" name="seo_title" class="form-control" placeholder="Judul (SEO)" maxlength="255" value="{{ $product->seo_title }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="seo_description" class="form-label">Deskripsi (SEO)</label>
                                    <input type="text" id="seo_description" name="seo_description" class="form-control" placeholder="Deskripsi (SEO)" maxlength="255" value="{{ $product->seo_description }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

    <!-- Select2 js -->
    <script src="{{ asset('admin/assets/libs/select2/js/select2.min.js') }}"></script>

    <!-- Summernote js -->
    <script src="{{ asset('admin/assets/libs/summernote/summernote-lite.min.js') }}"></script>

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

        $("select").select2({
            theme: "bootstrap-5",
        });

        $('#description').summernote({
            placeholder: 'Ketik deskripsi produk disini',
            tabsize: 2,
            height: 200
        });

        $(document).ready(function () {
            $('#price', '#offer_price').on('input', function () {
                if (this.value.length > 10) {
                    this.value = this.value.slice(0, 10);
                }
            })
        });
    </script>
@endpush
