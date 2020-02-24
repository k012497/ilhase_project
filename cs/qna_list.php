<?php
include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/db_connector.php";

define('SCALE', 10);
//*****************************************************
$sql=$result=$total_record=$total_page=$start="";
$row="";
$memo_content="";
$total_record=0;
//*****************************************************

$sql="select * from qna order by `group_num` desc, `order` asc;";

$result=mysqli_query($conn,$sql);
$total_record=mysqli_num_rows($result);
$total_page=($total_record % SCALE == 0 )?($total_record/SCALE):(ceil($total_record/SCALE));

//2.페이지가 없으면 디폴트 페이지 1페이지
if(empty($_GET['page'])){
  $page=1;
}else{
  $page=$_GET['page'];
}

$start=($page -1) * SCALE;
$number = $total_record - $start;
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
    <link rel="stylesheet" href="./css/notice.css">
    <title>일하세</title>
    <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header_admin.php";?>
        <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/admin/css/plain_admin_header.css">
    </header>
  </head>
  <body>
      <div class="container">
        <h2 class="title">1 : 1 문의</h2><br>
         <div id="list_top_title">

           <ul class="notice_list_menu">
             <li id="list_title1">번호</li>
             <li id="list_title2">제목</li>
             <li id="list_title3">작성자</li>
             <li id="list_title4">조회수</li>
             <li id="list_title5">날짜</li>
           </ul>
         </div><!--end of list_top_title  -->

         <div id="list_content">

         <?php
          for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++){
            mysqli_data_seek($result,$i);
            $row=mysqli_fetch_array($result);
            $num=$row['num'];
            $hit = $row['hit'];
            $name=$row['name'];
            $date= substr($row['regist_date'],0,10);
            $subject=$row['subject'];
            $subject=str_replace("\n", "<br>",$subject);
            $subject=str_replace(" ", "&nbsp;",$subject);
            $depth=(int)$row['depth'];//공간을 몆칸을 띄어야할지 결정하는 숫자임
            $space="";
            for($j=0 ; $j < $depth ; $j++){
              $space="&nbsp;&nbsp;".$space;
            }
        ?>
            <div id="list_item">
              <div id="list_item1"><?=$number?></div>
              <div id="list_item2">
                  <a href="./qna_view.php?num=<?=$num?>&page=<?=$page?>&hit=<?=$hit + 1?>"><?=$space.$subject?></a>
              </div>
              <div id="list_item3"><?=$name?></div>
              <div id="list_item4"><?=$hit?></div>
              <div id="list_item5"><?=$row['regist_date']?></div>
            </div><!--end of list_item -->
            <div id="memo_content"><?=$memo_content?></div>
        <?php
            $number--;
         }//end of for
        ?>

        <div id="page_button">
          <div id="page_num">이전◀ &nbsp;&nbsp;&nbsp;&nbsp;
          <?php
            for ($i=1; $i <= $total_page ; $i++) {
              if($page==$i){
                echo "<b>&nbsp;$i&nbsp;</b>";
              }else{
                echo "<a href='./list.php?page=$i'>&nbsp;$i&nbsp;</a>";
              }
            }
          ?>
          &nbsp;&nbsp;&nbsp;&nbsp;▶ 다음
          <br><br><br><br><br><br><br>
        </div><!--end of page num -->
        <div id="button">
          <a href="./list.php?page=<?=$page?>"> <img src="../img/list.png" alt="">&nbsp;</a>
          <?php //세션 아이디가 admin일 경우만 글쓰기 허용

          ?>
        </div><!--end of button -->
      </div><!--end of page button -->
      </div><!--end of list content -->

      </div><!--end of content -->
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
