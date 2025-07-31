<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'property_id' => 'required|exists:properties,id',
            'message' => 'required|string|max:2000',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'property_id' => $request->property_id,
            'message' => $request->message,
        ]);

        // You can add notification or event here if needed

        flash()->success('Your message has been sent! The owner will contact you soon.');
        return redirect()->back();
    }

    public function ownerMessages()
    {
        $ownerId = Auth::user()->id;

        // Get messages received by the owner, eager load sender and property
        $messages = Message::with(['sender', 'property'])
            ->where('receiver_id', $ownerId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.user.messages', compact('messages'));
    }

    public function destroy($id)
    {
        $message = \App\Models\Message::where('receiver_id', auth()->id())->findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
}
