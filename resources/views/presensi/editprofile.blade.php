@extends('layouts.presensi')
@section('header')
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Edit Profile</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
@endsection

@section('content')

<form action="/presensi/{{ $karyawan->username }}/updateprofile" method="POST" enctype="multipart/form-data" style="margin-top:70px">
    @csrf
    <div class="col">
        @php
        $messagesuccess = Session::get('success');
        $messageerror = Session::get('error');
        @endphp
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ $messagesuccess }}
        </div>
        @endif
        @if (Session::get('error'))
        <div class="alert alert-warning">
            {{ $messageerror }}
        </div>
        @endif

        @error('foto')
        <div class="alert alert-warning">
            <p>{{ $message }}</p>
        </div>
        @enderror
        <div class="form-group boxed">
            <label for="username">NIK</label>
            <div class="input-wrapper">
                <input type="text" class="form-control" value="{{ $karyawan->username }}" name="username" id="username" placeholder="NIK" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <label for="email">Email</label>
            <div class="input-wrapper">
                <input type="text" class="form-control" value="{{ $karyawan->email }}" name="email" id="email" placeholder="Email" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <label for="name">Nama Lengkap</label>
            <div class="input-wrapper">
                <input type="text" class="form-control" value="{{ $karyawan->name }}" name="name" id="name" placeholder="Nama Lengkap" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <label for="no_hp">No. HP</label>
            <div class="input-wrapper">
                <input type="text" class="form-control" value="{{ $karyawan->no_tlpn }}" name="no_hp" id="no_hp" placeholder="No. HP" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <label for="password">Password</label>
            <div class="input-wrapper">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
            </div>
        </div>

        <div class="custom-file-upload" id="fileUpload1">
            <input type="file" name="foto" id="fileuploadInput" accept=".png, .jpg, .jpeg">
            <label for="fileuploadInput">
                <span>
                    <strong>
                        <ion-icon name="cloud-upload-outline" role="img" class="md hydrated" aria-label="cloud upload outline"></ion-icon>
                        <i>Tap to Upload</i>
                    </strong>
                </span>
            </label>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <button type="submit" class="btn btn-primary btn-block">
                    <ion-icon name="refresh-outline"></ion-icon>
                    Update
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
