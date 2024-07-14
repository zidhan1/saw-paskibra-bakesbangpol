@extends('..layouts.masterUser')
@section('content')
<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Data Diri</h4>
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
            <form method="POST" action="@if($data === null){{route('peserta.store')}} @else {{route('peserta.update')}} @endif" enctype="multipart/form-data">
                @csrf
                @if($data !== null)
                <div class="row">
                    <div class="col">
                        <img src="{{ asset('file/profile/'. $data->profilepath) }}" alt="Gambar" style="width: 150px;">
                    </div>
                </div>
                @endif
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pathprofile" class="form-label">Poto Profil<span class="text-danger">*</span></label>
                            <input type="file" name="pathprofile" class="form-control" id="pathprofile">
                        </div>
                    </div>
                </div>
                <span class="fw-semibold fs-5 ">Data Diri</span>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="@if($data !== null){{$data->nama_lengkap}}@endif">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_panggilan" class="form-label">Nama Panggilan<span class="text-danger">*</span></label>
                            <input type="text" name="nama_panggilan" class="form-control" id="nama_panggilan" value="@if($data !== null){{$data->nama_panggilan}}@endif">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                @if($data !== null && $data->jenis_kelamin == "L")
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                                @elseif($data !== null && $data->jenis_kelamin == "P")
                                <option value="P">Perempuan</option>
                                <option value="L">Laki-laki</option>
                                @else
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat<span class="text-danger">*</span></label>
                            <Textarea id="alamat" name="alamat" class="form-control" cols="4" rows="3">@if($data !== null){{$data->alamat}}@endif</Textarea>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir<span class="text-danger">*</span></label>
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="@if($data !== null){{$data->tempat_lahir}}@endif">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $data !== null ? \Illuminate\Support\Carbon::parse($data->tanggal_lahir)->format('Y-m-d') : '' }}">
                        </div>
                    </div>

                </div>
                <div class=" row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama<span class="text-danger">*</span></label>
                            <input type="text" id="agama" name="agama" class="form-control" value="@if($data !== null){{$data->agama}}@endif">
                        </div>
                    </div>
                    @foreach($bahasa as $bhs)
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="count[]" class="form-label">Nama Bahasa<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="count1{{$loop->iteration}}" name="bahasa[]" value="@if($data !== null){{$bhs->nama_bahasa}}@endif">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="count[]" class="form-label">Tingkat Bahasa<span class="text-danger">*</span></label>
                            <select name="tingkat_bahasa[]" id="count2{{$loop->iteration}}" class="form-control">
                                @if($data !== null && $bhs->tingkat_bahasa == "Aktif")
                                <option value="Aktif">Aktif</option>
                                <option value="Pasif">Pasif</option>
                                @elseif($data !== null && $bhs->tingkat_bahasa == "Pasif")
                                <option value="Pasif">Pasif</option>
                                <option value="Aktif">Aktif</option>
                                @else
                                <option value="Aktif">Aktif</option>
                                <option value="Pasif">Pasif</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    @endforeach
                    @if($bahasa->isEmpty())
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="bahasa" class="form-label">Bahasa<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="bahasa" name="bahasa[]" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="count[]" class="form-label">Tingkat Bahasa<span class="text-danger">*</span></label>
                            <select name="tingkat_bahasa[]" class="form-control">
                                <option value="Aktif">Aktif</option>
                                <option value="Pasif">Pasif</option>
                            </select>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-3" id="inputContainer"></div>
                    <div class="col-md-3" id="inputContainer2"></div>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-sm btn-sky mb-2" type="button" onclick="addInput()">Tambah bahasa</button>
                    <button class="btn btn-sm btn-danger mb-2" type="button" onclick="deleteInput()">Hapus bahasa</button>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="bb" class="form-label">Berat Badan<span class="text-danger">*</span></label>
                            <input type="number" id="bb" name="bb" class="form-control" value="@if($data !== null){{$data->bb}}@endif">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tb" class="form-label">Tinggi Badan<span class="text-danger">*</span></label>
                            <input type="number" name="tb" class="form-control" id="tb" value="@if($data !== null){{$data->tb}}@endif">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Handphone Peserta<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" value="@if($data !== null){{$data->no_hp}}@endif">
                        </div>
                    </div>
                </div>
                <span class="fw-semibold fs-5 ">Data Sekolah</span>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="asal_sekolah" class="form-label">Asal Sekolah<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="@if($data !== null){{$data->asal_sekolah}}@endif">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="alamat_sekolah" class="form-label">Alamat Sekolah<span class="text-danger">*</span></label>
                            <Textarea id="alamat_sekolah" name="alamat_sekolah" class="form-control" cols="4" rows="3">@if($data !== null){{$data->alamat_sekolah}}@endif</Textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email_sekolah" class="form-label">Email Sekolah<span class="text-danger">*</span></label>
                            <input type="email" name="email_sekolah" class="form-control" id="email_sekolah" value="@if($data !== null){{$data->email_sekolah}}@endif">
                        </div>
                    </div>
                </div>
                <span class="fw-semibold fs-5 ">Data Orang Tua</span>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_ayah" class="form-label">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" value="@if($data !== null){{$data->nama_ayah}}@endif">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pekerjaan_ayah	" class="form-label">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah" value="@if($data !== null){{$data->pekerjaan_ayah}}@endif">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="no_hp_ayah" class="form-label">No Handphone Ayah</label>
                            <input type="number" class="form-control" id="no_hp_ayah" name="no_hp_ayah" value="@if($data !== null){{$data->no_hp_ayah}}@endif">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_ibu" class="form-label">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" value="@if($data !== null){{$data->nama_ibu}}@endif">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" class="form-control" id="pekerjaan_ibu" value="@if($data !== null){{$data->pekerjaan_ibu}}@endif">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="no_hp_ibu" class="form-label">No Handphone Ibu</label>
                            <input type="number" class="form-control" id="no_hp_ibu" name="no_hp_ibu" value="@if($data !== null){{$data->no_hp_ibu}}@endif">
                        </div>
                    </div>
                </div>
                <a href="{{url('user-pendaftaran')}}" class="btn btn-edit btn-sm">Kembali</a>
                <button type="submit" class="btn btn-sky btn-sm">Simpan</button>
            </form>
        </div>
    </div>
