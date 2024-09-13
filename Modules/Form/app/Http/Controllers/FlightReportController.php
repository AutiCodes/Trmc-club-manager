<?php

namespace Modules\Form\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Form\Models\Form;
use Log;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class FlightReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manualFlightReports = scandir(public_path() . '/pdf/flight_reports_manual/');
        $automaticFlightReports = scandir(public_path() . '/pdf/flight_reports/');

        return view('form::pages.flight_reports', compact('manualFlightReports', 'automaticFlightReports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'startDate' => ['date', 'required'],
                'endDate' => ['date', 'required'],
            ]);

            $flights = Form::orderBy('id', 'desc')
                                ->whereBetween('created_at',
                                [
                                    $validated['startDate'],
                                    $validated['endDate'],
                                ])
                                ->with('member')
                                ->with('submittedModels')
                                ->get();

            PDF::loadView('admin::pdf', [
                            'flights' => $flights,
                            'currentUser' => Auth::user()->name,
                            'flightsDate' => $validated['startDate'] . " tot " . $validated['endDate'],
                        ])
                        ->save('flight_reports_manual/vluchten-van-' . $validated['startDate'] . '-tot-' . $validated['endDate'] . '.pdf', 'pdf');

            return redirect()->back()->with('success', 'Vlucht rapportage is opgeslagen! Download/bekijk hem hier rechts.');
        } catch (Exception $e) {
            Log::channel('app_errors')->error('Error with storing manual flight report: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Er ging iets mis! ' . $e->getMessage());
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('form::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('form::edit');
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
