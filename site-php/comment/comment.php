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
    <title>댓글</title>

    <!-- style -->
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/var.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- //style -->

</head>
<body>

    <div id="skip">
        <a href="#contents">Contents 바로가기</a>
        <a href="#footer">Footer 바로가기</a>
    </div>
    <!-- //skip -->

    <header id="header">
    <?php
        include "../include/header.php";
    ?>
    </header>
    <!-- //header -->

    <main id="contents">
        <section id="mainCont">
            <h2 class="ir_so">메인 컨텐츠</h2>
            <article class="content-article">
                <!-- cardType01 -->
                <section class="cardType">
                        <div class="cardType01">
                            <h2>오늘의 여행 추천</h2>
                            <p>국내 여행 및 해외여행의 추천지의 베스트 이미지 샷을 올리는 공간 입니다. 각종 여행지와 해당 여행지에 대한 정보를 볼수있습니다.</p>
                            <div class="card-wrap">
                                <div class="card">
                                    <a href="#">
                                        <img src="../assets/img/card01.jpg" alt="바다 관련 이미지입니다." class="card-img">
                                        <strong class="card-title">바다</strong>
                                        <span class="card-desc">파란 바다와 하얀 건물들로 유명한<br>그리스의 산토리니</span>
                                        <span class="card-keyword">
                                            <span>#그리스</span>
                                            <span>#바다</span>
                                            <span>#산토리니</span>
                                            <span>#포카리스웨이트</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="card">
                                    <a href="#">
                                        <img src="../assets/img/card02.jpg" alt="신비한 자연경관 관련 이미지입니다." class="card-img">
                                        <strong class="card-title">신비한 자연경관</strong>
                                        <span class="card-desc">유네스코 세계 자연 유산으로 유명한<br>짐바브웨의 빅토리아 폭포</span>
                                        <span class="card-keyword">
                                            <span>#짐바브웨</span>
                                            <span>#유네스코</span>
                                            <span>#폭포</span>
                                            <span>#세계 3대 폭포</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="card">
                                    <a href="#">
                                        <img src="../assets/img/card03.jpg" alt="산과 넓은 초원 관련 이미지입니다." class="card-img">
                                        <strong class="card-title">산과 넓은 초원</strong>
                                        <span class="card-desc">반지의 제왕 촬영지로 유명한<br>뉴질랜드의 남 섬</span>
                                        <span class="card-keyword">
                                            <span>#뉴질랜드</span>
                                            <span>#남 섬</span>
                                            <span>#반지의 제왕</span>
                                            <span>#호빗</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                </section>
                <!-- //cardType01 -->
            </article>
            <article class="flow-article">
                <h3 class="ir_so">여행사진 공유공간</h3>
                <section id="comment" class="section-comment">
                    <h4>여행사진 공유하기</h4>
                    <p>다른 유저들의 여행사진에 댓글을 올릴수 있습니다.</p>
                    <div class="comment-form">
                        <form action="commentSave.php" method="post" name="comment">
                            <fieldset>
                                <legend class="ir_so">댓글 영역</legend>
                                <div class="comment-wrap">
                                    <div>
                                        <label for="youName" class="ir_so">이름</label>
                                        <input type="text" name="youName" id="youName" class="input_write2" placeHolder="이름" autocomplete="off" maxlength = "5" required>
                                    </div>
                                    <div>
                                        <label for="youText" class="ir_so">댓글 내용을 적어주세요.</label>
                                        <input type="text" name="youText" id="youText" class="input_write2 w100" placeHolder="댓글 내용을 적어주세요." autocomplete="off" required>
                                    </div>
                                    <button class="btn_submit2" type="submit" value="업로드하기">등록</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="comment-list">
                        <?php
                            include "../connect/connect.php";

                            $sql = "SELECT * FROM myComment LIMIT 20";
                            $result = $connect -> query($sql);

                            // echo "<pre>";
                            // var_dump(mysqli_fetch_array($result));
                            // echo "</pre>";

                            while( $info = mysqli_fetch_array($result)){
                        ?>
                            <div>
                                <p><?=$info['youText']?></p>
                                <div>
                                    <img src="../assets/img/card01.jpg" alt="">
                                    <span><?=$info['youName']?></span>
                                    <span><?=date('Y-m-d H:i', $info['regTime'])?></span>
                                </div>
                            </div>
                        <?php
                            }
                        ?>

                        <!-- <div>
                            <p>정말 아름다워요.</p>
                            <div>
                                <img src="../assets/img/card01.jpg" alt="">
                                <span>송대영</span>
                                <span>2021-09-16</span>
                            </div>
                        </div> -->
                    </div>
                </section>
            </article>
        </section>
    </main>
    <!-- //contents -->

    <footer id="footer">
        footer
    </footer>
    <!-- //footer -->

</body>
</html>