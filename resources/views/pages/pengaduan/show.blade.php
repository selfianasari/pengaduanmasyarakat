@extends('layouts/app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3>
            <span class="bi bi-building"></span>
            Show Data Pengadu
        </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                
            <table class="table table-striped table-primary">
            <tr>
                <th>Nama</th>
                <td>{{ $pengaduan->nama }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>{{  $pengaduan->nik }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>{{ $pengaduan->tanggal_lahir }}</td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>{{ $pengaduan->umur }}</td>
            </tr>
            <tr>
                <td>Username</td>
                <td>{{ $pengaduan->username }}</td>
                
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $pengaduan->email }}</td>
            </tr>
            <tr>
                <td>Created at</td>
                <td>{{ Carbon\Carbon::parse( $pengaduann->created )->isoformat('DD MMMM Y HH:mm')}}</td>
            </tr>
            <tr>
                <td>Update at</td>
                <td>{{ Carbon\Carbon::parse ($pengaduan->update )->isoformat('DD MMMM Y HH:mm') }}</td>
            </tr>
            </table>

            <td>
              <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-sm btn-primary mb-3">
              <span class="bi bi-arrow-left"></span>
              Kembali</a>
            </td>
        </div>
        </div>
    </section>
</div>
@endsection