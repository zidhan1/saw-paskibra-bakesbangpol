@extends('..layouts.master')
@section('content')

<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Hasil Perhitungan Metode SAW</h4>
    </div>

    <!-- Nilai Asli Peserta -->
    <div class="card mb-3">
        <div class="card-header">
            Nilai Peserta
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Peserta</th>
                        @foreach($kriteria as $kt)
                        <th>{{ucwords($kt->nama_kriteria)}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($peserta as $keyT => $value)
                    <tr>
                        <td>{{$value->nama_panggilan}}</td>
                        @foreach($kriteria as $keyY => $value)
                        <td>{{$first_value[$keyT][$keyY]}}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Nilai Normalisasi Peserta -->
    <div class="card mb-3">
        <div class="card-header">
            Nilai Normalisasi Peserta
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Peserta</th>
                        @foreach($kriteria as $kt)
                        <th>{{ucwords($kt->nama_kriteria)}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($peserta as $keyT => $value)
                    <tr>
                        <td>{{$value->nama_panggilan}}</td>
                        @foreach($kriteria as $keyY => $value)
                        <td>{{$normalisasi[$keyT][$keyY]}}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Nilai Preferensi Peserta -->
    <div class="card">
        <div class="card-header">
            Nilai Preferensi Peserta
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Rangking</th>
                        <th>Peserta</th>
                        <th>Preferensi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value['nama_lengkap']}}</td>
                        <td>{{$value['nilai']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3 mx-auto">
        <form action="{{route('hasil.store')}}" method="POST">
            @csrf
            @foreach($data_asli as $key => $value1)
            <input type="hidden" value="{{$value1['nama_lengkap']}}" name="data_nama[]" id="data_nama">
            @endforeach
            @foreach($data_asli as $key => $value2)
            <input type="hidden" value="{{$value2['id_peserta']}}" name="id_peserta[]" id="id_peserta">
            @endforeach
            @foreach($data_asli as $key => $value3)
            <input type="hidden" value="{{$value3['nilai']}}" name="nilai[]" id="nilai[]">
            @endforeach
            <a href="{{url('/peserta')}}" class="btn btn-sm btn-danger">Kembali</a>
            <button type="submit" class="btn btn-sky btn-sm">Simpan Data</button>
        </form>
    </div>
</div>
@endsection