<?php
include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/db_connector.php";


$num=$id=$subject=$content=$day=$hit="";
$mode="insert";
$num= $_GET['num'];


    $mode=$_GET["mode"];//$mode="update"or"response"
    $q_num = mysqli_real_escape_string($conn, $num);

    //update 이면 해당된글, response이면 부모의 해당된글을 가져옴.
    $sql="SELECT * from `qna` where num ='$q_num';";
    $result = mysqli_query($conn,$sql);
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
    $day=$row['regist_date'];
    $hit=$row['hit'];
    if($mode == "response"){
      $subject="[re]".$subject;
      $content="re>".$content;
      $content=str_replace("<br>", "<br>▶",$content);
      $disabled="disabled";
    }
    mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/ilhase/common/css/notice.css">
    <script type="text/javascript" src="./member_form.js"></script>
    <title>일하세</title>

    <script type="text/javascript">
      function check_input(){
        const subject = document.getElementById('input_subject');
        const content = document.getElementById('textarea_content');
          if (!subject.value){
              alert("제목을 입력하세요!");
              document.write_answer.subject.focus();
              return;
          } else if (!content.value) {
              alert("내용을 입력하세요!");
              document.write_answer.content.focus();
              return;
          } else {
            document.write_answer.submit();
          }
      }
    </script>
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
      <h2 class="title">1 : 1 문의 > 댓글</h2>
      <form name="write_answer" action="dml_qna.php?mode=r_insert&num=<?=$q_num?>" method="post">

        <div id="list_top_title">
          <ul  id="write_notice">
            <li class="col1">제목 : <input id="input_subject" type="text" name="subject" value="<?=$subject?>"></li>
          </ul>
        </div>

          <div id="list_item">
            <li class="col2">내용 : <textarea id="textarea_content" name="content" rows="15" cols="79"></textarea></li>
          </div>
          <div class="write_line"></div>

      </form>
      <ul class="notice_contents">
        <li><button class="list_button" type="button" onclick="check_input();">완 료</button></li>
        <li>
          <button class="list_button" onclick="location.href='qna_view.php?page=<?=$page?>&num=<?=$num?>'">취 소</button></li>
        </ul>
      </div> <!--End Of Content -->

    </div>
    <!-- Footer -->
    <footer class="py-5" id="footer_box">
        <div class="container">
            <div id="footer_info">
              <h1 class="navbar-brand" id="footer_title">일하세</h1>
              <ul>
                <li><a href="#">서비스 소개</a></li>
                <li><a href="#">이용약관 및 정책</a></li>
                <li><a href="#">관리자 모드</a></li>
              </ul>
              <ul>
                <li>일하세(대표이사:김소진)</li>
                <li>서울특별시 성동구 도선동</li>
                <li>개인정보관리자 : 남채현</li>
                <li>통신판매번호 : 2020-서울성동-9999</li>
              </ul>
              <ul>
                <li>유료직업소개사업등록번호 : 제2020-12341234-20-5-01234호</li>
                <li>사업자등록번호 : F123-45-678</li>
                <li>서비스 및 기업 문의 : 02-123-4515</li>
              </ul>
            </div>
            <p class="m-0" id="copyrihgt">Copyright &copy; ilhase 2020</p>
        </div>
    </footer>
  </body>
</html>
