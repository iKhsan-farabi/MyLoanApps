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
            <h5 class="card-title">Pemasok</h5>
            <p>Di bawah ini adalah informasi mengenai tabel pemasok.</p>
            <a href="{{ route('pemasok.create') }}" class="btn btn-primary mb-4"><i class="bi bi-patch-plus"></i> Add Data</a>
            <!-- Table with stripped rows -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode Pemasok</th>
                  <th scope="col">Nama Pemasok</th>
                  <th scope="col-2">Aksi</th>

                </tr>
              </thead>
              <tbody>
                @foreach($pemasok as $tbl_pemasok)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $tbl_pemasok->kode_pemasok }}</td>
                  <td>{{ $tbl_pemasok->nama_pemasok }}</td>
                    <td>
                      <a href="{{ route('pemasok.edit', $tbl_pemasok->id) }}" class="btn btn-warning btn-sm mr-2" title="Edit">
                          <i class="bi bi-pencil"></i>
                      </a>
                      <form action="{{ route('pemasok.destroy', $tbl_pemasok->id) }}" method="POST" style="display: inline-block;">
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