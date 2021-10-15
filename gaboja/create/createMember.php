<?php 
    include "../connect/connect.php";

    $sql = "CREATE TABLE gmember (";
    $sql .= "myMemberID int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "youID varchar(20) NOT NULL,";
    $sql .= "youPass varchar(20) NOT NULL,";
    $sql .= "youName varchar(20) NOT NULL,";
    $sql .= "youPhone varchar(14) NOT NULL,";
    $sql .= "youScore float(10) NOT NULL,";
    $sql .= "youImg varchar(50) NOT NULL,";
    $sql .= "youIntro varchar(20) NOT NULL,";
    $sql .= "regTime int(14) NOT NULL,";
    $sql .= "PRIMARY KEY (myMemberID)) CHARSET=utf8;";

    $result = $connect -> query($sql);
    
    if( $result ){
        echo "Create Table True";
    } else {
        echo "Create Table false";
    }

    /*
        myMemberID
        youID
        youPass
        youName
        youPhone
        regTime
        score
    */


?>