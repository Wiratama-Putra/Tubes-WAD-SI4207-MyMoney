<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','is_admin']);
    }

    public function index()
    {
        $uc = User::count();
        $widget = [
            'usrcount' => $uc,
        ];
        return view('admin.index', compact('widget'));
    }
    
    public function voucher()
    {
        return view('admin.voucher', [
            'voucher' => Voucher::all(),
        ]);
    }

    public function tambahVchr()
    {
        return view('admin.voucherCreate');
    }

    public function editVchr(Voucher $voucher)
    {
        return view('admin.voucherEdit', compact('voucher'));
    }

    public function insertVchr(Request $request)
    {
        Voucher::create([
            'name' => $request->name,
            'point' => $request->point,
        ]);
        return redirect('/admin/voucher');
    }

    public function updateVchr(Request $request)
    {
        Voucher::findOrFail($request->id)->update($request->all());
        return redirect('/admin/voucher');
    }

    public function delVchr(Voucher $voucher)
    {
        Voucher::where('id', $voucher->id)->delete();
        return back();
    }

    public function users()
    {
        return view('admin.users', [
            'users' => User::where('level', 'user')->get(),
        ]);
    }

    public function resetPswdUser(User $user)
    {
        User::where('id', $user->id)->update([
            'password' => Hash::make("12345678")
        ]);
        return back()->with('pesan', 'Password Berhasil direset ke 12345678');;
    }

    public function statusChngUser(User $user)
    {
        User::where('id', $user->id)->update([
            'is_active' => !$user->is_active
        ]);
        return back()->with('pesan', 'Status akun berhasil diubah');
    }
}
