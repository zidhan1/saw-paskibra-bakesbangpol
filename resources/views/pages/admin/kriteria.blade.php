@extends('..layouts.master')

@section('content')
<div class="container-fluid">
    <div class="title">
        <h4 class="fw-bold">Data Kriteria</h4>
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
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kriteria</th>
                        <th scope="col">Bobot Kriteria</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $dt)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$dt->nama_kriteria}}</td>
                        <td>{{$dt->bobot}}</td>
                        <td>
                            <a href="#" class="btn btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#editkriteria{{$dt->id}}" type="button">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @include('pages.admin.editkriteria')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection