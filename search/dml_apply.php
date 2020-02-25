<?php 
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
$user_id=$_POST['user_id'];
$recruit_id=$_POST['recruit_id'];
$title=$_POST['title'];

$apply_sql="insert into apply (resume_title,recruit_id,member_id,regist_date) values('".$title."',$recruit_id,'".$user_id."',now())";

$result=mysqli_query($conn,$apply_sql);

if(!$result){
    echo "error";
}else {
    echo "success";
}
mysqli_close($conn);
?>

