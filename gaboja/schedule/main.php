<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<?php

?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>일정 만들기</title>
  <!-- style -->
  <link rel="stylesheet" href="../assets/css/fonts.css">
  <link rel="stylesheet" href="../assets/css/var.css">
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    #header {
        margin-bottom: -10px;
    }
    #smain {
        margin-bottom: 15px;
    }
    #smain .content-article {
        display: flex;
        justify-content: space-between;
        max-width: 1600px;
    }
    #smain .route {
        padding: 5%;
        border: 1px solid #A7A7A7;
        width: 422px;
    }
    #smain .schedule .route:last-child {
        height: 550px;
        border-top: none;
        display: flex;
        flex-direction: column;
        justify-content:space-between;
    }
    #smain .schedule .wrap{
        padding: 10px 20px 20px 20px;
        border: 1px solid #000;
        border-radius: 5px;
    }
    #smain .schedule .circle {
        font-size: 12px;
        position: relative;
        color: #fff;
        background-color: #1A7AD9;
        border-radius:75px;
        width: 36px; height: 36px;
        margin-bottom: 16px;
    }
    #smain .schedule .circle:nth-child(2){
        background-color: #424B5A;
    }
    #smain .schedule .circle:nth-child(3){
        background-color: #F95C4E;
    }
    #smain .schedule .circle:nth-child(1):after {
        position: absolute;
        left: 7px; top: 10px;
        content: '출발';
    }
    #smain .schedule .circle:nth-child(2):after {
        position: absolute;
        left: 7px; top: 10px;
        content: '경유';
    }
    #smain .schedule .circle:nth-child(3):after {
        position: absolute;
        left: 7px; top: 10px;
        content: '도착';
    }
    #smain .circle-wrap {
        margin-top: 16px;
        float:left;
    }
    #smain .wrap {
        /* display: flex;
        justify-content: space-between; */
        overflow: hidden;
        margin-bottom: 10px;
    }
    #smain .title {
        resize: none;
    }
    #smain .intro {
        resize: none;
    }
    #smain .schedule table {
        float: left;
        width: 230px;
        border-collapse: separate;
	    border-spacing: 0 16px;
    }

    #smain .schedule td {
        border-bottom: 1px solid #000;
        font-size: 12px;
        height: 36px;
        padding-left: 10px;
    }

    #smain .route h3 {
        font-weight: 800;
        margin-bottom: 10px;
    }
    #smain .map {
        position: relative;
        margin-left: 15px;
        box-sizing: border-box;
        border: 1px solid #A7A7A7;
        width: 100%;
        height: 840px;
    }
    #smain .comment {
        display: inline-block;
        height: 40px;
        width: 40%;
        background: #363C48;
        border-radius: 5px;
        text-align: center;
    }
    #smain .comment.white {
        display: inline-block;
        height: 40px;
        width: 40%;
        background: #fff;
        border: 1px solid #363C48;
        border-radius: 5px;
        text-align: center;
    }
    #smain .comment a {
        color:#fff;
        display: inline-block;
        margin-top: 10px;
    }
    #smain .comment.white a {
        color:#363C48;
        display: inline-block;
        margin-top: 10px;
    }
    #smain .comment-wrap {
        display: flex;
        justify-content: space-around;
    }
    #smain .overlay {
        text-align: center;
        vertical-align: middle;
        padding: 10px;
        z-index: 9999;
        position: absolute;
        border-radius: 3px;
        left: 10px; top: 10px;
        width: 300px;
        height: 66px;
        background: #fff;
    }
    #smain .overlay span {
        position: absolute;
        display: inline-block;
        left: 4%; top: 50%;
        transform: translate( 0%, -50%);

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
    <!-- header -->
    <main id="smain">
    <article class="content-article">
        <section class="schedule">
            <h2 class="ir_so">일정 만들기</h2>
            <div class="route">
                <h3>일정 만들기</h3>
                <div class="wrap">
                    <div class="circle-wrap">
                        <div class="circle"></div>
                        <div class="circle"></div>
                        <div class="circle"></div>
                    </div>
                    <table class="ij__js">
                        <tr>
                            <td>일정1</td>
                        </tr>
                        <tr>
                            <td>일정2</td>
                        </tr>
                        <tr>
                            <td>일정3</td>
                        </tr>
                    </table>
                </div>
            </div>
            <h2 class="ir_so">제목 내용쓰기</h2>
            <div class="route">
                <h3>여행 제목</h3>
                <textarea type="text" class="wrap title" rows="2" placeholder="여행계획의 제목을 적어주세요."></textarea>
                <h3> 소개</h3>
                <textarea name="text" class="wrap intro" cols="30" rows="10" placeholder="여행계획에 대한 간단한 설명을 적어주세요."></textarea>
                <div class="comment-wrap">
                    <span class="comment white">
                        <a href="#">일정 저장하기</a>
                    </span>
                    <span class="comment">
                        <a href="#">일정 공유하기</a>
                    </span>
                </div>
            </div>
        </section>
        <section class="map">
            <div class="overlay">
                <span>클릭하여 검색할 키워드나 주소를 입력하세요</span>
            </div>
            <div id="map" style="width:100%;height:100%;"></div>
        </section>
    </article>
    </main>
    <!-- contents -->
    <footer>
        <?php
            include "../include/footer2.php";
        ?>
    </footer>
    <!-- footer -->
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=c21f1a0c205e8b9cbab3cd31cd4e603c&libraries=services"></script>
    <script type="text/javascript" src="../assets/js/map.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script>
        // document.querySelectorAll('.ij__js td').forEach((el, idx)=>{
        //     el.addEventListener("click",()=>{
        //         new daum.Postcode({
        //             oncomplete: function(data) {

        //                 const result = data.buildingName || data.jibunAddress;
        //                 document.querySelectorAll('.ij__js td')[idx].innerHTML = result;
        //             }
        //         }).open();
        //     });
        // });

        // 장소 검색 객체를 생성합니다
        var ps = new kakao.maps.services.Places(); 

        // 키워드로 장소를 검색합니다
        

        document.querySelector(".overlay span").addEventListener("click",()=>{
            new daum.Postcode({
                oncomplete: function(data) {
  
                    // 주소로 좌표를 검색합니다
                    geocoder.addressSearch(data.address, function(result, status) {
                        
                    // marker.setPosition(mouseEvent.latLng);
                    // 정상적으로 검색이 완료됐으면 
                    if (status === kakao.maps.services.Status.OK) {

                        var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

                        // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
                        map.setCenter(coords);
                        zoomIn()
                    } 
                    });
                }
            }).open();
        });
    </script>
</body>
</html>