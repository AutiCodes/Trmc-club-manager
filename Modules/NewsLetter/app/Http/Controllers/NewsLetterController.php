<?php

namespace Modules\NewsLetter\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use File;
use Modules\Members\Models\Member;
use Modules\Members\Enums\ClubStatus;
use App\Mail\NewsLetter;
use Mail;

class NewsLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = scandir(public_path('pdf/newsletters/'));

        return view('newsletter::pages.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newsletter::create');
    }

    /**
     * Creates an PDF
     * Sends it to the members
     * Saves it to storage
     *
     * @author AutiCodes
     * @param Request $request
     * @return// RedirectResponse
     */
    public function store(Request $request)//: RedirectResponse
    {
        $validated = $request->validate([
            'checkbox_send_to' => ['max:10'],
            'text_editor' => ['required', 'string'],
        ]);

        try {
            $pdf = PDF::loadView('newsletter::pdf.newsletter', [
                'text_editor' => $validated['text_editor'],
            ]);

            if ($request->input('test_email') != '') {
                $pdf->save('newsletters/TEST-nieuwsbrief-' . date('d-m-Y') . '.pdf', 'pdf');
                Mail::to($request->input('test_email'))->send(new NewsLetter($validated['text_editor']));
                return redirect()->back()->with('success', 'Test nieuwsbrief is verstuurd!');
            }

            $pdf->save('newsletters/Nieuwsbrief-' . date('d-m-Y') . '.pdf', 'pdf');

            // Get members and send email
            foreach ($validated['checkbox_send_to'] as $status) {
                $members = Member::where('club_status', '!=', ClubStatus::REMOVED_MEMBER->value)->where('club_status', '=', $status)->get();

                foreach ($members as $member) {
                    Mail::to($member->email)->send(new NewsLetter($validated['text_editor']));
                }
            }

            return redirect()->back()->with('success', 'Nieuwsbrief is verstuurd!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'er ging iets mis! Foutcode: ' . $e->getMessage());
            Log::channel('app_errors')->error('Error when sending newsletter: ' . $e->getMessage());
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($filename)
    {
        return view('newsletter::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('newsletter::edit');
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
