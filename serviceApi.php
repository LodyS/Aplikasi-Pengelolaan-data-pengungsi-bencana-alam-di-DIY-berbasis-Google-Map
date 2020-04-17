<?php
//$client = new GuzzleHttp\Client();
//$res = $client->get('id.quora.com/profile/Lody-S', [
  //  'auth' =>  ['user', 'pass']]);
//echo $res->getStatusCode();           // 200
//echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
//echo $res->getBody();                 // {"type":"User"...'
//var_export($res->json());

$ch = curl_init();

#$data = array('name' =>array('subname' => 'subvalue'));
$data = array('name' =>array('subname' => 'subvalue')); 

curl_setopt($ch, CURLOPT_URL, "id.quora.com/profile/Lody-S");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$result = curl_exec($ch);


print_r($result);
curl_close($ch);