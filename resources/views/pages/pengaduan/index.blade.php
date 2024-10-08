@extends('layouts.app')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4>Daftar Pengaduan</h4>
            <!-- Tombol Create New -->
            <a href="{{ route('pengaduan.create') }}" class="btn btn-primary me-2">
                <span class="bi bi-plus-circle"></span> Create New
            </a>
        </div>
        <div class="card-body">
            <!-- Tabel responsif agar tidak terlalu lebar -->
            <div class="table-responsive">
                <table id="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Tanggal Lahir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduans as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>
                                <!-- Tombol Show -->
                                <a href="{{ route('pengaduan.show', $item->id) }}" class="btn btn-outline-secondary btn-sm me-1">
                                    <span class="bi bi-eye"></span> Show
                                </a>

                                <!-- Tombol Edit -->
                                <a href="{{ route('pengaduan.edit', $item->id) }}" class="btn btn-secondary btn-sm me-1">
                                    <span class="bi bi-pencil"></span> Edit
                                </a>

                                <!-- Tombol Delete, dengan konfirmasi -->
                                <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm me-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <span class="bi bi-trash"></span> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
