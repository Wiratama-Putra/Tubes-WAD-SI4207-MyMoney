@extends('layouts.template')
@section('title', 'Voucher')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Voucher Saya</h1> 
</div>

@if (session('pesan'))
<div class="row">
    <div class="col-12 w-100">
        <div class="alert alert-danger">
            {{ session('pesan') }}
        </div>
    </div>
</div>
@endif

<div class="card-columns">
    @forelse($myvouchers as $mv)
    <div class="card">
        <img src="{{url('/img/'.$mv->image)}}" class="card-img-top" alt="{{ $mv->image }}">
        <div class="card-body">
            <p class="card-text">{{ $mv->voucher_name }}</p>

            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mdl{{ $mv->id }}">
                Scan Barcode
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="mdl{{$mv->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="mdl{{$mv->id}}Label">{{ $mv->voucher_name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <img src="{{asset('img/barcode.png')}}" alt="barcode" class="img-thumbnail" width="300px">
                        </div>
                        <hr>
                        <div class="text-center">
                            <h4>{{ $mv->kode }}</h4>
                        </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
    
    @empty
        <label>Belum ada voucher nih, yuk tukarkan poin mu!!</label>
    @endforelse
</div>

@endsection
