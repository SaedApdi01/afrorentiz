<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('frontend.admin.user-lists', compact('users'));
    }
}
