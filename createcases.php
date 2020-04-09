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

/*{"section_name":"New module","section_key":"v4gV"} */

/*"project_name":"API Application","project_key":"BJaX" */
$projectkey = "BJaX";
$modulekey  = "Vk9V";
$testCase   = " ";
$caseTitle  = "Ecommerce is not working fine";

/* Provides the list of projects created for your domain */
$projecturl  = $url.'testCase?projectKey='.$projectkey.'&sectionKey='.$modulekey.'&testCase='.$testCase.'&caseTitle='$caseTitle;
$allproject  = getAllProjects($apiToken,$domain,$projecturl);
echo $allproject;

?>
