@extends('..layouts.master')
@section('content')

<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Jadwal Seleksi</h4>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </div>
    @endif

    @if(session()->has('failed'))
    <div class="alert alert-danger" role="alert">
        {{session()->get('failed')}}
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <button class="btn btn-sky btn-sm" data-bs-toggle="modal" data-bs-target="#addseleksi" type="button">
                Upload berkas seleksi
            </button>
        </div>
        <div class="card-body">
            <table class="table table-sm table-hover" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Berkas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $dt)
                    <tr>
                        <td style="width: 5%;">{{$loop->iteration}}</td>
                        <td>{{$dt->nama_berkas}}</td>
                        <td>
                            <a download="" href="{{ asset('file/'. $dt->nama_berkas) }}" class="btn btn-edit btn-sm"" type=" button">
                                Unduh
                            </a>
                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteseleksi{{$dt->id}}" type="button">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    @include('pages.admin.deleteseleksi')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal tambah data -->
<div class="modal fade" id="addseleksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jadwal Seleksi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('data-seleksi/add')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_berkas" class="form-label">Upload Jadwal Seleksi (PDF)</label>
                        <input type="file" class="form-control" id="nama_berkas" name="nama_berkas">
                    </div>
                    <div class="mb-3">
                        <label for="surat_pernyataan" class="form-label">Upload Template Surat Pernyataan (PDF)</label>
                        <input type="file" class="form-control" id="surat_pernyataan" name="surat_pernyataan">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai Pendaftaran</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai Pendaftaran</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-orange text-white btn-sm">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    // Menyesuaikan lebar kolom setelah tabel diinisialisasi
    table.columns.adjust().draw();
</script>
@endsection