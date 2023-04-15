<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index(){
        $users = User::where('role','!=',config('constant.admin'))->paginate(5);
        return view('admin.users.index',compact('users'));
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
}
