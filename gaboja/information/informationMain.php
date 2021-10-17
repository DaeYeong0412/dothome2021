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
  <title>내 정보 페이지</title>

  <!-- style -->
  <link rel="stylesheet" href="../assets/css/w3c.css">
  <link rel="stylesheet" href="../assets/css/fonts.css">
  <link rel="stylesheet" href="../assets/css/var.css">
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/style.css">

  <style>
        #informationMain .informationImg {
            border: 1px solid #737373;
            border-radius: 8px;
            padding: 3%;
            justify-content: center;
        }
        #informationMain .infoImgBtn {
            position: absolute;
            top: 71%; left: 71.5%;
            width: 30px; height: 30px;
            transform: scale(0.8);
            opacity: 0.8;
            transition: all 0.3s;
        }
        #informationMain .infoImgBtn:hover {
            transform: scale(1.1);
            opacity: 1;
        }
  </style>
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
                            
    <main id="informationMain">
        <div class="content-article">
            <?php
                $postSession = $_SESSION['myMemberID'];
                $boardID = $_GET['boardID'];
                $sql = "SELECT b.myBoardID, m.regTime, b.boardView, b.boardLike, b.regTime, b.myMemberID, m.youName, m.youScore, m.youImg, m.youIntro, m.youID, m.youPhone FROM gBoard b JOIN gmember m ON (b.myMemberID = m.myMemberID)";
                $result = $connect -> query($sql);
                $info = $result -> fetch_array(MYSQLI_ASSOC);
                $count = $result -> num_rows;
            ?>
            <?php
                $sql2 = "SELECT b.myCommentID, m.youName, b.regTime FROM gmember m JOIN gComment b ON (m.myMemberID = b.myMemberID)";
                $result2 = $connect -> query($sql2);
                $count2 = $result2 -> num_rows;
            ?>
            <section class="left">
                <div class="info">
                    <span class="infoRedalarm"></span>
                    <span class="infoAlarm">N건의 미열람 소식이 있습니다.</span>
                    <? 
                        echo "<img class='infoImg' src=../assets/img/".$info['youImg']." alt='프로필 사진'>";
                    ?>
                    <!-- <img class="infoImg" src="../assets/img/memberProfile01.jpg" alt="프로필사진"> -->
                    <div class="infoText">
                        <div>
                            <? echo "<h2>".$info['youName']."</h2>"; ?>
                        </div>
                        <div>
                            <?php
                            echo "<p>가입일 : ".date('Y-m-d', $info['regTime'])."</p>";
                            echo "<p>총 작성 게시글 : ".$count."</p>";
                            echo "<p>총 작성 댓글 : ".$count2."</p>";
                            ?>
                        </div>
                    </div>
                    <div class="scoreWrap">
                        <div class="nowScroe">
                            <span>첫온도 36.5℃</span>
                        </div>
                        <div class="scoreFace">
                            <?php 
                                echo "<span class='temp'>".number_format($info['youScore'],1)."℃</span>";
                            ?>
                            <img class="temp2" src="../assets/ico/normal.svg" alt="기본온도아이콘">
                            <!-- <span>36.5℃</span> -->
                        </div>
                        <div class="w3-light-grey">
                            <?
                                echo "<div class='w3-green temp__js' style='height:7px;width:".number_format($info['youScore'],1)."%;border-radius: 8px;'></div>";
                            ?>
                            <!-- <div class="w3-green" style="height:7px;width:36.5%;border-radius: 8px;"></div> -->
                        </div>
                        <!-- <div class="scoreBor">
                            <div class="w3-green" style="height:24px;width:25%"></div>
                        </div> -->
                    </div>
                    <a class="infoBtn b" href="#">내 게시글 관리</a>
                    <a class="infoBtn" href="#"> 내 댓글 관리</a>
                </div>
                <div class="clickInfo">
                    <ul>
                        <li class="active">회원 정보수정</li>
                        <li>내 여행플랜</li>
                        <li>회원 탈퇴</li>
                    </ul>
                </div>
            </section>
            <section class="right">
                <div class="memberInfo">
                    <div class="memberCheck">
                        <h2>회원 정보수정</h2>
                        <div class="memberForm">
                            <fieldset>
                                <legend class="ir_so">회원가입 입력폼</legend>
                                <div class="memberBox join">
                                    <div>
                                        <label for="youImg">나의 프로필사진</label>
                                        <?php
                                            echo "<img class='informationImg' src='../assets/img/".$info['youImg']."' alt='프로필 사진'>";
                                            echo "<a href='#' class='infoImgBtn'><img src='../assets/ico/icon14.svg'></a>"
                                            ?>
                                    </div>
                                    <div>
                                        <?php
                                            echo "<div><label for='youIntro'>자기소개</label>";
                                            echo "<textarea name='youIntro' id='youIntro' class='input_write2' rows='3'>".$info['youIntro']."</textarea></div>";
                                        ?>
                                    </div>       
                                    <div>
                                        <label for="youId">아이디</label>
                                        <?php
                                            echo "<div id='youId' class='input_write'>".($info['youID'])."</div>"
                                        ?>
                                    </div>
                                    <div>
                                        <label for="youPass">비밀번호</label>
                                        <input type="password" name="youPass" id="youPass" class="input_write" maxlength="20" placeholder="변경하실 비밀번호를 입력해 주세요" autocmplete="off" required>
                                        <p>*8~12자 이내 영문,숫자,특수문자를 1자 이상 조합해야 합니다.</p>
                                    </div> 
                                    <div>
                                        <label for="youPassC">비밀번호 확인</label>
                                        <input type="password" name="youPassC" id="youPassC" class="input_write" maxlength="20" placeholder="다시 한번 비밀번호를 입력해 주세요" autocmplete="off" required>
                                    </div>
                                    <br>
                                    <div>
                                        <?php
                                            echo "<label for='youName'>이름</label>";
                                            echo "<div id='youName' class='input_write'>".($info['youName'])."</div>";
                                        ?>
                                    </div>
                                    <div>
                                        <label for="youPhone">핸드폰 번호</label>
                                        <?php
                                            echo "<div id='youPhone' class='input_write'>".($info['youPhone'])."</div>"
                                        ?>
                                    </div>
                                </div>
                                <img src="" alt="">
                            </fieldset>
                            <button id="joinBtn" class="btn_submit" type="submit">정보수정 완료</button>
                        </div>
                    </div>
                    <div>
                        <h2>내 여행플랜</h2>
                    </div>
                    <div class="signout">
                        <h2>회원 탈퇴</h2>
                        <h2 class="ir_so">회원탈퇴</h2>
                        <section id="condition">
                            <div class="condition">
                                <h3>회원탈퇴시 확인사항</h3>
                                <div class="list l2">
                                    <p>
                                    이용자의 개인정보 수집시 서비스제공을 위하여 필요한 범위에서 최소한의 개인정보를 수집합니다.<br>
                                    회원가입시 구매계약이행에 필요한 정보를 미리 수집하지 않습니다. 다만, 관련 법령상 의무이행을 위하여 구매계약 이전에 본인확인이 필요한 경우로서 최소한의 특정 개인정보를 수집하는 경우에는 그러하지 아니합니다.<br>
                                    이용자의 개인정보를 수집·이용하는 때에는 당해 이용자에게 그 목적을 고지하고 동의를 받습니다.<br>
                                    수집된 개인정보를 목적외의 용도로 이용할 수 없으며, 새로운 이용목적이 발생한 경우 또는 제3자에게 제공하는 경우에는 이용·제공단계에서 당해 이용자에게 그 목적을 고지하고 동의를 받습니다. 다만, 관련 법령에 달리 정함이 있는 경우에는 예외로 합니다.<br>
                                    이용자의 동의를 받아야 하는 경우에는 개인정보관리 책임자의 신원(소속, 성명 및 전화번호, 기타 연락처), 정보의 수집목적 및 이용목적, 제3자에 대한 정보제공 관련사항(제공받은자, 제공목적 및 제공할 정보의 내용) 등 「정보통신망 이용촉진 및 정보보호 등에 관한 법률」 제22조제2항이 규정한 사항을 미리 명시하거나 고지해야 하며 이용자는 언제든지 이 동의를 철회할 수 있습니다.<br>
                                    이용자는 언제든지 “몰”이 가지고 있는 자신의 개인정보에 대해 열람 및 오류정정을 요구할 수 있으며 이에 대해 지체 없이 필요한 조치를 취할 의무를 집니다. 이용자가 오류의 정정을 요구한 경우에는 그 오류를 정정할 때까지 당해 개인정보를 이용하지 않습니다.<br>
                                    는 개인정보 보호를 위하여 이용자의 개인정보를 취급하는 자를  최소한으로 제한하여야 하며 신용카드, 은행계좌 등을 포함한 이용자의 개인정보의 분실, 도난, 유출, 동의 없는 제3자 제공, 변조 등으로 인한 이용자의 손해에 대하여 모든 책임을 집니다.<br>
                                    그로부터 개인정보를 제공받은 제3자는 개인정보의 수집목적 또는 제공받은 목적을 달성한 때에는 당해 개인정보를 지체 없이 파기합니다.<br>
                                    개인정보의 수집·이용·제공에 관한 동의 란을 미리 선택한 것으로 설정해두지 않습니다. 또한 개인정보의 수집·이용·제공에 관한 이용자의 동의거절시 제한되는 서비스를 구체적으로 명시하고, 필수수집항목이 아닌 개인정보의 수집·이용·제공에 관한 이용자의 동의 거절을 이유로 회원가입 등 서비스 제공을 제한하거나 거절하지 않습니다.<br>
                                    법령과 이 약관이 금지하거나 공서양속에 반하는 행위를 하지 않으며 이 약관이 정하는 바에 따라 지속적이고, 안정적으로 재화․용역을 제공하는데 최선을 다하여야 합니다.<br>
                                    이용자가 안전하게 인터넷 서비스를 이용할 수 있도록 이용자의 개인정보(신용정보 포함)보호를 위한 보안 시스템을 갖추어야 합니다.<br>
                                    상품이나 용역에 대하여 「표시․광고의 공정화에 관한 법률」 제3조 소정의 부당한 표시․광고행위를 함으로써 이용자가 손해를 입은 때에는 이를 배상할 책임을 집니다.<br>
                                    이용자가 원하지 않는 영리목적의 광고성 전자우편을 발송하지 않습니다.<br>
                                    </p>
                                </div>
                                <span class="allow">
                                    <input type="checkbox" name="check2" id="check2" />
                                    <label for="check2" class="lb1"></label>
                                    <span>이용약관에 동의합니다.</span>
                                </span>
                            </div>
                            <span class="btn_center">
                                <button id="loginBtn" class="btn_submit6" type="submit">회원 탈퇴</button>
                            </span>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!-- main -->

        <footer>
            <?php 
                include "../include/footer2.php";
            ?>
        </footer>
    <!--//footer-->

    <script>
        const submit6 = document.querySelector(".btn_submit6");
        const submit = document.querySelector(".btn_submit");
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

        const tabBtn = document.querySelectorAll(".clickInfo ul li");
        const tabCont = document.querySelectorAll(".memberInfo > div");

        tabBtn.forEach((element, index)=> {
            element.addEventListener("click", function(){
                tabBtn.forEach(el => {
                    el.classList.remove("active");
                });
                element.classList.add("active");

                tabCont.forEach(el => {
                    el.style.display = "none";
                })
                tabCont[index].style.display = "block";
            });
        });

        document.querySelector(".btn_submit6").addEventListener("click",function(){
            if (document.querySelector('#check2:checked') ){
                    if( confirm("정말로 회원탈퇴를 하시겠습니까?") == true ){
                        const queryString = window.location.search.split(/\?/);
                        window.location = "./informationRemove.php?"+queryString[1];
                    } else {
                        console.log("취소");
                    }
            } else {
                alert("체크박스를 체크해주세요");
            }
        })

        if( submit ){
            submit.addEventListener("click",function(e){
                if( confirm("회원 정보수정을 완료하시겠습니까?") == true ){
                    const queryString = window.location.search.split(/\?/);
                    window.location = "./informationMain.php?"+queryString[1];
                } else {
                    console.log("취소");
                }
            });
        }
    </script>
</body>
</html>