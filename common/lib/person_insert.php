<?php
    $id   = $_POST['id1'];
    $pass = $_POST['pass'];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $birth = $_POST["birth"];
    $gender = $_POST["gender"];
    $postcode = $_POST["postcode"];
    $roadAddress = $_POST["roadAddress"];
    $jibunAddress = $_POST["jibunAddress"];
    $email  = $_POST["email"];
    // date_default_timezone_set("Asia/Seoul");
    // $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장


    $con = mysqli_connect("localhost", "root", "123456", "ilhase");

	$sql = "insert into person(id, pw, name, birth, email, phone, gender,zipcode,new_address,old_address) ";
	$sql .= "values('{$id}', '{$pass}', '{$name}', '{$birth}', '{$email}', '{$phone}', {$gender},{$postcode},'{$roadAddress}','{$jibunAddress}')";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);

    echo "
	      <script>
	          location.href = 'http://".$_SERVER['HTTP_HOST']."/ilhase/member_page/login_form.php';
	      </script>
	  ";
?>
