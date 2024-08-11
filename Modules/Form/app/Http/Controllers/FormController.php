<?php

namespace Modules\Form\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Form\Models\Form;
use Illuminate\Support\Facades\DB;
use Modules\Form\Enums\ModelTypeEnum;
use Modules\Members\Models\Member;
use Modules\Form\Models\SubmittedModel;
use Illuminate\Validation\Rule;
use Modules\Members\Enums\ClubStatus;
use Modules\Form\Models\SubmittedModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Log;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @author KelvinCodes
     * @return View
     */
    public function index()
    {
        // Get current members and cache them for 1 hour
        $members = Cache::remember("club_members_form", 3600, function () {
            return Member::orderby("name", "DESC")
                ->where("club_status", "!=", ClubStatus::REMOVED_MEMBER->value)
                ->get();
        });

        // Return form view with members
        return view("form::pages.reg_new_flight", ["members" => $members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view("form::create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @author KelvinCodes
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // TODO better validation
        $validated = $request->validate([
            "name" => ["required", "string", "max:25"],
            "date" => ["required", "max:12"],
            "time" => ["required", "max:6"],
            "model_type" => ["required"],
            "power_type_select" => ["integer"],
            "lipo_count_select" => ["integer"],
            "rechapcha_custom" => ["integer", "required"],
        ]);

        $member = Member::find($validated["name"]);

        // Check if rechapcha is correct, if not do nothing and return error
        // TODO: Use env variable for rechapcha secret key
        if (intval($validated["rechapcha_custom"]) != 4) {
            Log::channel("member_activity")->warning(
                "Member " .
                    $member->name .
                    " has submitted a new flight form with invalid rechapcha!"
            );

            return back()->with(
                "error",
                "Oh oh ik denk dat je een robot bent! Bliep bloop probeer het opnieuw!"
            );
            return;
        }

        $form = Form::create([
            "name" => $validated["name"],
            "date_time" => $validated["date"] . " " . $validated["time"],
        ]);

        // Attach form to member with relationship
        $form->member()->attach(intval($validated["name"]));

        Log::channel("member_activity")->info(
            "Member " . $member->name . " has submitted a new flight form!"
        );

        // Add submitted models to model table
        foreach ($validated["model_type"] as $model) {
            switch ($model) {
                case ModelTypeEnum::PLANE->value:
                    $powerType = "power_type_select_plane";
                    $lipoCount = "lipo_count_select_plane";
                    $modelType = "Vliegtuig";
                    break;

                case ModelTypeEnum::GLIDER->value:
                    $powerType = "power_type_select_glider";
                    $lipoCount = "lipo_count_select_glider";
                    $modelType = "Zweefvliegtuig";
                    break;

                case ModelTypeEnum::HELICOPTER->value:
                    $powerType = "power_type_select_helicopter";
                    $lipoCount = "lipo_count_select_helicopter";
                    $modelType = "Helicopter";
                    break;

                case ModelTypeEnum::DRONE->value:
                    $powerType = "power_type_select_drone";
                    $lipoCount = "lipo_count_select_drone";
                    $modelType = "Drone";
                    break;
            }

            $validated = $request->validate([
                $powerType => ["required", "string", "max:24"],
                $lipoCount => ["required", "integer", "max:8"],
            ]);

            $model = SubmittedModel::create([
                "model_type" => $modelType,
                "class" => $validated[$powerType],
                "lipo_count" => $validated[$lipoCount],
            ]);

            // Attach submitted models to submitted form
            $form->submittedModels()->attach($model->id);
        }

        return redirect(route("form.index"))->with(
            "success",
            "Je vlucht is aangemeld!"
        );
    }

    /**
     * Show the specified resource.
     *
     * @param int $id the id of the form
     * @return View
     */
    public function show($id)
    {
        return view("form::show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id the id of the form
     * @return View
     */
    public function edit($id)
    {
        return view("form::edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id the id of the form
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id the id of the form
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Check if member has at least one submitted club flight
     *
     * @param int $id the id of the member
     * @author KelvinCodes
     * @return JSON
     */
    public function checkClubFlights($id)
    {
        $member = Member::where("id", $id)->with("form")->get();

        if (!$member) {
            abort(404, "Member not found");
        }

        return response()->json([
            "has_submitted_club_flight" => $member[0]->form->count() > 0,
        ]);
    }
}
