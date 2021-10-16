<?php
    $host = "localhost";
    $user = "";
    $pass = "";
    $db = "";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    if( mysqli_connect_errno() ) {
        echo "Databases Connect False";
    } else {
        //echo "Databases Connect True";
    }
?>