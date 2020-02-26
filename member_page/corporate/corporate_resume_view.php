<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

if(isset($_GET['m_id'])){
  $m_id = $_GET['m_id'];
} else {
  $m_id = "";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>일하세</title>
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/manage_articles/css/manage.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/manage_articles/js/resume.js"></script>
    <script>
    function checkImage(){
        var fileCheck=document.getElementById('imageFile').value;
        if(fileCheck){
          resizeImage();
          resizeImage();
        }
    }

    function resizeImage(){
      var filesToUpload = document.getElementById('imageFile').files;
      var file= filesToUpload[0];
      var img = document.createElement("img");
      var reader = new FileReader();
      reader.onload=function(event){
        img.src=event.target.result;
        var canvas=document.createElement("canvas");
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);

        var MAX_WIDTH = 200,
        MAX_HEIGHT = 250;
        MIN_WIDTH = 200;
        MIN_HEIGHT = 250;
        var width = img.width;
        var height = img.height;

        if (width > height) {
          if (width > MAX_WIDTH) {
              height *= MAX_WIDTH / width;
                width = MAX_WIDTH;
            }
        } else {
            if (height > MAX_HEIGHT) {
                width *= MAX_HEIGHT / height;
                height = MAX_HEIGHT;
            }
        }
        if (width > height) {
            if (width < MIN_WIDTH) {
                height *= MIN_WIDTH / width;
                width = MIN_WIDTH;
            }
        } else {
            if (height < MIN_HEIGHT) {
                width *= MIN_HEIGHT / height;
                height = MIN_HEIGHT;
            }
          }
          canvas.width=width;
          canvas.height=height;
          var ctx = canvas.getContext("2d");
          ctx.drawImage(img,0,0,width,height);
          var dataurl = canvas.toDataURL("image/png");
          document.getElementById('img_upload').src=dataurl;
      }
      reader.readAsDataURL(file);
    }
    </script>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <?php
        $sql    = "select * from person where id='$m_id'";
        $result = mysqli_query($conn, $sql);
        $row    = mysqli_fetch_array($result);

        $name = $row["name"];
        $birth = $row["birth"];
        $gender=$row["gender"];
        $phone = $row["phone"];
        $email = $row["email"];
        $new_address =$row["new_address"];



          $sql="select * from resume where m_id='$m_id'";
          $result1=mysqli_query($conn,$sql);
          $row1=mysqli_fetch_array($result1);

          $public=$row1["public"];
          $title = $row1["title"];
          $cover_letter =$row1["cover_letter"];
          $career =$row1["career"];
          $license =$row1["license"];
          $education =$row1["education"];
          $file_name =$row1["file_name"];
          $file_copied =$row1["file_copied"];


     ?>
    <form id="form_resume" action="resume.php?mode=<?=$mode?>" name="form_resume" method="post" enctype="multipart/form-data">
      <div id="main_resume">

      </div>
      <div id="div_resume_main">
        <div>
          <input id="input_title" type="text" name="input_title" placeholder="제목을 적어주세요." value="<?=$title?>" disabled>
        </div>
        <div id="div_image_profile">
          <input id="imageFile" type="file" name="upfile" onchange="checkImage();" accept="image/*" disabled>
          <!-- <input type="file" id="imageFile" name="upfile" accept="image/*" onchange="checkImage();"> -->
          <img id="img_upload" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/manage_articles/data/<?=$file_copied?>" alt="image" onerror="this.src='http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/manage_articles/img/person.png'">
          <div id="profile_info">
            <input id="input_name" type="text" name="input_name" value="<?=$name?>" readonly>
            <input id="input_birth" type="text" name="input_birth" value="<?=$birth?>" readonly>
            <input id="input_gender" type="text" name="input_gender" value="<?=$gender?>" readonly>
            <input id="input_phone" type="text" name="input_phone" value="<?=$phone?>" readonly>
            <input id="input_email" type="text" name="input_email" value="<?=$email?>" readonly>
            <input id="input_address" type="text" name="input_address" value="<?=$new_address?>" readonly>
          </div>
        </div>
        <div id="div_cover_letter">
          <div id="div_cover_letter_detail">
            <p>간단하게 자기를 소개 해보세요!!</p>
            <textarea name="cover_letter" rows="7" cols="70" placeholder="자기소개" style="border-radius: 3px;" disabled><?=$cover_letter?></textarea>
          </div>
          <div id="div_show">
            <button type="button" id="btn_show" name="btn_show" onclick="showDiv()">더 자세한 이력을 보시려면 클릭하세요</button>
          </div>
          <div id="div_resume_detail" style="display:none;">
            <div class="div_present">
              <p>이전에 하셨던 일이 있나요 ?</p>
              <!-- <input  id="text_job" type="text" name="" value="" readonly> -->
              <textarea id="text_job" name="text_job" rows="8" cols="80" disabled><?=$career?></textarea>
              <input id="input_job" type="text" name="job" style="width:250px;" placeholder="맡았던 직무를 간단히 적어주세요" disabled>
              <input id="input_date" type="text" name="job_date" style="width:100px;" placeholder="언제" disabled>
              <input id="input_years" type="text" name="years" style="width:200px;" placeholder="얼마나 하셨나요?" disabled>
            </div>
            <div class="div_present">
              <p>보유하신 자격증이 있나요?</p>
              <!-- <input  id="text_license" type="text" name="" value="서비스직,2015년,5년" readonly> -->
                <textarea id="text_license" name="text_license" rows="8" cols="80" disabled><?=$license?></textarea>
              <input id="input_license" type="text" name="license" style="width:305px;" placeholder="자격증 이름" disabled>
              <input id="input_license_date" type="text" name="license_date" style="width:250px;" placeholder="취득년도" disabled>
            </div>
            <div class="div_present">
              <p>학력도 적어주세요!</p>
              <!-- <input  id="text_school" type="text" name="" value="서비스직,2015년,5년" readonly> -->
              <textarea id="text_school" name="text_school" rows="8" cols="80" disabled><?=$education?></textarea>
              <input id="input_school" type="text" name="school" style="width:250px;" placeholder="학교" disabled>
              <input id="input_graduation" type="text" name="graduation" style="width:150px;"placeholder="졸업년도" disabled>
              <input id="input_major" type="text" name="major" placeholder="전공"style="width:150px;" disabled>
            </div>
          </div>
        </div>

          <button id="btn_cancel" type="button"  name="button">이전으로</button>
        </div>
        </div>
      </div>
    </form>
    <script>
      var show = document.getElementById('div_resume_detail');
      var btn = document.getElementById('btn_show');
      function showDiv(){
        if (show.style.display=='none') {
          show.style.display='block';
        }else{
          show.style.display='none';
        }
      }
    </script>
  </body>
</html>
