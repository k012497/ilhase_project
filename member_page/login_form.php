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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
    <script type="text/javascript" src="https://static.nid.naver.com/js/naveridlogin_js_sdk_2.0.0.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"> </script>
    <title>일하세</title>
    <script type="text/javascript">
      $(function(){
        $('#btn-Yes').click(function(){
          if($('#member_type').val()==""){
            alert("기업인지 회원인지 선택하라 이말이야!");
          }else if($('#uid').val()==""){
            alert("아이디를 입력해주세요!");
          }else if($('#upw').val()==""){
            alert("패스워드를 입력해주세요!");
          }else{
            document.login_2.submit();
          }
        });
        // ID를 alpreah_input로 가지는 곳에서 키를 누를 경우
            $("#uid").keydown(function(key) {
                //키의 코드가 13번일 경우 (13번은 엔터키)
                if (key.keyCode == 13) {
                  if($('#member_type').val()==""){
                    alert("기업인지 회원인지 선택하라 이말이야!");
                  }else if($('#uid').val()==""){
                    alert("아이디를 입력해주세요!");
                  }else if($('#upw').val()==""){
                    alert("패스워드를 입력해주세요!");
                  }else{
                    document.login_2.submit();
                  }
                }
            });
            $("#upw").keydown(function(key) {
                //키의 코드가 13번일 경우 (13번은 엔터키)
                if (key.keyCode == 13) {
                  if($('#member_type').val()==""){
                    alert("기업인지 회원인지 선택하라 이말이야!");
                  }else if($('#uid').val()==""){
                    alert("아이디를 입력해주세요!");
                  }else if($('#upw').val()==""){
                    alert("패스워드를 입력해주세요!");
                  }else{
                    document.login_2.submit();
                  }
                }
            });
      });
    </script>

</head>
<body>
    <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <div style="height:550px; margin-bottom:100px;">

    <div class="container" style="display:flex;
  align-items:center;top:150px;position:absolute; left:300px;">

    <!-- Jumbotron Header -->
    <div style="float:none; margin:0 auto">
        <div class="card align-middle">
            <div class="card-title text-center">
              로그인
            </div>
            <div class="card-body">
              <form class="form-signin" method="POST" action="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/lib/login.php" name="login_2">
                <h4 class="form-signin-heading">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="member_type" value="person" id="option1" autocomplete="off" checked> 개인 회원
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="member_type" value="corporate" id="option2" autocomplete="off"> 기업 회원
                        </label>
                    </div>
                  </h4>

                <label for="inputEmail" class="sr-only">아이디</label>
                <input type="text" name="uid" id="uid" class="form-control" placeholder="아이디" required autofocus style="background-color:white; height: 50px; border-bottom: 1px solid #eee">
                <label for="inputPassword" class="sr-only">비밀번호</label>
                <input type="password" name="upw" id="upw" class="form-control" placeholder="비밀번호" required style="background-color:white; height: 50px;"><br>
                <button id="btn-Yes" class="btn btn-lg btn-primary btn-block" type="button" onkeyup="enterkey();">로 그 인</button>
                <div class="row text-center" style="width: 100%">
                  <ul>
                    <!-- naver -->
                    <li><div id="naverIdLogin" onclick="naver_login();"></div></li>
                    <!-- kakao -->
                    <li><div class="kakao">
                        <!-- <form name="member_form" action="../join/join_query.php" method="post">
                          <input type="hidden" name="mode" value="kakao">
                          <input type="hidden" name="join_id" id="id" value="">
                          <input type="hidden" name="join_name" id="name"  value="">
                          <input type="hidden" name="email" id="email"  value=""> -->
                        <a href="#" type="button" onclick="kakao_login();"
                          style="background-image:url('http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/kakao_account_login_btn.png');"></a>
                        <!-- </form> -->
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="login_bottom">
                  <ul>
                    <li><a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/find_id_pw.php">아이디/비밀번호 찾기</a></li>
                    <li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</li>
                    <li><a href="./total_sign.php">회원가입</a></li>
                  </ul>
                </div>
              </form>

            </div>
          </div>
          <script type="text/javascript">

            var naverLogin = new naver.LoginWithNaverId(
              {
                clientId: "NQzYhgZ1ajZ0m1J4T9Fv",
                callbackUrl: "http://localhost/ilhase/common/lib/naver_login.php",
                isPopup: false, /* 팝업을 통한 연동처리 여부 */
                loginButton: {color: "green", type: 3, height: 40} /* 로그인 버튼의 타입을 지정 */
              }
            );

            /* 설정정보를 초기화하고 연동을 준비 */
            naverLogin.init();

            naverLogin.getLoginStatus(function (status) {
              if (status) {
                var email = naverLogin.user.getEmail();
                var name = naverLogin.user.getNickName();
                var profileImage = naverLogin.user.getProfileImage();
                var birthday = naverLogin.user.getBirthday();
                var uniqId = naverLogin.user.getId();
                var age = naverLogin.user.getAge();
                console.log(email);
                console.log(name);

                 var array = email.split("@");
                // console.log(profileImage);
                // console.log(birthday);
                // console.log(uniqId);
                // console.log(age);
                naverLogin.logout();
                location.href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/index.php?userid="+email+"&username="+array[0]+"&usermember_type=sns_log";
              } else {
                console.log("AccessToken이 올바르지 않습니다.");
              }
            });
            function kakao_login(){
              Kakao.init('92f268bc75efac2d4885645ade5700e6');
              Kakao.Auth.loginForm({
                 success: function(authObj) {

                 Kakao.API.request({
                    url: '/v2/user/me',
                    success: function(res) {
                         $("#id").val(JSON.stringify(res.id));
                         $("#name").val(JSON.stringify(res.properties.nickname));
                         $("#email").val(JSON.stringify(res.kaccount_email));
                         console.log(JSON.stringify(res.id));
                         console.log(JSON.stringify(res.properties.nickname));
                         console.log(JSON.stringify(res.kaccount_email));
                         console.log(JSON.stringify(res.kakao_account.email));
                         console.log(JSON.stringify(res.kakao_account.is_email_verified));
                         // document.member_form.submit();
                    },
                    fail: function(error) {
                      alert(JSON.stringify(error))
                    }
                  });
                  },
               fail: function(err) {
               }
              });
            }
          </script>
          <div class="modal">
          </div>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            </div>

</div>
    </div>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; ilhase 2020</p>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <style>
      .card-title {
        font-weight: bolder;
        font-size: 2rem;
        margin-top: 3rem;
      }

      .card {
        background-color: #eee;
        width: 450px;
        border-radius: 20px;
        border: 0;
      }

      .btn-group {
        width: 100%;
      }

      .btn-secondary {
        width: 50%;
        color: #6c757d;
        background-color: #eee;
        /* color: #fff; */
        /* background-color: #6c757d; */
        border-color: #6c757d;
      }

      .btn-primary {
        background-color: rgb(133, 198, 241);
        border: 0;
      }

      .btn-primary:hover {
        background-color : #5DB6DE;
        border: 0;
      }

      .row ul {
        width: 100%;
        margin: 1rem 0.5rem;
      }

      .row li {
        width: 48%;
        vertical-align: top;
      }

      .kakao a{
        width: 185px;
        height: 40px;
        background-size: contain;
        background-repeat: no-repeat;
      }

      .login_bottom, .login_bottom a {
        color: #555;
      }


    </style>
</body>
</html>
