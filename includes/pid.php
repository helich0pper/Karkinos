<?php
$pid = null;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // Reverse Shell Handling Module
    if($_POST['method'] == "reverse"){
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Change "python" for Windows
            $pid = exec("start python ../bin/Server/app.py & ");
        } else {
            // Change "python3" for Linux/BSD
            $pid = exec("karkinos=$(which python3); \$karkinos ../bin/Server/app.py &");
        }
    }

    // File/Directory Busting Module
    if($_POST['method'] == "busting"){
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Change "python" for Windows
            $pid = exec("cd ../bin/Busting/ && start python app.py & ");
        } else {
            // Change "python3" for Linux/BSD
            $pid = exec("karkinos=$(which python3); \$karkinos ../bin/Busting/app.py &");
        }
    }

    // Port Scanner Module
    if($_POST['method'] == "port"){
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Change "python" for Windows
            $pid = exec("start python ../bin/PortScan/app.py & ");
        } else {
            // Change "python3" for Linux/BSD
            $pid = exec("karkinos=$(which python3); \$karkinos ../bin/PortScan/app.py &");
        }
    }

    echo json_encode($pid);
}
