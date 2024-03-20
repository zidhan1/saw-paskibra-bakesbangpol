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

    <div class="card">
        <div class="card-header">
            <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#addseleksi" type="button">
                Tambah data
            </button>
        </div>
        <div class="card-body">
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <!-- <th scope="col">Hari</th> -->
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $dt)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$dt->nama}}</td>
                        <td>{{ date('d-M-y', strtotime($dt->tanggal_mulai))}}</td>
                        <td>{{date('d-M-y', strtotime($dt->tanggal_selesai))}}</td>
                        <td>{{$dt->keterangan}}</td>
                        <td>
                            <a href="#" class="btn btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#editseleksi{{$dt->id}}" type="button">
                                Edit
                            </a>
                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteseleksi{{$dt->id}}" type="button">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    @include('pages.admin.editseleksi')
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
            <form action="{{url('data-seleksi/add')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Ujian</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="5">

                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-edit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection