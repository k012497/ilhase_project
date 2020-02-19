<?php
    $id   = $_POST['id'];
    $pass = $_POST['pass'];
    $name = $_POST["b_name"];
    $ceo = $_POST["ceo"];
    $address = $_POST["address"];
    $jc = $_POST["jc"];
    $b_license_num = $_POST["b_license_num"];
    $email  = $_POST["email"];
    // date_default_timezone_set("Asia/Seoul");
    // $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장


    $con = mysqli_connect("localhost", "root", "123456", "ilhase");

	$sql = "insert into corporate";
	$sql .= " values('{$id}', '{$pass}', '{$name}', '{$jc}', '{$ceo}', {$b_license_num}, '{$address}','{$email}', 3)";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);

    echo "
	      <script>
	          location.href = 'http://".$_SERVER['HTTP_HOST']."/ilhase/common/member_page/login_form/php';
	      </script>
	  ";
?>
