<?php

namespace Modules\Flights\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Members\Models\Member;
use Modules\Members\Enums\ClubStatus;

class FlightsController extends Controller
{
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @author AutiCodes
     */
    public function create()
    {
        $members = Member::orderby('name', 'DESC')
                        ->where('club_status', '!=', ClubStatus::REMOVED_MEMBER->value)
                        ->get();

        return view('flights::pages.register_new_flights', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @author AutiCodes
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

}
