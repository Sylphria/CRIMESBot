<?php
$access_token = '5qEwwppGreEL/AJpKWMUk8B6zOkPdMbB1Yk0Ii/qD2K6YgMA+34mHFqALlPknlhKUlwbUEbvPNO+7Y9eo9pEmZPviLb0P3tIrgZ1FHiaXA3X/0sBqKEiPSR78RRhqHm/fF1Nx7D4FkL+2cfIee3XPgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
