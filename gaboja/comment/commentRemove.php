<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    $commentID = $_GET['commentID'];
    $commentID = $connect -> real_escape_string($commentID);
    $myMemberID = $_SESSION['myMemberID'];
    echo "$commentID";
    echo "$boardID";
    $sql = "SELECT myCommentID, myMemberID FROM gComment WHERE myMemberID = ${myMemberID} AND myCommentID = ${commentID}";
    $result = $connect -> query($sql);
    $count = $result -> num_rows;
    if( $count > 0 ){
        $sql = "DELETE FROM gComment WHERE myCommentID = {$commentID}";
        $connect -> query($sql);
        echo "<script>alert(\"해당 댓글이 삭제 되었습니다.\");</script>";
    } else {
        echo "<script>alert(\"해당 댓글을 작성한 사용자가 아닙니다.\");</script>";
    }
?>
<script>
    history.back();
</script>