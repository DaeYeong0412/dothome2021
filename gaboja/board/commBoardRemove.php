<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    $boardID = $_GET['boardID'];
    $boardID = $connect -> real_escape_string($boardID);
    $sql = "DELETE FROM gBoard WHERE myBoardID = {$boardID}";
    $connect -> query($sql);
?>
<script>
    location.href = "freeBoard.php";
</script>