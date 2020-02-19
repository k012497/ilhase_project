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
    <title></title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="./css/manage.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <?php
    	// if (!$userid )
    	// {
    	// 	echo("<script>
    	// 			alert('이력서는 로그인이 필요합니다. :) ');
    	// 			history.go(-1);
    	// 			</script>
    	// 		");
    	// 	exit;
    	// }
    ?>
      <form class="form_manage" action="resume_download.php" method="post" enctype="multipart/form-data">
        <div id="div_main">
          <div id="div_recruit_sample where id">
            <h3 class="title" id="recruit_title">
                <?php
                $sql="select*from person where id='$userid'";
                $result=mysqli_query($conn,$sql);
                if($member_type=="person"){
                    // 개인 회원일 때
                  echo "이력서 샘플";
                  }else{
                    // 기업 회원일 때
                    echo "채용 공고 샘플";
                  }
                ?>
            </h3>
            <?php
              $sql="select*from person where id='$userid'";
              $result=mysqli_query($conn,$sql);
              if($member_type=="person"){
                echo "<input type='button' id='btn_download' name='download_resume' onclick='location.href=`resume_download.php`' value='다운로드'>";
              }else{
                  echo "<input type='button' id='btn_download' name='download_resume' onclick='location.href=`recruit_download.php`' value='다운로드'>";
              }
             ?>
            <!-- <input type="button" id="btn_download" name="download_resume" onclick="location.href='resume_download.php'" value="다운로드"> -->
          </div>
          <div id="main_recruit">
            <div id="recruit_admin">
              <h3 class="title">
                <?php
                $sql="select*from person where id='$userid'";
                $result=mysqli_query($conn,$sql);
                  if($member_type=="person"){
                    // 개인 회원일 때
                    echo "이력서 관리";
                  }else{
                    //기업 회원일 때
                    echo "채용 공고 관리";
                  }
                ?>
              </h3>
              <?php
              $sql="select*from person where id='$userid'";
              $result=mysqli_query($conn,$sql);
                  if($member_type=="person") {

                  }else{
                    echo "<a href='#'>마감된 공고 삭제하기</a>";
                  }
               ?>

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
                <li id="new_resume"><img src="./img/upload.png" alt=""><p> 신규 공고 등록하기</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </form>
  </body>
</html>
