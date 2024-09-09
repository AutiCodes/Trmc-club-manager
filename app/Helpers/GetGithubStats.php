<?php

namespace App\Helpers;

class GetGithubStats
{
    /**
     * Curl the Github API and return the results
     * 
     * @author AutiCodes
     * @param string $url the url to curl
     * @return mixed
     */
    public static function get(string $url): mixed
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
        curl_close($curl);

        return json_decode(curl_exec($curl));
    }

    /**
     * Get latest version on Github
     * 
     * @author AutiCodes
     * @param string $url
     * @return string version
     */
    public static function getLatestVersion(string $url): string
    {
        $latestRelease = Self::get($url);
        return str_replace('v', '', $latestRelease->tag_name);
    }
}