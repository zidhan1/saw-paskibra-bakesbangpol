@extends('..layouts.master')
@section('content')

<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Nilai Peserta </h4>
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
            <div class="warning-card p-3 mb-3">
                <h5>Harap mengisikan nilai sesuai hasil penilaian praktek dan test</h5>
                <span>Peserta : {{$data->nama_lengkap}}</span>
            </div>
            <form @isset($value) action="{{route('nilai.update', $data->id)}}" @else action="{{route('nilai.store', $data->id)}}" @endisset method="POST">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3 ">
                            <label for="parade" class="form-label">Nilai Parade</label>
                            <input value="@isset($value[0]){{$value[0]->nilai}}@endisset" onclick="paradeModal()" type="number" class="form-control" id="parade" name="kriteria_1" max="100" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="pbb" class="form-label">Nilai PBB</label>
                            <input value="@isset($value[1]){{$value[1]->nilai}}@endisset" onclick="pbbModal()" type="number" class="form-control" id="pbb" name="kriteria_2" max="100" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="kesehatan" class="form-label">Nilai Kesehatan</label>
                            <select name="kriteria_3" id="kesehatan" class="form-control" required>
                                <option @if(isset($value[2]) && $value[2]->nilai >= 75) selected="selected" @endif value="100">Sangat Baik</option>
                                <option @if(isset($value[2]) && $value[2]->nilai >= 50 && $value[2]->nilai <= 75) selected="selected" @endif value="75">Baik</option>
                                <option @if(isset($value[2]) && $value[2]->nilai >= 25 && $value[2]->nilai <= 50) selected="selected" @endif value="50">Cukup Baik</option>
                                <option @if(isset($value[2]) && $value[2]->nilai >= 0 && $value[2]->nilai <= 25) selected="selected" @endif value="25">Kurang Baik</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="samapta" class="form-label">Nilai Samapta</label>
                            <input value="@isset($value[3]){{$value[3]->nilai}}@endisset" onclick="samaptaModal()" type="number" class="form-control" id="samapta" name="kriteria_4" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="wawancara" class="form-label">Nilai Wawancara</label>
                            <select name="kriteria_5" id="wawancara" class="form-control" required>
                                <option @if(isset($value[4]) && $value[4]->nilai >= 75) selected="selected" @endif value="100">Sangat Baik</option>
                                <option @if(isset($value[4]) && $value[4]->nilai >= 50 && $value[4]->nilai <= 75) selected="selected" @endif value="75">Baik</option>
                                <option @if(isset($value[4]) && $value[4]->nilai >= 25 && $value[4]->nilai <= 50) selected="selected" @endif value="50">Cukup Baik</option>
                                <option @if(isset($value[4]) && $value[4]->nilai >= 0 && $value[4]->nilai <= 25) selected="selected" @endif value="25">Kurang Baik</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="wawasan_kebangsaan" class="form-label">Nilai Wawasan Kebangsaan</label>
                            <select name="kriteria_6" id="wawasan_kebangsaan" class="form-control" required>
                                <option @if(isset($value[5]) && $value[5]->nilai >= 75) selected="selected" @endif value="100">Nilai Peserta > 90</option>
                                <option @if(isset($value[5]) && $value[5]->nilai >= 50 && $value[5]->nilai <= 75) selected="selected" @endif value="75">Nilai Peserta 81-90</option>
                                <option @if(isset($value[5]) && $value[5]->nilai >= 25 && $value[5]->nilai <= 50) selected="selected" @endif value="50">Nilai Peserta 71-80</option>
                                <option @if(isset($value[5]) && $value[5]->nilai >= 0 && $value[5]->nilai <= 25) selected="selected" @endif value="25">Nilai Peserta < 70</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="pengetahuan_umum" class="form-label">Nilai Pengetahuan Umum</label>
                            <select name="kriteria_7" id="pengetahuan_umum" class="form-control" required>
                                <option @if(isset($value[6]) && $value[6]->nilai >= 75) selected="selected" @endif value="100">Nilai Peserta > 90</option>
                                <option @if(isset($value[6]) && $value[6]->nilai >= 50 && $value[6]->nilai <= 75) selected="selected" @endif value="75">Nilai Peserta 81-90</option>
                                <option @if(isset($value[6]) && $value[6]->nilai >= 25 && $value[6]->nilai <= 50) selected="selected" @endif value="50">Nilai Peserta 71-80</option>
                                <option @if(isset($value[6]) && $value[6]->nilai >= 0 && $value[6]->nilai <= 25) selected="selected" @endif value="25">Nilai Peserta < 70</option>
                            </select>
                        </div>
                    </div>
                </div>
                <a href="{{url('peserta')}}" class="btn btn-sm btn-danger">Kembali</a>
                <button class="btn btn-sm btn-edit" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>

