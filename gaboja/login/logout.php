<?php 
    include "../connect/session.php";
    unset($_SESSION['myMemberID']);
    unset($_SESSION['youID']);
    unset($_SESSION['youName']);
?>


<script>
    location.href = "../pages/boardMain.php";
</script>