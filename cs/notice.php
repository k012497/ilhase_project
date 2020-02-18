<?php
include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/db_connector.php";

define('SCALE', 10);
//*****************************************************
$sql=$result=$total_record=$total_page=$start="";
$row="";
$memo_id=$memo_num=$memo_date=$memo_nick=$memo_content="";
$total_record=0;
//*****************************************************
if(isset($_GET["mode"])&&$_GET["mode"]=="search"){
  //제목, 내용, 아이디
  $find = test_input($_POST["find"]);
  $search = test_input($_POST["search"]);
  $q_search = mysqli_real_escape_string($conn, $search);
  $sql="SELECT * from `notice` where $find like '%$q_search%' order by num desc;";
}else{
  $sql="SELECT * from `notice` order by num desc";
}

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
    <!-- <link rel="stylesheet" href="/ilhase/common/css/common1.css"> -->
    <link rel="stylesheet" href="/ilhase/common/css/notice.css">
    <script type="text/javascript" src="../js/member_form.js"></script>
    <title></title>
    <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
  </head>
  <body>
    <div id="wrap">
      <div id="content">
           <h2 class="title">공지사항</h2><br>

         <div id="list_top_title">
           <ul class="notice_list_menu">
             <li id="list_title1">번호</li>
             <li id="list_title2">제목</li>
             <li id="list_title3">조회수</li>
             <li id="list_title4">글쓴이</li>
             <li id="list_title5">날짜</li>
           </ul>
         </div><!--end of list_top_title  -->

         <div id="list_content">

         <?php
          for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++){
            mysqli_data_seek($result,$i);
            $row=mysqli_fetch_array($result);
            $num=$row['num'];
            $id=$row['id'];
            $name=$row['name'];
            $nick=$row['nick'];
            $hit=$row['hit'];
            $date= substr($row['regist_date'],0,10);
            $subject=$row['subject'];
            $subject=str_replace("\n", "<br>",$subject);
            $subject=str_replace(" ", "&nbsp;",$subject);
        ?>
            <div id="list_item">
              <div id="list_item1"><?=$number?></div>
              <div id="list_item2">
                  <a href="./notice_view.php?num=<?=$num?>&page=<?=$page?>&hit=<?=$hit + 1?>"><?=$subject?></a>
              </div>
              <div id="list_item3"><?=$nick?></div>
              <div id="list_item4"><?=$date?></div>
              <div id="list_item5"><?=$hit?></div>
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
    </div><!--end of wrap  -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; ilhase 2020</p>
        </div>
    </footer>
  </body>
</html>
