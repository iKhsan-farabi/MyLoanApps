@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Informasi Pemasok</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active">Pemasok</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Masukan Info Pemasok</h5>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <!-- General Form Elements -->
            <form action="{{ route('kategori-barang.store') }}" method="POST">
              @csrf
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_kategori">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Action</label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="{{ route('kategori-barang.index') }}" class="btn btn-success">Lihat</a>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection