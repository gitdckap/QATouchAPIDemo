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

/*"project_name":"API Application","project_key":"BJaX" */

$projectkey = "BJaX";
$testrunkey  = "k1E7";
$testRunResultskey = "4l9W3";

/* Count of the total projects available.*/
$allprojecturl  = $url.'testRunResults/history/'.$projectkey."/".$testrunkey."/".$testRunResultskey;
//exit;
$projectcount = getAllProjects($apiToken,$domain,$allprojecturl);
echo $projectcount;

?>