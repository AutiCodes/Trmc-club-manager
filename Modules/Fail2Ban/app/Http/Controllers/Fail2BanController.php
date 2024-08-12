<?php

namespace Modules\Fail2Ban\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\Fail2BanHelper;
use Modules\Fail2Ban\Models\Fail2Ban;

class Fail2BanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bans = Fail2Ban::where('failed_login_count', '>=', '4')->get();

        return view('fail2ban::pages.index', compact('bans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fail2ban::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('fail2ban::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('fail2ban::edit');
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
     * 
     * @author AutiCodes
     * @param string ip
     * @return RedirectResponse
     */
    public function destroy($ip): RedirectResponse
    {
        $bannedIP = Fail2Ban::where('ip', "$ip")->first();

        $bannedIP->delete();

        return redirect()->back()->with('success', 'Ban is verwijderd!');
    }


}
