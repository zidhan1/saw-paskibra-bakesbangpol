@extends('..layouts.masterUser')
@section('content')

<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Jadwal Seleksi</h4>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            Jadwal Seleksi
        </div>
        <div class="card-body">
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    @if($regisDate !== null)
                    @foreach($regisDate as $key => $datas)
                    <tr>
                        <td style="width: 10%;">{{$loop->iteration}}</td>
                        <td style="width: 40%;">{{$datas->startdate}}</td>
                        <td style="width: 40%;">{{$datas->enddate}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Berkas Seleksi
        </div>
        <div class="card-body">
            <table class="table table-sm table-hover" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Berkas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $dt)
                    <tr>
                        <td style="width: 5%;">{{$loop->iteration}}</td>
                        <td>{{$dt->nama_berkas}}</td>
                        <td>
                            <a href="{{asset('file/'. $dt->nama_berkas)}}" class="btn btn-sm btn-green">
                                Unduh
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    // Menyesuaikan lebar kolom setelah tabel diinisialisasi
    table.columns.adjust().draw();
</script>
@endsection