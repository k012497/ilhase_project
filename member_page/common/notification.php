<?php
  session_start();
  if(empty($_SESSION['userid'])){
    echo "<script>
      alert('로그인 후 이용해주세요');
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
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/common/css/common.css">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/common/css/notification.css">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/person/css/person.css">
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <title>일하세</title>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <div class="container">
      <div id="div_left_menu">
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/member_page/common/member_side_menu.php";?>
      </div>
      <div id="notification">
        <ul>
          <?php
            include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

            function set_read($num){
              global $conn;

              $sql = "update notification set `read` = 1 where num = '".$num."'";
              $result = mysqli_query($conn, $sql);
              echo "<script>alert('$sql, $result');</script>";
              echo $sql.$result;
              if(!$result){
                echo mysqli_error($result);
                exit;
              }
            }

            if(isset($_GET['mode']) && $_GET['mode'] === 'check_read'){
              // check read 모드이면, read flag를 1로 바꾼다
              $num = $_GET['num'];
              echo "<script>alert('$num');</script>";
              set_read($num);
            }

            // 14일 지난 알림은 자동 삭제
            $sql = "delete from notification where regist_date <= date_sub(now(), interval 14 DAY);";
            mysqli_query($conn, $sql);

            // 로그인한 사용자의 알림 가져오기
            $sql= "select * from notification where member_id = '".$user_id."' order by regist_date desc;";

            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 0){
              // 알림이 없을 경우
              echo "<li>도착한 알림이 없습니다.</li>";
            } else {
              while($row = mysqli_fetch_array($result)){
                $title = $row['title'];
                $content = $row['content'];
                $regist_date = $row['regist_date'];
                $read = $row['read'];
                $n_num = $row['num'];

                if($read == 1){
                  // 읽었을 경우
                  $read_sign = '';
                } else {
                  $read_sign = '•';
                }

                echo '<li>
                  <span class="noti_title" onclick="toggle_content(this);">'.$title.' <span class="read_sign">'.$read_sign.'</span></span>
                  <span class="date_received">'.$regist_date.'</span>
                  <p class="noti_content invisible">'.$content.'</p>
                  <span class="invisible">'.$n_num.'</span>
                </li>';
              }
            }
          ?>

        </ul>
      </div><!-- noti message -->
    </div><!-- container -->

    <script>
      function toggle_content(title){
        const p_content = title.nextElementSibling.nextElementSibling;
        const read_sign = title.firstElementChild;
        const num = p_content.nextElementSibling.innerHTML;

        // p태그 토글
        p_content.classList.toggle('invisible');
        console.log(num + "번 알림");

        // 해당 li의 읽음 표시 사라짐
        $.get('notification.php', { mode : 'check_read', num : num }, function(){
          read_sign.classList.add('invisible');
        });
      }

      //nav active 활성화
      document.querySelectorAll('.nav-item').forEach(function(data, idx){
        data.classList.remove('active');

        if(idx === 4){
          data.classList.add('active');
        }
      });

      // 사이드 메뉴 표시
      const current_menu = document.querySelectorAll('.side_menu_item')[3];
      current_menu.style.backgroundColor = 'rgb(133, 198, 241)';
      current_menu.style.color = 'white';
    </script>
  </body>
</html>
