@extends('layouts.admin')
@section('content')

<h1>Akses Pengguna</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item active">Akses Pengguna</li>
  </ol>
</nav>
</div><!-- End Page Title -->

<section class="section">
<div class="row">
  <div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Akses Pengguna</h5>
        <p>Ini Adalah Tabel akses pengguna</p>
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-4"><i class="bi bi-database-add"></i> Add Pengguna</a>
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
                <th scope="col">Pengguna</th>
                <th scope="col">E-mail</th>
                <th scope="col">Role</th>
                <th scope="col-2">Aksi</th>

            </tr>
          </thead>
          <tbody>
            @foreach($user as $users)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>
                    @foreach ($roles as $role )
                        @if($users->role_id == $role->id)
                          {{ $role->name }}
                        @endif
                    @endforeach
                <td>
                  <a href="{{ route('users.edit', $users->id) }}" class="btn btn-warning btn-sm mr-2" title="Edit">
                      <i class="bi bi-pencil"></i>
                  </a>
                  <form action="{{ route('users.destroy', $users->id) }}" method="POST" style="display: inline-block;">
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
@endsection