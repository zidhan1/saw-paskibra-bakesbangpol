@extends('..layouts.masterUser')
@section('content')

<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Validasi Pendaftaran</h4>
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
            <h4>Anda telah melakukan pendaftaran silahkan memilih opsi dibawah untuk melanjutkan.</h4>
        </div>
        <div class="card-footer">
            <form action="{{route('peserta.delete', $validation->id)}}" method="POST">
                @csrf
                <a href="{{url('jadwal-seleksi')}}" class="btn btn-sm btn-edit">Kembali</a>
                <button class="btn btn-danger btn-sm" type="submit">
                    Batalkan Pendaftaran
                </button>
            </form>
        </div>
    </div>
</div>
@endsection