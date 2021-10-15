<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<h1><a href="../pages/boardMain.php">GABOJA</a></h1>
<nav>
    <h2 class="ir_so">메인 메뉴</h2>
    <ul>
        <li><a href="#">일정 만들기</a></li>
        <li><a href="#">같이가요</a></li>
        <li><a href="../board/freeBoard.php">자유게시판</a></li>
        <li><a href="../howtouse/howtouseMain.php">이용방법</a></li>
        <li><a href="../introduce/introduceMain.php">사이트 소개</a></li>
    </ul>
</nav>
<div class="member">
    <strong class="ir_so">회원 정보 영역</strong>

    <?php if( isset($_SESSION['myMemberID']) ){ ?>   
        <div class="memberlog">
            <div class="memberImg">
                <div>
                    <span></span>
                </div>
            </div>
            <div class="memberText">
                <a class="memberName" href="#"><?=$_SESSION['youName']?> 님</a>
                <ul>
                    <li><a href="../information/informationMain.php">내 정보</a></li>
                    <li><a href="#">나의 여행플랜</a></li>
                    <li><a href="../login/logout.php">로그아웃</a></li>
                </ul>
            </div>
        </div> 
<?php } else { ?>
        <a href="../login/login.php">로그인</a>
        <a href="../login/condition.php">회원가입</a>
<?php } ?>
</div>