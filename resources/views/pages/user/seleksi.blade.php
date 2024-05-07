@extends('..layouts.masterUser')
@section('content')

<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Jadwal Seleksi</h4>
    </div>
    <div class="card">
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
                        <td style="width: 5%;">{{$key+1}}</td>
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