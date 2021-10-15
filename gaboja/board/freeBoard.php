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
                        <h3>자유게시판</h3>
                        <p>자유롭게 의견을 나눌수 있는 게시판 입니다.</p>
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
                                            $numView = 10;
                                            $viewLimit = ($numView * $page) - $numView;
                                            // board + member
                                            $sql = "SELECT b.myBoardID, b.boardTitle, m.youName, b.boardView, b.regTime FROM gmember m JOIN gBoard b ON (m.myMemberID = b.myMemberID) ORDER BY myBoardID DESC LIMIT {$viewLimit}, {$numView}";
                                            $result = $connect -> query($sql);
                                            if($result){
                                                $count = $result -> num_rows;
                                                if($count > 0){
                                                    for($i=1; $i<=$count; $i++){
                                                        $info = $result -> fetch_array(MYSQLI_ASSOC);
                                                        echo "<tr>";
                                                        echo "<td>".$info['myBoardID']."</td>";
                                                        echo "<td><a href='freeBoardView.php?boardID={$info['myBoardID']}'>".$info['boardTitle']."</a></td>";
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
                                        $sql = "SELECT count(myBoardID) FROM gBoard";
                                        $result = $connect -> query($sql);
                                        $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
                                        $boardTotalCount = $boardTotalCount['count(myBoardID)'];
                                        // echo "전체 갯수 : " .$boardTotalCount;
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
                                            echo "<li><a href='freeBoard.php?page=1'>처음으로</a></li>";
                                        }
                                        // 이전 페이지
                                        if($page != 1){
                                            $prevPage = $page -1;
                                            echo "<li><a href='freeBoard.php?page={$prevPage}'>이전</a></li>";
                                        }
                                        for($i=$startPage; $i<=$endPage; $i++){
                                            $active = '';
                                            if($i == $page) $active = "active";
                                            echo "<li class='{$active}'><a href='freeBoard.php?page={$i}'>{$i}</a></li>";
                                        }
                                        // 다음 페이지
                                        if($page != $endPage){
                                            $nextPage = $page +1;
                                            echo "<li><a href='freeBoard.php?page={$nextPage}'>다음</a></li>";
                                        }
                                        // 마지막으로
                                        if($page != $endPage){
                                            echo "<li><a href='freeBoard.php?page={$boardTotalPage}'>마지막으로</a></li>";
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