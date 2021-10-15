<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    $commentText = $_POST['commentText'];
    $commentText = $connect -> real_escape_string($commentText);
    $regTime = time();
    $memberID = $_SESSION['myMemberID'];
    $boardID = $_POST['boardID'];
    // echo "$boardID";
    //데이터 입력
    $sql = "INSERT INTO gComment(myMemberID, myBoardID, youText, youLike, youDislike, regTime) VALUES ('$memberID', '$boardID', '$commentText', 0, 0 ,'$regTime')";
    $result = $connect -> query($sql);
    echo "<script>location.href = '../board/freeBoardView.php?boardID=".$boardID."#commentWrite'</script>";
?>