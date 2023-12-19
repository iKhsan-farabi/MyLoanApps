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
    <div class="row">
      <div class="col-lg-8">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Masukan Data Informasi</h5>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <!-- General Form Elements -->
            <form action="{{ route('transaksi.keluar.store') }}" method="POST" id="simpanFormOut"> 
              @csrf
              <div class="row mb-3">
                <!-- Button trigger modal -->

                {{-- Input Hidden untuk menerima id barang --}}
                    <input type="hidden" class="form-control" name="barang_id" id="barang_id">
                {{-- Input Hidden untuk menerima id pemasok --}}
                     <input type="hidden" class="form-control" name="pemasok_id" id="pemasok_id">
  
                <label for="inputText" class="col-sm-2 col-form-label">Kode Barang</label>
                <div class="col-sm-5">
                    <input type="text" disabled class="form-control" name="kode_barang" id="kode_barang"> 
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-7">
                    <div class="input-group">
                        <input type="text" disabled class="form-control" name="nama_barang" id="nama_barang">
                        <!-- Tombol untuk memanggil modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cariBarang">
                            <i class="bi bi-search"></i>
                            Cari
                          </button>
                        
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Brand</label>
                <div class="col-sm-8">
                    <input type="text" disabled class="form-control" name="brand" id="brand">
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Pemasok</label>
                <div class="col-sm-7">
                    <div class="input-group">
                        <input type="text" disabled class="form-control" name="nama_pemasok" id="nama_pemasok">
                    </div>
                </div>
            </div>
                        
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" name="jumlah" id="jumlah">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="deskripsi" id="deskripsi">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Action</label>
                <div class="col-sm-10">
                  <button type="button" onclick="checkStok()" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
                  <a href="{{ route('transaksi.keluar.index') }}" class="btn btn-success"><i class="bi bi-table"></i> Lihat</a>
                </div>
              </div>

            </form><!-- End General Form Elements -->

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
                <div class="col-sm-10">
                  <h1 class="fw-bold">Stok Barang:</h1>              
                  <h1 class="fw-bold text-danger" id="stok_jumlah"></h1>
                </div>
              </div>
            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
    
  </section>
  
<!-- Modal Cari Barang -->
<div class="modal fade" id="cariBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table datatable">
                <thead>
                  <tr>
                      
                      <th scope="col">Kode</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Brand</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Aksi</th>
  
                  </tr>
                </thead>
                <tbody>
                  @foreach($addout as $barangs)
                  <tr>
                    
                      <td>{{ $barangs->kode_barang }}</td>
                      <td>{{ $barangs->nama_barang }}</td>
                      <td>{{ $barangs->brand }}</td>
                      <td>{{ $barangs->jumlah }}</td>
                      
                      <td>
                        <button class="btn btn-success btn-sm" onclick="isiInputDariModal('{{ $barangs->nama_barang }}', '{{ $barangs->brand }}', '{{ $barangs->id }}', '{{ $barangs->kode_barang }}', '{{ $barangs->pemasok_id }}','{{ $barangs->pemasok->nama_pemasok }}','{{ $barangs->jumlah }}')">
                            <i class="bi bi-save"></i>
                        </button>    
                    </td>
                    
                  </tr>
              @endforeach
  
                </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
  {{-- Akhir Modal --}}
  {{-- Ajax Get Nama Barang --}}

  <!-- Skrip JavaScript untuk menanggapi klik pada item modal -->
<script>
    // Fungsi ini akan dijalankan saat item modal di-klik
    function isiInputDariModal(namaBarang, brandBarang, idBarang, kodeBarang, idPemasok, namaPemasok, jumlah) {
        // Isi nilai input dengan data dari item modal yang diklik
        document.getElementById('nama_barang').value = namaBarang;
        document.getElementById('brand').value = brandBarang;
        document.getElementById('barang_id').value = idBarang;
        document.getElementById('kode_barang').value = kodeBarang;
        document.getElementById('pemasok_id').value = idPemasok;
        document.getElementById('nama_pemasok').value = namaPemasok;
        document.getElementById('stok_jumlah').innerHTML = jumlah + ' PCS';



        // Sembunyikan modal setelah mengisi nilai input
        $('#cariBarang').modal('hide');
    }

    function checkStok() {
    // Ambil nilai jumlah barang dan stok
    let jumlahKeluar = parseInt(document.getElementById('jumlah').value);
    let stokBarang = document.getElementById('stok_jumlah').innerHTML;
    let splittedString = stokBarang.split(' '); // Memisahkan string berdasarkan spasi
    let jumlahStok = parseInt(splittedString[0]); // Mengonversi bagian pertama ke integer

    // Bandingkan nilai jumlah barang dengan stok
    if (jumlahKeluar > jumlahStok) {
      alert('Stok barang tidak mencukupi!');
      return; // Hentikan proses selanjutnya jika stok tidak mencukupi
    }

    // Lanjutkan proses formulir jika stok mencukupi
    document.getElementById('simpanFormOut').submit();
  }
</script>

@endsection



