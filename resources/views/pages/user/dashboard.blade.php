@extends('..layouts.masterUser')

@section('content')


<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Dashboard Main</h4>
    </div>
    <div class="d-flex flex-wrap flex-row gap-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Peringkat Anda</h5>
                <h5 class="fw-semibold fs-3">10</h5>
                <p class="card-text">Lihat peringkat lainnya</p>
                <a href="#" class="btn btn-orange">Lihat Data</a>
            </div>
        </div>
    </div>

</div>
@endsection