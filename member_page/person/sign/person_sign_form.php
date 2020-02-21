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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
    <!-- font -->
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <link rel="stylesheet" href="./slider.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <style media="screen">
    .visual{right: 200px;;position:relative;width:1360px;}
    .visual button {position:absolute;z-index:10; top:50%;transform:translateY(-50%);
    width:71px;height:71px;border-radius: 100%;background:rgba(0,0,0,.5);
    border:none;}
    .visual button:before{font-family: 'xeicon';color:#fff;font-size: 45px;}
    .visual button.slick-prev {left:0; font-size:0;color:transparent;}
    .visual button.slick-prev:before{content:"\e93d";}
    .visual button.slick-next {right:0;font-size:0;color:transparent;}
    .visual button.slick-next:before{content:"\e940";}
    .input1 {margin-top:50px;margin-left: 230px; height: 80px;font-size: 24px;
    text-align:center;}
    .input2 {margin-top:20px;margin-left: 230px; height: 80px;font-size: 24px;
    text-align:center;}
    .div1 {margin-top:100px;margin-left: 230px; height: 80px;font-size: 24px;}
    .div1 h3{margin-left: 30px;}
    .div1 h1{margin-left: 0px;}
    .div2 {margin-top:40px;margin-left: 230px; height: 80px;font-size: 24px;}
    .div2 h3{margin-left: 70px;}
    .div2 h1{margin-left: -60px;}
     h4{margin-left: 250px;color:red;}
    </style>
    <title>일하세</title>
    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script src="../js/daumMap.js">

    </script>
</head>
<body>
    <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header_plain.php";?>
    </header>
    <div style="height:550px">
    <div class="container">
      <!-- 메인 슬라이드 -->

      <div class="visual">
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3>1/8</h3>
            <h1>사용하실 아이디를 적어주세요</h1>
          </div>
          <input type="text" name="id" id="id" size="50" class="input1"  value="a9807221a"><br>
          <h4 id="idSubMsg">*공백없이 2~6글자만 가능합니다.</h4>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3>2/8</h3>
            <h1 >사용하실 비밀번호를 적어주세요</h1>
          </div>
          <input type="text" name="pass" id="pass_1" size="50" class="input1"  value="12"><br>
          <h4 id="passSubMsg1">*공백없이 6~15글자만 가능합니다.</h4>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3>2/8</h3>
            <h1 >사용하실 비밀번호를 다시 적어주세요</h1>
          </div>
          <input type="text" id="pass_2" size="50" class="input1"><br>
          <h4 id="passSubMsg">*똑같이 적어주세요.</h4>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3 id="h3_2">3/8</h3>
            <h1 id="h1_2">성함을 적어주세요</h1>
          </div>
          <input type="text" value="" size="50" class="input1" id="name" name="name"><br>
          <h4 id="h4_2" class="name_space">*공백없이 2~6글자만 가능합니다.</h4>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div2">
            <h3>4/8</h3>
            <h1>연락 가능한 번호를 적은 후, 인증 버튼을 눌러주세요.</h1>
          </div>
          <input type="text" value="" size="50" class="input2" name="phone" id="phone">
          <input type="button" value="인증" id="button" style="width:100px;height: 80px;font-size: 24px;
          text-align:center;"><br>
          <input type="text" value="" id="phone_num"size="50" class="input1"><br>
          <h3 id='valueSub' style="margin-left: 330px;"></h3>
        <input type="hidden" name="" id="phone_injung" value=0>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3>5/8</h3>
            <h1>자주 사용하시는 이메일을 적어주세요.</h1>
          </div>
          <input type="text" value="" size="50" class="input1" id="email" name="email"><br>
          <h4 id="email_sub"style="margin-left:330px;color:red;"></h4>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3>6/8</h3>
            <h1>주민번호 앞자리와 뒷자리 첫번째 자리수를 적어주세요</h1>
          </div>
          <input type="text" value="" size="20" class="input1" id="birth" name="birth"><span style="font-size:160px" >-</span>
          <input type="text" value="" size="1" style="height:80px;font-size:24px;" id="gender"name="gender"><span style="font-size:60px">******</span><br>
          <h4 id="birth_sub"style="margin-left:330px;color:red;"></h4>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3>7/8</h3>
            <h1>주소를 입력해주세요</h1>
          </div>
          <input type="text" id="sample4_postcode" placeholder="우편번호" size="30"style="margin-top:50px;margin-left: 430px; height: 80px;font-size: 24px;
          text-align:center;" name="postcode">
          <input type="button" onclick="sample4_execDaumPostcode()" value="우편번호 찾기" style="height: 80px;font-size: 24px;
          text-align:center;"><br>
          <input type="text" id="sample4_roadAddress" placeholder="도로명주소" size="30"style="margin-left: 430px;height: 80px;font-size: 24px;
          text-align:center;" name="roadAddress">
          <input type="text" id="sample4_jibunAddress" placeholder="지번주소" size="30"style="height: 80px;font-size: 24px;
          text-align:center;" name="jibunAddress">
          <span id="guide" style="color:#999;display:none"></span><br>
          <input type="text" id="sample4_detailAddress" placeholder="상세주소" size="30"style="margin-left: 430px;height: 80px;font-size: 24px;
          text-align:center;">
          <input type="text" id="sample4_extraAddress" placeholder="참고항목" size="30"style="height: 80px;font-size: 24px;
          text-align:center;">
          <h4 id="adress_sub"style="margin-left:330px;color:red;"></h4>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3>마지막 단계입니다.</h3>
            <h1>다음 이용약관을 확인해주세요</h1>
          </div>
          <input type="text" value="" size="50" class="input1">
          <input type="button" name="" id="submit_1" value="등록">
          <br>
        </div>
        <div class=""><img src="../img/slide-3.jpg" alt="">
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
        </div>
      </div>
    <form name="insert_person" action="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/lib/person_insert.php" method="post">
      <input type="hidden" name="id1" id="i1">
      <input type="hidden" name="pass" id="i2">
      <input type="hidden" name="name" id="i3">
      <input type="hidden" name="phone" id="i4">
      <input type="hidden" name="birth" id="i5">
      <input type="hidden" name="gender" id="i6">
      <input type="hidden" name="postcode" id="i7">
      <input type="hidden" name="roadAddress" id="i8">
      <input type="hidden" name="jibunAddress" id="i9">
      <input type="hidden" name="email" id="i10">
    </form>
      <script src="slider.js"></script>
<!-- 메인 슬라이드 End -->

    </div>
    </div>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; ilhase 2020</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</body>
</html>
