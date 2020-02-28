<?php
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

$user_id=$_POST['user_id'];
$mode=$_GET['mode'];
$pick_job_num = $_POST['pick_job_num'];
if ($mode=="add") {

  $sql="insert into favorite(recruit_id,member_id) values ($pick_job_num,'$user_id')";
  mysqli_query($conn,$sql);
  
  
  //찜한 공고 넘버로 개수세서 echo로 데이터 보내기
  echo recruit_fav_count($conn,$pick_job_num);


}
if($mode=="remove") {
  $sql="delete from favorite where recruit_id=$pick_job_num and member_id='$user_id'";
  mysqli_query($conn,$sql);

   //찜한 공고 넘버로 개수세서 echo로 데이터 보내기
  echo recruit_fav_count($conn,$pick_job_num);
}

function recruit_fav_count($conn,$fav_num){

  $fav_count_sql="select count(*) from favorite where recruit_id=".$fav_num;
  $count_result=mysqli_query($conn,$fav_count_sql);
  $fav_count=mysqli_fetch_array($count_result);

  return $fav_count[0];

}


mysqli_close($conn);
?>
