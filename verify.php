<?php
$access_token = '3PZEAbBRsdLiIs3iUG7SuaOQfzV6GmcuhGgA/IeR5H1BSUPmORc9RZCu/wVeT9i27hxtBAjg5ZW5yrFWcFe7C0mwOWL5QqFKdpLeuwdR/DsnzFqn+NpFonQRNMm+pcZ0USoLUSHLnHZZ/v12xn0X2wdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
