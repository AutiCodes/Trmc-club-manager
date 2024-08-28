<?php

namespace Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Users\Models\User;
use Modules\Users\Models\PasswordReset;
use Str;
use App\Mail\AcceptedMember;
use App\Mail\PasswordResetMail;

class PasswordResetController extends Controller
{
    /**
     * Shows the password reset page
     * 
     * @author AutiCodes
     * @return View
     */
    public function showPasswordReset()
    {
        return view('users::reset_password');
    }

    public function HandlePasswordReset(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => ['required', 'email'],
            ]);
            
            $userToReset = User::find($validated);
            if (!$userToReset) {
                return redirect()->back()->with('error', 'Er ging iets mis!');
            }

            $token = Str::random(20);
            PasswordReset::create([
                'email' => $validated['email'],
                'token' => $token
            ]);

            Mail::to($validated['email'])->send(new PasswordResetMail($userToReset->name, $token));

            return redirect()->back()->with('success', 'Bekijk je mail om je wachtwoord te resetten!');
        } catch (Exception $e) {
            // TODO: Add logging
            return redirect()->back()->with('error', 'Er ging iets mis! Fout: ' . $e->getMessage());
        }
    }
}
