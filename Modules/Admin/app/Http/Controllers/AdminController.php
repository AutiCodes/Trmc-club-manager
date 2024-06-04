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

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get form submissions
        $formSubmissions = Form::orderBy('id', 'desc')->get();
        return view('admin::index', [
            'FlightsTotal' => $FlightsTotal,
            'formSubmissions' => 10,
            'FlightsThisWeek' => 5,
            'FlightsToday' => 2,
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

    public function downloadFlightsGov()
    {
        $pdf = PDF::loadHTML(
            '
            <head>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            </head>
            <h1>Twente Radio Modelvlieg Club</h1>
            <hr>
            <h2>Vluchten 2024:</h2>

            <table class="table">
            <thead>
              <tr>
                <th scope="col">Nummer</th>
                <th scope="col">RDW nummer</th>
                <th scope="col">Datum</th>
                <th scope="col">Tijd</th>
                <th scope="col">Model type(s)</th>
                <th scope="col">Aantal vluchten</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">5</th>
                <td>342352345325</td>
                <td>4-6-2024</td>
                <td>10:00</td>
                <td>Vliegtuig</td>
                <td>4</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>342352345325</td>
                <td>4-6-2024</td>
                <td>10:00</td>
                <td>Vliegtuig, Helicopter</td>
                <td>4</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>342352345325</td>
                <td>4-6-2024</td>
                <td>10:00</td>
                <td>Vliegtuig, Helicopter</td>
                <td>4</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>342352345325</td>
                <td>4-6-2024</td>
                <td>10:00</td>
                <td>Vliegtuig, Helicopter</td>
                <td>4</td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>342352345325</td>
                <td>4-6-2024</td>
                <td>10:00</td>
                <td>Vliegtuig, Helicopter</td>
                <td>4</td>
              </tr>                            
            </tbody>
          </table>
            
            <footer class="text-center">
                <p>PDF gegenereerd op '. Carbon::now(). ' door Kelvin de Reus</p>
                <p>&copy; '. date('Y').' Twente Radio Modelvlieg Club</p>
            </footer>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            '
        );
        return $pdf->stream('vluchten.pdf');
    }

    public function downloadFlightsTRMC()
    {
        $file = Storage::put('vluchten-trmc-' . date('Y-m-d-H-i-s') . '.txt', 'Hoi!');

        if (!$file) {
            return redirect()->back()->with('error', 'Er is iets fout gegaan! Foutcode: Kon bestand niet opslaan.');
        }

        return response()->download(storage_path('app/test.txt'));
    }    
}
