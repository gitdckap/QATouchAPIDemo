<?php
include('config.php');

function getAllProjects($apiToken,$domain,$url) {
   $curl = curl_init();
    // Set some options - we are passing url and necessary headers
      curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "PATCH",
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

/*Update Status - Test Run*/

/*"project_name":"API Application","project_key":"BJaX" */

/*
Available Status key
"passed",
"untested",
"blocked",
"retest",
"failed",
"not-applicable","in-progress"*/

$projectkey         = "BJaX";
$testrunkey         = "k1E7";
$testRunResultskey  = "4l9W3";
$statuskey          = 'passed';



/* Count of the total projects available.*/
$allprojecturl  = $url.'testRunResults/status/?status='.$statuskey.'&project='.$projectkey."&test_run=".$testrunkey."&run_result=".$testRunResultskey;
//exit;
$projectcount = getAllProjects($apiToken,$domain,$allprojecturl);
echo $projectcount;

?>