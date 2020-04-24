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
{"success":true,"data":[{"issue_key":"8r","label":"Not Applicable \t"},{"issue_key":"M7","label":"UI\/Design"},{"issue_key":"Dx","label":"Performance"},{"issue_key":"e3","label":"Validations"},{"issue_key":"vn","label":"Functionality"},{"issue_key":"b9","label":"SEO"},{"issue_key":"Zk","label":"Console Error"},{"issue_key":"Rd","label":"Server Error"},{"issue_key":"dZ","label":"Tracking"}]}*/

$projectkey = "BJaX";

/* Count of the total projects available.*/
$allprojecturl  = $url.'count/allDefects/'.$projectkey;
$projectcount = getAllProjects($apiToken,$domain,$allprojecturl);
echo $projectcount;


?>