<!-- Parade Modal -->
<div class="modal fade" id="paradeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan Nilai Parade</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="mb-3">
                        <label for="penilaian_mata" class="form-label">Penilaian Mata</label>
                        <input type="number" class="form-control" id="penilaian_mata" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_bahu" class="form-label">Penilaian Bahu</label>
                        <input type="number" class="form-control" id="penilaian_bahu" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_kaki" class="form-label">Penilaian Kaki</label>
                        <input type="number" class="form-control" id="penilaian_kaki" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_tangan" class="form-label">Penilaian Tangan</label>
                        <input type="number" class="form-control" id="penilaian_tangan" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_tato" class="form-label">Penilaian Tato</label>
                        <input type="number" class="form-control" id="penilaian_tato" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_tindik" class="form-label">Penilaian tindik</label>
                        <input type="number" class="form-control" id="penilaian_tindik" placeholder="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-orange btn-sm">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- PBB Modal -->
<div class="modal fade" id="pbbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan Nilai PBB</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="mb-3">
                        <label for="penilaian_sikap_sempurna" class="form-label">Penilaian Sikap Sempurna</label>
                        <input type="number" class="form-control" id="penilaian_sikap_sempurna" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_sikap_hormat" class="form-label">Penilaian Sikap Hormat</label>
                        <input type="number" class="form-control" id="penilaian_sikap_hormat" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_sikap_istirahat" class="form-label">Penilaian Sikap Istirahat</label>
                        <input type="number" class="form-control" id="penilaian_sikap_istirahat" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_langkah_tegap" class="form-label">Penilaian Langkah Tegap</label>
                        <input type="number" class="form-control" id="penilaian_langkah_tegap" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_jalan_ditempat" class="form-label">Penilaian Jalan Ditempat</label>
                        <input type="number" class="form-control" id="penilaian_jalan_ditempat" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_hadap" class="form-label">Penilaian Hadap Kanan/Kiri</label>
                        <input type="number" class="form-control" id="penilaian_hadap" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_serong" class="form-label">Penilaian Hadap Serong Kanan/Kiri</label>
                        <input type="number" class="form-control" id="penilaian_serong" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_balik_kanan" class="form-label">Penilaian Balik Kanan</label>
                        <input type="number" class="form-control" id="penilaian_balik_kanan" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_langkah" class="form-label">Penilaian Langkah L/R/F/B</label>
                        <input type="number" class="form-control" id="penilaian_langkah" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_kesigapan" class="form-label">Penilaian Kesigapan</label>
                        <input type="number" class="form-control" id="penilaian_kesigapan" placeholder="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-orange btn-sm">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Samapta Modal -->
<div class="modal fade" id="samaptaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan Nilai Samapta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="mb-3">
                        <label for="penilaian_lari" class="form-label">Penilaian Lari</label>
                        <input type="number" class="form-control" id="penilaian_lari" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_situp" class="form-label">Penilaian Sit Up</label>
                        <input type="number" class="form-control" id="penilaian_situp" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_pushup" class="form-label">Penilaian Push Up</label>
                        <input type="number" class="form-control" id="penilaian_pushup" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_backup" class="form-label">Penilaian Back Up</label>
                        <input type="number" class="form-control" id="penilaian_backup" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="penilaian_lari_cateran" class="form-label">Penilaian Lari Cateran</label>
                        <input type="number" class="form-control" id="penilaian_lari_cateran" placeholder="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-orange btn-sm">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Skrip JavaScript -->
<script>
    // Menampilkan Modal Parade
    function paradeModal() {
        $('#paradeModal').modal('show');
    }

    // Fungsi untuk menjumlahkan nilai input dan memasukkannya ke input parade
    function hitungDanSetParade() {
        // Mendapatkan nilai dari setiap input dalam modal
        var nilaiMata = parseInt(document.getElementById('penilaian_mata').value) || 0;
        var nilaiBahu = parseInt(document.getElementById('penilaian_bahu').value) || 0;
        var nilaiKaki = parseInt(document.getElementById('penilaian_kaki').value) || 0;
        var nilaiTangan = parseInt(document.getElementById('penilaian_tangan').value) || 0;
        var nilaiTato = parseInt(document.getElementById('penilaian_tato').value) || 0;
        var nilaiTindik = parseInt(document.getElementById('penilaian_tindik').value) || 0;

        // Menjumlahkan nilai-nilai
        var totalNilai = nilaiMata + nilaiBahu + nilaiKaki + nilaiTangan + nilaiTato + nilaiTindik;

        // Memasukkan total nilai ke dalam input parade
        document.getElementById('parade').value = totalNilai;
    }

    // Menambahkan event listener untuk tombol "Save changes"
    document.querySelector('#paradeModal .btn-primary').addEventListener('click', function() {
        hitungDanSetParade(); // Memanggil fungsi untuk menghitung dan memasukkan nilai parade
        $('#paradeModal').modal('hide'); // Menutup modal setelah tombol "Save changes" ditekan
    });
