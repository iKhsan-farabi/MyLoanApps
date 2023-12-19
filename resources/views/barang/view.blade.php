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
                  <h5 class="card-title">Data Barang</h5>
                  <p>Di bawah ini adalah informasi mengenai tabel barang.</p>

            <a href="{{ route('create_barang') }}" class="btn btn-primary mb-4"><i class="bi bi-patch-plus"></i> Add Data</a>
            <!-- Table with stripped rows -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <table class="table datatable">
              <thead>
                <tr>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Nilai Aset</th>
                    <th scope="col-2">Aksi</th>

                </tr>
              </thead>
              <tbody>
                @foreach($barang as $barangs)
                <tr>
                    <td>{{ $barangs->kode_barang }}</td>
                    <td>{{ $barangs->nama_barang }}</td>
                    <td>{{ $barangs->brand }}</td>
                    <td>{{ $barangs->kondisi }}</td>
                    <td>{{ $barangs->jumlah }} pcs</td>
                    <td>Rp. {{ $barangs->harga_beli }}</td>
                    <td>
                      <a href="{{ route('edit_barang', $barangs->id) }}" class="btn btn-warning btn-sm mr-2" title="Edit">
                          <i class="bi bi-pencil"></i>
                      </a>
                      <form action="{{ route('delete_barang', $barangs->id) }}" method="POST" style="display: inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                              <i class="bi bi-trash"></i>
                          </button>
                      </form>
                  </td>
                  
                </tr>
            @endforeach

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection