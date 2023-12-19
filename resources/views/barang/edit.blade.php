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
      <div class="col-lg-8">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Masukan Data Barang</h5>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('update_barang', $barang->id) }}" method="POST">
          @csrf
          @method('PUT') {{-- Gunakan method PUT untuk update --}}
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-10">
                <input type="text"  class="form-control" name="kode_barang" value="{{ $barang->kode_barang }}">
            </div>
        </div>
          <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_barang" value="{{ $barang->nama_barang }}">
              </div>
          </div>
          <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">Brand</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="brand" value="{{ $barang->brand }}">
              </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
                <select class="form-control" name="kategori_id">
                    @foreach($kategori_barang as $kategori)
                    <option value="{{ $kategori->id }}" {{ $kategori->id == $barang->kategori_id ? 'selected' : '' }}>
                      {{ $kategori->nama_kategori }}
                  </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
          <label for="inputEmail" class="col-sm-2 col-form-label">Pemasok</label> 
          <div class="col-sm-10">
              <select class="form-control" name="pemasok_id">
                  @foreach($pemasok as $tbl_pemasok)
                      <option value="{{ $tbl_pemasok->id }}" {{ $tbl_pemasok->id == $barang->pemasok_id ? 'selected' : '' }}>
                          {{ $tbl_pemasok->nama_pemasok }}
                      </option>
                  @endforeach
              </select>
          </div>
      </div>      
          <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Jumlah</label>
              <div class="col-sm-10">
                  <input type="number" class="form-control" name="jumlah" value="{{ $barang->jumlah }}">
              </div>
          </div>
          <div class="row mb-3">
              <label for="inputDate" class="col-sm-2 col-form-label">Waktu Beli</label>
              <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal_beli" value="{{ $barang->tanggal_beli }}">
              </div>
          </div>
          <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Harga</label>
              <div class="col-sm-10">
                  <input type="number" class="form-control" name="harga_beli" value="{{ $barang->harga_beli }}">
              </div>
          </div>
          <div class="row mb-3">
              <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
              <div class="col-sm-10">
                  <select class="form-select" id="kondisi" name="kondisi">
                      <option value="Baru" {{ $barang->kondisi === 'Baru' ? 'selected' : '' }}>Baru</option>
                      <option value="Baik" {{ $barang->kondisi === 'Baik' ? 'selected' : '' }}>Baik</option>
                      <!-- Tambahkan opsi lainnya jika diperlukan -->
                  </select>
              </div>
          </div>
        
          <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Action</label>
              <div class="col-sm-10">
                  <button type="submit" class="btn btn-warning">Update</button>
                  <a href="{{ route('view_barang') }}" class="btn btn-info">Lihat</a>
              </div>
          </div>
        </form>

          </div>
        </div>

      </div>

      <div class="col-lg-4">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Scan Kode Barcode</h5>

            <!-- Advanced Form Elements -->
            <form>
              <div class="row mb-5">
                <label class="col-sm-2 col-form-label">Switches</label>
                <div class="col-sm-10">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
                    <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox input</label>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
                    <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch checkbox input</label>
                  </div>
                </div>
              </div>
            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection