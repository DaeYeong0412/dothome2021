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
  <title>내 정보 페이지</title>

  <!-- style -->
  <link rel="stylesheet" href="../assets/css/w3c.css">
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
    <main id="informationMain">
        <div class="content-article">
            <section class="left">
                왼쪽
            </section>
            <section class="right">
                오른쪽
            </section>
        </div>
    </main>
    <!-- main -->

        <footer>
            <?php 
                include "../include/footer2.php";
            ?>
        </footer>
    <!--//footer-->
</body>
</html>