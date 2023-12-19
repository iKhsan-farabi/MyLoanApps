@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Informasi Barang</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active">Barang</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Masukan Data Barang</h5>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('kategori-barang.update', $kategori_barang->id) }}" method="POST">
          @csrf
          @method('PUT') {{-- Gunakan method PUT untuk update --}}
          <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Nama Kategori</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_kategori" value="{{ $kategori_barang->nama_kategori }}">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Action</label>
              <div class="col-sm-10">
                  <button type="submit" class="btn btn-warning">Update</button>
                  <a href="{{ route('kategori-barang.index') }}" class="btn btn-info">Lihat</a>
              </div>
          </div>
        </form>

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection