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
  <title>회원가입 완료</title>
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
    <main id="jcmain">
        <div class="container">
            <div class="joinConfirm">
                <h2>GABOJA</h2>
            </div>
            <section class="jcContents">
                <div class="jcbox1">
                    <div class="jcimg">
                        <img src="../assets/img/joinMain1.jpg" alt="가입완료메인">
                    </div>
                    <div class="jctext">
                        <strong>가보자의 회원이 되신것을 환영합니다.</strong>
                        <span>Welcome to become a member of GABOJA</span>
                        <button class="jcBtn"><a href="../pages/boardMain.php">메인으로돌아가기</a></button>
                        <button class="jcBtn white"><a href="./login.php">로그인하러가기</a></button>
                    </div>
                </div>
                <div class="jcbox2">
                    <div class="jcsub">
                        <img src="../assets/img/joinSub1.jpg" alt="가입완료서브1">
                        <span>커뮤니티</span>
                        <p>커뮤니티를 통해서 여행자들과 자유롭게 정보들을 공유해 보세요.</p>
                    </div>
                    <div class="jcsub">
                        <img src="../assets/img/joinSub2.jpg" alt="가입완료서브2">
                        <span>나의플랜</span>
                        <p>간단하게 나만의 여행 일정을 계획하고 함께 여행을 떠날 친구들도 구해보세요.</p>
                    </div>
                    <div class="jcsub">
                        <img src="../assets/img/joinSub3.jpg" alt="가입완료서브3">
                        <span>축제정보</span>
                        <p>국내의 여러 지역들의 다양한 축제 정보에 관한 소식도 들어볼수 있습니다.</p>
                    </div>
                    <div class="jcsub">
                        <img src="../assets/img/joinSub4.jpg" alt="가입완료서브4">
                        <span>도움말</span>
                        <p>사용에 서투른 회원들을 위한 가보자의 이용방법 페이지를 참고해보세요.</p>
                    </div>
                </div>
            </section>
            <!-- //jcContents -->
        </div>
        <!--container-->
    </main>
    <!--main-->
    <!--footer2-->
    <footer>
        <?php 
            include "../include/footer2.php";    
        ?>
    </footer>
    <!--//footer2-->
</body>
</html>