</script>

<script>
    // Menampilkan Modal PBB
    function pbbModal() {
        $('#pbbModal').modal('show');
    }

    // Fungsi untuk menjumlahkan nilai input dan memasukkannya ke input PBB
    function hitungDanSetPbb() {
        // Mendapatkan nilai dari setiap input dalam modal
        var nilaiSikapSempurna = parseInt(document.getElementById('penilaian_sikap_sempurna').value) || 0;
        var nilaiSikapHormat = parseInt(document.getElementById('penilaian_sikap_hormat').value) || 0;
        var nilaiSikapIstirahat = parseInt(document.getElementById('penilaian_sikap_istirahat').value) || 0;
        var nilaiLangkahTegap = parseInt(document.getElementById('penilaian_langkah_tegap').value) || 0;
        var nilaiJalanDitempat = parseInt(document.getElementById('penilaian_jalan_ditempat').value) || 0;
        var nilaiHadap = parseInt(document.getElementById('penilaian_hadap').value) || 0;
        var nilaiHadapSerong = parseInt(document.getElementById('penilaian_serong').value) || 0;
        var nilaiBalikKanan = parseInt(document.getElementById('penilaian_balik_kanan').value) || 0;
        var nilaiLangkah = parseInt(document.getElementById('penilaian_langkah').value) || 0;
        var nilaiKesigapan = parseInt(document.getElementById('penilaian_kesigapan').value) || 0;

        // Menjumlahkan nilai-nilai
        var totalNilaiPbb = nilaiSikapSempurna + nilaiSikapHormat + nilaiSikapIstirahat + nilaiLangkahTegap + nilaiJalanDitempat + nilaiHadap + nilaiHadapSerong + nilaiBalikKanan + nilaiLangkah + nilaiKesigapan;

        // Memasukkan total nilai ke dalam input parade
        document.getElementById('pbb').value = totalNilaiPbb;
    }

    // Menambahkan event listener untuk tombol "Save changes"
    document.querySelector('#pbbModal .btn-primary').addEventListener('click', function() {
        hitungDanSetPbb(); // Memanggil fungsi untuk menghitung dan memasukkan nilai parade
        $('#pbbModal').modal('hide'); // Menutup modal setelah tombol "Save changes" ditekan
    });
</script>

<script>
    // Menampilkan Modal Samapta
    function samaptaModal() {
        $('#samaptaModal').modal('show');
    }

    // Fungsi untuk menjumlahkan nilai input dan memasukkannya ke input PBB
    function hitungDanSetSamapta() {
        // Mendapatkan nilai dari setiap input dalam modal
        var nilaiLari = parseInt(document.getElementById('penilaian_lari').value) || 0;
        var nilaiSitup = parseInt(document.getElementById('penilaian_situp').value) || 0;
        var nilaiPushup = parseInt(document.getElementById('penilaian_pushup').value) || 0;
        var nilaiBackup = parseInt(document.getElementById('penilaian_backup').value) || 0;
        var nilaiLariCateran = parseInt(document.getElementById('penilaian_lari_cateran').value) || 0;

        // Menjumlahkan nilai-nilai
        var totalNilaiSamapta = nilaiLari + nilaiSitup + nilaiPushup + nilaiBackup + nilaiLariCateran;

        // Memasukkan total nilai ke dalam input parade
        document.getElementById('samapta').value = totalNilaiSamapta;
    }

    // Menambahkan event listener untuk tombol "Save changes"
    document.querySelector('#samaptaModal .btn-primary').addEventListener('click', function() {
        hitungDanSetSamapta(); // Memanggil fungsi untuk menghitung dan memasukkan nilai parade
        $('#samaptaModal').modal('hide'); // Menutup modal setelah tombol "Save changes" ditekan
    });
</script>
@endsection