<?php
$out = array();
$input = "";

function getHashType($input){
    $ret = false;
    switch($input){
        case 32:
            $ret = "md5";
        break;
        case 40:
            $ret = "sha1";
        break;
        case 64:
            $ret = "sha256";
        break;
        case 128:
            $ret = "sha512";
        break;
    }
    return $ret;
}

function hashString($line, $method){
    $ret = false;
    switch($method){
        case "md5":
            $ret = md5($line);
        break;
        case "sha1":
            $ret = sha1($line);
        break;
        case "sha256":
            $ret = hash('sha256',$line);
        break;
        case "sha512":
            $ret = hash('sha512',$line);
        break;
    }

    return $ret;
}

function checkPotfile($input){
    $ret = false;
    $potfile = fopen("../wordlists/karkinos.potfile", "r");
    while(($line = fgets($potfile)) !== false){
        $line = trim($line, "\r\n");
        $pothashes = explode(":", $line);

        if($pothashes[0] == $input){
            $ret = $pothashes[1];
        }
    }

    return $ret;
}

function writePotfile($hash, $password){
    $ret = false;
    $potfile = fopen("../wordlists/karkinos.potfile", "a");
    $out = $hash.":".$password."\n";
    $fwrite = fwrite($potfile, $out);

    if ($fwrite !== false) {
        $ret = true;
    }

    fclose($potfile);
    
    return $ret;
}

function crack($wordlist, $input, $method){
    $ret = false;
    $potfile = checkPotfile($input);

    if($potfile === false){
        while(($line = fgets($wordlist)) !== false){
            $line = trim($line, "\r\n");
            if(hashString($line, $method) == $input){
                $ret = $line;
                writePotfile($input, $line);
                set_error_handler(function() { /* Ignore errors. Allows for cracking without SQLite installed. */ });
                $db = new SQLite3('../db/main.db');
                $db->query('UPDATE hashes SET '.$method.' = '.$method.'+1');
                $db->close();
                break;
            }
        }
        if(!$ret){
            $ret = "Password not found.";
        }
        fclose($wordlist);
    }
    else{
        $ret = $potfile;
    }

    return $ret;
}



if($_SERVER['REQUEST_METHOD'] == "POST"){
    $input = $_POST['hash'];
    $action = $_POST['action'];
    if($action === "hash"){
        $hash = hashString($input, $_POST['hashMethod']);
        array_push($out, htmlspecialchars($input), htmlspecialchars($_POST['hashMethod']), $hash);
    }else{
        $method = getHashType(strlen($input));
        if( ($wordlist = fopen("../wordlists/passlist.txt", "r")) && ($method !== false) ){
            switch($method){
                case "md5":
                    $password = crack($wordlist, $input, $method);
                break;
                case "sha1":
                    $password = crack($wordlist, $input, $method);
                break;
                case "sha256":
                    $password = crack($wordlist, $input, $method);
                break;
                case "sha512":
                    $password = crack($wordlist, $input, $method);
                break;
            }
            array_push($out, htmlspecialchars($input), htmlspecialchars($method), htmlspecialchars($password));
        }else{
            array_push($out, htmlspecialchars($input), "Unknown", "Unknown");
        }
    }
    
    echo json_encode($out);
}