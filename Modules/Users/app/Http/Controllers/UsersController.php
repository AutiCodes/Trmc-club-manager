<?php

namespace Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Hash;
use Modules\Users\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the users.
     * 
     * @author KelvinCodes
     * @return View
     */
    public function index()
    {
        $users = User::all()->sortBy('name');

        return view('users::pages.index', compact('users'));
    }

    /**
     * Show the form for creating a new user
     * 
     * @return View
     */
    public function create()
    {
        return view('users::pages.add_user');
    }

    /**
     * Store a newly created user in storage.
     * 
     * @param Request $request
     * @author KelvinCodes
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required','string','max:40'],
            'username' => ['required','string','max:40', 'unique:Users'],
            'password' => ['required','string','max:40'],
        ]);

        try { 
            User::create([
                'name' => $validated['name'],
                'username' => $validated['username'],
                'password' => Hash::make($validated['password']),
            ]);    
        } 
        catch (\Exception $exception) {
            return redirect(route('users.index'))->with('error', 'Er is iets fout gegaan! Foutmelding: ' . $exception->getMessage());
        }

        return redirect(route('users.index'))->with('success', 'Gebruiker toegevoegd!');
    }

    /**
     * Show the specified user.
     * 
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        return view('users::show');
    }

    /**
     * Show the form for editing the specified user.
     * 
     * @param int $id
     * @author KelvinCodes
     * @return view
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect(route('users.index'))->with('error', 'Gebruiker niet gevonden!');
        }

        return view('users::pages.edit_profile', compact('user'));
    }

    /**
     * Update the specified user in storage.
     * 
     * @param Request $request
     * @param int $id the user id
     * @author KelvinCodes
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $user = User::find($id);

        if (!$user) {
            return redirect(route('users.index'))->with('error', 'Gebruiker niet gevonden!');
        }

        $validated = $request->validate([
            'password' => ['required','string','max:40'],
        ]);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect(route('users.index'))->with('success', 'Gebruiker gewijzigd!');
    }

    /**
     * Remove the specified user from storage.
     * 
     * @param int $id the user id
     * @author KelvinCodes
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $user = User::find($id);

        if (!$user) {
            return redirect(route('users.index'))->with('error', 'Gebruiker niet gevonden!');
        }

        $user->delete();

        return redirect(route('users.index'))->with('success', 'Gebruiker verwijderd!');
    }
}
