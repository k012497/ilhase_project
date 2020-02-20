<?php
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

$user_id=$_POST['user_id'];
$mode=$_GET['mode'];

if ($mode=="add") {
  $pick_job_num = $_POST['pick_job_num'];
  $sql="insert into favorite(recruit_id,member_id) values ($pick_job_num,'$user_id')";
  mysqli_query($conn,$sql);
}else if($mode=="remove") {
  $pick_job_num = $_POST['pick_job_num'];
  $sql="delete from favorite where recruit_id=$pick_job_num and member_id='$user_id'";
  mysqli_query($conn,$sql);
}

mysqli_close($conn);
?>
