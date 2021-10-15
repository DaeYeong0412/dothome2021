<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $boardTitle = $_POST['boardTitle'];
    $boardContent = $_POST['boardContent'];

    

    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContent = $connect -> real_escape_string($boardContent);

    $boardView = 0;
    $regTime = time();
    $memberID = $_SESSION['myMemberID'];

    //데이터 입력
    $sql = "INSERT INTO gBoard(myMemberID, boardTitle, boardContent, boardView, boardLike, boardDislike, regTime) VALUES('$memberID', '$boardTitle', '$boardContent', '$boardView',0,0,'$regTime')";
    $result = $connect -> query($sql);

    // if( $result ){
    //     echo "Good";
    // } else {
    //     echo "Bad";
    // }
?>
<script>
    location.href = "./freeBoard.php";
</script>