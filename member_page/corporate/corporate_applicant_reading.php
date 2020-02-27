<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
// include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_setting.php";
if(isset($_SESSION['userid']))
  $id   = $_SESSION['userid'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/corporate/css/board.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>

  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
  <div id="div_left_menu">
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/member_page/corporate/member_side_menu.php";?>
  </div>
  <div class="container">
  <section>
  	<div id="main_img_bar">
      </div>
     	<div id="board_box">
  	    <h3>
  	    	지원자 > 목록보기
  		</h3>
  	    <ul id="board_list">
  				<li style="display: inline-block;">
  					<span class="col1" style="display: inline-block;">번호</span>
  					<span class="col2" style="display: inline-block;">공고</span>
  					<span class="col3" style="display: inline-block;">제목</span>
  					<span class="col4" style="display: inline-block;">글쓴이</span>
  					<span class="col5" style="display: inline-block;">등록일</span>
  					<span class="col6" style="display: inline-block;"></span>
  				</li>
  <?php
  	if (isset($_GET["page"]))
  		$page = $_GET["page"];
  	else
  		$page = 1;

  	$sql = "select r.title, a.resume_title, a.regist_date,a.member_id,
    (select name from person where a.member_id = person.id)
    as person_name from recruitment r join apply a on a.recruit_id
    = r.num where r.corporate_id = '$id';";
  	$result = mysqli_query($conn, $sql);
  	$total_record = mysqli_num_rows($result); // 전체 글 수

  	$scale = 10;

  	// 전체 페이지 수($total_page) 계산
  	if ($total_record % $scale == 0)
  		$total_page = floor($total_record/$scale);
  	else
  		$total_page = floor($total_record/$scale) + 1;

  	// 표시할 페이지($page)에 따라 $start 계산
  	$start = ($page - 1) * $scale;

  	$number = $total_record - $start;
     for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
     {
        mysqli_data_seek($result, $i);
        // 가져올 레코드로 위치(포인터) 이동
        $row = mysqli_fetch_array($result);

        // 하나의 레코드 가져오기 title m_id regist_date
  	  $member_id   = $row["member_id"];
  	  $title          = $row["title"];
  	  $name        = $row["person_name"];
  	  $subject     = $row["resume_title"];
      $regist_day  = $row["regist_date"];

      $resume_num_sql = "select num from resume where title='$subject'
      and m_id='$member_id' and regist_date='$regist_day'";
      $result=mysqli_query($conn,$resume_num_sql);
      $resume_num = mysqli_fetch_array($result)['num'];
      echo $resume_num_sql.$resume_num;
  ?>
  				<li>
  					<span class="col1"><?=$number?></span>
  					<span class="col2"><a href="corporate_resume_view.php?num=<?=$resume_num?>"><?=$title?></a></span>
  					<span class="col3"><?=$subject?></span>
  					<span class="col4"><?=$name?></span>
  					<span class="col5"><?=$regist_day?></span>
  				</li>
  <?php
     	   $number--;
     }
     mysqli_close($conn);

  ?>
  	    	</ul>
  			<ul style="margin-left:380px;"id="page_num">
  <?php
  	if ($total_page>=2 && $page >= 2)
  	{
  		$new_page = $page-1;
  		echo "<li><a href='corporate_applicant_reading.php?page=$new_page'>◀ 이전</a> </li>";
  	}
  	else
  		echo "<li>&nbsp;</li>";

     	// 게시판 목록 하단에 페이지 링크 번호 출력
     	for ($i=1; $i<=$total_page; $i++)
     	{
  		if ($page == $i)     // 현재 페이지 번호 링크 안함
  		{
  			echo "<li><b> $i </b></li>";
  		}
  		else
  		{
  			echo "<li><a href='corporate_applicant_reading.php?page=$i'> $i </a><li>";
  		}
     	}
     	if ($total_page>=2 && $page != $total_page)
     	{
  		$new_page = $page+1;
  		echo "<li> <a href='corporate_applicant_reading.php?page=$new_page'>다음 ▶</a> </li>";
  	}
  	else
  		echo "<li>&nbsp;</li>";
  ?>
  			</ul> <!-- page -->
  	</div> <!-- board_box -->
  </section>
  </div>

  </body>
</html>
