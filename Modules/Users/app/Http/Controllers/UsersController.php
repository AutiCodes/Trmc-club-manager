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
     * @return View
     */
    public function index()
    {
        return view('users::index');
    }

    /**
     * Show the form for creating a new user
     * @return View
     */
    public function create()
    {
        return view('users::add_user');
    }

    /**
     * Store a newly created user in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required','string','max:40', 'unique:Users'],
            'username' => ['required','string','max:40', 'unique:Users'],
            'password' => ['required','string','max:40'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        if (!$user) {
            return redirect(route('admin.index'))->with('error', 'Er is iets fout gegaan!');
        } 

        return redirect(route('admin.index'))->with('success', 'Gebruiker toegevoegd!');
    }

    /**
     * Show the specified user.
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        return view('users::show');
    }

    /**
     * Show the form for editing the specified user.
     * @param int $id
     * @return view
     */
    public function edit($id)
    {
        return view('users::edit');
    }

    /**
     * Update the specified user in storage.
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified user from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //
    }
}
