@extends('admin.layouts.master')

@section('title')
    Akun Saya
@endsection

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Profil</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-body">
                        <h4 class="header-title">Ubah Data Profil</h4>
                        <div class="row">
                            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name }}" maxlength="255" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}" maxlength="255" required>
                                </div>

                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Avatar</label>
                                    <input type="file" id="avatar" name="avatar" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="png jpg jpeg" accept="image/png, image/jpeg" data-default-file="{{ auth()->user()->avatar ? url('admin/uploads/profile_images/'. auth()->user()->avatar) : url('admin/uploads/profile_images/transparent-profile.png') }}">
                                    <span class="help-block"><small>* ukuran gambar maksimal 2048 KB (2 MB)</small></span>
                                </div>

                                <button type="submit" class="btn btn-primary">Ubah Data Profil</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-body">
                        <h4 class="header-title">Ubah Password</h4>
                        <div class="row">
                            <form action="{{ route('admin.profile.update.password') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Password Saat Ini</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="current_password" class="form-control" name="current_password" placeholder="Masukkan password lama anda" maxlength="255" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password baru anda" minlength="8" maxlength="255" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    <span class="help-block"><small>* panjang password minimal 8 karakter</small></span>
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Konfirmasi ulang password anda" minlength="8" maxlength="255" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Ubah Password</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                'fileSize': 'Ukuran file terlalu besar. Maksimal 2 MB'
            }
        });
    </script>
@endpush
