<?php

namespace Modules\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Helpers\GetGithubStats;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @author KelvinCodes
     * @return View
     */
    public function index()
    {
        $prResults = GetGithubStats::get('https://api.github.com/repos/kelvincodesstuff/trmc-club-manager/pulls?state=all');
        $version = GetGithubStats::get('https://api.github.com/repos/kelvincodesstuff/trmc-club-manager/releases/latest');
        
        return view('home::pages.index', compact('prResults', 'version'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return View
     */
    public function create()
    {
        return view('home::create');
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
     * 
     * @param int $id the id of the member
     * @return View
     */
    public function show($id)
    {
        return view('home::show');
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id the id of the member
     * @return View
     */
    public function edit($id)
    {
        return view('home::edit');
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param Request $request
     * @param int $id the id of the member
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id the id of the member
     */
    public function destroy($id)
    {
        //
    }
}
