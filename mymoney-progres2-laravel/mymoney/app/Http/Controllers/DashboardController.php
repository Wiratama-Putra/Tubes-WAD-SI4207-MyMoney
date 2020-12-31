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
    public function __construct()
    {
        $this->middleware(['auth','is_user']);
    }

    public function index()
    {
        return view('pages.dashboard', [
            'user' => Auth::user(),
            'transaction' => Transaction::where('user_id', Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    ->limit(7)
                    ->get(),
            'catatan' => Note::where('user_id', Auth::user()->id)
                    ->where('is_finished', 0)
                    ->get(),
        ]);
    }

    public function topup()
    {
        return view('pages.topup');
    }

    public function topupStore(Request $request)
    {
        User::where('id', Auth::user()->id)
            ->update([
                'balance' => Auth::user()->balance + (int)$request->nominal,
                'point' => Auth::user()->point + 10
            ]);
        Transaction::create([
            'deskripsi' => 'Topup',
            'nominal' => (int)$request->nominal,
            'user_id' => Auth::user()->id,
            'inout' => 'in'
        ]);
        return redirect('dashboard')->with('status', 'Top Up berhasil');
    }

    public function transfer()
    {
        return view('pages.transfer');
    }

    public function transferStore(Request $request)
    {
        $request->validate([
            'nominal' => 'integer|max:' . Auth::user()->balance
        ]);
        
        if ( Auth::user()->spending_target  <  (Auth::user()->spending + (int)$request->nominal)) {
            return redirect()
                ->route('dashboard.saldo.transfer')
                ->with('message','Gagal!! Anda melebihi batas target pengeluaran. Silahkan atur target pengeluaran anda di Menu "Akun Saya"');
            exit;
        }

        Transaction::create([
            'deskripsi' => 'Transfer-' . $request->bank . '-' . $request->rekening,
            'nominal' => (int)$request->nominal,
            'inout' => 'out',
            'user_id' => Auth::user()->id
        ]);

        if (Auth::user()->saving_before_trans) {
            User::where('id', Auth::user()->id)->update([
                'balance' => Auth::user()->balance - (int)$request->nominal - (int)$request->saving,
                'point' => Auth::user()->point + 10,
                'spending' => Auth::user()->spending + (int)$request->nominal,
                'saving_balance' => Auth::user()->saving_balance + (int)$request->saving
            ]);
            Transaction::create([
                'deskripsi' => 'Nabung',
                'nominal' => (int)$request->saving,
                'inout' => 'in',
                'user_id' => Auth::user()->id
            ]);
        } else {
            User::where('id', Auth::user()->id)->update([
                'balance' => Auth::user()->balance - (int)$request->nominal,
                'point' => Auth::user()->point + 10,
                'spending' => Auth::user()->spending + (int)$request->nominal
            ]);
        }
        return redirect('dashboard')
            ->with('status', 'Transfer berhasil');
    }
    public function riwayat()
    {
        return view('pages.riwayat', [
            'user' => Auth::user(),
            'transaction' => Transaction::where('user_id', Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    ->get(),
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
