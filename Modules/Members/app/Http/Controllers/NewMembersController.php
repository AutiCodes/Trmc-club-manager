<?php

namespace Modules\Members\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Members\Models\NewMember;
use Log;

class NewMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('members::pages.new_member_index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members::pages.new_members_form');
        
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Request $request
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'firstname' => ['required','string','max:255'],
            'lastname' => ['required','string','max:255'],
            'address' => ['required','string','max:255'],
            'city' => ['required','string','max:255'],
            'postcode' => ['required','string','max:255'],
            'email' => ['required','string', 'email','max:255'],
            'phone' => ['required','string','max:255'],
            'birthdate' => ['required', 'date'],
            'nationality' => ['required','string','max:255'],
            'glider_brevet_a' => ['nullable'],
            'motor_brevet' => ['nullable'],
            'heli_brevet' => ['nullable'],
            'drone_a1_a3' => ['nullable'],
            'drone_a2' => ['nullable'],
            'rdw_number' => ['nullable'],
            'if_yes_other_club' => ['nullable'],
            'if_yes_knvvl' => ['nullable'],
            'wanna_be_member_at' => ['required', 'date'],
        ]);

        $newMember = NewMember::create([
            'name' => $validated['firstname']. ' ' . $validated['lastname'],
            'birthdate' => $validated['birthdate'],
            'address' => $validated['address'],
            'postcode'=> $validated['postcode'],
            'city' => $validated['city'],
            'phonenumber' => $validated['phone'],
            'nationality' => $validated['nationality'],
            'has_brevet_glider' => $validated['glider_brevet_a'] ?? 0,
            'has_brevet_motor' => $validated['motor_brevet'] ?? 0,
            'has_brevet_helicopter' => $validated['heli_brevet'] ?? 0,
            'has_drone_a1_a3' => $validated['drone_a1_a3'] ?? 0,
            'has_drone_a2' => $validated['drone_a2'] ?? 0,
            'rdw_reg_number' => $validated['rdw_number'] ?? 0,
            'member_of_another_rc_club' => $validated['if_yes_other_club'] ?? 0,
            'want_be_member_at' => $validated['wanna_be_member_at'],
        ]);
    


        return redirect()->back()->with('success', 'Je lidmaatschapverzoek is ingediend!');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('members::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('members::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
