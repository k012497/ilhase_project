<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

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

	$sql = "insert into person(id, pw, name, birth, email, phone, gender,zipcode,new_address,old_address) ";
	$sql .= "values('{$id}', '{$pass}', '{$name}', '{$birth}', '{$email}', '{$phone}', {$gender},{$postcode},'{$roadAddress}','{$jibunAddress}')";

	mysqli_query($conn, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($conn);

    echo "
	      <script>
	          location.href = 'http://".$_SERVER['HTTP_HOST']."/ilhase/member_page/login_form.php';
	      </script>
	  ";
?>
