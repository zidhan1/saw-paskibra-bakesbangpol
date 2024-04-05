@extends('..layouts.master')
@section('content')

<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Data Peserta</h4>
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
        <div class="card-body">
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $dt)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$dt->nama_lengkap}}</td>
                        @if($dt->jenis_kelamin === "L")
                        <td>Laki - laki</td>
                        @else
                        <td>Perempuan</td>
                        @endif
                        <td>{{$dt->asal_sekolah}}</td>
                        <td>{{$dt->tahun_daftar}}</td>
                        <td>
                            <a href="{{url('peserta', $dt->id)}}" class="btn btn-green btn-sm" type="button">
                                Lihat
                            </a>
                            <a href="{{route('nilai.add', $dt->id)}}" class="btn btn-edit btn-sm" type="button">
                                Beri Nilai
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