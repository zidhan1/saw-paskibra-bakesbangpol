@extends('..layouts.master')
@section('content')

<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Data Peserta</h4>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Detail Data Peserta</h5>
        </div>
        <div class="card-body">
            <table class="table table-sm table-hover mb-3">
                <tbody>
                    <tr scope="col">
                        <img src="{{ asset('file/profile/'. $data->profilepath) }}" alt="Gambar" style="width: 150px; display: block; margin: 0 auto;">
                        <th></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Nama Lengkap</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->nama_lengkap}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Nama panggilan</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->nama_panggilan}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Jenis Kelamin</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">
                                @if($data->jenis_kelamin === "L")
                                Laki - laki
                                @else
                                Perempuan
                                @endif
                            </span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Alamat</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->alamat}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">TTL</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->tempat_lahir}}, {{date('d-M-y', strtotime($data->tanggal_lahir))}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Agama</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->agama}}</span></th>
                    </tr>
                    @foreach($bahasa as $key => $bhs)
                    <tr>
                        <th scope="col" style="width: 150px;">Bahasa {{$key+1}}</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$bhs->nama_bahasa}}</span></th>
                    </tr>
                    @endforeach
                    <tr>
                        <th scope="col" style="width: 150px;">Berat Badan</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->bb}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Tinggi Badan</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->tb}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">No. handphone</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->no_hp}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Asal Sekolah</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->asal_sekolah}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Alamat Sekolah</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->alamat_sekolah}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Email Sekolah</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->email_sekolah}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Nama Ayah</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->nama_ayah}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Pekerjaan Ayah</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->pekerjaan_ayah}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">No HP Ayah</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->no_hp_ayah}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Nama Ibu</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->nama_ibu}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Pekerjaan Ibu</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->pekerjaan_ibu}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">No HP Ibu</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->no_hp_ibu}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Tahun Terdaftar</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->tahun_daftar}}</span></th>
                    </tr>
                </tbody>
            </table>
            <a href="{{url('peserta')}}" class="btn btn-edit btn-sm">Kembali</a>
        </div>
    </div>
</div>
@endsection