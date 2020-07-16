<?php
require "vendor/autoload.php";
$access_token = '3PZEAbBRsdLiIs3iUG7SuaOQfzV6GmcuhGgA/IeR5H1BSUPmORc9RZCu/wVeT9i27hxtBAjg5ZW5yrFWcFe7C0mwOWL5QqFKdpLeuwdR/DsnzFqn+NpFonQRNMm+pcZ0USoLUSHLnHZZ/v12xn0X2wdB04t89/1O/w1cDnyilFU=';
$channelSecret = '4f96e6c9e3b02fd6a2a8f3808f2a9042';
$idPush = 'U0e535834a2eabf1a9df3bd7be4fc94f5';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($idPush, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

