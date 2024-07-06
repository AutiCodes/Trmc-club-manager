<?php

namespace Modules\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @author KelvinCodes
     * @return View
     */
    public function index()
    {
        
        $prResults = Self::curlGithub('https://api.github.com/repos/kelvincodesstuff/trmc-club-manager/pulls?state=all');
        $version = Self::curlGithub('https://api.github.com/repos/kelvincodesstuff/trmc-club-manager/releases/latest');
        
        return view('home::pages.index', compact('prResults', 'version'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return View
     */
    public function create()
    {
        return view('home::create');
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
     * 
     * @param int $id the id of the member
     * @return View
     */
    public function show($id)
    {
        return view('home::show');
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id the id of the member
     * @return View
     */
    public function edit($id)
    {
        return view('home::edit');
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param Request $request
     * @param int $id the id of the member
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id the id of the member
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Curl the Github API
     * 
     * @param string $url the url to curl
     * @return mixed
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
        curl_setopt($curl, CURLOPT_USERAGENT, 'Chrome/64.0.3282.186 Safari/537.36');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: ' . env('GITHUB_ACCESS_TOKEN')));
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

        $result = json_decode(curl_exec($curl));
        curl_close($curl);

        return $result;
    }
}
