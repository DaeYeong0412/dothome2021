<?php
    include "../connect/connect.php";

    // for( $i=1; $i<=100; $i++){
    //     $regTime = time();
    //     $sql = "INSERT INTO gBoard(myMemberID, boardTitle, boardContent, boardView, boardLike, boardDislike, regTime) VALUES ('1', '게시판 제목입니다${i}.', '게시글 ${i}번째내용입니다.', '1', 0, 0, '$regTime')";
        
    //     $result = $connect -> query($sql);

    //     if( $result ){
    //         echo "성공";
    //     } else {
    //         echo "실패";
    //     }
    // }

    for( $i=1; $i<=10; $i++){
        $regTime = time();
        for( $j=1; $j<=10; $j++){
            $sql = "INSERT INTO gComment(myMemberID, myBoardID, youName, youText, youLike, youDislike, regTime) VALUES ('1','${i}','김길동','댓글 ${j}번째 입니다.', 0, 0, '$regTime')";
        }
        
        $result = $connect -> query($sql);

        if( $result ){
            echo "성공";
        } else {
            echo "실패";
        }
    }
?>