@extends('layouts/app')

@section('content')
<div class="page-heading">
   <div class="page-title mb-3">
      <h3>
          <span class="bi bi-building"></span>
          Data Pengadu
      </h3>
   </div>

   <a href="{{ route('admin.pengaduan.create') }}" class="btn btn-primary mb-3">
    <span class="bi bi-plus-circle"></span> Create New
   </a>

<section class="section">
    <div class="card">
        <div class="card-body">
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
                    @foreach ($pengaduan as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ route('admin.pengaduan.show', $item->id) }}" class="btn btn-outline-secondary btn-sm me-1">
                                    <span class="bi bi-eye"></span>
                                    Show
                                </a>
                                <a href="{{ route('admin.pengaduan.edit', $item->id) }}" class="btn btn-secondary btn-sm me-1">
                                    <span class="bi bi-pencil"></span>
                                    Edit
                                </a>
                                <a href="#" class="btn btn-danger btn-sm me-1" onclick="handleDestroy(`{{ route ('admin.pengaduan.destroy', $item->id) }}`)">
                                    <span class="bi bi-trash">Hapus</span>
                                </a>
                                   </form>
                            </td>
                        </tr>
                    @endforeach  
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>
<form action="" id="form-delete" method="POST">
    @csrf
    @method("DELETE")
</form>
@endsection

