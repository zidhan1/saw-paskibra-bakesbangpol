@extends('..layouts.master')

@section('content')

<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Dashboard Main</h4>
    </div>
    <div class="d-flex flex-wrap flex-row gap-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Total Peserta</h5>
                <h5 class="fw-semibold fs-3">{{$peserta}}</h5>
                <p class="card-text">Lihat dan kelola data peserta.</p>
                <a href="{{url('peserta')}}" class="btn btn-orange">Lihat Data</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Total Kriteria</h5>
                <h5 class="fw-semibold fs-3">{{$kriteria}}</h5>
                <p class="card-text">Lihat dan kelola data kriteria.</p>
                <a href="{{url('kriteria')}}" class="btn btn-orange">Lihat Data</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Jadwal Test</h5>
                <h5 class="fw-semibold fs-3">{{$jadwal}}</h5>
                <p class="card-text">Lihat dan kelola data test.</p>
                <a href="{{url('data-seleksi')}}" class="btn btn-orange">Lihat Data</a>
            </div>
        </div>

    </div>

</div>


@endsection