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
{"success":true,"data":{"headers":{},"original":{"success":true,"data":[{"severity_key":"MPr7","label":"Critical","color_code":"#c12c21"},{"severity_key":"D71x","label":"Blocker","color_code":"#ee4e33"},{"severity_key":"e1x3","label":"Major","color_code":"#fd9a45"},{"severity_key":"vR1n","label":"Minor","color_code":"#ffcc00"},{"severity_key":"baZ9","label":"Trivial","color_code":"#bbd862"}]},"exception":null}}*/

$projectkey = "BJaX";

/* Count of the total projects available.*/
$allprojecturl  = $url.'defects/severity';
$projectcount = getAllProjects($apiToken,$domain,$allprojecturl);
echo $projectcount;


?>