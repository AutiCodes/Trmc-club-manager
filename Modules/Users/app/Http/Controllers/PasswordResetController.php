<?php

namespace Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Users\Models;

class PasswordResetController extends Controller
{
    /**
     * Displays the password request reset page
     * 
     * @author AutiCodes
     * @return view
     */
    public function index()
    {
        return view('users::pages.password_reset');
    }

    /**
     * Handles the POST of the password reset page
     * 
     * @author AutiCodes
     * @param Request $request
     */
    public function handlePasswordResetRequest(Request $request)
    {
        $validated = $request->validate([
            'username' => ['string', 'max:15'],
        ]);

        $user = find($validated['username']);

        // Make unique password reset token
        $token = rand(30, 30);

        return $token;
    }

    /**
     * Displays the page to change the password
     * 
     * @author AutiCodes
     * @return view
     */
    public function newPasswordIndex()
    {
        return view('users::pages.new_password');
    }

    /**
     * Handles the POST of the change password page
     * 
     * @author AutiCodes
     * @param Request $request
     * @param string $token
     */
    public function handleNewPasswordRequest(Request $request, $token)
    {
        //
    }
}
