<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
    <link rel="stylesheet" href="./css/person.css">
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"> -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    </script>
    <title>일하세</title>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <div class="container">
      <div id="div_left_menu">
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/member_page/person/member_side_menu.php";?>
      </div>
      <div id="notification">
        <ul>
          <li>
            <span class="noti_title">1:1 문의 답변이 도착했습니다. <strong>•</strong></span>
            <span class="date_received">2020-02-18</span>
          </li>
          <li>
            <span class="noti_title">23개의 모집 공고가 올라왔습니다. <strong>•</strong></span>
            <span class="date_received">2020-02-18</span>
          </li>
          <li>
            <span class="noti_title">1:1 문의 답변이 도착했습니다. <strong>•</strong></span>
            <span class="date_received">2020-02-18</span>
          </li>
          <li>
            <span class="noti_title">새로운 공지사항이 등록 되었습니다. <strong>•</strong></span>
            <span class="date_received">2020-02-18</span>
            <p>동해 물과 백두산이 마르고 닳도록 하느님이 보우하사 우리 나라 만세<br>
            무궁화 삼천리 화려강산 대한사람 대한으로 우리나라 만세</p>
          </li>
        </ul>
      </div><!-- noti message -->
    </div><!-- container -->

    <script>
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
