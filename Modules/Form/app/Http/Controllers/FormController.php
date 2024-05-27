<?php

namespace Modules\Form\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Form\Models\Form;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get models from DB
        $models = DB::table('model_type')->get();
        $power = DB::table('power_type')->get();

        // Return form view
        return view('form::index', compact('models', 'power'));	
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
    public function store(Request $request)
    {
        // Form validation
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:25'],
            'date' => ['required', 'max:12'],
            'time' => ['required', 'max:6'],
            'lipo_count_select' => ['required', 'int', 'max:10'],
            'power_type_select' => ['required', 'int', 'max:5'],
            'model_type' => ['required'],
        ]);

        foreach($validated['model_type'] as $model) {
            // Saving form in DB
            Form::create([
                'name' => $validated['name'],
                'date_time' => $validated['date'] . ' ' . $validated['time'],
                'lipo_count' => $validated['lipo_count_select'],
                'model_type' => $validated['model_type'],
            ]);
        };

        return redirect(route('form.index'))->with('success', 'Je vlucht is aangemeld!');
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
