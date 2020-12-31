@extends('layouts.template')
@section('title', 'Tambah Catatan')
@section('content')
<a class="btn btn-primary mx-2 my-2" href="{{url('/tambah-catatan')}}">Tambah Catatan</a>
<div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
        <form action="{{url('/dashboard/tambah-catatan')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Judul</label>
                <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Catatan</label>
                <textarea name="catatan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Tambah Catatan</button>
        </form>
    </div>
</div>

@endsection