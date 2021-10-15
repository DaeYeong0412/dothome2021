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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>게시글</title>
  <!-- style -->
  <link rel="stylesheet" href="../assets/css/w3c.css">
  <link rel="stylesheet" href="../assets/css/fonts.css">
  <link rel="stylesheet" href="../assets/css/var.css">
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
  </style>
</head>
<body>
    <div id="skip">
        <a href="#contents">컨텐츠 바로가기</a>
        <a href="#footer">푸터 바로가기</a>
    </div>
    <!--skip-->
    <header id="header">
        <?php
            include "../include/header.php";
        ?>
    </header>
    <!-- haeder -->
    <main id="main">
        <section id="mainView">
            <h2 class="ir_so">게시글 페이지</h2>
            <div class="container">
                <div class="fViewBox">
                    <table>
                        <thead>
                            <?php
                                $postSession = $_SESSION['myMemberID'];
                                $boardID = $_GET['boardID'];
                                $sql = "SELECT b.boardTitle ,b.boardContent, b.boardView, b.boardLike, b.regTime, b.myMemberID, m.youName, m.youScore, m.youImg, m.youIntro FROM gBoard b JOIN gmember m ON (b.myMemberID = m.myMemberID) WHERE b.myBoardID = ${boardID}";
                                $result = $connect -> query($sql);
                                $info = $result -> fetch_array(MYSQLI_ASSOC);
                                
                            ?>
   
                            <?php 
                                $view = "UPDATE gBoard SET boardView = boardView + 1 WHERE myBoardID = {$boardID}";
                                $cn = $connect -> query($view);
                                echo "<tr>";
                                echo "<th style='width: 10%'>".$info['youName']."</th>";
                                echo "<th style='width: 70%'>".date('Y-m-d  H:i:s', $info['regTime'])."</th>";
                                echo "<th style='width: 10%'> 조회수 : ".((int)$info['boardView']+1)."</th>";
                                echo "<th style='width: 10%'> 추천수 : ".$info['boardLike'] ."</th>";
                                echo "</tr>";
                            ?>
                            
                            <!-- <tr>
                                <th style="width: 10%">작성자</th>
                                <th style="width: 70%">작성일자</th>
                                <th style="width: 10%">조회수</th>
                                <th style="width: 10%">추천수</th>
                            </tr> -->
                        </thead>
                    </table>
                    <div>
                        <?php 
                            echo "<h2>".$info['boardTitle']."</h2>";
                            echo "<p>".$info['boardContent']."</p>";
                        ?>
                        <!-- <h2>여행하기 좋은 도시는 안산시 같네요</h2>
                        <p>2012. 7월 안산시에서는  안산의 대표 관광명소인 ‘안산8경’(가칭)을 선정하기 위해 2012. 7. 31일까지 대국민 공모를 하였습니다.
                           ‘안산8경’은 지역을 대표할 만한 관광명소로서 스토리 등 관광객 유인 경쟁력 역사․문화적 가치천혜의 자연경관 지역 특화가 가능한 장소 또는 경관 등을 대상으로 하였고
                           안산의 대표 관광명소 선정을 통해 외부 관광객 유치 홍보마케팅 및 관광도시 브랜드 구축을 위해 추진한 (가칭)안산8경이 다음과 같이 선정되었다고 합니다.
                        </p> -->
                        <?php
                            if( isset( $_SESSION['myMemberID'] ) ){
                                echo "<a class='commentBtn dilike board' href='./freeBoardLike.php?like=dislike&memberID=".$info['myMemberID']."&boardID=".$boardID."'>비추천</a>";
                                echo "<a class='commentBtn like board' href='./freeBoardLike.php?like=like&memberID=".$info['myMemberID']."&boardID=".$boardID."''>추천</a>";
                            }
                        ?>
                        
                    </div>
                </div>
                <div class="fViewbtn">
                    <!-- <a href="./freeBoardModify.php">수정하기</a> -->
                    <? echo "<a href='./freeBoardModify.php?boardID=".$boardID."'>수정하기</a>" ?>
                    <?
                        if( isset($_SESSION['myMemberID']) ){
                            echo "<a href='#' class='cf__js'>삭제하기</a>";
                        }
                    ?>
                    <!-- <a href="#" class="cf__js">삭제하기</a> -->
                    <a href="./freeBoard.php">목록보기</a>
                </div>
                <section class="memberInfo">
                    <? 
                        echo "<img src=../assets/img/".$info['youImg']." alt='프로필 사진'>";
                    ?>
                    <!-- <img src="../assets/img/memberProfile01.jpg" alt="프로필사진"> -->
                    <div class="memScore">
                        <span>매너온도</span>
                        <div class="scoreWrap">
                            <div class="w3-light-grey">
                                <?
                                    echo "<div class='w3-green temp__js' style='height:7px;width:".number_format($info['youScore'],1)."%;border-radius: 8px;'></div>";
                                ?>
                                <!-- <div class="w3-green" style="height:7px;width:36.5%;border-radius: 8px;"></div> -->
                            </div>
                            <!-- <div class="scoreBor">
                                <div class="w3-green" style="height:24px;width:25%"></div>
                            </div> -->
                            <div class="scoreFace">
                                <img class="temp2" src="../assets/ico/normal.svg" alt="기본온도아이콘">
                                <?php 
                                    echo "<span class='temp'>".number_format($info['youScore'],1)."℃</span>";
                                ?>
                                <!-- <span>36.5℃</span> -->
                            </div>
                            <div class="nowScroe">
                                <span>첫온도 36.5℃</span>
                            </div>
                        </div>
                    </div>
                    <div class="intro">
                        <? echo "<span>".$info['youName']."</span>"; ?>
                        <!-- <span>김보노</span> -->
                        <div class="introBoard">
                        <? echo "<p
                        .>".$info['youIntro']."</p>"; ?>
                            <!-- <p>여행을 좋아하는 사람입니다</p> -->
                        </div>
                    </div>
                </section>
                
                <section id="commentWrite">
                    <form action="../comment/commentSave.php" class="co" method="post">
                        <?php
                            /*
                                1. 로그인 했을때
                                2. 로그인 하지 않았을때
                            */
                            if( !isset($_SESSION['myMemberID']) ){
                                echo "<textarea name='commentText' id='commentText' class='commentText' rows='4'  placeholder='로그인해주세요!' required></textarea>";
                                echo "<button class='commentBtn need'>등록</button>";
                            } else {
                                echo "<input style='display:none' type='text' name='boardID' value='".$boardID."'/>";
                                echo "<span class='commentName'>".$_SESSION['youName']."</span>";
                                echo "<textarea name='commentText' id='commentText' class='commentText' rows='4'  placeholder='댓글 내용을 작성해 주세요!' required></textarea>";
                                echo "<button type='submit' class='commentBtn'>등록</button>";
                            }
                        ?>
                    </form>
                    <!-- <span class="commentName">여기다가 이름을 뿌릴예정이다</span>
                    <textarea name="boardContent" id="boardContent" class="commentText" rows="4"  placeholder="댓글 내용을 작성해 주세요!" required></textarea>
                    <button class="commentBtn">등록</button> -->
                </section>
                <section class="comment">
                    <div class="commentwrap">
                        <?php
                            $boardID = $_GET['boardID'];
                            $sql = "SELECT c.myCommentID, c.myMemberID, c.youText, c.youLike, c.youDislike, c.regTime, m.youName FROM gComment c JOIN gmember m ON (c.myMemberID = m.myMemberID) WHERE c.myBoardID = ${boardID}";
                            $result = $connect -> query($sql);
                            if($result){
                                $count = $result -> num_rows;
                                if($count > 0){
                                    for($i=1; $i<=$count;$i++){
                                        $info = $result -> fetch_array(MYSQLI_ASSOC);
                                        echo "<span class='commentName'>".$info['youName']."</span>";
                                        echo "<p class='commentContents'>".$info['youText']."</p>";
                                        if( isset( $_SESSION['myMemberID'] ) ){
                                            echo "<a href='../comment/commentLike.php?like=dislike&memberID=".$info['myMemberID']."&commentID=".$info['myCommentID']."' class='commentBtn dilike'>비추천</a>";
                                            echo "<a href='../comment/commentLike.php?like=like&memberID=".$info['myMemberID']."&commentID=".$info['myCommentID']."' class='commentBtn like'>추천</a>";
                                        }
                                        
                                        
                                        echo "<div class='commentInfo'>";
                                            echo "<span>".date('Y-m-d H:i:s',$info['regTime'])."</span>";
                                            echo "<span>추천/비추천 :</span>";
                                            echo "<span>".$info['youLike']."/".$info['youDislike']."</span>";
                                            if( isset($_SESSION['myMemberID']) ){
                                                echo "<a href='../comment/commentRemove.php?commentID=".$info['myCommentID']."' class='comRemoveBtn'>삭제하기</a>";
                                            }
                                        echo "</div>";
                                    }
                                }
                            }
                        ?>
                        <!-- <span class="commentName">댓글을 단 회원이름 있다</span>
                        <p class="commentContents">댓글내용이 있어요</p>
                        <button class="commentBtn dilike">비추천</button>
                        <button class="commentBtn like">추천</button>
                        <div class="commentInfo">
                            <span>2021/10/31</span>
                            <span>추천/비추천 :</span>
                            <span>3/1</span>
                        </div>-->
                    </div>
                </section>
            </div>
            <!-- container -->
        </section>
    </main>
    <!-- main -->
    <footer>
            <?php
                include "../include/footer.php";
            ?>
    </footer>
    <!--//footer-->
    <script>
        const cf = document.querySelector(".cf__js");
        const commentBtn = document.querySelector(".need");
        const comRemoveBtn = document.querySelector(".comRemoveBtn");
        if( commentBtn ){
            commentBtn.addEventListener("click",()=>{
                alert("로그인 해주세요!");
            });
        }
        if( cf ){
            cf.addEventListener("click",function(e){
                if( confirm("정말로 해당 글을 삭제 하시겠습니까?") == true ){
                    const queryString = window.location.search.split(/\?/);
                    window.location = "./freeBoardRemove.php?"+queryString[1];
                } else {
                    console.log("취소");
                }
            });
        }
        if(comRemoveBtn){
            comRemoveBtn.addEventListener("click",e=>{
            if ( confirm("정말로 해당 댓글을 삭제 하시겠습니까?") == true ){
                const queryString2 = window.location.search.split(/\?/);
            } else {
                console.log("취소");
                e.preventDefault();
                // e.stopPropagation();
            }
        });
        }
        
       
        
        let temp = document.querySelector('.temp');
        let temp2 = document.querySelector('.temp2');
        const temper = parseInt(temp.innerText.match(/\d+/));
        const outer = document.querySelector('.w3-green');
        window.onload = function(){
            
            console.log(temp);
            if( temper > 37){
                temp2.src = "../assets/ico/good.svg"
                temp.style.color = 'red';
                outer.classList.remove('w3-green');
                outer.classList.add('w3-red');
 
                
                //37 보다 클때 레드   
            } else if ( temper < 36){
                //37 보다 클때 36보다 작을때 블루
                temp2.src = "../assets/ico/sad.svg"
                temp.style.color = 'blue';
                outer.classList.remove('w3-green');
                outer.classList.add('w3-blue');
            }
        }
       
    </script>
</body>
</html>