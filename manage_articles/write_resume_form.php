<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
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

if(isset($_GET['num'])){
  $num = $_GET['num'];
} else {
  $num = "";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>일하세</title>
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <link rel="stylesheet" href="./css/manage.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="./js/resume.js"></script>
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
        $sql    = "select * from person where id='$userid'";
        $result = mysqli_query($conn, $sql);
        $row    = mysqli_fetch_array($result);

        $name = $row["name"];
        $birth = $row["birth"];
        $gender=$row["gender"];
        $phone = $row["phone"];
        $email = $row["email"];
        $new_address =$row["new_address"];



      if (isset($_GET["mode"])) {
        if ($_GET["mode"]=="update") {

          $mode="update";
          $num=$_GET["num"];

          $sql="select * from resume where num='$num'";
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
        }

      }else{
        $num="";
        $mode="";
        $title="";
        $public="";
        $cover_letter="";
        $career="";
        $license="";
        $education="";

      }

     ?>
    <form id="form_resume" action="resume.php?mode=<?=$mode?>&num=<?=$num?>" name="form_resume" method="post" enctype="multipart/form-data">
      <div id="main_resume">
        <?php
          if ($mode=="update") {
            echo "<h3 class='title' id='resume_title'>✎ 이력서 수정</h3>";
          }else{
            echo "<h3 class='title' id='resume_title'>✎ 이력서 작성</h3>";
          }
         ?>

      </div>
      <div id="div_resume_main">
        <div>
          <input type="hidden" name="num" value="<?=$num?>">
          <input id="input_title" type="text" name="input_title" placeholder="제목을 적어주세요." value="<?=$title?>" required />
            <input id="input_public" type="checkbox" name="input_public" value="<?=$public?>" checked>&nbsp;공개
        </div>
        <div id="div_image_profile">
          <div id="imgFile_box">
            <input id="imageFile" type="file" name="upfile" onchange="checkImage();" accept="image/*">
            <!-- <input type="file" id="imageFile" name="upfile" accept="image/*" onchange="checkImage();"> -->
            <img id="img_upload" src="./data/<?=$file_copied?>" alt="image" onerror="this.src='./img/imagefilebasic.jpg'">
          </div>
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
            <textarea id="cover_letter" name="cover_letter" rows="7" cols="70" placeholder="자기소개" style="border-radius: 3px;" required><?=$cover_letter?></textarea>
          </div>
          <div id="div_show">
            <p id="btn_show" ><span id="btn_more_img"></span>더 자세한 이력을 작성하려면 클릭하세요</p>
          </div>
          <div id="div_resume_detail" >
            <div class="div_present">
              <p>이전에 하셨던 일이 있나요 ?</p>
              <textarea id="text_job" name="text_job" rows="5" cols="80" ><?=$career?></textarea>
              <input id="input_job" type="text" name="job" style="width:250px;" placeholder="맡았던 직무를 간단히 적어주세요">
              <input id="input_date" type="text" name="job_date" style="width:100px;" placeholder="언제">
              <input id="input_years" type="text" name="years" style="width:200px;" placeholder="얼마나 하셨나요?">
              <button class="btn_upload" type="button" name="btn_job" id="btn_job"> <img src="./img/plus.png" alt=""> </button>
            </div>
            <div class="div_present">
              <p>보유하신 자격증이 있나요?</p>
                <textarea id="text_license" name="text_license" rows="5" cols="80" ><?=$license?></textarea>
              <input id="input_license" type="text" name="license" style="width:305px;" placeholder="자격증 이름">
              <input id="input_license_date" type="text" name="license_date" style="width:250px;" placeholder="취득년도">
              <button class="btn_upload" type="button" id="btn_license" name="btn_license"> <img src="./img/plus.png" alt=""> </button>
            </div>
            <div class="div_present">
              <p>학력도 적어주세요!</p>
              <textarea id="text_school" name="text_school" rows="5" cols="80" ><?=$education?></textarea>
              <input id="input_school" type="text" name="school" style="width:250px;" placeholder="학교">
              <input id="input_graduation" type="text" name="graduation" style="width:150px;"placeholder="졸업년도">
              <input id="input_major" type="text" name="major" placeholder="전공"style="width:150px;" >
              <button class="btn_upload" type="button" name="btn_major" id="btn_major"> <img src="./img/plus.png" alt=""> </button>
            </div>
          </div>
        </div>
        <div id="btn_box">
        <?php
          if ($mode === 'update') {
            echo "<button id='btn_update' type='submit' name='button'>수정하기</button>";
          }else{
            echo "<button id='btn_insert' type='submit' name='button'>등록하기</button>";
          }
         ?>

          <button id="btn_cancel" type="button"  name="button">취 소</button>

        </div>
        </div>
        </div>
      </div>
    </form>

    <!-- 확대/축소 버튼 -->
    <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/zoom.php";?>

    <script>
       //클릭 효과
       $(function(){
        $('#btn_show').off('click');
        $('#btn_show').click(function(){
          $('#div_resume_detail').fadeToggle('500');
        });
      });

      //img를 누르면 upload 파일을 클릭
      $(function(){
        $('#img_upload').click(function(){
          $('#imageFile').click();

        });
      });

      function public_check(){
        const mode= "<?= $mode ?>";
        var public=document.querySelector("#input_public");
        var public_value="";
        if (mode=="update") {
          public_value="<?=$public?>";
          if(public_value=="1"){
            public.checked=true;
          }else{
            public.checked=false;
          }
        }else{
          public_value;
        }


      }
      public_check();

    </script>
  </body>
</html>
