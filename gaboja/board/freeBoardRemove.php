<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    $boardID = $_GET['boardID'];
    $boardID = $connect -> real_escape_string($boardID);
    $myMemberID = $_SESSION['myMemberID'];
    $sql = "SELECT myMemberID, myBoardID from gBoard where myMemberID = ${myMemberID} AND myBoardID = ${boardID}";
    $result =  $connect -> query($sql);
    $count = $result -> num_rows;
    if( $count > 0 ){
        $sql = "DELETE FROM gBoard WHERE myBoardID = {$boardID}";
        $connect -> query($sql);
        echo "<script>alert(\"해당 게시글이 삭제 되었습니다.\");</script>";
    } else {
        echo "<script>alert(\"해당글을 작성한 사용자가 아닙니다.\");</script>";
    }
?>
<script>
    location.href = "freeBoard.php";
</script>