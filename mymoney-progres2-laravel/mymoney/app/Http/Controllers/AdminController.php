<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;

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
}
