<?php
$pid = null;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if($_POST['method'] == "reverse"){
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Change "python" for Windows
            $pid = exec("start python ../bin/Server/app.py & ");
        } else {
            // Change "python3" for Linux/BSD
            $pid = exec("python3 ../bin/Server/app.py &");
        }
    }

    if($_POST['method'] == "busting"){
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Change "python" for Windows
            $pid = exec("cd ../bin/Busting/ && start python app.py & ");
        } else {
            // Change "python3" for Linux/BSD
            $pid = exec("python3 ../bin/Busting/app.py &");
        }
    }

    if($_POST['method'] == "port"){
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Change "python" for Windows
            $pid = exec("start python ../bin/PortScan/app.py & ");
        } else {
            // Change "python3" for Linux/BSD
            $pid = exec("python3 ../bin/PortScan/app.py &");
        }
    }

    echo json_encode($pid);
}
