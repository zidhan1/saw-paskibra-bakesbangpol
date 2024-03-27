@extends('..layouts.masterUser')
@section('content')
<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Pendaftaran Peserta</h4>
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
            <h5 class="mb-3">Masukkan data anda dengan benar</h5>
            <hr>
            <form method="POST" action="{{route('peserta.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_panggilan" class="form-label">Nama Panggilan<span class="text-danger">*</span></label>
                            <input type="text" name="nama_panggilan" class="form-control" id="nama_panggilan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat<span class="text-danger">*</span></label>
                            <Textarea id="alamat" name="alamat" class="form-control" cols="4" rows="3"></Textarea>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir<span class="text-danger">*</span></label>
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama<span class="text-danger">*</span></label>
                            <input type="text" id="agama" name="agama" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="bahasa" class="form-label">Bahasa<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="bahasa" name="bahasa">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="bb" class="form-label">Berat Badan<span class="text-danger">*</span></label>
                            <input type="number" id="bb" name="bb" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tb" class="form-label">Tinggi Badan<span class="text-danger">*</span></label>
                            <input type="number" name="tb" class="form-control" id="tb">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Handphone Peserta<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp">
                        </div>
                    </div>
                </div>
                <span class="fw-semibold fs-5 ">Data Sekolah</span>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="asal_sekolah" class="form-label">Asal Sekolah<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="alamat_sekolah" class="form-label">Alamat Sekolah<span class="text-danger">*</span></label>
                            <Textarea id="alamat_sekolah" name="alamat_sekolah" class="form-control" cols="4" rows="3"></Textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email_sekolah" class="form-label">Email Sekolah<span class="text-danger">*</span></label>
                            <input type="email" name="email_sekolah" class="form-control" id="email_sekolah">
                        </div>
                    </div>
                </div>
                <span class="fw-semibold fs-5 ">Data Orang Tua</span>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_ayah" class="form-label">Nama Ayah<span class="text-danger">*</span></label>
                            <input type="text" name="nama_ayah" class="form-control" id="nama_ayah">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pekerjaan_ayah	" class="form-label">Pekerjaan Ayah<span class="text-danger">*</span></label>
                            <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="no_hp_ayah" class="form-label">No Handphone Ayah<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="no_hp_ayah" name="no_hp_ayah">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_ibu" class="form-label">Nama Ibu<span class="text-danger">*</span></label>
                            <input type="text" name="nama_ibu" class="form-control" id="nama_ibu">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu<span class="text-danger">*</span></label>
                            <input type="text" name="pekerjaan_ibu" class="form-control" id="pekerjaan_ibu">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="no_hp_ibu" class="form-label">No Handphone Ibu<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="no_hp_ibu" name="no_hp_ibu">
                        </div>
                    </div>
                </div>
                <a href="{{url('jadwal-seleksi')}}" class="btn btn-edit">Kembali</a>
                <button type="submit" class="btn btn-sky">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection