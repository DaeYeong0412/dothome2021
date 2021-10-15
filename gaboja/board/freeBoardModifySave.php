<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $boardID = $_POST['boardID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContent = $_POST['boardContent'];
    
    echo $boardID, $boardTitle, $boardContent;

    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContent = $connect -> real_escape_string($boardContent);
    $myMemberID = $_SESSION['myMemberID'];
    
    $sql = "SELECT myMemberID, myBoardID from gBoard where myMemberID = ${myMemberID} AND myBoardID = ${boardID}"; 
    $result =  $connect -> query($sql);
    $count = $result -> num_rows;
    if( $count > 0 ){
        $sql = "UPDATE gBoard set boardTitle = '{$boardTitle}', boardContent = '{$boardContent}' WHERE myBoardID ='{$boardID}'";
        $result = $connect -> query($sql);
    }
?> 

<script>
    location.href="freeBoard.php";
</script>
</body>
</html>

