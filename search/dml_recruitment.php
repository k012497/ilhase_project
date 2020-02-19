<?php
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
$start = $_POST['start'];
$list = $_POST['list'];
$titleData = $_POST['titleData'];
$select_alignment = $_POST['select_alignment'];
$select_career = $_POST['select_career'];
$select_area_contents = $_POST['select_area_contents'];
$src='';

switch ($titleData) {
  case '전체>':all_data();//채용페이지 초기화  //페이지 전체시에 구직 데이터 (타이틀:전체 & 최신순 & 지역:전체 & 경력:무관)
    break;
  case '전체>생산/제조/단순노무':
    $select_industryDtaile = $_GET['industryDtaile'];
      production_data();
    // echo "<script>console.log('".$select_industryDtaile."');</script>";
    break;
  case '전체>경비/시설관리':
      $select_industryDtaile = $_GET['industryDtaile'];
      production_data();
      break;
  case '전체>청소/미화':
      $select_industryDtaile = $_GET['industryDtaile'];
        production_data();
      break;
  case '전체>도우미':
      $select_industryDtaile = $_GET['industryDtaile'];
        production_data();
      break;
  case '전체>음식점/마트/주유':
      $select_industryDtaile = $_GET['industryDtaile'];
        production_data();
      break;
  case '전체>배달/운전/택배':
      $select_industryDtaile = $_GET['industryDtaile'];
        production_data();
      break;

  case '전체>안내/접수/상담':
      $select_industryDtaile = $_GET['industryDtaile'];
        production_data();
      break;
  case '전체>공공/전문':
      $select_industryDtaile = $_GET['industryDtaile'];
        production_data();
      break;

}




function all_data() {
  global $conn,$start,$list,$select_career;

  $sql="select * from recruitment where num>0 and require_career='$select_career' order by num desc";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);

  for($i=$start ; $i < $start+$list && $i < $count ; $i++){
    mysqli_data_seek($result,$i);
    $row=mysqli_fetch_array($result);
    $title=$row['title'];
    $pay=$row['pay'];
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

function production_data() {
  global $conn,$start,$list,$select_career,$select_industryDtaile;

  $sql="select * from recruitment where industry like '%$select_industryDtaile' and require_career='$select_career' order by num desc";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);

  for($i=$start ; $i < $start+$list && $i < $count ; $i++){
    mysqli_data_seek($result,$i);
    $row=mysqli_fetch_array($result);
    $title=$row['title'];
    $pay=$row['pay'];
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
    <script>console.log('production_data');</script>
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
