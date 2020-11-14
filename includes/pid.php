<?php
$pid = 0;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $pid = shell_exec("start python ../bin/Server/app.py & ");
    } else {
        $pid = shell_exec("python3 ../bin/Server/app.py &");
    }

    echo json_encode($pid);
}