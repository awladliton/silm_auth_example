<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"your_site/users");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
    "email=user@email.com&uid=user_name");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);
$result = json_decode($server_output);
print_r($result);
