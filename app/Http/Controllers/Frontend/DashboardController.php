<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function  index()
    {
        $ownerId = Auth::user()->id;
        $messages = Message::with(['sender', 'property'])
            ->where('receiver_id', $ownerId)->count();
        $propertAddeddCount = Property::where('user_id', Auth::user()->id)->count();
        return view('frontend.user.dashboard', compact(['propertAddeddCount', 'messages']));
    }

    function editProfile()
    {
        return view('frontend.user.profile');
    }
}
