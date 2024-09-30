


@extends('admin.layouts.master')

@section('title')
    Tentang Proyek Ini
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
                            <li class="breadcrumb-item active">Tentang Proyek Ini</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tentang Proyek Ini</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p>Aplikasi dashbor ini merupakan tempat untuk mengatur konten yang ada pada frontend aplikasi pelayanan restoran berbasis website bernama FoodPark. Dibuat menggunakan laravel berdasarkan <a href="https://www.udemy.com/course/build-complete-laravel-restaurant-and-food-ordering-ecommerce-system/">kursus udemy berikut</a> yang menggunakan laravel 10, dengan penyesuaian sebagai berikut :</p>
                        <ul>
                            <li>Menggunakan template website dari Ubold untuk halaman panel admin</li>
                            <li>Mengupgrade ke Laravel 11 (materi kursus yang digunakan menggunakan Laravel 10)</li>
                            <li>Menggunakan XAMPP sebagai server lokal ketimbang Laragon</li>
                        </ul>
                        <p>Semua data pada aplikasi dasbor ini maupun frontend hanyalah data <i>dummy</i> saja dan tidak ada data asli yang digunakan pada aplikasi ini. Jika terdapat data yang demikian, maka itu hanya kebetulan semata</p>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->
@endsection
