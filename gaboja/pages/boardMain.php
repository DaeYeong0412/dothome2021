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
  <title>메인 게시판</title>

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
    <!-- haeder -->
    <main id="main">

        <!-- section -->
        <section id="mainContent">
            <h2 class="ir_so">메인 컨텐츠</h2>
            <div class="container">
                <article class="content-swiper s3">
                    <span class="swiper-wrap">
                        <span class="swiper-title">진해 벚꽃축제</span>
                        <p class="swiper-desc">
                            군항도시에서 함께 즐기는 세계 최대 벚꽃축제 &lt진해군항제&gt가 2019 4월 1일부터
                        </p>
                    </span>
                    <!-- swiper-wrap -->
                </article>
                <!-- article -->
                <article class="content-swiper s2 active">
                    <span class="swiper-wrap">
                    <span class="swiper-title">부산 불꽃축제</span>
                        <p class="swiper-desc">
                            멀티미디어 해상쇼라는 취지대로 매년 다양한 불꽃뿐만 아니라 화려한 레이저 쇼 등을 테마에 맞는 음악과 함께 선보이며, 특이한 모양의 불꽃뿐만 아니라 초대형 불꽃도 선보이는 축제로 유명하다.
                        </p>
                    </span>
                    <!-- swiper-wrap -->
                </article>
                <!-- article -->
                
                <article class="content-swiper s1">
                    <span class="swiper-wrap">
                        <span class="swiper-title">안동 탈춤 축제</span>
                        <p class="swiper-desc">
                            안동국제탈춤페스티벌은 매년 9월 마지막 주 금요일부터 10일간 개최되는 국내 최대 ...
                        </p>
                    </span>
                    <!-- swiper-wrap -->
                </article>
                <!-- article -->
                <article class="content-festival">
                    <div class="festival-wrap">
                        <h2 class="ir_so">페스티벌 컨텐츠</h2>
                        <div class="festival">
                            <img src="../assets/img/festival3.jpg" alt="페스티벌1" class="festival-img">
                            <div class="festival-sub">
                                <strong class="festival-title">진해 벚꽃축제</strong>
                                <span class="festival-desc" >군항도시에서 함께 즐기는 세계 최대 벚꽃축제 &lt진해군항제&gt가 2019 4월 1일부터  ...</span>
                                <a class="festival-link" href="#">자세히 보기</a>
                            </div>
                        </div>
                        <div class="festival active">
                            <img src="../assets/img/festival2.jpg" alt="페스티벌2" class="festival-img">
                            <div class="festival-sub">
                                <strong class="festival-title">부산 불꽃축제</strong>
                                <span class="festival-desc" >멀티미디어 해상쇼라는 취지대로 매년 다양한 불꽃뿐만 아니라 화려한 레이저 쇼 등을 ...</span>
                                <a class="festival-link" href="#">자세히 보기</a>
                            </div>
                        </div>
                        <div class="festival">
                            <img src="../assets/img/festival1.jpg" alt="페스티벌3" class="festival-img">
                            <div class="festival-sub">
                                <strong class="festival-title">안동 탈춤 축제</strong>
                                <span class="festival-desc" >안동국제탈춤페스티벌은 매년 9월 마지막 주 금요일부터 10일간 개최되는 국내 최대 ...</span>
                                <a class="festival-link" href="#">자세히 보기</a>
                            </div>
                        </div>
                        <!-- festival -->
                    </div>
                    <!-- festival-wrap -->
                </article>
                <!-- article -->
            </div>
            <!-- container -->
        </section>
        <!-- section -->
        <section id="withContent">
            <div class="container">
                <div class="community">
                <h2>같이가요</h2>
                    <a href="#">
                        <div class="communityImg">
                            <img src="../assets/img/withContent1.jpg" alt="첫번째 사진입니다.">
                        </div>
                        <div class="communityText">
                            <h4>부산 1박 2일 여행 함께하실 분 구합니다!</h4>
                            <p>부산 바캉스 함께 가실 분 구합니다~! 숙박비 반띵하고 같이 국밥 투어도 해요 ㅎㅎ 23일 아침8시까지 홍대입구역 7번출구로 오시면 픽업 가능합니다 :) 같이 가실분 계시면 ...</p>
                            <ul>
                                <li>2021.08.20</li>
                                <li>23</li>
                                <li>2</li>
                                <span>강지훈</span>
                            </ul>
                        </div>
                    </a>
                    <a href="#">
                        <div class="communityImg">
                            <img src="../assets/img/withContent2.jpg" alt="두번째 사진입니다.">
                        </div>
                        <div class="communityText">
                            <h4>부산 1박 2일 여행 함께하실 분 구합니다!</h4>
                            <p>부산 바캉스 함께 가실 분 구합니다~! 숙박비 반띵하고 같이 국밥 투어도 해요 ㅎㅎ 23일 아침8시까지 홍대입구역 7번출구로 오시면 픽업 가능합니다 :) 같이 가실분 계시면 ...</p>
                            <ul>
                                <li>2021.08.20</li>
                                <li>23</li>
                                <li>2</li>
                                <span>강지훈</span>
                            </ul>
                        </div>
                    </a>
                    <a href="#">
                        <div class="communityImg">
                            <img src="../assets/img/withContent3.jpg" alt="세번째 사진입니다.">
                        </div>
                        <div class="communityText">
                            <h4>부산 1박 2일 여행 함께하실 분 구합니다!</h4>
                            <p>부산 바캉스 함께 가실 분 구합니다~! 숙박비 반띵하고 같이 국밥 투어도 해요 ㅎㅎ 23일 아침8시까지 홍대입구역 7번출구로 오시면 픽업 가능합니다 :) 같이 가실분 계시면 ...</p>
                            <ul>
                                <li>2021.08.20</li>
                                <li>23</li>
                                <li>2</li>
                                <span>강지훈</span>
                            </ul>
                        </div>
                    </a>
                    <a href="#">
                        <div class="communityImg">
                            <img src="../assets/img/withContent4.jpg" alt="네번째 사진입니다.">
                        </div>
                        <div class="communityText">
                            <h4>부산 1박 2일 여행 함께하실 분 구합니다!</h4>
                            <p>부산 바캉스 함께 가실 분 구합니다~! 숙박비 반띵하고 같이 국밥 투어도 해요 ㅎㅎ 23일 아침8시까지 홍대입구역 7번출구로 오시면 픽업 가능합니다 :) 같이 가실분 계시면 ...</p>
                            <ul>
                                <li>2021.08.20</li>
                                <li>23</li>
                                <li>2</li>
                                <span>강지훈</span>
                            </ul>
                        </div>
                    </a>
                    <a href="#">
                        <div class="communityImg">
                            <img src="../assets/img/withContent5.jpg" alt="다섯번째 사진입니다.">
                        </div>
                        <div class="communityText">
                            <h4>부산 1박 2일 여행 함께하실 분 구합니다!</h4>
                            <p>부산 바캉스 함께 가실 분 구합니다~! 숙박비 반띵하고 같이 국밥 투어도 해요 ㅎㅎ 23일 아침8시까지 홍대입구역 7번출구로 오시면 픽업 가능합니다 :) 같이 가실분 계시면 ...</p>
                            <ul>
                                <li>2021.08.20</li>
                                <li>23</li>
                                <li>2</li>
                                <span>강지훈</span>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="free">
                    <div class="banner">
                        <a href="#">
                            <img src="../assets/img/withContent6.jpg" alt="여섯번째 사진입니다.">
                            <h3>광고 배너</h3>
                        </a>
                    </div>
                    <h2><a href="../board/freeBoard.php">자유게시판</a></h2>
                    <?php
                        $numView = 5;
    
                        $sql = "SELECT b.myBoardID, b.boardTitle, b.boardLike, m.youName, b.boardView, b.regTime FROM gmember m JOIN gBoard b ON (m.myMemberID = b.myMemberID) ORDER BY myBoardID DESC LIMIT {$numView}";
                        $sql2 = "SELECT b.myBoardID, b.boardTitle, b.boardLike, m.youName, b.boardView, b.regTime FROM gmember m JOIN gBoard b ON (m.myMemberID = b.myMemberID) ORDER BY b.boardLike DESC LIMIT {$numView}";
                        
                        $result = $connect -> query($sql);
                        $result2 = $connect -> query($sql2);
                        
                        $count = $result -> num_rows;
                        $today=date("Ymd"); 
                        $today_year=(isset($today_year)) ? $today_year : date("Y"); 
                        $today_month=(isset($today_month)) ? $today_month : date("m"); 
                        $today_day=date("d"); 
                        $this_time = "$today_year-$today_month-$today_day";
                        $info = $result -> fetch_array(MYSQLI_ASSOC);
                        $write_time = date("Y-m-d", $info['regTime']);
                        $time_diff = strtotime($this_time) - strtotime($write_time);
                        $day_diff = floor(($time_diff)/(60*60*24));
                        if($day_diff == 0) $when_write = "오늘"; //0일 차이일 경우 
                            else if($day_diff == 1) $when_write = "어제"; //1일 차이일 경우 
                            else if($day_diff == 2) $when_write = "그저께"; //2일 차이일 경우 
                            else if($day_diff < 7) $when_write = $day_diff."일 전"; //7일 차이 전까지는 '며칠 전'으로 표시 
                            else if($day_diff < 28) $when_write = floor($day_diff / 7)."주 전"; //4주(28일) 차이 전까지는 '몇주 전'으로 표시 
                            else { //4주(28일)를 넘어가는 경우 
                            $month_diff = $today_month - date("m",$info['regTime']); 
                            if($month_diff <= 0) $month_diff = $month_diff + 12; 
                            $year_diff = $today_year - date("Y",$info['regTime']); 
                            
                            if($month_diff >= 12) $when_write = $year_diff."년 전"; //12달 이상 차이가 나는 경우
                            else //12달 미만 차이가 나는 경우 
                            { 
                            if($year_diff <= 1) $when_write = $month_diff."달 전"; 
                            else $when_write = $year_diff."년 전"; 
                            } 
                        } 
                    
                        echo "<div class='freebox'>";
                        echo "<div class='hotbox'>";
                        echo "<h3>인기 게시물</h3>";
                        $result2 = $connect -> query($sql2);
                        for($i=0; $i<$count; $i++){
                            $info = $result2 -> fetch_array(MYSQLI_ASSOC);
                            echo "<a href='../board/freeBoardView.php?boardID={$info['myBoardID']}'>";
                            echo "<ul>";
                            echo "<li>".$info['boardTitle']."<img src='../assets/ico/icon8.svg' alt='hotboximg'></li>";
                            echo "<li>".$info['boardLike']."</li>";
                            echo "<li>".$info['boardView']."</li>";
                            echo "<li>".$when_write."</li>";
                            echo "<li>".$info['youName']."</li>";
                            echo "</ul>";
                            echo "</a>";
                        }
                        echo "<span><a href='../board/freeBoard.php'>인기 게시물 더보기</a></span>";
                        echo "</div>";
                        echo "<div class='newbox'>";
                        echo "<h3>최신 게시물</h3>";
                        $result = $connect -> query($sql);
                        for($i=1; $i<=5; $i++){
                            $info = $result -> fetch_array(MYSQLI_ASSOC);
                            echo "<a href='#'>";
                            echo "<ul>";
                            echo "<li>".$info['boardTitle']."<img src='../assets/ico/icon7.svg' alt='hotboximg'></li>";
                            echo "<li>".$info['boardLike']."</li>";
                            echo "<li>".$info['boardView']."</li>";
                            echo "<li>".$when_write."</li>";
                            echo "<li>".$info['youName']."</li>";
                            echo "</ul>";
                            echo "</a>";
                        }
                        echo "<span><a href='../board/freeBoard.php'>최신 게시물 더보기</a></span>";
                        echo "</div>";
                    ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- //withContent -->
    </main>
    <!-- main -->

    <!--footer-->
        <footer>
            <?php 
                include "../include/footer.php";
            ?>
        </footer>
    <!--//footer-->
    <script>
        const festival = document.querySelectorAll(".festival-wrap .festival");
        const tabList = document.querySelectorAll(".content-swiper");
        festival.forEach( ( el, index )=>{
            el.addEventListener( "click", function(){
                festival.forEach( ( el, idx )=>{
                    el.classList.remove("active");
                    tabList[idx].classList.remove("active");
                });
                this.classList.add("active");
                tabList[index].classList.add("active");
            });
        });
    </script>
</body>
</html>