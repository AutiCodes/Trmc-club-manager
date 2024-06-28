<?php

namespace Modules\Versions\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VersionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prResults = Self::curlGithub('https://api.github.com/repos/kelvincodesstuff/trmc-club-manager/pulls?state=all');
        $latestVersion = Self::curlGithub('https://api.github.com/repos/kelvincodesstuff/trmc-club-manager/releases/latest');
        $newversion = str_replace('v', '', $latestVersion->tag_name);
        
        if (!$newversion >= env('CURRENT_VERSION')) {
            $needsUpdate = 0;
        } else {
            $needsUpdate = 1;
        }

        return view('versions::pages.index', compact('prResults', 'latestVersion', 'newversion', 'needsUpdate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('versions::create');
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
        return view('versions::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('versions::edit');
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

    /**
     * Curl the Github API.
     * @return JSON
     */
    function curlGithub($url)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 100);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 100);
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: ' . env('GITHUB_ACCESS_TOKEN')));
        curl_setopt($curl, CURLOPT_USERAGENT, 'Chrome/64.0.3282.186 Safari/537.36');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

        $result = json_decode(curl_exec($curl));
        curl_close($curl);

        return $result;
    }    

    /** 
     * Update application
     *      
     */
    public function updateApplication()
    {
        $update = shell_exec('cd /home/trmc/domains/club.trmc.nl/public_html && git pull origin main');

        // CLear caches
        \Artisan::call('cache:clear');
        \Artisan::call('config:cache');
        \Artisan::call('route:cache');
        \Artisan::call('view:clear');
        \Artisan::call('optimize');

        return redirect()->route('versions.index')->with('success', 'Application updated! Response: '. $update);
    }
}
