<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Form\Models\Form;
use Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Modules\Members\Models\Member;
use Modules\Form\Models\SubmittedModels;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        $formSubmissions = Form::orderBy('id', 'desc')
                                ->with('member')
                                ->with('submittedModels')
                                ->get();

        $totalFlightCount = DB::table('model')
                                ->select(DB::raw('SUM(lipo_count) AS total_flights'))
                                ->first();

        $thisWeekFlightsCount = DB::table('model')
                                ->select(DB::raw('SUM(lipo_count) AS flightsThisWeek'))
                                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                ->first();

        $todayFlightCount = DB::table('model')
                                ->select(DB::raw('SUM(lipo_count) AS flightsToday'))
                                ->whereDate('created_at', Carbon::today())
                                ->first();

        $allMembers = Member::orderBy('created_at', 'desc')->get();

        return view('admin::pages.index', [
            'formSubmissions' => $formSubmissions,
            'totalFlights' => $totalFlightCount,
            'flightsThisWeek' => $thisWeekFlightsCount,
            'flightsToday' => $todayFlightCount,
            'members' => $allMembers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
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

    /**
     * Generates a PDF with all flights from the database
     * and loads it in the browser
     * @return PDF
     */
    public function downloadFlightsGov()
    {
        // TODO: Get current signed in user
        // Get data
        $flights = Form::orderBy('id', 'desc')
                                ->whereBetween('created_at', [
                                    Carbon::now()->startOfYear(),
                                    Carbon::now()->endOfYear()]
                                )
                                ->with('member')
                                ->with('submittedModels')
                                ->get();        
        
        $countTotalFlights = DB::table('model')
                                ->select(DB::raw('SUM(lipo_count) AS total_flights'))
                                ->first();
        
        //TODO fix getting current signed in user
        $pdf = PDF::loadView('admin::pdf', [
            'flights' => $flights,
            'currentUser' => 'Kelvin de Reus',
            'totalFlights' => $countTotalFlights
        ]); 

        return $pdf->stream('vluchten.pdf');
    }
}
