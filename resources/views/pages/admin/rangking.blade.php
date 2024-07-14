@extends('..layouts.master')
@section('content')

<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Rangking Peserta</h4>
    </div>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-orange btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Cetak Hasil</button>
        </div>
        <div class="card-body">
            <table class="table table-hover table-sm" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Tahun Daftar</th>
                        <th scope="col">Hasil Saw</th>
                        <th scope="col">Status Validasi</th>
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
                        <td>{{$dt->hasil}}</td>
                        @if($dt->validation === "validated")
                        <td style="color: darkgreen;">Lolos Seleksi</td>
                        @else
                        <td style="color: crimson;">Tidak Lolos</td>
                        @endif
                        <td style="width: 15%;">
                            <form action="{{route('validation', $dt->id)}}" method="post" id="form_{{ $dt->id }}">
                                @csrf
                                <a href="{{url('nilai/add', $dt->id)}}" class="btn btn-green btn-sm" type="button">
                                    Lihat
                                </a>
                                <input type="hidden" name="result" id="result_{{ $dt->id }}" value="">
                                <button type="submit" class="submitBtn btn btn-sm btn-sky" data-id="{{ $dt->id }}">Validasi</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cetak Hasil Seleksi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="tahun" class="form-label">Tahun</label>
                <select name="tahun" id="tahun" class="form-control">
                    @foreach($data->unique('tahun_daftar') as $tahun)
                    <option value="{{$tahun->tahun_daftar}}">{{$tahun->tahun_daftar}}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer m-auto">
                <a href="#" class="btn btn-sky btn-sm" id="cetakButton">Cetak</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mengambil elemen dropdown tahun
        var tahunDropdown = document.getElementById('tahun');
        // Mengambil elemen tombol cetak
        var cetakButton = document.getElementById('cetakButton');

        // Mendapatkan tahun sekarang
        var tahunSekarang = (new Date()).getFullYear();
        // Membuat URL default berdasarkan tahun sekarang
        var defaultURL = "{{url('generatepdf/')}}/" + tahunSekarang;
        // Mengatur href pada tombol cetak dengan URL default
        cetakButton.href = defaultURL;

        // Menambahkan event listener untuk setiap kali nilai dropdown berubah
        tahunDropdown.addEventListener('change', function() {
            // Mendapatkan nilai tahun yang dipilih
            var tahun = this.value;

            // Membuat URL berdasarkan tahun yang dipilih
            var url = "{{url('generatepdf/')}}/" + tahun;

            // Mengubah href pada tombol cetak dengan URL baru
            cetakButton.href = url;
        });
    });
</script>



<script>
    document.querySelectorAll('.submitBtn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            const itemId = this.getAttribute('data-id');

            Swal.fire({
                title: 'Apakah peserta tersebut lolos seleksi?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Lolos!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if the user confirms
                    document.getElementById('result_' + itemId).value = "validated";
                    document.getElementById('form_' + itemId).submit();
                } else if (result.isDismissed) {
                    // Handle the dismissal (user cancels)
                    document.getElementById('result_' + itemId).value = "not validated";
                    document.getElementById('form_' + itemId).submit();
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#myTable').DataTable({
            scrollX: true,
            columnDefs: [{
                    width: '100px',
                    targets: 0
                }, // Contoh: Kolom pertama lebarnya 100px
                {
                    width: '200px',
                    targets: 1
                }, // Kolom kedua lebarnya 200px
                // dan seterusnya...
            ]
        });

        // Menyesuaikan lebar kolom setelah tabel diinisialisasi
        table.columns.adjust().draw();
    });
</script>

@endsection