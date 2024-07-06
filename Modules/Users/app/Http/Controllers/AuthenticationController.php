<?php

namespace Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Users\Entities\User;
use Auth;
use Session;
use Log;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @author KelvinCodes
     * @return View
     */
    public function loginPage(Request $request)
    {        
        return view('users::login');
    }

    /** 
     * Checks for a valid login from the login form
     * If so, show admin dashboard
     * If not redirect back to login page
     * 
     * @param Request $request
     * @author KelvinCodes
     * @return redirect
     */
    public function login(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // If authentication fails, redirect back to login page
        if (!Auth::attempt($validated)) {
            Log::channel('access')->error('ip ' . $request->ip().' tried to login with wrong credentials. Username used: ' . $validated['username']);

            return redirect('/authenticatie-login')->with('error', 'Login is verkeerd!');
        }

        Log::channel('access')->info('User ' . $validated['username'].' has logged in on ip '. $request->ip());

        return redirect(route('admin.index'));
    }

    /**
     * Logs out the user and redirects to login page
     * 
     * @author KelvinCodes
     * @return redirect
     */
    public function logout(): RedirectResponse
    {
        Log::channel('access')->info('User ' . Auth()->user()->username.' has logged out!');

        Auth::logout();
        Session::flush();

        return redirect('/authenticatie-login');
    }
}
