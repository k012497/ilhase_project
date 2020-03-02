<?php
  session_start();
  if(empty($_SESSION['userid'])){
    echo "<script>alert('로그인 후 이용해주세요');
      history.go(-1);
    </script>";
    exit;
  } else {
    $user_id = $_SESSION['userid'];
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>일하세</title>
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="./css/person.css">
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <div class="div_container">
    <div id="div_left_menu">
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/member_page/common/member_side_menu.php";?>
    </div>
    <div id="div_apply">
      <table id="tb_apply">
        <tr id="tr_first">
          <th class="th_group">번호</th>
          <th class="th_group">제출이력서</th>
          <th class="th_group">해당 공고</th>
          <th class="th_group">마감 날짜</th>
          <th class="th_group">지원 날짜</th>
          <th class="th_group"></th>
        </tr>
        <?php
            include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

            if(isset($_GET['mode']) && $_GET['mode'] === 'delete'){
              $apply_num = $_GET['num'];
              $sql = "delete from apply where num = ".$apply_num;
              mysqli_query($conn, $sql);

              exit;
            }

            $sql = "select a.num as a_num, r.num as r_num, r.file_name, a.resume_title, title, r.period_end, a.regist_date as date_applied from recruitment r join apply a on a.recruit_id = r.num where r.num in (select recruit_id from apply where member_id = '".$user_id."');";
            $result = mysqli_query($conn, $sql);
            $total_count = mysqli_num_rows($result);
            while($row = mysqli_fetch_array($result)){
              $a_num = $row['a_num'];
              $resume_title = $row['resume_title'];
              $recruit_title = $row['title'];
              $recruit_num = $row['r_num'];
              $file_name = $row['file_name'];
              $period_end = $row['period_end'];
              $date_applied = $row['date_applied'];
              if(!$file_name){
                $file_name = './img/basicimg.jpg';
              }

              echo '<tr>
                <td>'.$total_count.'</td>
                <td>'.$resume_title.'</td>
                <td><a href="http://'.$_SERVER['HTTP_HOST'].'/ilhase/search/recruit_details.php?pick_job_num='.$recruit_num.'&img='.$file_name.'&title='.str_replace(" ", "%20", $recruit_title).'">'.$recruit_title.'</a></td>
                <td>'.$period_end.'</td>
                <td>'.$date_applied.'</td>
                <td id="btn_delete_history" onclick="delete_history(this, '.$a_num.');">𝗫</td>
              </tr>';

              $total_count--;
            }
        ?>
      </table>
    </div>
    </div>
    <script>
      //nav active 활성화
      document.querySelectorAll('.nav-item').forEach(function(data, idx){
        data.classList.remove('active');

        if(idx === 4){
          data.classList.add('active');
        }
      });

      // 사이드 메뉴 표시
      const current_menu = document.querySelectorAll('.side_menu_item')[1];
      current_menu.style.backgroundColor = 'rgb(133, 198, 241)';
      current_menu.style.color = 'white';

      function delete_history(btn_delete, a_num){
        const tr = btn_delete.parentNode;

        $.get('apply_history.php?mode=delete&num=' + a_num, "", function(){
          // tr 지우기
          tr.parentNode.removeChild(tr);
        });
      }
    </script>
  </body>
</html>
