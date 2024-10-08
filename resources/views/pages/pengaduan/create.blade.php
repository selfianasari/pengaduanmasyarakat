@extends('layouts.app') 

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4>Create Pengaduan</h4>
        </div>
        <div class="card-body">
            
            <form action="{{ route('pengaduan.store') }}" method="POST">
                @csrf 
                
                <!-- Nama -->
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama" required>
                </div>

                <!-- NIK -->
                <div class="form-group mt-3">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" class="form-control" id="nik" placeholder="Masukkan NIK" required>
                </div>

                <!-- Tanggal Lahir -->
                <div class="form-group mt-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
                </div>

                <!-- Umur -->
                <div class="form-group mt-3">
                    <label for="umur">Umur</label>
                    <input type="number" name="umur" class="form-control" id="umur" placeholder="Masukkan umur" required>
                </div>

                <!-- Username -->
                <div class="form-group mt-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username" required>
                </div>

                <!-- Email -->
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email" required>
                </div>

                <!-- Password -->
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary mt-4">Cancel</a>
            </form>
        </div>
    </div>
</section>
@endsection
