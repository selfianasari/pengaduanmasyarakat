@extends('layouts/app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3>
            <span class="bi bi-building"></span>
            Laporan
        </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                
            <table class="table table-striped table-primary">
            <tr>
                <th>Username</th>
                <td>{{ $laporan->username }}</td>
            </tr>
            <tr>
                <td>Isi Laporan</td>
                <td>{{  $laporan->isi_laporan }}</td>
            </tr>
            <tr>
                <td>Foto Bukti</td>
                <td>{{ $laporan->foto_bukti }}</td>
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
              <a href="{{ route('pages.laporan.index') }}" class="btn btn-sm btn-primary mb-3">
              <span class="bi bi-arrow-left"></span>
              Kembali</a>
            </td>
        </div>
        </div>
    </section>
</div>
@endsection