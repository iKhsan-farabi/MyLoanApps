@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Informasi Pengguna</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active">Akses Pengguna</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Masukan Data Pengguna</h5>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <!-- General Form Elements -->
            <form action="{{ route('users.store') }}" method="POST">
              @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">E-Mail</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" name="email">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Sandi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="password" name="password">
                </div>
              </div>
              <div class="row mb-3">
                <label for="role_id" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <select class="form-select" id="role_id" name="role_id">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Action</label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="{{ route('users.index') }}" class="btn btn-success">Lihat</a>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection