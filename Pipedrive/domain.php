<?php

$api_token = '75346a214d7b9e6c62ccfddc14790175c7817660';
$url = 'https://api.pipedrive.com/v1/users/me?api_token=' . $api_token;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

echo 'Sending request...' . PHP_EOL;

$output = curl_exec($ch);
curl_close($ch);

$result = json_decode($output, true);

if (!empty($result['data']['company_domain'])) {
  echo 'User company_domain is: ' . $result['data']['company_domain'] . PHP_EOL;
}
?>