@extends('layouts.admin.master')
@section('title', $title)


@section('_styles')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
                    <li class="breadcrumb-item active">Set Nomor HP</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Set Nomor HP Pengguna</div>

                            <div class="row card-body">

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Harap Masukkan No HP yang connect ke Whatsapp!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="form-horizontal" method="POST" action="{{ route('phonenumber.store') }}">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="id_user" id="id_user" value="{{ $user->id }}">
                                    <div class="row mb-3 mt-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">Username / NIP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">Nomor HP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $user->no_hp }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12 col-md-offset-4 mt-2">
                                            <button type="submit" class="btn btn-primary float-end">
                                                Simpan Data
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


@section('_scripts')

@endsection
