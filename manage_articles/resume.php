<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
    $id=$_GET["m_id"];

    if (isset($_POST["input_public"])) {
      $public=1;
    }else{
      $public=0;
    }
    $name=$_POST["input_name"];
    $email=$_POST["input_email"];
    $address=$_POST["input_address"];
    $gender=$_POST["input_gender"];
    $birth=$_POST["input_birth"];
    $phone=$_POST["input_phone"];
    $title=$_POST["input_title"];
    $cover_letter = $_POST["cover_letter"];
    $career  = $_POST["text_job"];
    $license = $_POST["text_license"];
    $education = $_POST["text_school"];
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/upload_file.php";


	$sql = "insert into resume(public, m_id, m_name, m_email, m_address, m_gender, m_birthday, m_phone, title, cover_letter, career, license, education, file_name, file_copied, regist_date)";

	$sql .= "values('$public','$id', '$name', '$email', '$address','$gender','$birth','$phone','$title','$cover_letter','$career','$license','$education','$upfile_name',  '$copied_file_name',now())";

	 $result=mysqli_query($conn, $sql);
   if (!$result) {
     echo mysqli_error($conn).$sql;
   }

    mysqli_close($conn);

    echo "
	      <script>
	          location.href = 'manage_recruitment_form.php';
	      </script>
	  ";
?>
