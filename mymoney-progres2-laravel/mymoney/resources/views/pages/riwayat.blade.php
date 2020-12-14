@extends('template.template')


@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Topup</h1>

</div>

<!-- Content Row -->
<div class="row">





    <!-- Pending Requests Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail topup</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area" style="overflow: auto;">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul Transaksi</th>
                                <th>Nominal</th>

                                <th>Tanggal</th>

                            </tr>
                        </thead>

                        <tbody>
                            @forelse($transaction as $t)
                            <tr>
                                <td>{{$t->deskripsi}}</td>
                                <td>{{$t->nominal}}</td>
                                <td>{{$t->created_at}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100" class="text-center">Data Kosong</td>

                            </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection