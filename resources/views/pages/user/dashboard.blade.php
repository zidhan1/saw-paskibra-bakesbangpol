@extends('..layouts.masterUser')

@section('content')


<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Dashboard Main</h4>
    </div>

    @if( $decision !== null && $decision->validation === "validated")
    <div class="container mb-3">
        <div class="head">
            <h1 style="color: #5e35b1; font-size: 36px; font-weight: bold; text-transform: uppercase; margin-bottom: 20px;">Selamat!</h1>
            <p style=" color: #333; font-size: 18px; margin-bottom: 20px;"><b>{{$decision->nama_lengkap}}</b>, Anda dinyatakan lolos seleksi PASKIBRAKA.</p>
            <p style=" color: #333; font-size: 18px; margin-bottom: 20px;">Selamat merayakan kesuksesan Anda!</p>
        </div>
    </div>
    <div class="d-flex flex-wrap flex-row gap-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Peringkat Anda</h5>
                <h5 class="fw-semibold fs-3">{{$peringkatUser}}</h5>
                <p class="card-text">Lihat peringkat lainnya</p>
                <a href="{{url('/hasil-seleksi')}}" class="btn btn-orange">Lihat Data</a>
            </div>
        </div>
    </div>
    @elseif($decision !== null && $decision->validation === "not validated")
    <div class="container mb-3">
        <div class="head">
            <h1 style="color: #cc0000; font-size: 32px; font-weight: bold; text-transform: uppercase; margin-bottom: 20px;">Mohon Maaf!</h1>
            <p style=" color: #333; font-size: 18px; margin-bottom: 10px;"><b>{{$decision->nama_lengkap}}</b>, Anda belum lolos seleksi PASKIBRAKA.</p>
            <p style=" color: #333; font-size: 18px; margin-bottom: 10px;">Tetap semangat dan pantang menyerah!</p>
        </div>
    </div>
    <div class="d-flex flex-wrap flex-row gap-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Peringkat Anda</h5>
                <h5 class="fw-semibold fs-3">{{$peringkatUser}}</h5>
                <p class="card-text">Lihat peringkat lainnya</p>
                <a href="{{url('/hasil-seleksi')}}" class="btn btn-orange">Lihat Data</a>
            </div>
        </div>
    </div>
    @else
    <div class="container mb-3">
        <div class="head">
            <h1 style="color: #cc0000; font-size: 36px; font-weight: bold; text-transform: uppercase; margin-bottom: 20px;">Belum ada Pengumuman!</h1>
            <p style=" color: #333; font-size: 18px; margin-bottom: 20px;">Pastikan jadwal pengumuman hasil seleksi benar.</p>
        </div>
    </div>
    @endif

</div>
@endsection