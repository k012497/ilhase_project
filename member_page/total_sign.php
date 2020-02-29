<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_setting.php";
if(isset($_SESSION["userid"])){
  $userid=$_SESSION["userid"];
}else{
  $userid="";
}
if(isset($_SESSION["username"])){
  $username=$_SESSION["username"];
}else{
  $username="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="./sns_login.js"></script>
    <script type="text/javascript" src="https://static.nid.naver.com/js/naveridlogin_js_sdk_2.0.0.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"> </script>
    <title>일하세</title>
    <style>
      .sign_up_box {
        position: relative;
        top: 23%; 
        width:35rem; 
        border-radius:20px;
        background-color:#ffffff; 
        margin: 0 auto;
      }

      .sign_up_box h3 {
        margin: 1rem;
      }

      #person, #corporate {
        width: 48%;
        display: inline-block;
        background-color: rgb(133, 198, 241);
      }

      #person {
        margin-right: 0.5rem;
      }

      .container {
        height: 550px;
      }

      .btn {
        color: white;
      }
    </style>
</head>
<body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>

    <div class="container">

    <div class="sign_up_box" style="float:none; margin:0 auto">
      <h3 class="card-title text-center">회원가입</h3>
      <div class="card align-middle">
          <h3 class="text-center" style="margin-top: 2rem; font-size: 22px;">회원 유형 선택</h3>
          <div class="card-body">
            <form class="form-signin" method="POST" action="login.php">
              <label for="person" class="sr-only">person</label>
              <a href="./person/sign/person_sign_form.php" type="button" name="person" id="person" class="btn btn-lg btn-block">개인 회원 가입</a>
              <label for="corporate" class="sr-only">corporate</label>
              <a href="./corporate/sign/coporate_sign.php" type="button" name="corporate" id="corporate" class="btn btn-lg btn-block">기업 회원 가입</a><br>
            </form>
          </div>
        </div>
        <div class="modal">
        </div>
      </div>
    </div> 
    <!-- Footer -->
    <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/footer.php";?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script>
    //nav active 활성화
    document.querySelectorAll('.nav-item').forEach(function(data, idx){
            data.classList.remove('active');

            if(idx === 4){
              data.classList.add('active');
            }
          });
  </script>
</body>
</html>
