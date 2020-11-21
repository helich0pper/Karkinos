<?php
$errors = array();
$out = "";

function check($i, $p, $size, $key){
    $ret = array();
    if($i != $size && $i != 0){
        array_push($ret, "The length of the Initialization Vector must be ".$size." characters for a ".$key." bit key size");
    }
    if($p != $size){
        array_push($ret, "The length of the password (key) must be ".$size." characters for a ".$key." bit key size");
    }

    return $ret;
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    set_error_handler("warning_handler", E_WARNING);
    $IV = $_POST['IV'];
    $mode = $_POST['mode'];
    $size = $_POST['size'];
    $password = $_POST['password'];
    $ALGORITHM = 'AES-'.$size.'-'.$mode;


    switch($size){
        case 128:
            $errors = check(strlen($IV), strlen($password), 16, 128);
        break;
        case 192:
            $errors = check(strlen($IV), strlen($password), 24, 192);
        break;
        case 256:
            $errors = check(strlen($IV), strlen($password), 32, 256);
        break;
        default:
            array_push($errors, "Invalid key length chosen.");
    }

    if($_POST['isFile'] === "true"){
        $data = file_get_contents($_FILES['file']['tmp_name']);
    }else{
        $data = $_POST['data'];
    }

    if(empty($errors)){
        if($_POST['method'] == 0){
            $out = openssl_encrypt($data, $ALGORITHM, $password, 0, $IV);
        }
        if($_POST['method'] == 1){
            $out = openssl_decrypt($data, $ALGORITHM, $password, 0, $IV);
            if($out === false){
                $out = "Invalid key or IV";
            }
        }
    }
    $ret->out = $out;
    $ret->errors = $errors;
    echo json_encode($ret);
}

function warning_handler($errno, $errstr) { }


