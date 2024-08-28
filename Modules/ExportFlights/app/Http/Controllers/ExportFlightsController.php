<?php

namespace Modules\ExportFlights\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Form\Models\Form;
use Barryvdh\DomPDF\Facade\Pdf;
use File;
use Illuminate\Support\Facades\DB;

class ExportFlightsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('exportflights::pages.index');
    }

    /**
     * Generates an PDF from the club flights from the manual option
     * 
     * @author AutiCodes
     */
    public function manualGenPDF(Request $request)
    {
        $validated = $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);

        $flights = Form::whereBetween('date_time', [$validated['start_date'] . ' 00:00:00', $validated['end_date'] . ' 23:59:59'])
                            ->with('member')
                            ->with('submittedModels')
                            ->get();


        $pdf = PDF::loadView('exportflights::flight_export_pdf', [
            'flights' => $flights,
            'start_date' => date_format(date_create($validated['start_date']), 'd-m-Y'), // format date from Y-m-d to d-m-Y
            'end_date' => date_format(date_create($validated['end_date']), 'd-m-Y'), // format date from Y-m-d to d-m-Y
        ]); 

        $pdf->save(public_path('flightExport-pdfs/' . date_format(date_create($validated['start_date']), 'd-m-Y') . '-' . date_format(date_create($validated['end_date']), 'd-m-Y') . '.pdf'));

        return $pdf->download('trmc-vluchten-export-van-' . $validated['start_date'] . '-tot-' . $validated['end_date'] . '.pdf');
    }
}
