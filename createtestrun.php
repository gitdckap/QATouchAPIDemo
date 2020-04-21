<?php
include('config.php');

function getAllProjects($apiToken,$domain,$url) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            'api-token:'.$apiToken,
            'domain:'.$domain
        )
    ));
    $response = curl_exec($curl);
    return $response;
}


$projectkey = "BJaX";
$assignkey  = "g2bz";
$milestoneKey = 'BJ1a';
$testRun = 'run testing';
/* Provides the list of projects created for your domain */


$projecturl  = $url.'testRun?projectKey='.$projectkey.'&assignTo='.$assignkey.'&milestoneKey='.$milestoneKey.'&testRun='.$testRun;
$allproject    = getAllProjects($apiToken,$domain,$projecturl);
echo $allproject;

?>
