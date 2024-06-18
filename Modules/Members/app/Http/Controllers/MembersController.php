<?php

namespace Modules\Members\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Members\Models\Member;
use Carbon\Carbon;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        $members = Member::orderBy('name', 'asc')->get();

        return view('members::pages.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        return view('members::pages.create_member');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:40', 'unique:Members'],
            'birthdate' => ['required', 'date'],
            'address' => ['required', 'string', 'max:100'],
            'postcode' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:15'],
            'rdw_number' => ['required', 'integer', 'unique:Members', 'digits:10'],
            'knvvl' => ['required', 'integer', 'unique:Members'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:Members'],
            'club_status' => ['required', 'integer', 'max:3'],
            'instruct' => ['required', 'integer', 'max:1'],
        ]);

        $member = Member::create([
            'name' => $validated['name'],
            'birthdate' => Carbon::parse($validated['birthdate'])->format('Y-m-d'),	
            'address' => $validated['address'],
            'postcode' => $validated['postcode'],
            'city' => $validated['city'],
            'phone' => $validated['phone'],
            'rdw_number' => $validated['rdw_number'],
            'KNVvl' => $validated['knvvl'],
            'email' => $validated['email'],
            'club_status' => $validated['club_status'],
            'instruct' => $validated['instruct'],
        ]);

        return redirect(route('members.index'))->with('success', 'Je bent toegevoegd! Je kunt je vlucht(en) nu aanmaken!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        return "boobs";
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);

        return view('members::pages.edit_member', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:40'],
            'birthdate' => ['required', 'date'],
            'address' => ['required', 'string', 'max:100'],
            'postcode' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:15'],
            'rdw_number' => ['required', 'integer', 'digits:10'],
            'knvvl' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'club_status' => ['required', 'integer', 'max:3'],
            'instruct' => ['required', 'integer', 'max:1'],
        ]);

        $member = Member::findOrFail($id)->update([
            'name' => $validated['name'],
            'birthdate' => Carbon::parse($validated['birthdate'])->format('Y-m-d'),	
            'address' => $validated['address'],
            'postcode' => $validated['postcode'],
            'city' => $validated['city'],
            'phone' => $validated['phone'],
            'rdw_number' => $validated['rdw_number'],
            'KNVvl' => $validated['knvvl'],
            'email' => $validated['email'],
            'club_status' => $validated['club_status'],
            'instruct' => $validated['instruct'],
        ]);

        return redirect(route('members.index'))->with('success', 'Het lid is bewerkt!');        
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     */
    public function destroy($id)
    {
        //
    }
}