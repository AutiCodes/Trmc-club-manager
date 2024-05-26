<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Form\Models\Form;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get form submissions
        $formSubmissions = Form::orderBy('id', 'desc')->get();
        $FlightsTotal = Form::count();
        $FlightsThisWeek = Form::whereDate('date_time', '>=',  now()->subWeek())->count();
        $FlightsToday = Form::whereDate('date_time', '>=',  now()->subDay())->count();

        return view('admin::index', [
            'FlightsTotal' => $FlightsTotal,
            'formSubmissions' => $formSubmissions,
            'FlightsThisWeek' => $FlightsThisWeek,
            'FlightsToday' => $FlightsToday,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::create');
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
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin::edit');
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
