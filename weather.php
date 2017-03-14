<?php
$apiKey = "754f93e6a44a42528a0125113171403";
$url = "http://api.worldweatheronline.com/premium/v1/weather.ashx";

$queryUrl = $url."?key=".$apiKey."&q=".$_GET["city"]."&tp=24&format=json";

/**
 * CURLOPT_RETURNTRANSFER - Return the response as a string instead of outputting it to the screen
 * CURLOPT_CONNECTTIMEOUT - Number of seconds to spend attempting to connect
 * CURLOPT_TIMEOUT - Number of seconds to allow cURL to execute
 * CURLOPT_USERAGENT - Useragent string to use for request
 * CURLOPT_URL - URL to send request to
 * CURLOPT_POST - Send request as POST
 * CURLOPT_POSTFIELDS - Array of data to POST in request
 */
$options = array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array('Content-type: application/json'),
    CURLOPT_URL => $queryUrl
);

// Setting curl options
$curl = curl_init();
curl_setopt_array( $curl, $options );

if (!$result = curl_exec($curl)){
    die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
}
curl_close($curl);

//$response = json_decode($result, true);

echo $result;
?>
