<?php
$pid = null;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        // Change this for Windows
        $pid = exec("start python ../bin/Server/app.py & ");
    } else {
        // Change this for Linux/BSD
        $pid = exec("python3 ../bin/Server/app.py &");
    }

    echo json_encode($pid);
}
