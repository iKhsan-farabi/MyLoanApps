@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Transaksi Masuk</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Transaksi</li>
        <li class="breadcrumb-item active">Barang Masuk</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Transaksi Masuk</h5>
            <p>Ini Adalah tabel transaksi masuk.</p>
            @if(auth()->user()->role_id == 3)
            <a href="{{ route('transaksi.masuk.create') }}" class="btn btn-warning mb-4"><i class="bi bi-database-add"></i> Add Data</a>
            @endif
            <a href="{{ route('print.in.all') }}" class="btn btn-light mb-4"><i class="bi bi-printer"></i> Print All</a>
            
            <!-- Table with stripped rows -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <table class="table datatable">
              <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Waktu Transaksi</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Kode Pemasok</th>
                    <th scope="col">Pemasok</th>
                    <th scope="col">Masuk</th>
                    <th scope="col">Total</th>
                    @if(auth()->user()->role_id !== 2)
                    <th scope="col-2">Aksi</th>
                    @endif


                </tr>
              </thead>
              <tbody>
                @foreach($addin as $barangMasuk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barangMasuk->updated_at }}</td>
                    <td>{{ $barangMasuk->barang->kode_barang }}</td>
                    <td>{{ $barangMasuk->barang->nama_barang }}</td>
                    <td>{{ $barangMasuk->barang->brand }}</td>
                    <td>{{ $barangMasuk->barang->pemasok->kode_pemasok }}</td>
                    <td>{{ $barangMasuk->barang->pemasok->nama_pemasok }}</td>
                    <td> <span class="bg-warning text-dark p-2 d-inline-block rounded text-center" style="width: 50px;">
                        {{ $barangMasuk->jumlah }}
                        <i class="bi bi-arrow-down"></i>
                    </span></td>
                    <td><span class="bg-light text-success p-2 d-inline-block text-center" style="width: 50px;">{{ $barangMasuk->barang->jumlah }}</span></td>
                    @if(auth()->user()->role_id !== 2)
                      <td><form action="{{ route('transaksi.masuk.destroy', $barangMasuk->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                    <form action="{{ route('transaksi.masuk.pdf.one', $barangMasuk->id) }}" method="GET" style="display: inline-block;">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Apakah Anda yakin ingin mencetak data ini?')">
                            <i class="bi bi-printer"></i>
                        </button>
                    </form></td>
                    @endif
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