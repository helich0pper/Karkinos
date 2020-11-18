<?php
$pid = null;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $pid = exec("start python ../bin/Server/app.py & ");
    } else {
        $pid = exec("python3 ../bin/Server/app.py &");
    }

    echo json_encode($pid);
}