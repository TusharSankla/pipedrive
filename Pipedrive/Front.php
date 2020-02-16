<?php
// Content of get_details_of_deal.php
 
// Pipedrive API token
$api_token = '75346a214d7b9e6c62ccfddc14790175c7817660';
 
// Pipedrive company domain
$company_domain = 'usertrack';

// Deal ID
$deal_id =1;

// URL for getting the details of a Deal
$url = 'https://' . $company_domain . '.pipedrive.com/v1/deals/' . $deal_id . '?api_token=' . $api_token;

// GET request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
echo 'Sending request...' . PHP_EOL;
  
$output = curl_exec($ch);
curl_close($ch);

// Create an array from the data that is sent back from the API
// As the original content from server is in JSON format, you need to convert it to a PHP array
$result = json_decode($output, true);

// Check if data returned in the result is not empty
if (empty($result['data'])) {
    exit('Error: ' . $result['error'] . PHP_EOL);
}

// If the Deal is found, show Deal details
if ($result['data']) {
    echo 'Here are the details of Deal ' . $result['data']['id'] . ':' . PHP_EOL;
 
    // Print out full data of found Deal
    print_r($result['data']);
}
?>