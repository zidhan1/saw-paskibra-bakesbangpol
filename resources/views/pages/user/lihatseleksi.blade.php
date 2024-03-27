@extends('..layouts.masterUser')
@section('content')

<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Jadwal Seleksi</h4>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Detail Jadwal Seleksi</h5>
        </div>
        <div class="card-body">
            <table class="table table-sm table-hover mb-3">
                <tbody>
                    <tr>
                        <th scope="col" style="width: 150px;">Nama</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->nama}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Tanggal Mulai</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{date('d-M-y', strtotime($data->tanggal_mulai))}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Tanggal Selesai</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{date('d-M-y', strtotime($data->tanggal_selesai))}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Keterangan</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->keterangan}}</span></th>
                    </tr>
                </tbody>
            </table>
            <a href="{{url()->previous()}}" class="btn btn-edit btn-sm">Kembali</a>
        </div>
    </div>
</div>
@endsection