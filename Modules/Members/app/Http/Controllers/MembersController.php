<?php

namespace Modules\Members\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Members\Models\Member;

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
            'rdw_number' => ['required', 'integer', 'unique:Members', 'digits:10'],
        ]);

        $member = Member::create([
            'name' => $validated['name'],
            'rdw_number' => $validated['rdw_number'],
        ]);

        return redirect('aanmeld-formulier')->with('success', 'Je bent toegevoegd! Je kunt je vlucht(en) nu aanmaken!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        return view('members::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        return view('members::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
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