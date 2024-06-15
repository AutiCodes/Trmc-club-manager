<?php

namespace Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Users\Entities\User;
use Auth;
use Session;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function loginPage()
    {
        return view('users::login');
    }

    /** 
     * Checks for a valid login from the login form
     * If so, show admin dashboard
     * If not redirect back to login page
     * @param Request $request
     * @return redirect
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($validated)) {
            return redirect('/authenticatie-login')->with('error', 'Login is verkeerd!');
        }

        return redirect(route('admin.index'));
    }

    /**
     * Logs out the user
     * Redirects to the login page
     * @return redirect
     */
    public function logout()
    {
        //
    }
}
