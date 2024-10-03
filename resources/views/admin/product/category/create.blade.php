@extends('admin.layouts.master')

@section('title')
    Tambah Kategori Produk
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.product-category.index') }}">Kategori Produk</a></li>
                            <li class="breadcrumb-item active">Tambah Kategori Produk</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tambah Kategori Produk</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.product-category.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Kategori Produk *</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nama Kategori Produk" maxlength="100" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->
@endsection
