<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>사이트 소개</title>

  <!-- style -->
  <link rel="stylesheet" href="../assets/css/fonts.css">
  <link rel="stylesheet" href="../assets/css/var.css">
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
    <div id="skip">
        <a href="#contents">컨텐츠 바로가기</a>
        <a href="#footer">푸터 바로가기</a>
    </div>
    <header id="header">
        <?php 
            include "../include/header.php";
        ?>
    </header>
    <!-- //haeder -->
    <main id="introduce">
        <section class="introduce">
            <div class="content-article">
                <img src="../assets/img/introduce1.jpg" alt="첫번째">
                <img src="../assets/img/introduce2.jpg" alt="두번째">
                <img src="../assets/img/introduce3.jpg" alt="세번째">
                <img src="../assets/img/introduce4.jpg" alt="네번째">
            </div>
        </section>
        <!-- section -->
    </main>
    <!-- main -->

        <footer>
            <?php 
                include "../include/footer.php";
            ?>
        </footer>
    <!--//footer-->
</body>
</html>