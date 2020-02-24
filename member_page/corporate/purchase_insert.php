<?php
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
$id =$_POST['id'];
$num =$_POST['num'];
$name =$_POST['name'];
$price =$_POST['price'];
date_default_timezone_set("Asia/Seoul");
 $date=date("Y-m-d H:i:s");
$sql="insert into purchase values(null,'".$date."','".$id."',".$num.",'".$name."','".$price."','카카오페이')";
mysqli_query($conn,$sql);
echo $sql;
 ?>
