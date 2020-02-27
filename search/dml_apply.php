<?php 
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
$user_id=$_POST['user_id'];
$recruit_id=$_POST['recruit_id'];
$title=$_POST['title'];
$check_resume_num=$_POST['check_resume_num'];
$receiver = $_POST['receiver'];

$apply_sql="insert into apply (resume_num,resume_title,recruit_id,member_id,regist_date) values(".$check_resume_num.",'".$title."',$recruit_id,'".$user_id."',now())";
$insert_apply_result=mysqli_query($conn,$apply_sql);

$recruit_title_sql="select title from recruitment where num=".$recruit_id;
$recruit_title_result=mysqli_query($conn,$recruit_title_sql);
$recruit_title = mysqli_fetch_array($recruit_title_result)[0];

$noti_title = "새로운 지원자를 확인하세요!";
$content = $recruit_title." 공고의 지원자가 있습니다.";

insert_notification($noti_title, $content, $receiver);
echo $noti_title.$content.$receiver;
echo "<script>console.log('dkdkdk');</script>";

if(!$insert_apply_result || !$insert_apply_result){
    echo "error".$content;
}else {
    echo "success";
}
mysqli_close($conn);
?>

