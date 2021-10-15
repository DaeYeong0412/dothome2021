<?php 
    include "../connect/connect.php";

    $sql = "CREATE TABLE gComment (";
    $sql .= "myCommentID int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "myBoardID int(10) unsigned NOT NULL,";
    $sql .= "youText varchar(50) NOT NULL,";
    $sql .= "youLike int(10) NOT NULL,";
    $sql .= "youDislike int(10) NOT NULL,";
    $sql .= "regTime int(15) NOT NULL,";
    $sql .= "PRIMARY KEY (myCommentID)) CHARSET=utf8";

    $result = $connect -> query($sql);

    if ( $result ){
        echo "Create Comment True";
    } else {
        echo "Create Comment false";
    }
/*
    댓글 테이블
    myCommentID
    youName
    youText
    regTime
    like
    dislike
*/
?>