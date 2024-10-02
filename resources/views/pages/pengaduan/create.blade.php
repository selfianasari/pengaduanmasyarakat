@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3>
            <span class="bi bi-building"></span>
            Buat Laporan
        </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pages.pengaduan.store') }}" method="POST">
                <!-- Start of Form -->
                 @csrf
                    <div class="form-group">
                        <label for="name">Institution Name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                         <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.institution.index') }}" class="btn btn-secondary">Batal</a>
                <!-- End of Form -->
                </form>
            </div>
        </div>
    </section>
</div>
@endsection