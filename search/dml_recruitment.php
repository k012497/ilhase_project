<?php
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
$start = $_POST['start'];
$list = $_POST['list'];
$titleData = $_POST['titleData'];
$select_alignment = $_POST['select_alignment'];
$select_career = $_POST['select_career'];
$select_area_contents = $_POST['select_area_contents'];
$src='';
//채용페이지 초기화
if ($titleData==="전체" && $select_alignment==="최신순" && $select_area_contents==="전체") {
  $sql="select * from recruitment where num>0 and require_career='$select_career' order by num desc";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);

  for($i=$start ; $i < $start+$list && $i < $count ; $i++){
    mysqli_data_seek($result,$i);
    $row=mysqli_fetch_array($result);
    $title=$row['title'];
    $details=$row['details'];
    $pay=$row['pay'];
    $require_career=$row['require_career'];
    $work_place=$row['work_place'];
    $period_start=$row['period_start'];
    $period_end=$row['period_end'];
    $file_name=$row['file_name'];
    $file_copied=$row['file_copied'];

    if ($file_name) {
      $src='./img/'+$file_name;
    }else {

      $src='./img/basicimg.jpg';
    }
    echo "
          <li>
            <a href='#'>
              <img src='".$src."' alt='회사이미지'>
              <span id='ep_title'>".$title."</span>
              <span id='ep_pay'>".$pay."</span>
              <span id='ep_period'>접수기간 : ".$period_start." ~ ".$period_end."</span>
            </a>
          </li>
    ";
  }
}


mysqli_close($conn);



?>
