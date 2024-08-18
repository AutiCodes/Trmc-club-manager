<?php

namespace Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Settings\Models\Setting;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('settings::pages.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            if ($request->has('debug')) {
                $setting_name = 'debug';
            }
            
            $validated = $request->validate([
                $setting_name => ['required', 'integer', 'max:20'],
            ]);

            Setting::updateSetting($validated['setting_name'], $validated['setting_value']);

            return redirect()->back()->with('success', 'Instelling is geupdated!');
        } catch (Exception $e) {
            return reditect()->back()->with('error', 'Er ging iets fout! Foutcode: ' . $e->getMessage());
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('settings::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('settings::edit');
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

    public function updateSetting(Request $request) 
    {

    }
}
