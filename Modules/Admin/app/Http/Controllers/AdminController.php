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
use Modules\Members\Enums\ClubStatus;
use Illuminate\Support\Facades\Log;
use Modules\Form\Models\SubmittedModel;
Use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return View
     */
    public function index()
    {
        Log::channel('user_activity')->info('User ' . Auth::user()->name . ' has accessed admin dashboard');

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

        $allMembers = Member::orderBy('created_at', 'desc')
                                ->where('club_status', '!=', ClubStatus::REMOVED_MEMBER->value)
                                ->get();


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
     * 
     * @return View
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * 
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
        $flightSubmittion = Form::orderBy('id', 'desc')
                                ->with('member')
                                ->with('submittedModels')
                                ->get()
                                ->find($id);      
    
        return view('admin::pages.edit_flight', compact('flightSubmittion'));
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
        try {
            $submittedForm = Form::with('member')
                                    ->with('submittedModels')
                                    ->get()
                                    ->find($id);


            // Detach member from form-member pivot table
            $submittedForm->member()->detach($submittedForm->member[0]->id);
            
            // Detach submitted models from form 
            foreach ($submittedForm->submittedModels as $model) {
                $submittedForm->submittedModels()->detach($model->id);
                SubmittedModel::find($model->id)->delete();
            }

            // Doing an bye bye
            Form::find($id)->delete();

            return redirect()->back()->with('succes', 'Vlucht is verwijderd!');
        } catch (Exception $e) {
            // TODO: Add error logging
            return redirect->back()->with('error', 'Er ging iets mis! Foutcode: ' . $e->getMessage());
        }
    }

    /**
     * Generates a PDF with all flights from the database
     * and loads it in the browser
     * 
     * @return PDF
     */
    public function downloadFlightsGov()
    {
        Log::channel('user_activity')->info('User ' . Auth::user()->name . ' has exported all club flights to PDF');

        $flights = Form::orderBy('id', 'desc')
                                ->whereBetween('created_at',
                                [
                                    Carbon::now()->startOfMonth(), 
                                    Carbon::now()->endOfMonth()
                                ])
                                ->with('member')
                                ->with('submittedModels')
                                ->get();        
        
        $pdf = PDF::loadView('admin::pdf', [
            'flights' => $flights,
            'currentUser' => Auth::user()->name,
            'flightsDate' => Carbon::now()->startOfMonth()->format('d-m-Y') . " tot " . Carbon::now()->endOfMonth()->format('d-m-Y'),
        ]); 

        return $pdf->stream('vluchten.pdf');
    }
}
