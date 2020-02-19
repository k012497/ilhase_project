<?php
include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/db_connector.php";

$num = $page = $hit = "";

if(isset($_GET['num'])){
  $num = $_GET['num'];
}

if(isset($_GET['page'])){
  $page = $_GET['page'];
}

if(isset($_GET['hit'])){
  $hit = $_GET['hit'];
}

if(isset($_GET["num"]) && !empty($_GET["num"])){
  $num = filter_data($_GET["num"]);
  $hit = filter_data($_GET["hit"]);
  $q_num = mysqli_real_escape_string($conn, $num);

  $sql = "UPDATE `notice` SET `hit`=$hit WHERE `num`=$q_num;"; // 조회수 증가

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  } // 조회수 증가

  $sql="SELECT * from `notice` where num ='$q_num';"; // 글 번호로 내용 가져오기
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }

  $row = mysqli_fetch_array($result); // 쿼리문 실행 결과를 배열로 받아서 한 레코드를 가져옴

  // 레코드의 각 필드 값을 가져옴
  $subject = $row['subject'];
  $content = $row['content'];
  $file_name = $row['file_name'];
  $file_type = $row['file_type'];
  $file_copied = $row['file_copied'];
  $hit = $row['hit'];
  $regist_date = $row['regist_date'];

  $content = str_replace(" ", "&nbsp;", $content);
  $content = str_replace("\n", "<br>", $content);

  if(!empty($file_copied)){
    // file_copied가 빈 값이 아니면 파일 정보를 가져옴
    $image_info = getimagesize("./data/".$file_copied);
    $image_width = $image_info[0];
    $image_height = $image_info[1];
    $image_type = $image_info[2];
    if($image_width > 400){
      $image_width = 400;
    }
  } else {
    $image_width = 0;
    $image_height = 0;
    $image_type = "";
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/ilhase/common/css/notice.css">

    <title></title>
  </head>
  <body>
    <header>

        <?php
          if(true){
            // 회원일 경우
            include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";
          } else {
            // 관리자일 경우
            include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";
          }?>
    </header>
    <div id="content">
      <h2 class="title">공지사항 > 내용</h2>
        <div id="list_top_title">
          <li>
            <span class="col1"><b>제목 : </b><?=$subject?></span>
            <span class="col2_view"><?=$regist_date?></span>
          </li>
        </div><!--end of list_top_title  -->
          <ul class="notice_contents">
            <li>
              <?php
              if($file_name) {
    						$real_name = $file_copied;
    						$file_path = "./data/".$real_name;
    						$file_size = filesize($file_path);
                echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
    			       		<a href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
                // 올린 파일 글 내용에 보이기
    			    }
              ?>
            </li><br>
            <li  class="buttons"><?=$content ?></li><br>
            <li class="list_button">
              <button onclick="location.href='notice.php?page=<?=$page?>'">목록</button>
              </li>
                <?php
                  // 세션 값을 검사해서 관리자일 때만 수정 버튼
                  if(false){
                    // 회원일 경우
                  } else {
                    // 관리자일 경우
                    ?>
                    <li class="list_button"><button  onclick="location.href='write_notice_form.php?mode=update&num=<?=$num?>&page=<?=$page?>'">수정</button></li>
                    <?php
                  }
                ?>
              </ul>


    </div>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; ilhase 2020</p>
        </div>
    </footer>
  </body>
</html>
