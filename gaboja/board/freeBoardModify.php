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
                            <h3>글수정하기</h3>
                            <p>게시글을 수정할 수 있습니다.</p>
                            <div class="board-write">
                                <form action="freeBoardModifySave.php" name="freeBoardModifySave" method="post" >
                                    <fieldset>
                                        <legend class="ir_so">게시판 글쓰기 영역입니다.</legend>
                                        <?php 
                                            $boardID = $_GET['boardID'];
                                            $myMemberID = $_SESSION['myMemberID'];
                                            
                                            
                                            $sql = "SELECT myMemberID, myBoardID from gBoard where myMemberID = ${myMemberID} AND myBoardID = ${boardID}";                                        
                                            $sql2 = "SELECT b.boardTitle, b.boardContent, m.youName FROM gBoard b JOIN gmember m ON (b.myMemberID = m.myMemberID) WHERE b.myBoardID = ${boardID}";
                                            
                                            $result =  $connect -> query($sql);
                                            $result2 = $connect -> query($sql2);

                                            $count = $result -> num_rows;

                                            if( $count > 0 ){
                                                $info = $result2 -> fetch_array(MYSQLI_ASSOC);
                                                if($result2){
                                                    echo "<div style='display:none'><label for='boardID'>번호</label>";
                                                    echo "<input type='text' name='boardID' id='boardID' value='".$_GET['boardID']."'></div>";
                                                    echo "<div class='boardTitle'><label for='boardTitle'>제목</label>";
                                                    echo "<input type='text' class='title-text' name='boardTitle' id='boardTitle' value='".$info['boardTitle']."'></div>";
                                                    echo "<div><label for='boardContent'>내용</label>";
                                                    echo "<textarea name='boardContent' id='boardContent' class='title-text' rows='13'>".$info['boardContent']."</textarea></div>";
                                                }
                                            
                                            } else {
                                                echo '<script type="text/javascript">'; 
                                                echo 'alert("해당 글 사용자가 아닙니다.");';
                                                echo 'window.location.href = "./freeBoard.php";';
                                                echo '</script>';
                                            }   
                                        ?>
                                    </fieldset>
                                    <button type="submit" class="btn_submit3" value="수정하기">수정하기</button>
                                    <button class="btn_submit4"  value="취소">취소</button>
                                </form>
                                <!-- <div class="boardTitle">
                                    <label for="boardTitle">제목</label>
                                    <input type="text" id="boardTitle" name="boardTitle" class="title-text" placeholder="제목을 입력해주세요" required autofocus>
                                </div>
                                <div>
                                    <label for="boardContent">내용</label>
                                    <textarea name="boardContent" id="boardContent" class="title-text" rows="13"  placeholder="내용을 작성해 주세요!" required></textarea>
                                </div> -->
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