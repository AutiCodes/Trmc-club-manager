<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Modules\Fail2Ban\Models\Fail2Ban;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Modules\Form\Models\Form;
use Modules\Settings\Models\Setting;
use Illuminate\Support\Facades\Storage;
use App\Mail\automaticFlightExport;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

/**
 * Deletes banned users/IP's from Fail2Ban
 * 
 * @author AutiCodes
 */
Schedule::call(function () {
    $bans = Fail2Ban::all();

    foreach ($bans as $ban) {
        if (Carbon::now() > $ban->unban_time) {
            Log::channel('Fail2Ban')->info('IP: ' . $ban->ip . ' with Username ' . $ban->username . ' has been unbanned!');
            $ban->delete();
        } 

    }
})->everyMinute();

/**
 * Cleans up empty form fill ins
 * TODO Temp fix, needs code refactoring 
 * 
 * @author AutiCodes
 */
Schedule::call(function () {
    $flightSubmittions = Form::orderBy('id', 'desc')
                            ->with('member')
                            ->with('submittedModels')
                            ->get();

    foreach ($flightSubmittions as $flightSubmittion) {
        if (count($flightSubmittion->submittedModels) == 0) {
            // Delete flight
            $flightSubmittion->delete();
        } 
    }
})->everyMinute();

/**
 * Automatic flight reporting that are send to mail
 * Only runs if automatic flight reporting is enabled in settings
 * 
 * @author AutiCodes
 */
if (Setting::getValue('automatic_flight_report') == 1) {
    Schedule::call(function () {
        try {
            // If it isnt the date set in settings, do nothing
            if (Setting::getValue('automatic_flight_report_date') != date('Y-m-d')) {
                return;
            }

            $flights = Form::orderBy('id', 'desc')
                            ->whereBetween('created_at',
                                [
                                    Carbon::now()->startOfMonth(), 
                                    Carbon::now()->endOfMonth()
                                ]
                            )
                            ->with('member')
                            ->with('submittedModels')
                            ->get();

            $pdf = PDF::loadView('admin::pdf', [
                        'flights' => $flights,
                        'currentUser' => 'Systeem',
                        'flightsDate' => Carbon::now()->startOfMonth()->format('d-m-Y') . ' tot ' . Carbon::now()->endOfMonth()->format('d-m-Y'),
                        ]);

            // Save PDF to local storage
            $pdf->save('flight_reports/vluchten-' . Carbon::now()->startOfMonth()->format('d-m-Y') . '-' . Carbon::now()->endOfMonth()->format('d-m-Y') . '.pdf', 'pdf');

            // Send email
            Mail::to(Setting::getValue('automatic_flight_report_email'))->send(new automaticFlightExport(Carbon::now()->startOfMonth()->format('d-m-Y') . '-' . Carbon::now()->endOfMonth()->format('d-m-Y')));

            Log::channel('member_contact')->info('Mailed an automatic flight report');
        } catch (Exception $e) {
            Log::channel('app_errors')->error('Error with automatic flight report mailer: ' . $e->getMessage());
        }
    })->dailyAt('21:45');
}
