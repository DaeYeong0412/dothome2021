<?php 
    include "../connect/connect.php";

    $sql =  "CREATE TABLE gBoard(";
    $sql .= "myBoardID int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "boardTitle varchar(50) NOT NULL,";
    $sql .= "boardContent longtext NOT NULL,";
    $sql .= "boardView int(10) unsigned NOT NULL,";
    $sql .= "boardLike int(10) NOT NULL,";
    $sql .= "boardDislike int(10) NOT NULL,";
    $sql .= "regTime int(15) unsigned NOT NULL,";
    $sql .= "PRIMARY KEY (myBoardID)) CHARSET=utf8";

    $result = $connect -> query($sql);

    if($result){
        echo "Create Board TRUE";
    } else {
        echo "Create Board FALSE";
    }
/*
myBoardID
myMemberID
myBoardTitle
boardContent
boardView
regTime
like
dislike*/
?>