<?php
$out = "";

function encode($type, $input){
    $ret = "";
    switch($type){
        case "base64":
            $ret = base64_encode($input);
        break;
        case "uri":
            $ret = urlencode($input);
        break;
        case "hex":
            $ret = wordwrap(bin2hex($input), 2, " ", true);
        break;
        case "rot13":
            $ret = str_rot13($input);
        break;
    }

    return $ret;
}

function decode($type, $input){
    $ret = "";
    switch($type){
        case "base64":
            $ret = base64_decode($input);
        break;
        case "uri":
            $ret = urldecode($input);
        break;
        case "hex":
            $input = str_replace(" ", "", $input);
            $ret = hex2bin($input);
        break;
        case "rot13":
            $ret = str_rot13($input);
        break;
    }

    return $ret;
}


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $type = $_POST['type'];
    $input = $_POST['input'];
    $method = $_POST['method'];

    switch($method){
        case 0:
            $out = encode($type, $input);
        break;
        case 1:
            $out = decode($type, $input);
        break;
        default:
            $out = "Error";
    }

    echo json_encode($out);
}




