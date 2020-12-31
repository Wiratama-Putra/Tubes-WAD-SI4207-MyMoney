@extends('layouts.template')
@section('title', 'Tambah Voucher')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Voucher</h1>
</div>

<div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
        <form action="{{url('/admin/tambah-voucher')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="forJudul">Nama</label>
                <input name="name" type="text" class="form-control" id="forJudul" required>
            </div>
            <div class="form-group">
                <label for="forPoint">Point Yang Dibutuhkan</label>
                <input name="point" type="number" class="form-control" id="forPoint" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Voucher</button>
        </form>
    </div>
</div>

@endsection