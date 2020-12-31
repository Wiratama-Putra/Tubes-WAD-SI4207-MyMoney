@extends('layouts.template')
@section('title', 'Catatan')
@section('content')
<a class="btn btn-primary mx-2 my-2" href="{{ route('dashboard.catatan.add') }}">Tambah Catatan</a>
<div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($catatan as $c)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td style="<?= $c->is_finished == 1 ? 'text-decoration:line-through' : '' ?>">{{$c->judul}}</td>
                    <td>{{$c->catatan}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{url('/dashboard/catatan',$c->id)}}" class="mx-1 btn btn-warning">Edit</a>
                            <form action="{{url('/dashboard/catatan/finish',$c->id)}}" method="post">
                                @csrf

                                <button type="submit" class="btn btn-success">Finished</button>
                            </form>
                        </div>
                    </td>


                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection