<?php

namespace Modules\Logs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\GetLogs;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @author KelvinCodes
     * @return View
     */
    public function index()
    {
        return view('logs::pages.index', 
        [
            'laravelLogs' => GetLogs::laravel(),
            'userActivityLogs' => GetLogs::userActivity(),
            'memberActivityLogs' => GetLogs::memberActivity(),
            'accessLogs' => GetLogs::access(),
            'Fail2Ban' => GetLogs::fail2ban(),
            'appErrorLogs' => GetLogs::app(),
            'memberContact' => GetLogs::member_contact(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('logs::create');
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
        return view('logs::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('logs::edit');
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
