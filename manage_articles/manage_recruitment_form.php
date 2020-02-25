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
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/manage.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <?php
    	if (!$userid )
    	{
    		echo("<script>
    				alert('이력서는 로그인이 필요합니다. :) ');
    				history.go(-1);
    				</script>
    			");
    		exit;
    	}
    ?>
      <form class="form_manage" action="resume_download.php" method="post" enctype="multipart/form-data">
        <div id="div_main">
          <div id="div_recruit_sample">
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
              <?php
                $sql="SELECT * from resume where m_id ='$userid' order by num desc";
                $result = mysqli_query($conn,$sql);

                while($row=mysqli_fetch_array($result)){
                  $num=$row['num'];
                  $title=$row['title'];
                  $regist_date=$row['regist_date'];
               ?>
                <li class="li_resume" onclick="location.href='write_resume.php?mode=update&num=<?=$num?>'">
                  <img src="" alt="">
                  <p class="p_title"><?=$title?><br/><?=$regist_date?></p>
                  <img class="btn_image" name="upfile" src="../img/cross.png" alt="버튼" onclick="location.href='resume_delete.php?num=<?=$num?>'">
                </li>
                <?php
                }

                ?>
                <li id="finish_resume"><p>마감</p>
                </li>
                <?php
                $sql="select*from person where id='$userid'";
                  $result=mysqli_query($conn,$sql);
                    if($member_type=="person") {
                        echo "<li class='li_resume' id='li_write_resume' onclick='location.href=`write_resume.php`'><img  src='./img/upload.png'><p  class='p_title'>신규 이력서 작성하기</p></li>";
                    }else{
                        echo "<li class='li_resume' id='li_write_resume' onclick='location.href=`new_recruitment_form.php`' ><img  src='./img/upload.png'>신규 공고 등록하기</li>";
                    }
                 ?>

                <!-- <li id="new_resume"><img src="./img/upload.png" alt=""><p> 신규 공고 등록하기</p>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
      </form>
  </body>
</html>
