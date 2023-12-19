@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Akses Pengguna</h1>
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
      <div class="col-lg-7">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ubah Akses Pengguna</h5>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('users.update', $user->id) }}" method="POST">
          @csrf
          @method('PUT') {{-- Gunakan method PUT untuk update --}}
          <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                  <input type="text"  class="form-control" name="name" value="{{ $user->name }}">
              </div>
          </div>
          <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">E-Mail</label>
              <div class="col-sm-10">
                  <input type="text"  class="form-control" name="email" value="{{ $user->email }}">
              </div>
          </div>
          <input type="hidden"  class="form-control" name="password">
        @if(auth()->user()->id !== $user->id)
          <div class="row mb-3">
            <label for="role_id" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select class="form-select" id="role_id" name="role_id" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @elseif(auth()->user()->id == $user->id)
          <input type="hidden" id="role_id" name="role_id" value="{{ $user->role_id }}">
        @endif
          <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Action</label>
              <div class="col-sm-10">
                  <button type="submit" class="btn btn-warning">Update</button>
                  @if(auth()->user()->role_id == 1)
                  <a href="{{ route('users.index') }}" class="btn btn-success">Lihat</a>
                  @else
                  <a href="{{ route('home') }}" class="btn btn-light">Kembali</a>
                  @endif
                </div>
          </div>
        </form>

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection