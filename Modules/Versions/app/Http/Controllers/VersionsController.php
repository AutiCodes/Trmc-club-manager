<?php

namespace Modules\Versions\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VersionsController extends Controller
{
    /**
     * Get pull requests from the Githup API
     * 
     */
    public function getPullRequests()
    {
        $url = 'https://api.github.com/repos/kelvincodesstuff/trmc-club-manager/pulls?state=all';
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
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

        $httpcode = curl_getinfo($curl , CURLINFO_HTTP_CODE);
        $result = json_decode(curl_exec($curl));
        curl_close($curl);

        $counter = 0;
        foreach ($result as $item) {
            echo $item->number . '. ' . $item->title. '<br>';
        }
    }
}
