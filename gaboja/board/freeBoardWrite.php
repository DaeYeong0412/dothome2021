<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>게시판</title>
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
    <!-- header -->
    <main id="freeContents">
        <div class="container">
            <section id="mainCont">
                <h2 class="ir_so">메인 컨텐츠</h2>
                <article class="content-article">
                        <div class="boardType">
                            <h3>글쓰기</h3>
                            <p>여행과 관련된 주제를 자유롭게 써보세요</p>
                            <div class="board-write">
                                <form action="freeBoardWriteSave.php" name="boardWriteSave" method="post" >
                                    <fieldset>
                                        <legend class="ir_so">게시판 글쓰기 영역입니다.</legend>
                                        <div class="boardTitle">
                                            <label for="boardTitle">제목</label>
                                            <input type="text" id="boardTitle" name="boardTitle" class="title-text" placeholder="제목을 입력해주세요" required autofocus>
                                        </div>
                                        <div>
                                            <label for="boardContent">내용</label>
                                            <textarea name="boardContent" id="boardContent" class="title-text" rows="13"  placeholder="내용을 작성해 주세요!" required></textarea>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn_submit3" value="글쓰기">글쓰기</button>
                                    <button class="btn_submit4"  value="취소">취소</button>
                                </form>
                            </div>
                        </div>
                </article>
            </section>
        </div>
    </main>
    <!-- contents -->
    <footer>
        <?php
            include "../include/footer2.php";
        ?>
    </footer>
    <!-- footer -->
    <script>
        document.querySelector(".btn_submit4").addEventListener("click",function(){
            window.history.back();
        });
    </script>
</body>
</html>