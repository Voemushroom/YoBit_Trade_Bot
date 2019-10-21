<?php

function yobit($method, $req = array()){
  $api_key    = "xxxxx";
  $api_secret = "xxxxx";


$rate   = "?????";
$amount = "?????";


$req["method"] = $method;
$req["nonce"]  = time();
$req["pair"]   = "alis_btc";
$req["type"]   = "sell";  //buy or sell
$req["rate"]   = $rate;
$req["amount"] = $amount;
$post_data = http_build_query($req, '', '&');
echo $post_data."<br>";

$sign = hash_hmac("sha512", $post_data, $api_secret);
$headers = array("Sign: ".$sign,"Key: ".$api_key,);


$ch = null;
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, "https://yobit.net/tapi/");
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$res = curl_exec($ch);
curl_close($ch);

echo $res."<br>";

}

$res = yobit("Trade");
