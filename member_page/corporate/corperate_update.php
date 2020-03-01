<?php
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
    $id   = $_GET['id'];
    $pass = $_POST['pass'];
    $name = $_POST["b_name"];
    $ceo = $_POST["ceo"];
    $address = $_POST["address"];
    $jc = $_GET["jc"];
    $b_license_num = $_GET["b_license_num"];
    $email  = $_POST["email"];
    // date_default_timezone_set("Asia/Seoul");
    // $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	$sql = "update corporate set pw='$pass',b_name='$name',ceo='$ceo',address='$address',email='$email' where id=$id;";
  echo $sql;
	mysqli_query($conn, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($conn);

    echo "
	      <script>
	          location.href = 'http://".$_SERVER['HTTP_HOST']."/ilhase/member_page/corporate/corporate_edit_form.php';
	      </script>
	  ";
?>
