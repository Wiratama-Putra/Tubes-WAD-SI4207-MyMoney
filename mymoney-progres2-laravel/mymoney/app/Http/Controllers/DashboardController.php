<?php

namespace App\Http\Controllers;

use App\Http\Requests\belanjaRequest;
use App\Models\Note;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class DashboardController extends Controller
{
    public function index()
    {

        return view('pages.dashboard', [
            'user' => Auth::user(),
            'transaction' => Transaction::all(),
            'catatan' => Note::where('is_finished', 0)->get()
        ]);
    }
    public function topup()
    {
        return view('pages.topup');
    }
    public function topupStore(Request $request)
    {
        $balance = (User::findOrFail(Auth::user()->id)->only('balance'))['balance']; 
        $point = (User::findOrFail(Auth::user()->id)->only('point'))['point'];

        User::where('id', Auth::user()->id)->update([
            'balance' => $balance + (int)$request->nominal,
            'point' => $point + 10
        ]);
        Transaction::create([
            'deskripsi' => 'topup',
            'nominal' => (int)$request->nominal,
            'user_id' => Auth::user()->id
        ]);
        return redirect('dashboard')->with('status', 'Top Up berhasil');
    }
    public function transfer()
    {
        return view('pages.transfer');
    }
    public function transferStore(Request $request)
    {

        $balance = (User::findOrFail(Auth::user()->id)->only('balance'))['balance'];
        $point = (User::findOrFail(Auth::user()->id)->only('point'))['point'];
        $request->validate([
            'nominal' => 'integer|max:' . $balance
        ]);


        User::where('id', Auth::user()->id)->update([
            'balance' => $balance - (int)$request->nominal,
            'point' => $point + 10
        ]);
        Transaction::create([
            'deskripsi' => 'Transfer-' . $request->bank . '-' . $request->rekening,
            'nominal' => (int)$request->nominal,
            'user_id' => Auth::user()->id
        ]);
        return redirect('dashboard')->with('status', 'Transfer berhasil');
    }
    public function riwayat()
    {
        return view('pages.riwayat', [
            'user' => Auth::user(),
            'transaction' => Transaction::all()
        ]);
    }
    // Catatan
    public function catatan()
    {
        return view('pages.catatan', ['catatan' => Note::all()]);
    }
    public function tambah()
    {
        return view('pages.catatanCreate');
    }
    public function catatanEdit(Note $note)
    {

        return view('pages.catatanEdit', compact('note'));
    }
    public function tambahPost(Request $request)
    {
        Note::create($request->all());
        return redirect('/dashboard/catatan');
    }


    public function updatePost(Request $request)
    {

        Note::findOrFail($request->id)->update($request->all());
        return redirect('/dashboard/catatan');
    }
    public function finishedPost(Note $note)
    {

        Note::where('id', $note->id)->update([
            'is_finished' => 1
        ]);
        return redirect('/dashboard/catatan');
    }
    public function pulsa()
    {
        return view('pages.pulsa');
    }
    public function listrik()
    {
        return view('pages.listrik');
    }
    public function voucher()
    {
        return view('pages.voucher', [
            'user' => Auth::user()
        ]);
    }
    public function user()
    {
        return view('pages.user', [
            'user' => Auth::user()
        ]);
    }

    public function belanjaApi(belanjaRequest $request)
    {
        $balance = (User::findOrFail($request->id)->only('balance'))['balance'];
        $point = (User::findOrFail($request->id)->only('point'))['point'];



        User::where('id', $request->id)->update([
            'balance' => $balance - (int)$request->nominal,
            'point' => $point + 10
        ]);
        Transaction::create([
            'deskripsi' => 'Belanja-' . $request->bank . '-' . $request->vendor,
            'nominal' => (int)$request->nominal,
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
        // return response()->json([
        //     'data' => 'berhasil',
        //     'status' => [
        //         'judul' => $request->judul,
        //         'harga' => $request->harga,
        //     ]
        // ]);
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
