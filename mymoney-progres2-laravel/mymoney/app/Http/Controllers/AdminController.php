<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','is_admin']);
    }

    public function index()
    {
        $users = User::count();
        $widget = [
            'users' => $users,
            //...
        ];
        return view('admin.index', compact('widget'));
    }
    
}
