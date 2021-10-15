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
    <title>게시판</title>
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
                    <div class="boardType">
                        <h3>검색결과 게시판</h3>
                        <?php
                            $searchKeyword = $_GET['searchKeyword'];
                            $searchOption = $_GET['searchOption'];

                            if( $searchKeyword =='' || $searchKeyword == null){

                                echo "<p>검색어가 없습니다.</p>";
                            }
                        ?>
                        <div class="board">
                            <div class="board-search">
                                <form action="freeBoardSearch.php" name="boardSearch" method="get">
                                    <fieldset>
                                        <legend class="ir_so">게시판 검색 영역</legend>
                                        <input type="text" name="searchKeyword" class="form-search" placeholder="검색어를 입력하세요" aria-label="search" required>
                                        <select name="searchOption" id="searchOption" class="form-select">
                                            <option value="title">제목</option>
                                            <option value="content">내용</option>
                                            <option value="name">글쓴이</option>
                                        </select>
                                        <button type="submit" class="form-btn">검색</button>
                                    </fieldset>
                                </form>
                            </div>
                            <div class="board-table">
                                <table>
                                    <colgroup>
                                        <col style="width: 5%" />
                                        <col />
                                        <col style="width: 10%" />
                                        <col style="width: 12%" />
                                        <col style="width: 7%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>번호</th>
                                            <th>제목</th>
                                            <th>등록자</th>
                                            <th>등록일</th>
                                            <th>조회수</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if(isset($_GET['page'])){
                                            $page = (int) $_GET['page'];
                                        } else {
                                            $page = 1;
                                        }

                                        $searchKeyword = $connect ->real_escape_string($searchKeyword);
                                        $searchOption = $connect ->real_escape_string($searchOption);

                                        
                                        // $sql = "SELECT b.myBoardID, b.myBoardTitle, b.boardContent, b.boardView, b.regTime FROM member m JOIN myBoard b ON (m.myMemberID = b.myMemberID) where b.boardTitle LIKE '%{$seacrhKeyword}%' ORDER BY myboardID DESC LINIT 10";
                                        // $sql = "SELECT b.myBoardID, b.myBoardTitle, b.boardContent, b.boardView, b.regTime FROM member m JOIN myBoard b ON (m.myMemberID = b.myMemberID) where b.boardContent LIKE '%{$seacrhKeyword}%' ORDER BY myboardID DESC LINIT 10";
                                        // $sql = "SELECT b.myBoardID, b.myBoardTitle, b.boardContent, b.boardView, b.regTime FROM member m JOIN myBoard b ON (m.myMemberID = b.myMemberID) where m.youName LIKE '%{$seacrhKeyword}%' ORDER BY myboardID DESC LINIT 10";

                                                                                
                                        $sql = "SELECT b.myBoardID, b.boardTitle, b.boardContent, b.boardView, m.youName, b.regTime FROM gmember m JOIN gBoard b ON (m.myMemberID = b.myMemberID)";
                                        
                                        switch($searchOption){
                                            case 'title':
                                                $sql .= " WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY myboardID";
                                                break;
                                            case 'content':
                                                $sql .= " WHERE b.boardContent LIKE '%{$searchKeyword}%' ORDER BY myboardID";
                                                break;
                                            case 'name':
                                                $sql .= " WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY myboardID DESC";
                                                break;
                                        }
                                        // echo $sql;

                                        $result = $connect -> query($sql);
                                        $count2 = $result -> num_rows;
                                        if($result){
                                            

                                            echo "<p>총 ".$count2."건이 검색되었습니다.</p>";

                                            // echo "전체 갯수 : " .$boardTotalCount;
                                            $numView = 10;
                                            $viewLimit = ($numView * $page) - $numView;
                                            $sql = "SELECT b.myBoardID, b.boardTitle, m.youName, b.boardView, b.regTime FROM gmember m JOIN gBoard b ON (m.myMemberID = b.myMemberID)";
                                            $result = $connect -> query($sql);
                                            if($count2 > 0){
                                        
                                                switch($searchOption){
                                                    case 'title':
                                                        $sql .= " WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY myBoardID DESC LIMIT {$viewLimit}, {$numView}";
                                                        break;
                                                    case 'content':
                                                        $sql .= " WHERE b.boardContent LIKE '%{$searchKeyword}%' ORDER BY myBoardID DESC LIMIT {$viewLimit}, {$numView}";
                                                        break;
                                                    case 'name':
                                                        $sql .= " WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY myBoardID DESC LIMIT {$viewLimit}, {$numView}";
                                                        break;
                                                }
                                                $result = $connect -> query($sql);
                                                $count = $result -> num_rows;

                                                for($i=1; $i<=$count; $i++){
                                                    $info = $result -> fetch_array(MYSQLI_ASSOC);
                                                    echo "<tr>";
                                                    echo "<td>".$info['myBoardID']."</td>";
                                                    echo "<td><a href='freeBoardView.php?boardID=".$info['myBoardID']."'>".$info['boardTitle']."</a></td>";
                                                    echo "<td>".$info['youName']."</td>";
                                                    echo "<td>".date('Y-m-d', $info['regTime'])."</td>";
                                                    echo "<td>".$info['boardView']."</td>";
                                                    echo "</tr>";
                                                }
                                            } 
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="board-page">
                                <ul>
                                    <?php
                                        // $sql = "SELECT count(myBoardID) FROM gBoard";
                                        // $result = $connect -> query($sql);
                                        // $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
                                        // $boardTotalCount = $boardTotalCount['count(myBoardID)'];
                                        

                                        $boardTotalCount = $count2;
                                        
                                        

                                        //총 페이지 수
                                        $boardTotalPage = ceil($boardTotalCount/$numView);
                                        // echo "총 페이지 수 : " .$boardTotalPage;
                                        // 1 2 3 4 5 6 7 8 9 10 11
                                        //현재 페이지를 기준으로 보여주고 싶은 갯수 설정
                                        $pageView = 5;
                                        $startPage = $page - $pageView;
                                        $endPage = $page + $pageView;
                                        // 처음 페이지 초기화
                                        if($startPage < 1) $startPage = 1;
                                        // 마지막 페이지 초기화
                                        if($endPage >= $boardTotalPage) $endPage = $boardTotalPage;
                                        // 처음으로
                                        if($page != 1){
                                            echo "<li><a href='freeBoardSearch.php?page=1&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>처음으로</a></li>";
                                        }
                                        // 이전 페이지
                                        if($page != 1){
                                            $prevPage = $page -1;
                                            echo "<li><a href='freeBoardSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>이전</a></li>";
                                        }
                                        for($i=$startPage; $i<=$endPage; $i++){
                                            $active = '';
                                            if($i == $page) $active = "active";
                                            echo "<li class='{$active}'><a href='freeBoardSearch.php?page={$i}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>{$i}</a></li>";
                                        }
                                        // 다음 페이지
                                        if($page != $endPage){
                                            $nextPage = $page +1;
                                            echo "<li><a href='freeBoardSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>다음</a></li>";
                                        }
                                        // 마지막으로
                                        if($page != $endPage){
                                            echo "<li><a href='freeBoardSearch.php?page={$boardTotalPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>마지막으로</a></li>";
                                        }
                                    ?>
                                </ul>
                                <a href="freeBoardWrite.php" class="writebtn">글쓰기</a>
                            </div>
                        </div>
                    </div>
            </article>
        </section>
    </main>
    <!-- //contents -->
    <footer>
        <?php
            include "../include/footer2.php";
        ?>
    </footer>
    <!-- //footer -->
</body>
</html>