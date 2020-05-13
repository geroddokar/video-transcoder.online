<?php
$api_key = "5eb3f13609477";
$api = "https://api.qencode.com";
$result = curl_request("$api/v1/access_token", "api_key=$api_key");
$decode = json_decode($result);
$token = $decode->{'token'};
echo $token;

function curl_request($url, $params){
    try {
    $ch = curl_init();
    // Check if initialization had gone wrong*    
    if ($ch === false) {
        throw new Exception('failed to initialize');
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        $params);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    if ($server_output === false) {
        throw new Exception(curl_error($ch), curl_errno($ch));
    }
    curl_close($ch);
    return $server_output;
    }
    catch(Exception $e) {

        trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
            E_USER_ERROR);
    
    }
}