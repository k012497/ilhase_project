<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connnector.php";

    $id   = $_POST['id'];
    $pass = $_POST['pass'];
    $name = $_POST["b_name"];
    $ceo = $_POST["ceo"];
    $address = $_POST["address"];
    $jc = $_POST["jc"];
    $b_license_num = $_POST["b_license_num"];
    $email  = $_POST["email"];

	$sql = "insert into corporate";
	$sql .= " values('{$id}', '{$pass}', '{$name}', '{$jc}', '{$ceo}', {$b_license_num}, '{$address}','{$email}', 3)";
    mysqli_query($conn, $sql);  // $sql 에 저장된 명령 실행
    
    $sql = "insert into purchase values (null, now(), '$id', 0, '무료 체험', 3, 0, '-');";
    mysqli_query($conn, $sql);

    mysqli_close($conn);

    echo "
	      <script>
	          location.href = 'http://".$_SERVER['HTTP_HOST']."/ilhase/member_page/login_form.php';
	      </script>
	  ";
?>
