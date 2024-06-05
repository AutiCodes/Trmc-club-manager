<?php

namespace Modules\Form\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Form\Models\Form;
use Illuminate\Support\Facades\DB;
use Modules\Form\Enums\ModelTypeEnum;
use Modules\Users\Models\Member;
use Modules\Form\Models\SubmittedModel;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        // Get current members
        $members = Member::orderby('name', 'DESC')->get();
        // Return form view
        return view('form::index', ['members' => $members]);	
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        return view('form::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // TODO better validation
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:25'],
            'date' => ['required', 'max:12'],
            'time' => ['required', 'max:6'],
            'model_type' => ['required'],	
            'power_type_select' => ['integer'],
            'lipo_count_select' => ['integer'],
        ]);
        
        $form = Form::create([
            'name' => $validated['name'],
            'date_time' => $validated['date']. " ". $validated['time'],
        ]);

        // Attach form to member with relationship
        $form->members()->attach($form->id);

        // Add submitted models to model table
        foreach($validated['model_type'] as $model) {
            if ($model == 1) {
                $validated = $request->validate([
                    'power_type_select_plane' => ['required', 'integer', 'max:4'],
                    'lipo_count_select_plane' => ['required', 'integer', 'max: 8'],
                ]);

                $model = SubmittedModel::create([
                    'model_type' => 1,
                    'class' => $validated['power_type_select_plane'],
                    'lipo_count' => $validated['lipo_count_select_plane'],
                ]);
            }

            elseif ($model == 2) {
                $validated = $request->validate([
                    'power_type_select_glider' => ['required', 'integer', 'max:4'],
                    'lipo_count_select_glider' => ['required', 'integer', 'max: 8'],
                ]);

                $model = SubmittedModel::create([
                    'model_type' => $model,
                    'class' => $validated['power_type_select_glider'],
                    'lipo_count' => $validated['lipo_count_select_glider'],
                ]);                
            }

            elseif ($model == 3) {
                $validated = $request->validate([
                    'power_type_select_helicopter' => ['required', 'integer', 'max:4'],
                    'lipo_count_select_helicopter' => ['required', 'integer', 'max: 8'],
                ]);

                $model = SubmittedModel::create([
                    'model_type' => $model,
                    'class' => $validated['power_type_select_helicopter'],
                    'lipo_count' => $validated['lipo_count_select_helicopter'],
                ]);                
            }

            elseif ($model == 4) {
                $validated = $request->validate([
                    'power_type_select_drone' => ['required', 'integer', 'max:4'],
                    'lipo_count_select_drone' => ['required', 'integer', 'max: 8'],
                ]);

                $model = SubmittedModel::create([
                    'model_type' => $model,
                    'class' => $validated['power_type_select_drone'],
                    'lipo_count' => $validated['lipo_count_select_drone'],
                ]);
            }
            // Attach submitted models to submitted form
            $form->submittedModels()->attach($form->id);
        }

        return redirect(route('form.index'))->with('success', 'Je vlucht is aangemeld!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        return view('form::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        return view('form::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     */
    public function destroy($id)
    {
        //
    }
}
