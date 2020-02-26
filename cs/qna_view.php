<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/db_connector.php";

if(isset($_SESSION['usermember_type'])){
  $member_type = $_SESSION['usermember_type'];
} else {
  echo "<script>
    alert('잘못된 접근입니다.');
    history.go(-1);
  </script>";
}

$num=$subject=$content=$regist_date=$hit="";
//*****************************************************

if(empty($_GET['page'])){
  $page=1;
}else{
  $page=$_GET['page'];
}

if(isset($_GET["num"])&&!empty($_GET["num"])){
    $num = filter_data($_GET["num"]);
    $hit = filter_data($_GET["hit"]);
    $q_num = mysqli_real_escape_string($conn, $num);

    $sql="UPDATE `qna` SET `hit`=$hit WHERE `num`=$q_num;";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }

    $sql="SELECT * from `qna` where num ='$q_num';";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);

    $subject= htmlspecialchars($row['subject']);
    $content= htmlspecialchars($row['content']);
    $subject=str_replace("\n", "<br>",$subject);
    $subject=str_replace(" ", "&nbsp;",$subject);
    $content=str_replace("\n", "<br>",$content);
    $content=str_replace(" ", "&nbsp;",$content);
    $regist_date=$row['regist_date'];
    $hit=$row['hit'];
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <title>일하세</title>
    <script>
     var test = '<?=$member_type?>';
     console.log(test);
    </script>
  </head>
  <body>
    <header>
      <?php
        if($member_type !== 'admin'){
          // 회원일 경우
          include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";
        } else {
          // 관리자일 경우
          include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header_admin.php";
      ?>
        <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/admin/css/plain_admin_header.css">
      <?php
        }
      ?>
    </header>
    <div id="content">
      <h2 class="title">1 : 1 문의 > 내용</h2>
        <div id="list_top_title">
          <li>
            <span class="col1">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              조회 : <?=$hit?>&nbsp;&nbsp;&nbsp;<b>제목 : </b><?=$subject?></span>
            <span class="col2_view"><?=$regist_date?></span>
          </li>
        </div><!--end of list_top_title  -->

        <div id="list_item">
          <li  class="buttons"><?=$content ?></li>
        </div>

        <ul class="qna_contents">
          <li>
          <br>
          <li>
            <button class="list_button" onclick="location.href='qna_list.php?page=<?=$page?>'">목 록</button>
            </li>
              <?php
                // 세션 값을 검사해서 관리자일 때만 수정 버튼
                if(false){
                  // 회원일 경우
                } else {
                  // 관리자일 경우
              ?>
            <li><button class="list_button" onclick="location.href='write_qna_form.php?mode=response&num=<?=$num?>&page=<?=$page?>'">답 변</button></li>
            <li><button class="list_button" onclick="location.href='qna_view_delete.php?num=<?=$num?>&page=<?=$page?>'">삭 제</button></li>

              <?php
                }
              ?>
        </ul>
 <!-- page=<?=$page?> -->

    </div>
    <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/footer.php";?>
    <link rel="stylesheet" href="./css/notice.css">
    <link rel="stylesheet" href="./css/qna.css">
  </body>
</html>
