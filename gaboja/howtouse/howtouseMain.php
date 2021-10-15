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
    <main id="howtouse">
        <section class="howtouse">
            <div class="content-article">
                <div>
                    <img src="../assets/img/hotouse1.jpg" alt="첫번째">
                    <span>1. 이용약관을 확인후 동의란에 체크를 해주세요.<br><br><br>2. 이용약관 체크를 전부 한뒤 확인 버튼을 누릅니다.</span>
                </div>
                <div>
                    <span>3. 회원가입 정보 기입란에 해당하는 정보들을 기입해준뒤 회원가입 완료 버튼을 눌러줍니다.</span>
                    <img src="../assets/img/hotouse2.jpg" alt="두번째">
                </div>
                <div>
                    <img src="../assets/img/hotouse3.jpg" alt="세번째">
                    <span>4. 회원가입 완료페이지로 넘어간후 로그인하기 버튼을 눌러 로그인 페이지로 이동합니다.</span>
                </div>
                <div>
                    <span>5. 로그인 창에서 아이디와 비밀번호를 입력후 로그인 버튼을 눌러 로그인을 완료합니다.</span>
                    <img src="../assets/img/hotouse4.jpg" alt="네번째">
                </div>
                <div>
                    <img src="../assets/img/hotouse5.jpg" alt="다섯번째">
                    <span>6. 로그인이 완료가 된후 메인페이지로 이동이 되며 이후 메인페이지에서 여러 기능들을 만나보세요.</span>
                </div>
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