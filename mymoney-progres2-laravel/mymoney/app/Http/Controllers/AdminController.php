<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','is_admin']);
    }

    public function index()
    {
        return view('admin.index', [
            'vc' => Voucher::count(),  // Select count(id) from voucher;
            'uc' => User::where('level', 'user')
                        ->count(),  // 
            'uactive' => User::where('level', 'user')
                        ->where('is_active', '1')->count(),
            'unactive' => User::where('level', 'user')
                        ->where('is_active', '0')->count(),
            'users' => User::where('level', 'user')
                        ->orderBy('created_at', 'desc')
                        ->limit(7)
                        ->get(),
        ]);
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
        $nmgambar = time().str_replace(' ', '', $request->gambar->getClientOriginalName());
        Voucher::create([
            'name' => $request->name,
            'point' => $request->point,
            'image' => $nmgambar,
        ]);
        $request->gambar->move(public_path().'/img', $nmgambar);
        return redirect('/admin/voucher')->with('pesan', 'Berhasil menambahkan voucher');
    }

    public function updateVchr(Request $request)
    {
        $oldimage = (Voucher::findOrFail($request->id)->only('image'))['image'];
        if ($request->gambar === null) {
            $nmgambar = $oldimage;
        } else {
            $nmgambar = time().str_replace(' ', '', $request->gambar->getClientOriginalName());
            $request->gambar->move(public_path().'/img', $nmgambar);        
            $image_path = public_path().'/img/'.$oldimage;
            if(file_exists($image_path)) {
                File::delete($image_path);
            }
        }
        Voucher::findOrFail($request->id)->update([
            'name' => $request->name,
            'point' => $request->point,
            'image' => $nmgambar,
        ]);
        return redirect('/admin/voucher')->with('pesan', 'Berhasil mengubah voucher');
    }

    public function delVchr(Voucher $voucher)
    {
        Voucher::where('id', $voucher->id)->delete();
        $image_path = public_path().'/img/'.$voucher->image;
            if(file_exists($image_path)) {
                File::delete($image_path);
            }
        return back()->with('pesan', 'Voucher Dihapus');
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
            'is_active' => !$user->is_active  // 1 atau 0  !1 = 0  !0 = 1
        ]);
        return back()->with('pesan', 'Status akun berhasil diubah');
    }
}
