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
     * 
     * @return View
     */
    public function index(): View
    {
        $prResults = Self::curlGithub('https://api.github.com/repos/kelvincodesstuff/trmc-club-manager/pulls?state=all');
        $latestRelease = Self::curlGithub('https://api.github.com/repos/kelvincodesstuff/trmc-club-manager/releases/latest');

        // Return error message if Github API rate is exceeded
        if ($prResults === 403 || $latestRelease === 403) {
            return '<h1>Je Github API rate is uitgeput!</h1>';
        }

        $latestVersion = str_replace('v', '', $latestRelease->tag_name);
        $currentVersion = env('CURRENT_VERSION');	

        if (intval($latestVersion) >= intval($currentVersion)) {
            return '<h1>Je versie is up-to-date!</h1>';
        }

        return '<h1>Je versie is out-of-date!</h1>';

        return view('versions::pages.index', compact('prResults', 'latestRelease'));
    }

    /**
     * Curl the Github API.
     * 
     * @param string $url The Github API url
     * @return JSON || 403
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
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($httpcode == 403) {
            return $httpcode;
        }
        return $result;
    }

    /**
     * Updates this application to the latest version.  
     * 
     * @throws \Exception If git pull command failed
     * @return RedirectResponse 
     */
    public function update()
    {
        // Get and pull latest code from Github repo 
        $gitPullCommand = shell_exec('cd /home/trmc/domains/club.trmc.nl/public_html && git clone https://github.com/kelvincodesstuff/trmc-club-manager.git');

        // Throw exception if git pull command failed
        if ($gitPullCommand === false || $gitPull === null) {
            throw new \Exception('Could not pull latest code from Github repo!');
        }
        
        // Clean up caches
        \Artisan::call('config:cache');
        \Artisan::call('route:cache');
        \Artisan::call('view:cache');
        \Artisan::call('cache:clear');
    }

    /**
     * Clears route cache
     * 
     */
    public function clearRouteCache()
    {
        \Artisan::call('route:clear');
    }
}
