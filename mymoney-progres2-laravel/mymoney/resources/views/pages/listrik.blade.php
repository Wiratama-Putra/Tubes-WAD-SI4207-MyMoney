@extends('layouts.template')
@section('title', 'Listrik')
@section('content')
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Token Listrik</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="" style="overflow: hidden;">
                    <form>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputPassword1">No. Meter/ID Pelanggan</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah</label>
                            <input type="text" class="form-control" id="exampleInputPassword1">
                        </div>

                        <button type="submit" class="btn btn-primary">Isi Token Listrik</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection