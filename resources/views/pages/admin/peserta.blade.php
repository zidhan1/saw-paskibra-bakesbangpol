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
            <table class="table table-sm table-hover" id="myTable">
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
                    @foreach($data as $key => $dt)

                    <tr>
                        <td style="width: 5%;">{{$key+1}}</td>
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
                            <a href="{{url('nilai/add', $dt->id)}}" class="btn btn-edit btn-sm">
                                Beri Nilai
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex flex-row gap-1">
                <div>
                    <select name="tahun" id="tahun" class="form-control" required style="height: 30px;">
                        @foreach($data->unique('tahun_daftar') as $tahun)
                        <option value="{{$tahun->tahun_daftar}}">{{$tahun->tahun_daftar}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <a href="{{url('calculate/')}}" class="btn btn-sky btn-sm">Lakukan Perhitungan</a>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectElement = document.getElementById('tahun');
        var calculateLink = "calculate/";

        selectElement.addEventListener('change', function() {
            var selectedYear = this.value;
            var updatedLink = calculateLink + selectedYear;
            document.querySelector('.btn.btn-sky.btn-sm').setAttribute('href', updatedLink);
        });

        // Inisialisasi tautan saat halaman dimuat
        var selectedYear = selectElement.value;
        var updatedLink = calculateLink + selectedYear;
        document.querySelector('.btn.btn-sky.btn-sm').setAttribute('href', updatedLink);
    });
</script>


<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    // Menyesuaikan lebar kolom setelah tabel diinisialisasi
    table.columns.adjust().draw();
</script>

@endsection