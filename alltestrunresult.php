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

/* Testrun 
{"success":true,"data":[{"testrun_name":"New Testing Run","testrun_key":"bKw9"},{"testrun_name":"ttt","testrun_key":"k1E7"},{"testrun_name":"same testing","testrun_key":"BPNG"},{"testrun_name":"run testing","testrun_key":"8LNn"}]}*/

$projectkey = "BJaX";

$testRunkey = 'k1E7';

/* Count of the total projects available.*/
$allprojecturl  = $url.'testRunResults/'.$projectkey.'/'.$testRunkey;
$projectcount = getAllProjects($apiToken,$domain,$allprojecturl);
echo $projectcount;

?>