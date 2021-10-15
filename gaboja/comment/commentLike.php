<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $like = $_GET['like'];
    $memberID = $_GET['memberID'];
    $commentID = $_GET['commentID'];
    

    if( $like == "like" ){
        
        $sql = "UPDATE gComment SET youLike = youLike + 1 WHERE myCommentID = {$commentID}";
        $sql2 = "UPDATE gmember SET youScore = youScore + 0.1 WHERE myMemberID = {$memberID}";
    } else {
        $sql = "UPDATE gComment SET youDislike = youDislike + 1 WHERE myCommentID = {$commentID}";
        $sql2 = "UPDATE gmember SET youScore = youScore - 0.1  WHERE myMemberID = {$memberID}";
    }
    
    
    $result = $connect -> query($sql);
    $result2 = $connect -> query($sql2);
    

    // if( $result && $result2 ){
    //     echo "성공";
    // } else {
    //     echo "실패";
    // }


?>
<script>
    window.history.back();
</script>