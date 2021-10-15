<?php
    $host = "localhost";
    $user = "eodud0412";
    $pass = "qlalfdlaz1!";
    $db = "eodud0412";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    if( mysqli_connect_errno() ) {
        echo "Databases Connect False";
    } else {
        //echo "Databases Connect True";
    }
?>