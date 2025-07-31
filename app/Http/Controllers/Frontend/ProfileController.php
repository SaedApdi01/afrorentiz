<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use League\Flysystem\UnableToDeleteFile;

class ProfileController extends Controller
{
    use FileUpload;

    function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'whatsapp' => 'required|string|max:20',
            'phone' => 'required|string|max:20|',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'document' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $user = User::findOrFail(Auth::user()->id);




        if ($user->image) {
            if ($request->hasFile('image')) {
                $this->deleteFile($user->image);

                $user->image = $this->uploadUserImage($request->file('image'));
            }
        } else {
            if ($request->hasFile('image')) {
                $user->image = $this->uploadUserImage($request->file('image'));
            }
        }


        if ($user->document) {
            if ($request->hasFile('document')) {
                $this->deleteFile($user->document);

                $user->document = $this->uploadUserImage($request->file('document'));
            }
        } else {
            if ($request->hasFile('document')) {

                $user->document = $this->uploadUserImage($request->file('document'));
            }
        }



        $user->name = $request->name;
        $user->email = $request->email;
        $user->whatsapp = $request->whatsapp;
        $user->phone = $request->phone;
        $user->save();

        flash()->success('Profile updated successfully!');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string',
        ]);

        $user = Auth::user();

        // Verify current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password updated successfully');
    }
}
