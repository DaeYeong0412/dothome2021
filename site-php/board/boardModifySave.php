<!DOCTYPE html>
<html lang="en">
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
        $boardPass = $_POST['boardPass'];

        $boardID = $connect -> real_escape_string($boardID);
        $boardTitle = $connect -> real_escape_string($boardTitle);
        $boardContent = $connect -> real_escape_string($boardContent);
        $memberID = $_SESSION['myMemberID'];

        $sql = "SELECT * FROM myMember WHERE myMemberID = {$memberID}";
        $result = $connect -> query($sql);

        // 비밀번호 및 아이디 확인
        if($result) {
            $info = $result -> fetch_array(MYSQLI_ASSOC);
            if ($info['youPass'] == $boardPass && $info['myMemberID'] == $memberID) {
                //업데이트
                $sql = "UPDATE myBoard SET boardTitle = '{$boardTitle}', boardContent = '{$boardContent}' WHERE myBoardID = '{$boardID}'";
                $result = $connect -> query($sql);
            } else {
                echo "<script> alert('비밀번호가 일치하지 않습니다'); history.back(1); </script>";
            }
        }
    ?>

    <script>
    location.href = "board.php";
    </script>
</body>
</html>