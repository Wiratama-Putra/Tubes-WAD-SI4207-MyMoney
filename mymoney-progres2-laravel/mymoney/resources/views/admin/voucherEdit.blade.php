@extends('layouts.template')
@section('title', 'Edit Voucher')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Voucher</h1>
</div>

<div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
        <form action="{{url('/admin/voucher',$voucher->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="forName">Name</label>
                <input value="{{$voucher->name}}" name="name" type="text" class="form-control" id="forName">
                <input value="{{$voucher->id}}" name="id" type="hidden">
            </div>
            <div class="form-group">
                <label for="forPoint">Point Yang Dibutuhkan</label>
                <input value="{{$voucher->point}}" name="point" type="number" class="form-control" id="forPoint">
            </div>
            <button type="submit" class="btn btn-primary">Update Voucher</button>
        </form>
    </div>
</div>

@endsection