</div>

@php
// Assuming $bahasa is an array or collection of languages
$totalBahasa = count($bahasa);
$clickCount = $totalBahasa > 0 ? $totalBahasa : 1;
@endphp

<script>
    var clickCount = <?php echo $clickCount; ?>;

    function addInput() {
        // Membuat elemen input baru
        var newInput = document.createElement('input');
        var newSelect = document.createElement('select');
        // Mengatur atribut atau properti input
        clickCount++;
        newInput.type = 'text';
        newInput.className = 'form-control mb-2';
        newInput.id = 'count1' + clickCount;
        newInput.name = 'bahasa[' + clickCount + ']';
        newInput.placeholder = 'Masukkan Bahasa Lainnya';

        newSelect.className = 'form-control mb-2';
        newSelect.id = 'count2' + clickCount;
        newSelect.name = 'tingkat_bahasa[' + clickCount + ']';
        // Definisi array pilihan yang ingin ditambahkan
        var options = [{
                value: 'Aktif',
                text: 'Aktif'
            },
            {
                value: 'Pasif',
                text: 'Pasif'
            },
        ];

        // Menambahkan pilihan ke elemen select
        options.forEach(function(optionData) {
            var option = document.createElement('option');
            option.value = optionData.value;
            option.textContent = optionData.text;
            newSelect.appendChild(option);
        });

        // Menambahkan elemen input ke dalam div dengan id inputContainer
        document.getElementById('inputContainer').appendChild(newInput);
        document.getElementById('inputContainer2').appendChild(newSelect);
    }

    function deleteInput() {
        // Mendapatkan input terakhir yang ditambahkan
        var input = document.getElementById('count1' + clickCount);
        var select = document.getElementById('count2' + clickCount);
        console.log(clickCount);
        if (input != null) {
            // Menghapus input terakhir
            input.remove();
            select.remove();
            clickCount--;
        }
    }
</script>

@endsection