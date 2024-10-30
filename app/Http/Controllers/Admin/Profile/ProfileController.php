<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
        /**
         * Display the admin's profile form.
         */
        public function edit(Request $request): View
        {
           
            $admin = Auth::guard('admin')->user();
    
            return view('admin.profile.edit', [
                'admin' => $admin,
            ]);
        }
    
        /**
         * Update the admin's profile information.
         */
        public function update(Request $request)
{
    if (!Auth::guard('admin')->check()) {
        return redirect()->route('admin.login'); 
    }
    
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    // Get the authenticated admin
    $admin = Auth::guard('admin')->user();

    // Update the admin's information
    $admin->name = $request->input('name');
    $admin->email = $request->input('email');
    
    // Check if email has changed to nullify verification timestamp
    if ($admin->isDirty('email')) {
        $admin->email_verified_at = null;
    }
    $admin->save();

    // Redirect back to the edit page with a success message
    return redirect()->route('admin.profile.update')->with('status', 'admin-profile-updated');
}

 /**
     * Update the admin's password.
     */
    public function updatePassword(Request $request)
    {
        // Ensure the admin is authenticated
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login'); 
        }

        // Validate the input
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|confirmed|min:3', 
        ]);

        // Get the authenticated admin
        $admin = Auth::guard('admin')->user();

        // Check if the current password is correct
        if (!Hash::check($request->input('current_password'), $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        // Update the admin's password
        $admin->password = Hash::make($request->input('password'));
        $admin->save();

        // Redirect back with a success message
        return redirect()->route('admin.profile.edit')->with('status', 'password-updated');
    }

    
    
}