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
{"success":true,"data":{"headers":{},"original":{"success":true,"data":[{"status_key":"RPga","status_name":"new","color_code":"#3498db"},{"status_key":"dbyM","status_name":"assigned","color_code":"#4d5361"},{"status_key":"x2ml","status_name":"open","color_code":"#46bfbd"},{"status_key":"VqK2","status_name":"fixed","color_code":"#a4a9ad"},{"status_key":"Jv82","status_name":"retest","color_code":"#fdb45c"},{"status_key":"PVgV","status_name":"verified","color_code":"#36d936"},{"status_key":"6x8a","status_name":"reopen","color_code":"#bb96e8"},{"status_key":"7VER","status_name":"closed","color_code":"#e56185"},{"status_key":"9Pe4","status_name":"duplicate","color_code":"#827ea5"},{"status_key":"q3zm","status_name":"invalid","color_code":"#c36fc2"},{"status_key":"X3Gm","status_name":"deferred","color_code":"#937755"}]},"exception":null}}*/

$projectkey = "BJaX";

/* Count of the total projects available.*/
$allprojecturl  = $url.'defects/status';
$projectcount = getAllProjects($apiToken,$domain,$allprojecturl);
echo $projectcount;


?>