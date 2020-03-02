<?php
  session_start();
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

    if(isset($_SESSION['userid'])){
      $id = $_SESSION['userid'];
    } else {
      echo "<script>alert('로그인 후 이용해주세요');
        history.go(-1);
      </script>";
    }

    // 모드 검사
    if(isset($_GET['mode']) && $_GET['mode'] === 'update'){
      $mode = 'update';
    } else {
      $mode = 'insert';
    }

    // 체크박스 체크 여부 검사
    if (isset($_POST["input_public"])) {
      // 체크한 경우(공개)
      $public = 1;
    }else{
      $public = 0;
    }

    switch($mode){
      case 'insert':
        insert_resume();
        break;
      case 'update':
        update_resume();
        break;
    }

    mysqli_close($conn);

    echo "
	      <script>
	          location.href = 'manage_recruitment_form.php';
	      </script>
	  ";

    function insert_resume(){
      global $conn, $public, $id;

      $name = filter_data($_POST["input_name"]);
      $email = filter_data($_POST["input_email"]);
      $address=filter_data($_POST["input_address"]);
      $gender=filter_data($_POST["input_gender"]);
      $birth=filter_data($_POST["input_birth"]);
      $phone=filter_data($_POST["input_phone"]);
      $title= filter_data($_POST["input_title"]);
      $cover_letter = filter_data($_POST["cover_letter"]);
      $career  = filter_data($_POST["text_job"]);
      $license = filter_data($_POST["text_license"]);
      $education = filter_data($_POST["text_school"]);

      include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/upload_file.php"; // 파일 업로드

      // 새로 등록할 경우
      $sql = "insert into resume(public, m_id, m_name, m_email, m_address, m_gender, m_birthday, m_phone, title, cover_letter, career, license, education, file_name, file_copied, regist_date)";
      $sql .= "values('$public','$id', '$name', '$email', '$address','$gender','$birth','$phone','$title','$cover_letter','$career','$license','$education','$upfile_name',  '$copied_file_name', now())";
      $result=mysqli_query($conn, $sql);
      if (!$result) {
        echo mysqli_error($conn).$sql;
      }
    }

    function update_resume(){
      global $conn, $public;

      $num=$_POST["num"]; // 이력서 num
      $title= filter_data($_POST["input_title"]);
      $cover_letter = filter_data($_POST["cover_letter"]);
      $career  = filter_data($_POST["text_job"]);
      $license = filter_data($_POST["text_license"]);
      $education = filter_data($_POST["text_school"]);

      include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/upload_file.php"; // 파일 업로드

      // 기존에 올렸던 파일이 있고 수정 시 파일을 업로드하지 않았을 때
      $sql = "select file_copied from resume where num = '$num'";
      $file_exists = mysqli_fetch_array(mysqli_query($conn, $sql))[0];
      if($file_exists && !$upfile_name){
        $sql = "update resume set public='".$public."', title='".$title."', cover_letter='".$cover_letter."', career='".$career."',license='$license',education='$education' where num ='$num';";
      } else {
        $sql = "update resume set public='".$public."', title='".$title."', cover_letter='".$cover_letter."', career='".$career."',license='$license',education='$education', file_name = '$upfile_name', file_copied ='$copied_file_name' where num = '$num';";
      }
      $result=mysqli_query($conn, $sql);
      if (!$result) {
        echo mysqli_error($conn).$sql;
      }
    }
?>
