@extends('layouts.admin.master')
@section('title', 'Halaman Profil - PTSP Kemenag Online')


@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<link href="{{ asset('niceadmin/vendor/boxicons/css/boxicons.min.css') }} " rel="stylesheet">
<link href="{{ asset('niceadmin/vendor/quill/quill.snow.css') }} " rel="stylesheet">
<link href="{{ asset('niceadmin/vendor/quill/quill.bubble.css') }} " rel="stylesheet">
<link href="{{ asset('niceadmin/vendor/remixicon/remixicon.css') }} " rel="stylesheet">


<link href="{{ asset('niceadmin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


<style>


</style>
@endsection

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ $user->profile_photo ? $user->profile_photo : asset('niceadmin/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                        <h2>{{ $user->name }}</h2>
                        <h3>{{ $user->username }}</h3>
                        {{-- <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div> --}}
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                            {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">Overview</button>
                                </li> --}}

                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" role="tab" tabindex="-1">Edit Profile</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="false" tabindex="-1" role="tab">Ubah Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade profile-edit pt-3 active show" id="profile-edit" role="tabpanel">

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <!-- Profile Edit Form -->
                                <form class="form-horizontal" method="POST" action="{{ route('profile.update') }}">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="id_user" id="id_user" value="{{ $user->id }}">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img id="profile_photo_src" src="{{ $user->profile_photo ? $user->profile_photo : asset('niceadmin/img/profile-img.jpg') }}" alt="Profile">
                                            <div class="pt-2">
                                                <button type="button" id="profile_photo_button" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></button>
                                            </div>
                                            <input type="hidden" id="profile_photo" name="profile_photo" value="{{ $user->profile_photo }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="username" type="text" class="form-control" id="username" value="{{ $user->username }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="no_hp" type="text" class="form-control" id="Phone" value="{{ $user->no_hp }}">
                                        </div>
                                    </div>





                                    <div class="float-end">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
                                <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                        <label for="new-password" class="col-md-4 control-label">Password Saat ini</label>

                                        <div class="col-md-12">
                                            <input id="current-password" type="password" class="form-control" name="current-password" required>

                                            @if ($errors->has('current-password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('current-password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }} mt-5">
                                        <label for="new-password" class="col-md-4 control-label">Password Baru</label>

                                        <div class="col-md-12">
                                            <input id="new-password" type="password" class="form-control" name="new-password" required>

                                            @if ($errors->has('new-password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('new-password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="new-password-confirm" class="col-md-4 control-label">Konfirmasi Password Baru</label>

                                        <div class="col-md-12">
                                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4 mt-2">
                                            <button type="submit" class="btn btn-primary">
                                                Change Password
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

@endsection


@section('_scripts')

<script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>

<script>
    var profWidget = cloudinary.createUploadWidget({
        cloudName: 'dwzc7p9dj', // Cloud name dari Cloudinary
        uploadPreset: 'profile_picture_pegawai',
        theme: 'minimal',
        multiple: false,
        maxFileSize: 10048576, // Maksimal ukuran file 10MB

        // 🔥 Transformasi auto-crop ditambahkan di sini:
        transformation: [{
            width: 300,
            height: 300,
            crop: 'fill', // Crop dan resize agar pas
            gravity: 'face' // Fokus ke wajah jika terdeteksi
        }]
    }, (error, result) => {
        if (!error && result && result.event === "success") {
            console.log('Info Arsip Masuk: ', result.info);
            var profile_photo_url = result.info.secure_url;
            console.log('profile_photo_url:', profile_photo_url);

            // Set ke input hidden
            document.getElementById('profile_photo').value = profile_photo_url;

            // Tampilkan preview
            document.getElementById('profile_photo_src').src = profile_photo_url;
        }
    });

    document.getElementById("profile_photo_button").addEventListener("click", function() {
        profWidget.open();
    }, false);
</script>

@endsection