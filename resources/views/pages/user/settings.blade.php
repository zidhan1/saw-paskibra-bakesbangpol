@extends('..layouts.masterUser')
@section('content')
<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">User Settings</h4>
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
            <table class="table table-sm table-hover mb-3">
                <tbody>
                    <tr>
                        <th scope="col" style="width: 150px;">Username</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->username}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Email</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{$data->email}}</span></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 150px;">Dibuat Pada</th>
                        <th scope="col">:</th>
                        <th scope="col"><span class="fw-normal">{{date('d-M-y', strtotime($data->created_at))}}</span></th>
                    </tr>
                </tbody>
            </table>
            <form action="{{route('user.destroy')}}" method="post">
                <button class="btn btn-sm btn-sky" data-bs-toggle="modal" data-bs-target="#ubahPassword">Ubah Password</button>
                @csrf
                <button type="submit" class="btn btn-sm btn-danger" onclick="confirm('Apakah Anda yakin ingin hapus akun?')">Hapus Akun</button>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="ubahPassword" tabindex="-1" aria-labelledby="ubahPassword" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('user.password')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" readonly value="{{$data->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="repeatPassword" class="form-label">Ulangi Password Baru</label>
                        <input type="password" class="form-control" id="repeatPassword" name="repeatPassword">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sky btn-sm">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection