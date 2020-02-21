<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
    <link rel="stylesheet" href="./css/person.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
    </script>
    <title></title>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
  <div id="div_left_menu">
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/member_page/person/member_side_menu.php";?>
  </div>
    <div id="alarm_message">
      <div id="message">
        <ul>
          <li>
            <span class="alarm_content">1:1 문의 답변이 도착했습니다. <strong>●</strong></span>
            <span class="alarm_receive">2020-02-18</span>
          </li>
          <li>
            <span class="alarm_content">23개의 모집 공고가 올라왔습니다. <strong>●</strong></span>
            <span class="alarm_receive">2020-02-18</span>
          </li>
          <li>
            <span class="alarm_content">1:1 문의 답변이 도착했습니다. <strong>●</strong></span>
            <span class="alarm_receive">2020-02-18</span>
          </li>
          <li>
            <span class="alarm_content">새로운 공지사항이 등록 되었습니다. <strong>●</strong></span>
            <span class="alarm_receive">2020-02-18</span>
            <div class="">
              <p>동해 물과 백두산이 마르고 닳도록 하느님이 보우하사 우리 나라 만세<br>
              무궁화 삼천리 화려강산 대한사람 대한으로 우리나라 만세</p>
            </div>
          </li>
        </ul>

      </div>
    </div>
  </body>
</html>
