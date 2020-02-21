
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/ilhase/common/css/faq.css">
    <title>일하세</title>

    <script type="text/javascript">
      let personal_questions = "";
      let corporate_questions = "";

      function select_personal_question(chk_box) {
        if (chk_box.checked) {
          // 개인 회원 체크가 되었을 때
          // 개인 회원 질문들을 보여줌(add visible class);

          for (var i = 0; i < personal_questions.length; i++) {
            personal_questions[i].classList.add('visible');
          }
          console.log("select_personal_question checked");

        } else {
          // 개인 회원 체크 해제했을 때
          // 개인 회원 질문들을 숨김
          for (var i = 0; i < personal_questions.length; i++) {
            personal_questions[i].classList.remove('visible');
          }
          console.log("select_personal_question not checked");
        }
      }

      function select_corporate_question(chk_box) {
        if (chk_box.checked) {
          // 기업 회원 체크가 되었을 때
          // 기업 회원 질문들을 보여줌
          for (var i = 0; i < corporate_questions.length; i++) {
            corporate_questions[i].classList.add('visible');
          }
          console.log("cor_question checked");

        } else {
          // 기업 회원 체크 해제했을 때
          // 기업 회원 질문들을 숨김
          for (var i = 0; i < corporate_questions.length; i++) {
            corporate_questions[i].classList.remove('visible');
          }
          console.log("cor_question not checked");

        }
      }

      function init() {
        personal_questions = document.body.getElementsByClassName('person_questions');
        corporate_questions = document.body.getElementsByClassName('corporate_questions');

        // 개인 회원, 기업 회원 질문을 다 보여주도록 세팅
        const check_boxes = document.body.querySelectorAll('input[type*=checkbox]');

        select_corporate_question(check_boxes[0]);
        select_personal_question(check_boxes[1]);

      }
    </script>
  </head>
  <body onload="init();">
    <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <h3 class="text_qna title">자주 묻는 질문</h3>
    <div class="middle" action="index.html" method="post">


      <ul>
        <li>
          <input id="chk_person" type="checkbox" checked="true" onchange="select_personal_question(this);">&nbsp; 개 인 &nbsp;&nbsp;&nbsp;
          <!-- <input id="chk_common" type="checkbox" onchange="select_common_question(this);" checked>&nbsp; 공 통  -->
          &nbsp;&nbsp;&nbsp;
          <input id="chk_corporate" type="checkbox" checked="true" onchange="select_corporate_question(this);">&nbsp; 기 업
        </li>
      <br><br><br>


          <!-- <input type="radio" name="accordion" id="answer01">
          <label for="answer01">이력서는 어떻게 사용하나요? <img src="../img/arrow.png" alt=""> </label>
          <div class="">
            <p>여기에 추가되는 부분이 자주묻는 질문을 답변하는 내용이 들어있다.</p>
          </div> -->
          <ul>
            <li class="person_questions">
              <input type="checkbox" id="answer01">
              <label class="person_questions" for="answer01">개인 이력서는 어떻게 사용하나요? <img src="../img/arrow.png" alt=""> </label>
              <div class="text">
                <p>여기에 추가되는 부분이 자주묻는 질문을 답변하는 내용이 들어있습니다.</p>
              </div>
            </li>
            <li class="person_questions">
              <input type="checkbox" id="answer05">
              <label class="person_questions" for="answer05">개인 이력서는 어떻게 사용하나요? <img src="../img/arrow.png" alt=""> </label>
              <div class="text">
                <p>여기에 추가되는 부분이 자주묻는 질문을 답변하는 내용이 들어있습니다.</p>
              </div>
            </li>

            <li>
              <input type="checkbox" id="answer02">
              <label for="answer02">공통 이력서는 어떻게 사용하나요? <img src="../img/arrow.png" alt=""> </label>
              <div class="text">
                <p>여기에 추가되는 부분이 자주묻는 질문을 답변하는 내용이 들어있습니다.</p>
              </div>
            </li>

            <li class="corporate_questions">
              <input type="checkbox" id="answer03">
              <label  class="corporate_questions" for="answer03">기업 어떻게 사용하나요? <img src="../img/arrow.png" alt=""> </label>
              <div class="text">
                <p>여기에 추가되는 부분이 자주묻는 질문을 답변하는 내용이 들어있습니다.</p>
              </div>
            </li>

          </ul>
      </ul>

    </div>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; ilhase 2020</p>
        </div>
    </footer>
  </body>
</html>
