<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

$num=$_GET['num'];

if($num===null){
  echo "<script>
      alert('해당 이력서가 구직자에의해 삭제되어 더이상 볼 수 없습니다. 이메일에서 이력서를 확인해주세요!');
      history.go(-1);
  </script>";
  exit;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>일하세</title>
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <link rel="stylesheet" href="./css/corporate_resume_view.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/manage_articles/js/resume.js"></script>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <?php
       
          $sql="select * from resume where num='$num'";
          $result1=mysqli_query($conn,$sql);
          $row=mysqli_fetch_array($result1);

          $license='';
          $career='';
          $education='';
          $title = $row["title"];
          $cover_letter =$row["cover_letter"];
          $name =$row["m_name"];
          $birth = $row["m_birthday"];
          $gender=$row["m_gender"];
          $phone = $row["m_phone"];
          $email = $row["m_email"];
          $new_address =$row["m_address"];
          $career =$row["career"];
          $license =$row["license"];
          $education =$row["education"];
          $file_copied =$row["file_copied"];

          if($career===null){
            $career="없음";
          }
          if($license===null){
            $license="없음";
          }
          if($education===null){
            $education="없음";
          }

          $src='';
          if($file_copied){
            $src='http://'.$_SERVER["HTTP_HOST"]."/ilhase/manage_articles/data/".$file_copied;
          }else {
            $src='https://png.pngtree.com/png-vector/20191116/ourlarge/pngtree-young-service-boy-vector-download-user-icon-vector-avatar-png-image_1991056.jpg';
          }


     ?>
     <section>
      <div id="div_resume_main">
          <h1 id="resume_title"><span id="title_img"></span><span id='title_inner'><?=$title?></span></h1>
          <div id="div_image_profile">
            <div id="resume_img_box">
            <img id="img_upload" src='<?=$src?>'>
            </div>
            <div id="profile_info">
                <ul>
                  <li><span class="colume">이&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;름</span><?=$name?></li>
                  <li><span class="colume">생년월일</span><?=$birth?></li>
                  <li><span class="colume">성&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;별</span><?=$gender?></li>
                  <li><span class="colume">전화번호</span><?=$phone?></li>
                  <li><span class="colume">E-maile</span><?=$email?></li>
                  <li><span class="colume">주&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;소</span><?=$new_address?></li>
                </ul>
            </div>
          </div>
          <div id="div_cover_letter">
            <div id="div_cover_letter_detail">
              <p>간단하게 자기를 소개 해보세요!!</p>
              <textarea class="self_intro_text" name="cover_letter" rows="7" cols="70" placeholder="자기소개" style="border-radius: 3px;" disabled><?=$cover_letter?></textarea>
            </div>
            <div id="div_show">
              <p id="btn_show"><span id="btn_more_img" ></span>더 자세한 이력을 보시려면 클릭하세요</p>
            </div>
            <div id="div_resume_detail">
              <div class="div_present">
                <p>이전에 하셨던 일이 있나요 ?</p>
                <textarea class="self_intro_text" name="text_job" rows="5" cols="80" disabled><?=$career?></textarea>
              </div>
              <div class="div_present">
                <p>보유하신 자격증이 있나요?</p>
                <textarea class="self_intro_text" name="text_license" rows="5" cols="80" disabled><?=$license?></textarea>
              </div>
              <div class="div_present">
                <p>학력도 적어주세요!</p>
                <textarea class="self_intro_text" name="text_school" rows="5" cols="80" disabled><?=$education?></textarea>
              </div>
            </div>
          </div>
        </div>
     </section>
     <!-- footer -->
     <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/footer.php";?>
     <!-- 확대/축소 버튼 -->
    <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/zoom.php";?>
<script>
  
      
      //클릭 효과
      $(function(){
        
        $('#btn_more_img').off('click');
        $('#btn_more_img').click(function(){
          $('#div_resume_detail').fadeToggle('500');
        });


      });

      //nav active 활성화
      document.querySelectorAll('.nav-item').forEach(function(data, idx){
      console.log(data, idx);
      data.classList.remove('active');

      if(idx === 1){
          data.classList.add('active');
          }
      });
    </script>
  </body>
</html>
