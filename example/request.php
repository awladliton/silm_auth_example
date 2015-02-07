<?php

function getToken()
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://slim.loc/connect");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        "email=email@gmail.com&uid=user5");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close($ch);
    $result = json_decode($server_output);
    return isset($result->token)?  $result->token : false;
}

function getUserList($strToken) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://slim.loc/users?token=$strToken");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close($ch);
    $result = json_decode($server_output);

    return $result;
}
$mixedToken = getToken();
if($mixedToken) {
    echo '<pre>';
    print_r( getUserList($mixedToken));
    echo '</pre>';
}
