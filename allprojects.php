<?php
include('config.php');

function getAllProjects($apiToken,$domain,$url) {
   $curl = curl_init();
    // Set some options - we are passing url and necessary headers
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => array(
            'api-token:'.$apiToken,
            'domain:'.$domain
        )
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    // Close request to clear up some resources
    curl_close($curl);
    // return the response
    return $resp;
    
}

/* Provides the list of projects created for your domain */
$allprojecturl  = $url.'getAllProjects';
$allproject    = getAllProjects($apiToken,$domain,$allprojecturl);
echo $allproject;

?>