@extends('..layouts.masterUser')
@section('content')

<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Jadwal Seleksi</h4>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="{{route('pendaftaran', $auth->id)}}" class="btn btn-sm btn-sky">
                Lakukan pendaftaran
            </a>
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
                            <a href="{{url('jadwal-seleksi', $dt->id)}}" class="btn btn-sm btn-green">
                                Lihat
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection