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
  <title>로그인</title>
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
    <!-- //header -->
    <main id="main">
        <div class="container">
            <div id="loginCont">
                <h2><a href="../pages/boardMain.php">gaboja</a></h2>
                <div class="memberForm">
                    <h3>로그인</h3>
                    <form name="login" action="loginSave.php" method="POST">
                        <fieldset>
                            <legend class="ir_so">로그인 입력폼</legend>
                            <div class="memberBox">
                                <div>
                                    <label for="youId">아이디</label>
                                    <input type="text" name="youId" id="youId" class="input_write" placeholder="아이디를 입력해 주세요" autocomplete="off" autofocus required>
                                </div>
                                <div>
                                    <label for="youPass">비밀번호</label>
                                    <input type="password" name="youPass" id="youPass" class="input_write" maxlength="20" placeholder="비밀번호를 입력해 주세요" autocomplete="off" required>
                                </div>
                            </div>
                        </fieldset>
                        <button id="loginBtn" class="btn_submit" type="submit">로그인</button>
                    </form>
                    
                    <div class="memberFind">
                        <ul>
                            <li><a href="#">아이디 찾기</a></li>
                            <li><a href="#">비밀번호 찾기</a></li>
                            <li><a href="condition.php">회원가입</a></li>
                        </ul>
                    </div>
                </div>
            </div>
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