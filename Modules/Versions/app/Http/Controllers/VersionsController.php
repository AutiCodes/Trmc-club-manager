<?php

namespace Modules\Versions\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\GetGithubStats;

class VersionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @author KelvinCodes
     * @return View
     */
    public function index()
    {
        // Get Github API results
        $prResults = GetGithubStats::get('https://api.github.com/repos/kelvincodesstuff/trmc-club-manager/pulls?state=all');
        $latestRelease = GetGithubStats::get('https://api.github.com/repos/kelvincodesstuff/trmc-club-manager/releases/latest');

        // Return error message if Github API rate is exceeded
        if ($prResults === 403 || $latestRelease === 403) {
            return redirect('/versions')->with('error', 'Github API limiet is overschreden. Probeer later opnieuw.');
        }

        $latestVersion = GetGithubStats::getLatestVersion();
        $currentVersion = env('CURRENT_VERSION');	

        return view('versions::pages.index', compact('prResults', 'latestRelease', 'latestVersion', 'currentVersion'));
    }
}
