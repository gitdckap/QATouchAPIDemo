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

/* Defect Status 
{"success":true,"data":[{"priority_key":"3LjP","label":"Show stopper","color_code":"#070707"},{"priority_key":"zJn9","label":"High","color_code":"#ee4e33"},{"priority_key":"mldV","label":"Medium","color_code":"#2a97aa"},{"priority_key":"n1jz","label":"Low","color_code":"grey"}]}*/

$projectkey = "BJaX";

/* Count of the total projects available.*/
$allprojecturl  = $url.'getAllRequirements/'.$projectkey;
$projectcount = getAllProjects($apiToken,$domain,$allprojecturl);
echo $projectcount;


?>