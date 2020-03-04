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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
    <link rel="stylesheet" href="./css/person.css">
    <title>일하세</title>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <div class="div_container">
    <div id="div_left_menu">
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/member_page/common/member_side_menu.php";?>
    </div>
    <?php
        $sql    = "select * from person where id='$userid'";
        $result = mysqli_query($conn, $sql);
        $row    = mysqli_fetch_array($result);

        $name = $row["name"];
        $pass = $row["pw"];
        $gender=$row["gender"];
        $birth = $row["birth"];
        $email = $row["email"];
        $phone = $row["phone"];
        $zipcode = $row["zipcode"];
        $new_address =$row["new_address"];
        $old_address =$row["old_address"];
        
        if($gender==="2" || $gender==="4"){
          $gender="여";
        }else if($gender==="1" || $gender==="3"){
          $gender="남";
        }

        mysqli_close($conn);
    ?>
    <div id="div_member">
      <form id="form_edit" name="form_edit" action="person_edit.php?id=<?=$userid?>" method="post">
        <input type="hidden" name="id" value="<?=$userid?>">
      <div id="member_name">
        <label for="name"><strong>*</strong>이름</label> <input id="input_name" type="text" name="name" placeholder="이름" value="<?=$name?>"> <label for="gender" id="label_gender"><strong>*</strong>성별</label> <input id="gender" type="text" name="gender" value="<?=$gender?>" readonly>
      <p id="nameMsg" style="display:none;">공백없이 2~6글자만 가능합니다.</p>
      </div>
      <div id="member_pass">
        <label for="password"><strong>*</strong>비밀번호</label> <input type="password" id="pass_1" name="pass_1"> <p id="passSubMsg1" style="display:none;">비밀번호를 다시 입력해주세요.</p>
      </div>
      <div id="member_passCheck">
        <label for="password"><strong>*</strong>비밀번호 확인</label> <input type="password" id="pass_2" name="pass_2">   <p id="passSubMsg" style="display:none;">비밀번호가 일치하지 않습니다.</p>
      </div>
      <div id="member_birth">
        <label for="birth"><strong>*</strong>생년월일</label> <input type="text" id="birth" name="birth"  value="<?=$birth?>" readonly>
      </div>
      <div id="member_email">
        <label for="email"><strong>*</strong>이메일</label> <input type="email" id="email" name="email" value="<?=$email?>" readonly>
      </div>
      <div id="member_phone">
        <label for="phone"><strong>*</strong>핸드폰 번호</label> <input type="text" id="phone" name="phone" value="<?=$phone?>" placeholder="(-)하이픈 포함 휴대폰번호">  <p id="phoneMsg" style="display:none;">하이픈 포함 휴대폰 번호를 입력해주세요.</p>
      </div>
      <div id="member_address">
          <label for="address"><strong>*</strong>주 소</label> <input type="text" id="zipcode" name="zipcode" value="<?=$zipcode?>"> <input id="btn_address" type="button" name="btn_address" value="우편검색" >
      </div>
      <div id="add_address">
        <input id="new_address" type="text" name="new_address" value="<?=$new_address?>">
        <input id="old_address" type="text" name="old_address" value="<?=$old_address?>">
      </div>

      <div id="div_button">
        <input  type="button" id="btn_edit" name="btn_edit" value="수정하기"></button>
      </div>
    </form>
    </div>
    </div>

    <!-- 확대/축소 버튼 -->
    <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/zoom.php";?>  
    
    <script src="./js/edit.js"></script>
  </body>
</html>
