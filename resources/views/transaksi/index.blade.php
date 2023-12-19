@extends('layouts.admin')

@section('content')
    @if(auth()->check() && auth()->user()->role_id == 2) <!-- Pimpinan -->
        <!-- Konten untuk Pimpinan -->
        <div>
            <!-- Tambahkan konten yang ingin ditampilkan untuk Pimpinan di sini -->
        </div>
    @else
        <!-- Tampilkan pesan pemberitahuan modal -->
        <script>
            $(document).ready(function() {
                $('#accessDeniedModal').modal('show');
            });
        </script>
    @endif
@endsection

<!-- Modal Bootstrap untuk pesan pemberitahuan -->
<div class="modal fade" id="accessDeniedModal" tabindex="-1" role="dialog" aria-labelledby="accessDeniedModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accessDeniedModalLabel">Akses Ditolak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Hanya <b>Pimpinan</b> yang punya akses kesini</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="history.go(-1);">Tutup</button>
            </div>
        </div>
    </div>
</div>
