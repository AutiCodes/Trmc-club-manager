<?php

namespace Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Settings\Models\Setting;
use Log;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @author AutiCodes
     */
    public function index()
    {
        try {
            $allSettings = Setting::all();

            return view('settings::pages.index', compact('allSettings'));
        } catch (Exception $e) {
            Log::channel('app_errors')->error('Error in getting the settings page: ' . $e);
            return redirect('/admin')->with('error', 'Er ging iets mis! Foutcode: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     * TODO: fix loop instead if statements
     * 
     * @author AutiCodes
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            // Test setting
            if ($request->has('test_setting')) {
                Setting::updateValue('test_setting', 1);
            } else {
                Setting::updateValue('test_setting', 0);
            }

            // Security tab
            if ($request->has('fail2ban')) {
                Setting::updateValue('fail2ban', 1);
            } else {
                Setting::updateValue('fail2ban', 0);
            }

            // Automations tab
            if ($request->has('auto_flight_report_on_mail')) {
                Setting::updateValue('auto_flight_report_on_mail', 1);
            } else {
                Setting::updateValue('auto_flight_report_on_mail', 0);
            }

            return redirect()->back()->with('success', 'Instellingen zijn opgeslagen!');
        } catch (Exception $e) {
            Log::channel('app_errors')-error('Error storing settings: ' . $e);
            return redirect()->back()->with('error', 'Er ging iets mis! Foutcode: ' . $e->getMessage());
        }
    }
}
