<?php

namespace Modules\Members\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Members\Models\Member;
use Carbon\Carbon;
use Modules\Members\Enums\ClubStatus;
use Log;
use Modules\Members\Models\UserSync;
use App\Mail\MembersContact;
use Illuminate\Support\Facades\Mail;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return View
     */
    public function index()    
    {
        $members = Member::orderBy('name', 'asc')
                    ->where('club_status', '!=', ClubStatus::REMOVED_MEMBER->value) // If member is removed, don't show him
                    ->get();

        $AllMembers = Member::where('club_status', '!=', ClubStatus::REMOVED_MEMBER->value)->count();
        $totalAspirantMember = Member::where('club_status', '=', ClubStatus::ASPIRANT_MEMBER->value)->count();
        $totalNormalMembers = Member::where('club_status', '=', ClubStatus::MEMBER->value)->count();
        $totalManagement = Member::where('club_status', '=', ClubStatus::MANAGEMENT->value)->count();
        $totalDonators = Member::where('club_status', '=', ClubStatus::DONOR->value)->count();

        return view('members::pages.index', compact('members', 'AllMembers', 'totalAspirantMember', 'totalNormalMembers', 'totalManagement', 'totalDonators'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return View
     */
    public function create()
    {
        return view('members::pages.create_member');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:40'],
            'birthdate' => ['required', 'date'],
            'address' => ['required', 'string', 'max:100'],
            'postcode' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:15'],
            'rdw_number' => ['nullable'],
            'knvvl' => ['nullable'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:Members'],
            'club_status' => ['required', 'integer', 'max:6'],
            'instruct' => ['required', 'integer', 'max:1'],
            'PlaneCertCheckbox' => ['nullable'],
            'HeliCertCheckbox' => ['nullable'],
            'gliderCertCheckbox' => ['nullable'],
            'honoraryMemberCheckbox' => ['nullable'], 
            'droneA1Checkbox' => ['nullable'],
            'droneA2Checkbox' => ['nullable'],
            'droneA3Checkbox' => ['nullable'],
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
            'has_plane_brevet' => $validated['PlaneCertCheckbox'] ?? 0,
            'has_helicopter_brevet' => $validated['HeliCertCheckbox'] ?? 0,	
            'has_glider_brevet' => $validated['gliderCertCheckbox'] ?? 0,
            'in_memoriam' => $validated['honoraryMemberCheckbox'] ?? 0,
            'has_drone_a1' => $validated['droneA1Checkbox'] ?? 0,
            'has_drone_a2' => $validated['droneA2Checkbox'] ?? 0,
            'has_drone_a3' => $validated['droneA3Checkbox'] ?? 0,
        ]);

        if (!$member) {
            return redirect(route('members.index'))->with('error', 'Er is iets misgegaan tijdens het toevoegen van het lid.');
        }

        $usernameWP = strtok($validated['name'], ' ');
        $userPasswordWP = bin2hex(random_bytes(10));

        UserSync::syncNewUser($usernameWP, $userPasswordWP, $validated['name'], $validated['email'], $validated['name']);
        
        Log::channel('user_activity')->info('Member '. $validated['name'] . 'has been added by '. auth()->user()->name);


        switch ($validated['club_status']) {
            case ClubStatus::ASPIRANT_MEMBER->value:
                $club_status = 'Aspirant lid';
                break;
            case ClubStatus::MEMBER->value:
                $club_status = 'lid';
                break;
            case ClubStatus::MANAGEMENT->value:
                $club_status = 'Bestuur';
                break;
            case ClubStatus::DONOR->value:
                $club_status = 'Donateur';
                break;
        }

        Mail::to($validated['email'])->send(new MembersContact($validated['name'], $club_status, $usernameWP, $userPasswordWP));

        return redirect(route('members.index'))->with('success', "Je bent toegevoegd! Je kunt je vlucht(en) nu aanmaken! Login gegevens voor WP: Gebruikersnaam: $usernameWP, wachtwoord: $userPasswordWP");
    }

    /**
     * Show the specified resource.
     * 
     * @param int $id the id of the member
     * @return View
     */
    public function show($id)
    {
        $member = Member::find($id);

        if (!$member) {
            return redirect(route('members.index'))->with('Lid niet gevonden!');
        }

        return view('members::pages.show_member', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id the id of the member
     * @return View
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);

        return view('members::pages.edit_member', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:40'],
            'birthdate' => ['required', 'date'],
            'address' => ['required', 'string', 'max:100'],
            'postcode' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:15'],
            'rdw_number' => ['nullable'],
            'knvvl' => ['nullable'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'club_status' => ['required', 'integer', 'max:6'],
            'instruct' => ['required', 'integer', 'max:1'],
            'PlaneCertCheckbox' => ['nullable'],
            'HeliCertCheckbox' => ['nullable'],
            'gliderCertCheckbox' => ['nullable'],
            'honoraryMemberCheckbox' => ['nullable'],
            'droneA1Checkbox' => ['nullable'],
            'droneA2Checkbox' => ['nullable'],
            'droneA3Checkbox' => ['nullable'],            
        ]);

        $memberOldData = Member::find($id);

        $member = Member::find($id)->update([
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
            'has_plane_brevet' => $validated['PlaneCertCheckbox'] ?? 0,
            'has_helicopter_brevet' => $validated['HeliCertCheckbox'] ?? 0,	
            'has_glider_brevet' => $validated['gliderCertCheckbox'] ?? 0,
            'in_memoriam' => $validated['honoraryMemberCheckbox'] ?? 0,      
            'has_drone_a1' => $validated['droneA1Checkbox'] ?? 0,
            'has_drone_a2' => $validated['droneA2Checkbox'] ?? 0,
            'has_drone_a3' => $validated['droneA3Checkbox'] ?? 0,      
        ]);

        if (!$member) {
            return redirect(route('members.index'))->with('error', 'Er is iets misgegaan tijdens het bewerken van het lid.');
        }

        // Update user in Wordpress
        UserSync::updateUser($memberOldData['name'], $validated['name'], $validated['email'], $validated['name']);
        
        Log::channel('user_activity')->info('Member '. $validated['name'] . ' has been updated by '. auth()->user()->name);

        return redirect(route('members.index'))->with('success', 'Het lid is bewerkt!');        
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id the id of the member
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        // Find member by $id
        $member = Member::findOrFail($id);

        // Put Member om non active to hide it from the member list
        $member->update([
            'club_status' => ClubStatus::REMOVED_MEMBER->value,
        ]);

        UserSync::deleteUser($member->name);

        Log::channel('user_activity')->warning('Member '. $member->name . ' has been removed by '. auth()->user()->name);

        return redirect(route('members.index'))->with('success', 'Het lid is verwijderd! Hij staat nog in de database maar is op non actief gezet. Ook is hij verwijderd uit de database van WP.');
    }

    /**
     * Export members to PDF
     * 
     * @return PDF
    */
    public function exportPDF()
    {
        $members = Member::where('club_status', '!=', ClubStatus::REMOVED_MEMBER->value)->get();
        $pdf = PDF::loadView('members::pages.export_members_pdf.blade.php', compact('members'));

        return $pdf->stream('vluchten.pdf');
    }
}