@extends('..layouts.masterUser')
@section('content')

@if( $decision !== null && $decision->validation === "validated")
<div class="container mb-3">
    <div class="head">
        <h1 style="color: #5e35b1; font-size: 36px; font-weight: bold; text-transform: uppercase; margin-bottom: 20px;">Selamat!</h1>
        <p style=" color: #333; font-size: 18px; margin-bottom: 20px;">Anda dinyatakan lolos seleksi PASKIBRAKA.</p>
        <p style=" color: #333; font-size: 18px; margin-bottom: 20px;">Selamat merayakan kesuksesan Anda!</p>
    </div>
</div>
@elseif($decision !== null && $decision->validation === "not validated")
<div class="container mb-3">
    <div class="head">
        <h1 style="color: #cc0000; font-size: 36px; font-weight: bold; text-transform: uppercase; margin-bottom: 20px;">Mohon Maaf!</h1>
        <p style=" color: #333; font-size: 18px; margin-bottom: 20px;">Anda belum lolos seleksi PASKIBRAKA.</p>
        <p style=" color: #333; font-size: 18px; margin-bottom: 20px;">Tetap semangat dan pantang menyerah!</p>
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
@if( $decision !== null )
<div class="container">
    <table class="table table-sm table-hover text-center" id="myTable">
        <thead>
            <tr>
                <th scope="col">Peringkat</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peserta as $key => $data)
            <tr>
                <td style="width: 5%;">{{$key+1}}</td>
                <td style="width: 50%">{{$data->nama_lengkap}}</td>
                <td style="width: 30%;">{{$data->hasil}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    // Menyesuaikan lebar kolom setelah tabel diinisialisasi
    table.columns.adjust().draw();
</script>
@endsection