<?php
$errors = array();
$out = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    set_error_handler("warning_handler", E_WARNING);
    $ALGORITHM = 'AES-128-CBC';
    if(strlen($IV = $_POST['IV']) != 16 && strlen($IV = $_POST['IV']) != 0){
        array_push($errors, "The length of the Initialization Vector must be 16 characters");
    }
    if(strlen($password = $_POST['password']) != 16){
        array_push($errors, "The length of the password (key) must be 16 characters");
    }
    if($_POST['isFile'] === true){
        $data = file_get_contents(realpath($_POST['data']), false, null);
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


