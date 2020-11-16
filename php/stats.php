
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $out = "";
        if($_POST['reset'] == 1){
            $db = new SQLite3('../db/main.db');
            $db->query('UPDATE hashes SET md5=0, sha1=0, sha256=0, sha512=0;');
            $db->close();
        }

        echo json_encode($out);
    }