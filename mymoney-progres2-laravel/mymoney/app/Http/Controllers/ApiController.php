<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Http\Requests\belanjaRequest;

class ApiController extends Controller
{
    public function belanjaApi(belanjaRequest $request)
    {
        $balance = (User::findOrFail($request->id)->only('balance'))['balance'];
        $point = (User::findOrFail($request->id)->only('point'))['point'];

        User::where('id', $request->id)->update([
            'balance' => $balance - (int)$request->nominal,
            'point' => $point + 10
        ]);
        Transaction::create([
            'deskripsi' => 'BelanjaAPI-' . $request->bank . '-' . $request->vendor,
            'nominal' => (int)$request->nominal,
            'inout' => 'out',
            'point'=> '+ 10',
            'user_id' => $request->id
        ]);
        return response()->json([
            'status' => 'berhasil',
            'data_transaksi' => [
                'bank' => $request->bank,
                'nominal' => $request->nominal,
                'vendor' => $request->vendor
            ],
            'data_pengguna' => [
                'id' => $request->id,
                'nama' => User::findOrFail($request->id)->name,
                'saldo' => User::findOrFail($request->id)->balance,
                'poin' => User::findOrFail($request->id)->point,
            ]
        ]);
    }

    public function ceksaldoApi(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $user = User::findOrFail($request->id);
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'saldo' => $user->balance,
            'poin' => $user->point,
        ]);
    }
}
