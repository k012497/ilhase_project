<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="./css/manage.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
      <form class="" action="index.html" method="post">
        <div id="div_main">
          <div id="div_recruit_sample">
            <h3 class="title" id="recruit_title">채용 공고 샘플</h3>
            <input type="button" id="btn_download" name="download_resume" value="다운로드">
          </div>
          <div id="main_recruit">
            <div id="recruit_admin">
              <h3 class="title">채용 공고 관리</h3>
              <a href="#">마감된 공고 삭제하기</a>
            </div>
            <div id="recruit_list">
              <ul>
                <li class="li_resume"><img src="../img/agreement.png" alt=""><p class="p_title">웹 개발자 구합니다.<br/> 2020.2.14</p> <img class="btn_image" src="../img/cross.png" alt="버튼" onclick="">
                </li>
                <li class="li_resume"><img src="../img/agreement.png" alt=""><p class="p_title">웹 개발자 구합니다.<br/> 2020.2.14</p> <img class="btn_image" src="../img/cross.png" alt="버튼" onclick="">
                </li>
                <li class="li_resume"><img src="../img/agreement.png" alt=""><p class="p_title">웹 개발자 구합니다.<br/> 2020.2.14</p> <img class="btn_image" src="../img/cross.png" alt="버튼" onclick="">
                </li>
                <li class="li_resume"><img src="../img/agreement.png" alt=""><p class="p_title">웹 개발자 구합니다.<br/> 2020.2.14</p> <img class="btn_image" src="../img/cross.png" alt="버튼" onclick="">
                </li>
                <li class="li_resume"><img src="../img/agreement.png" alt=""><p class="p_title">웹 개발자 구합니다.<br/> 2020.2.14</p> <img class="btn_image" src="../img/cross.png" alt="버튼" onclick="">
                </li>
                <li class="li_resume"><img src="../img/agreement.png" alt=""><p class="p_title">웹 개발자 구합니다.<br/> 2020.2.14</p> <img class="btn_image" src="../img/cross.png" alt="버튼" onclick="">
                </li>
                <li class="li_resume"><img src="../img/agreement.png" alt=""><p class="p_title">웹 개발자 구합니다.<br/> 2020.2.14</p> <img class="btn_image" src="../img/cross.png" alt="버튼" onclick="">
                </li>
                <li class="li_resume"><img src="../img/agreement.png" alt=""><p class="p_title">웹 개발자 구합니다.<br/> 2020.2.14</p> <img class="btn_image" src="../img/cross.png" alt="버튼" onclick="">
                </li>
                <li class="li_resume"><img src="../img/agreement.png" alt=""><p class="p_title">웹 개발자 구합니다.<br/> 2020.2.14</p> <img class="btn_image" src="../img/cross.png" alt="버튼" onclick="">
                </li>
                <li id="finish_resume"><p>마감</p>
                </li>
                <li id="new_resume"><img src="../img/upload.png" alt=""><p> 신규 공고 등록하기</p>
                </li>
              </ul>
            </div>


          </div>
        </div>
      </form>
  </body>
</html>
