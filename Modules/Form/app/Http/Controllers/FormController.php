<?php

namespace Modules\Form\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Form\Models\Form;
use Modules\Form\Models\PlaneModel;
use Illuminate\Support\Facades\DB;
use Modules\Form\Enums\ModelTypeEnum;
use Modules\Users\Models\Member;

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
        ]);
        
        // Insert form
        $form = Form::create([
            'name' => $validated['name'],
            'date_time' => $validated['date']. " ". $validated['time'],
        ]);

        foreach($validated['model_type'] as $model) {
            $modelInt = intval($model);
            switch ($modelInt) {
                case 1:
                    $validated = $request->validate([
                        'power_type_select_plane' => ['required'],
                        'lipo_count_select_plane' => ['required'],
                    ]);

                    // Insert plane type
                    $model = planeModel::create([
                        'model_type' => ModelTypeEnum::PLANE,
                        'class' => $validated['power_type_select_plane'],
                        'lipo_count' => $validated['lipo_count_select_plane'],
                    ]);

                    // Attach to form
                    $form->models()->attach($planeModel);

                    break;
                case 2:
                    $validated = $request->validate([
                        'power_type_select_glider' => ['required', 'int', 'max:4'],
                        'lipo_count_select_glider' => ['required', 'int', 'max:8'],
                    ]);
                    break;
                case 3:	
                    $validated = $request->validate([
                        'power_type_select_helicopter' => ['required', 'int', 'max:4'],
                        'lipo_count_select_helicopter' => ['required', 'int', 'max:8'],
                    ]);
                    break;
                case 4:
                    $validated = $request->validate([
                        'power_type_select_drone' => ['required', 'int', 'max:4'],
                        'lipo_count_select_drone' => ['required', 'int', 'max:8'],
                    ]);
                    break;
                default:
                    return redirect(route('form.index'))->with('error', 'Er is iets fout gegaan!');
            }
        };

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
