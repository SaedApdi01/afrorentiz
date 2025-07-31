<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        $properties = Property::count();
        $users = User::count();
        $messages = Message::count();
        return view('frontend.admin.dashboard', compact(['messages', 'users', 'properties']));
    }
}
