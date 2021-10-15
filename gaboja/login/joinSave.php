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
<body>
<div id="skip">
        <a href="#contents">회원가입 바로가기</a>
        <a href="#footer">컨텐츠 바로가기</a>
    </div>
    <header id="header">
        <?php
            include "../include/header.php"
        ?>
    </header>
    <!-- header -->
    <main id="contetns">
    <section id="mainCont" class="gray">
        <h2 class="ir_so">회원가입 컨텐츠</h2>
        <article class="content-article">
            <div class="member-form">
                <h3>안내</h3>
<?php 
    include "../connect/connect.php";

    //메세지 출력
    function msg( $alert ){
        echo "<p class='alert'>{$alert}</p>";
    }


    $youId = $_POST['youId'];
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];
    $youName = $_POST['youName'];
    $youPhone = $_POST['youPhone'];
    $regTime = time();
    
    //입력 유효성 검사

    if( $youPass == null || $youPass == '' ){
        msg("비밀번호를 입력해 주세요!");
        exit;
    }
    if( $youId == null || $youId == '' ){
        msg("아이디를 입력해 주세요!");
        exit;
    }
    if( $youName == null || $youName == '' ){
        msg("이름을 입력해 주세요!");
        exit;
    }
    if( $youPhone == null || $youPhone == '' ){
        msg("핸드폰 번호를 입력해 주세요!");
        exit;
    }


    // echo $youEmail, $youPass, $youPassC, $youName, $youBirth, $youPhone;
    // $sql = "INSERT INTO member(youEmail, youPass, youName, youBirth, youPhone, regTime)
    // VALUES( '$youEmail', '$youPass', '$youName', '$youBirth', '$youPhone', '$regTime');";

    // $result = $connect -> query($sql);
    // if( $result ){
    //     echo "INSERT INTO true";
    // } else {
    //     echo "INSERT INTO false";
    // }

    


    //비밀번호 검사
    if( $youPass != $youPassC ){
        msg("비밀번호가 일치하지 않습니다. <br> 다시 한번 확인해주세요!");
        exit;
    }

    //비밀번호 암호화
    // $youPass = sha1($youPass);

    //이름 검사
    $check_name = preg_match("/^[가-힣]{1,}$/", $youName);

    if( $check_name == false ){
        msg("이름이 정확하지 않습니다. <br> 한글로만 적어주세요!");
        exit;
    }

    //검사
    $check_number = preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/",$youPhone);
    if( $check_number == false ){
        msg("번호가 정확하지 않습니다. <br> 올바른 번호(000-0000-0000)를 적어주세요!");
    }


    //아이디 중복검사
    $isIdCheck = false;

    $sql = "SELECT youID FROM gmember WHERE youID = '$youId'";
    $result = $connect -> query($sql);

    if( $result ){
        $count = $result -> num_rows;

        if( $count == 0 ){
            //회원가입
            $isIdCheck = true;
        } else {
            msg("이미 회원가입을 했네요!! 로그인을 해주세요!!");
            exit;
        }
    } else {
        msg("에러발생01 - 관리자에게 문의하세요");
        exit;
    }


    //핸드폰 중복 검사
    $isPhoneCheck = false;

    $sql = "SELECT youPhone FROM gmember WHERE youPhone = '$youPhone'";
    $result = $connect -> query($sql);

    if( $result ){
        $count = $result -> num_rows;

        if( $count == 0 ){
            //회원가입
            $isPhoneCheck = true;
        } else {
            msg("이미 가입된 핸드폰 번호입니다.");
            exit;
        }
    }else {
        msg("에러발생02 - 관리자에게 문의하세요");
        exit;
    }

    //데이터 가져오기 -> 유효성검사 -> 중복검사 -> 회원가입

    if( $isPhoneCheck == true && $isIdCheck == true ){
        $sql = "INSERT INTO gmember(youID, youPass, youName, youPhone, youScore, youImg, youIntro, regTime)
        VALUES( '$youId', '$youPass', '$youName', '$youPhone', '36.5' , 'm0.jpg', '기본 멘트입니다.', '$regTime');";
    
        $result = $connect -> query($sql);
    
        if( $result ){
            // msg("회원가입에 성공했습니다.");
            echo "<script> location.href = 'joinConfirm.php';</script>";
        } else {
            msg("에러발생03 - 관리자에게 문의하세요");
            exit;
        }
    } else {
        msg("이메일 또는 비밀번호가 틀렸습니다. 확인해주세요");
    }
?>

            </div>
        </article>
    </section>
    </main>
    <!-- contetns -->
    <footer id="footer">
        <?php
            include "../include/footer.php"
        ?>
    </footer>   
    <!-- footer -->
</div>

</body>
</html>