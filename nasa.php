<?php
$apiKey = "NNKOjkoul8n1CH18TWA9gwngW1s1SmjESPjNoUFo";
$url = "https://api.nasa.gov/planetary/apod";

$queryUrl = $url."?api_key=".$apiKey;

$options = array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array('Content-type: application/json'),
    CURLOPT_URL => $queryUrl
);

$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_SSL_VERIFYHOST => 2,
    CURLOPT_VERBOSE => true,
    //utilisation du certificat de sécurité de la nasa (le style de dire ça)
    CURLOPT_CAINFO => getcwd()."/cert/GoDaddyRootCertificateAuthority-G2"
));

curl_setopt_array( $ch, $options );

if (!$result = curl_exec($ch)){
    die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
}
curl_close($ch);

echo $result;

?>
