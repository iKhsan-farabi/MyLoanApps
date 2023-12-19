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
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Transaksi Keluar</h5>
            <p>Ini Adalah tabel transaksi keluar.</p>
            @if(auth()->user()->role_id == 3)
            <a href="{{ route('transaksi.out.create') }}" class="btn btn-danger mb-4"><i class="bi bi-database-add"></i> Add Data</a>
            @endif
            <a href="{{ route('print.out.all') }}" class="btn btn-light mb-4"><i class="bi bi-printer"></i> Print All</a>     
            <a href="#" class="btn btn-light mb-4" data-bs-toggle="modal" data-bs-target="#scanBarcode"  id="tombolModal">
              <i class="bi bi-upc-scan"></i> Scan Barcode
          </a>
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
                    <th scope="col">Keluar</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Total</th>
                    @if(auth()->user()->role_id !== 2)
                    <th scope="col-3">Aksi</th>
                    @endif


                </tr>
              </thead>
              <tbody>
                @foreach($addout as $barangKeluar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barangKeluar->updated_at }}</td>
                    <td>{{ $barangKeluar->barang->kode_barang }}</td>
                    <td>{{ $barangKeluar->barang->nama_barang }}</td>
                    <td>{{ $barangKeluar->barang->brand }}</td>
                    <td> <span class="bg-danger text-white p-2 d-inline-block rounded text-center" style="width: 50px;">
                        {{ $barangKeluar->jumlah }}
                        <i class="bi bi-arrow-up"></i>
                    </span></td>
                    <td>{{ $barangKeluar->deskripsi }}</td>
                    <td><span class="bg-light text-danger p-2 d-inline-block text-center" style="width: 50px;">{{ $barangKeluar->barang->jumlah }}</span></td>
                    @if(auth()->user()->role_id !== 2)
                    <td>
                      <form action="{{ route('transaksi.show.out', $barangKeluar->id) }}" method="GET" style="display: inline-block;">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-warning btn-sm">
                            <i class="bi bi-eye"></i>
                        </button>
                      </form>
                      <form action="{{ route('transaksi.keluar.destroy', $barangKeluar->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                    <form action="{{ route('transaksi.keluar.pdf.one', $barangKeluar->id) }}" method="GET" style="display: inline-block;">
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
  <!-- Modal Scan QR -->
<!-- Modal -->
<div class="modal fade" id="scanBarcode" tabindex="-1" role="dialog" aria-labelledby="scanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="scanModalLabel">Scan Barcode</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <!-- Form untuk pemindaian barcode -->
              <form id="barcodeForm" method="POST" action="{{ route('transaksi.out.scan') }}">
                @csrf
                <div class="video-container">
                  <video id="scanBarcodeOut" class="w-100"></video>
                  <input type="hidden" id="barcodeInput" name="barcodeInput">
              </div>
              </form>
          </div>
      </div>
  </div>
</div>
  </section>
  
  <script>
 // Inisialisasi Instascan
let scanner = new Instascan.Scanner({ video: document.getElementById('scanBarcodeOut') });

// Fungsi untuk memulai pemindaian QR code
document.getElementById('tombolModal').addEventListener('click', function() {
  $('#scanBarcode').modal('show');
    startScanning();
});


$('#scanBarcode').on('hidden.bs.modal', function () {
    scanner.stop(); // Mematikan pemindaian kamera
    stopCamera(); // Mematikan akses kamera
});

// Fungsi untuk mematikan akses kamera
function stopCamera() {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
            let tracks = stream.getTracks();
            tracks.forEach(track => track.stop());
        })
        .catch(function (error) {
            console.error('Error stopping camera:', error);
        });
}

function startScanning() {
    scanner.addListener('scan', function(content) {
        // Set nilai input barcode dengan hasil pemindaian QR code
        $('#barcodeInput').val(content);
        $('#barcodeForm').submit();

    });

    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
}
  </script>
@endsection