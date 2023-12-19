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
            <!-- General Form Elements -->
            <form action="{{ route('store_barang') }}" method="POST">
              @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Kode Barang</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="kode_barang" id="kode_barang">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_barang">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Brand</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="brand">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select class="form-control" name="kategori_id">
                        @foreach($kategori_barang as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">Pemasok</label>
              <div class="col-sm-10">
                  <select class="form-control" name="pemasok_id">
                      @foreach($pemasok as $tbl_pemasok)
                          <option value="{{ $tbl_pemasok->id }}">{{ $tbl_pemasok->nama_pemasok }}</option>
                      @endforeach
                  </select>
              </div>
          </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="jumlah" id="jumlah">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Waktu Beli</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal_beli">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Harga Satuan</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="harga_satuan" id="harga_satuan">
                  <input type="hidden" class="form-control" name="harga_beli" id="harga_beli">
                </div>
              </div>
              <div class="row mb-3">
                
                  <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
                  <div class="col-sm-10">
                      <select class="form-select" id="kondisi" name="kondisi">
                          <option value="Baru">Baru</option>
                          <option value="Baik">Baik</option>
                          <!-- Tambahkan opsi lainnya jika diperlukan -->
                      </select>
                  </div>   
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Action</label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
                  <a href="{{ route('view_barang') }}" class="btn btn-success"><i class="bi bi-table"></i> Lihat</a>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

      <div class="col-lg-4">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Nilai Aset</h5>
                <div class="row mb-5">
                  <div class="col-sm-10" id="totalContainer" style="display:none;">
                   <h1 id="totalText" class="fw-bold text-danger">.</h1>
                  </div>
                </div>
            <h5 class="card-title">Jumlah Barang</h5>
                <div class="row mb-5">
                  <div class="col-sm-10" id="totalContainerJumlah" style="display:none;">
                   <h1 id="totalTextJumlah" class="fw-bold">.</h1>
                  </div>
                </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection

<script>
  let usedCodes = [];

  function generateRandomCode() {
      let randomNumber;

      do {
          // Generate a random 4-digit number
          randomNumber = Math.floor(1000 + Math.random() * 9000);
      } while (usedCodes.includes(randomNumber));

      // Add the generated code to the usedCodes list
      usedCodes.push(randomNumber);

      // Set the generated code to the kode_pemasok input
      document.getElementById("kode_barang").value = "BRG-" + randomNumber;
  }

  // Generate random code on page load
  window.onload = generateRandomCode;
  
  
// Live Data
  document.addEventListener('DOMContentLoaded', function () {
        let hargaSatuanInput = document.getElementById('harga_satuan');
        let totalContainer = document.getElementById('totalContainer');
        let totalContainerJumlah = document.getElementById('totalContainerJumlah');
        let totalText = document.getElementById('totalText');
        let totalTextJumlah = document.getElementById('totalTextJumlah');

        if (hargaSatuanInput) {
            // Menambahkan event listener untuk input harga satuan
            hargaSatuanInput.addEventListener('input', updateTotal);

            // Menambahkan event listener untuk blur (ketika fokus pindah dari input)
            hargaSatuanInput.addEventListener('blur', showTotal);
        }

        function updateTotal() {
            let jumlah = parseFloat(document.getElementById('jumlah').value) || 0;
            let hargaSatuan = parseFloat(hargaSatuanInput.value) || 0;

            let total = jumlah * hargaSatuan;
            document.getElementById('harga_beli').value = total.toFixed(2);

            // Tampilkan nilai total di totalText
            totalTextJumlah.textContent = jumlah + "PCS";
            totalText.textContent = " Rp." + total.toFixed(2);

        }

        function showTotal() {
            totalContainer.style.display = 'block';
            totalContainerJumlah.style.display = 'block';

        }
    });
</script>