@extends('..layouts.masterUser')

@if($id_peserta === null)
@section('content')
<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Pendaftaran</h4>
    </div>

    <div class="container mb-3">
        <h4 class="mt-3" style="color: #333; font-size: 18px; margin-bottom: 20px;">Anda belum melengkapi data profile, silahkan melengkapi data profile terlebih dahulu.</h4>
        <hr>
        <a href="{{url('user-profile')}}" class="btn btn-orange btn-sm">Data Profile</a>
    </div>
</div>
@endsection

@elseif($data === null)
@section('content')
<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Pendaftaran</h4>
    </div>

    <div class="container mb-3">
        <h4 class="mt-3 " style="color: #333; font-size: 18px; margin-bottom: 20px;">Pendaftaran belum dibuka, silahkan menghubungi panitia.</h4>
        <hr>
        <a href="{{url('jadwal-seleksi')}}" class="btn btn-sky btn-sm">Lihat jadwal seleksi</a>
    </div>
</div>
@endsection

@elseif($validated !== null)
@section('content')
<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Pendaftaran</h4>
    </div>


    <div class="container mb-3">
        <h4 class="mt-3" style="color: #333; font-size: 18px; margin-bottom: 20px;">Anda telah melakukan pendaftaran</h4>
        <hr>
        <a href=" {{url('jadwal-seleksi')}}" class="btn btn-sky">Lihat jadwal seleksi</a>
    </div>

</div>
@endsection
@else

@section('content')

<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Pendaftaran</h4>
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

    @if(session()->has('failed'))
    <div class="alert alert-danger" role="alert">
        {{session()->get('failed')}}
    </div>
    @endif

    <div class="card bg-card-sky m-3 p-3">
        <div class="warning-card p-3">
            <h4 class="mt-3 fw-semibold">Form Pendaftaran Peserta Paskibraka</h4>
            <p class="fw-light">Mohon lengkapi form berikut dengan benar sebagai persyaratan pendaftaran</p>
            <p>Masa pendaftaran {{\Illuminate\Support\Carbon::parse($data->startdate)->format("Y-m-d")}} hingga {{\Illuminate\Support\Carbon::parse($data->enddate)->format("Y-m-d")}}</p>
        </div>
        <hr>
        <form action="{{route('pendaftaran.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <span>Apakah anda bersedia menerima persyaratan dan mematuhi ketentuan selama seleksi berlangsung?<span class="ml-2 text-danger">*</span></span>
            <div class="d-flex flex-row gap-2 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radiopilihan" id="flexRadioDefault1" value="bersedia">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Bersedia
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radiopilihan" id="flexRadioDefault2" value="tidak bersedia">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Tidak Bersedia
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="surat_pernyataan" class="form-label">Upload Surat Pernyataan<span class="text-danger">*</span> <a href="{{asset('file/'.$surat->nama_berkas)}}" download="">Unduh</a></label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" id="surat_pernyataan" name="surat_pernyataan">
                </div>
            </div>
            <button class="btn btn-sky" type="submit">Daftar</button>
        </form>
    </div>
</div>
@endsection
@endif