@extends('layouts.template')
@section('title', 'Voucher')
@section('content')
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="d-flex flex-wrap">
            
            <div class="card mx-1 my-1" style="width: 18rem;">
                <img src="{{url('/img/chatime.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="text-dark">Chatime Buy 1 Get 1</h5>
                    <div class="d-flex justify-content-between ">
                        <div style="font-size: 1em;" class="align-self-center card-text text-danger">100
                            Poin
                        </div>
                        <button class="btn btn-md btn-success align-self-center">Beli</button>
                    </div>
                </div>
            </div>
            <div class="card mx-1 my-1" style="width: 18rem;">
                <img src="{{url('/img/chatime.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="text-dark">Chatime Buy 1 Get 1</h5>
                    <div class="d-flex justify-content-between ">
                        <div style="font-size: 1em;" class="align-self-center card-text text-danger">100
                            Poin
                        </div>
                        <button class="btn btn-md btn-success align-self-center">Beli</button>
                    </div>
                </div>
            </div>
            <div class="card mx-1 my-1" style="width: 18rem;">
                <img src="{{url('/img/chatime.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="text-dark">Chatime Buy 1 Get 1</h5>
                    <div class="d-flex justify-content-between ">
                        <div style="font-size: 1em;" class="align-self-center card-text text-danger">100
                            Poin
                        </div>
                        <button class="btn btn-md btn-success align-self-center">Beli</button>
                    </div>
                </div>
            </div>
            <div class="card mx-1 my-1" style="width: 18rem;">
                <img src="{{url('/img/chatime.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="text-dark">Chatime Buy 1 Get 1</h5>
                    <div class="d-flex justify-content-between ">
                        <div style="font-size: 1em;" class="align-self-center card-text text-danger">100
                            Poin
                        </div>
                        <button class="btn btn-md btn-success align-self-center">Beli</button>
                    </div>
                </div>
            </div>
            <div class="card mx-1 my-1" style="width: 18rem;">
                <img src="{{url('/img/chatime.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="text-dark">Chatime Buy 1 Get 1</h5>
                    <div class="d-flex justify-content-between ">
                        <div style="font-size: 1em;" class="align-self-center card-text text-danger">100
                            Poin
                        </div>
                        <button class="btn btn-md btn-success align-self-center">Beli</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-xl-3 col-lg-5 mb-4">
        <div class="card border-left-primary shadow  py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Poin</div>
                        <div style="font-size: 3em;" class="h5 mb-0 font-weight-bold text-gray-800">
                            {{$user->point}}</div>
                    </div>
                    <div class="col-auto">
                        <a href="topup.html"><i class="fas fa-plus-square fa-2x text-success"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection