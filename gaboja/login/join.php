<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <!-- style -->
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/var.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body class="bg1">
<div id="skip">
        <a href="#contents">회원가입 바로가기</a>
        <a href="#footer">컨텐츠 바로가기</a>
    </div>
    <header>
        <h2>GABOJA</h2>
    </header>
    <!-- header -->
    <main id="contetns">
    <section id="mainCont" class="gray">
        <h2 class="ir_so">회원가입 컨텐츠</h2>
        <article class="content-article">
            <div class="container">
                <div class="memberForm">
                    <form action="joinSave.php" method="post">
                        <fieldset>
                            <legend class="ir_so">회원가입 입력폼</legend>
                            <div class="memberBox join">
                                <div>
                                    <label for="youId">아이디</label>
                                    <input type="text" name="youId" id="youId" class="input_write" placeholder="아이디를 입력해 주세요" autocmplete="off" autofocus required>
                                </div>
                                <div>
                                    <label for="youPass">비밀번호</label>
                                    <input type="password" name="youPass" id="youPass" class="input_write" maxlength="20" placeholder="비밀번호를 입력해 주세요" autocmplete="off" required>
                                    <p>*8~12자 이내 영문,숫자,특수문자를 1자 이상 조합해야 합니다.</p>
                                </div>
                                <div>
                                    <label for="youPassC">비밀번호 확인</label>
                                    <input type="password" name="youPassC" id="youPassC" class="input_write" maxlength="20" placeholder="다시 한번 비밀번호를 입력해 주세요" autocmplete="off" required>
                                </div>
                                <div>
                                    <label for="youName">이름</label>
                                    <input type="text" name="youName" id="youName" class="input_write" maxlength="5" placeholder=" 예) 홍길동" autocmplete="off" required>
                                </div>
                                <div>
                                    <label for="youPhone">핸드폰 번호</label>
                                    <input type="text" name="youPhone" id="youPhone" class="input_write" placeholder="예) 010-1234-5678" autocmplete="off" required>
                                    <!-- <label for="youEmail">이메일 인증</label>
                                    <div class="emailBox">
                                        <input type="email" name="youEmail" id="youEmail" class="input_write w80" placeholder="예) example1234@gmail.com" autocmplete="off" required>
                                        <button class="emaliBtn">인증번호 받기</button>
                                    </div> -->
                                </div>
                                <div>
                                    <strong>수신 동의/비동의</strong>
                                    <input type="checkbox" id="check1" name="check1"/>
                                    <label for="check1" class="lb1"></label>
                                </div>
                            </div>
                        </fieldset>
                        <button id="joinBtn" class="btn_submit" type="submit">회원가입 완료</button>
                    </form>

                </div>
            </div>
        </article>
    </section>
    </main>
    <!-- contents -->
    <footer id="footer">
        <?php
            include "../include/footer.php"
        ?>
    </footer>
    <!-- footer -->
</body>
</html>