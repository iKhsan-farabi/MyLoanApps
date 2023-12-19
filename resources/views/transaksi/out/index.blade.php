@extends('layouts.admin')
@section('content')

<div class="pagetitle">
    <h1>Transaksi Keluar</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Transaksi</li>
        <li class="breadcrumb-item active">Barang Keluar</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
<section class="section">
    <div class="row align-items-top">
      <div class="col-lg-8">

        <!-- Card with an image on left -->
        <div class="card">
            <div class="row g-0">
              <div class="col-md-4 p-4">
                <img src="{{ asset('qrcodes/' . $data->qr_code . '.png') }}" alt="">
            </div>
              <div class="col-md-8">
                <div class="card-body">
                    <h3><b>{{ $data->barang->nama_barang }}</b></h3>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">KODE</th>
                                <td>{{ $data->barang->kode_barang }}</td>
                            </tr>
                            <tr>
                                <th scope="row">BRAND</th>
                                <td>{{ $data->barang->brand }}</td>
                            </tr>
                            <tr>
                                <th scope="row">STOK</th>
                                <td>{{ $data->barang->jumlah }}</td>
                            </tr>
                            <tr>
                                <th scope="row">TANGGAL</th>
                                <td>{{ $data->barang->tanggal_beli }}</td>
                            </tr>
                            <tr>
                                <th scope="row">NILAI ASET</th>
                                <td>{{ $data->barang->harga_beli }}</td>
                            </tr>
                            <tr>
                                <th scope="row">KONDISI</th>
                                <td>{{ $data->barang->kondisi }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            </div>
          </div><!-- End Card with an image on left -->
  
        <!-- Default Card -->
        <div class="row g-0">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><i class="bi bi-arrow-up-circle-fill text-danger me-2"></i><b>Jumlah Keluar : {{ $data->jumlah }}</b></h5>
                        </div>
                        <div class="col-md-6">
                            <h5><i class="bi bi-hdd-stack-fill text-primary me-2"></i><b>Stok Sisa : {{ $data->barang->jumlah }}</b></h5>
                        </div>
                    </div>
                </div>
            </div><!-- End Default Card -->
            
        
              <div class="card">
                <div class="card-body">
                    <form action="{{ route('transaksi.keluar.destroy', $data->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash"></i> Hapus Transaksi
                        </button>
                    </form>
                  <a href="{{ route('transaksi.keluar.index') }}" class="btn btn-light btn-sm"><i class="bi bi-arrow-left-circle text-success me-2"></i>Kembali</a>
                </div>
              </div><!-- End Default Card -->
                    
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row-md-2">
            <!-- Card with header and footer -->
            <div class="card">
                <div class="card-header" id="info">Deskripsi Transaksi</div>
                <div class="card-body">
                  <h3><b>{{ $data->updated_at }}</b></h3>
                  <h4>{{ $data->deskripsi }}</h4>
                </div>
                <div class="card-footer">
                    ID Transaksi : {{ $data->id }}
                </div>
              </div><!-- End Card with header and footer -->

        </div>
      </div>

    </div>
  </section>
  {{-- <section>
    <h1>Detail Transaksi</h1>
    <p>ID Transaksi: {{ $data->id }}</p>
    <p>Nama Barang: {{ $data->barang->nama_barang }}</p>
    <p>Brand: {{ $data->barang->brand }}</p>
    <p>Stok Barang: {{ $data->barang->jumlah }}</p>
    <p>Jumlah Keluar: {{ $data->jumlah }}</p>
    <p>Deskripsi: {{ $data->deskripsi }}</p>
    <p>Tanggal: {{ $data->updated_at }}</p>
</section> --}}

@endsection