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
     * @author AutiCodes
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
     * @author AutiCodes 
     * @return View
     */
    public function create()
    {
        return view('users::pages.add_user');
    }

    /**
     * Store a newly created user in storage.
     * 
     * @author AutiCodes
     * @param Request $request
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
     * @author AutiCodes
     * @param int $id
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
     * @author AutiCodes
     * @param Request $request
     * @param int $id the user id
     * 
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect(route('users.index'))->with('error', 'Gebruiker niet gevonden!');
        }

        $validated = $request->validate([
            'name' => ['required', 'max:30'],
            'username' => ['required', 'string', 'max:20'],
            'password' => ['nullable'],
            'password2' => ['nullable'],
        ]);

        // Update name and username no mather what
        $user->update([
            'name' => $validated['name'],
            'username' => $validated['username'],
        ]);

        if ($validated['password'] != NULL && $validated['password2'] != NULL) {
            if ($validated['password2'] != $validated['password']) {
                return redirect(route('users.edit', $user->id))->with('error', 'Je wachtwoord was niet gelijk aan elkaar');
            }

            $user->update([
                'password' => Hash::make($validated['password']),
            ]);

            return redirect(route('users.index'))->with('success', 'Profiel geupdated!');
        }

        return redirect(route('users.index'))->with('success', 'Profiel geupdated!');
    }

    /**
     * Remove the specified user from storage.
     * 
     * @author AutiCodes
     * @param int $id the user id
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
