<?php
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
$start = $_POST['start'];
$list = $_POST['list'];
$titleData = $_POST['titleData'];
$select_alignment = $_POST['select_alignment'];
$select_career = $_POST['select_career'];
$select_area_contents = $_POST['select_area_contents'];
$user_id=$_POST['user_id'];
$select_gu=$_GET['select_gu'];
switch ($titleData) {
  case '전체>':
    if ($select_area_contents==="전체") {
          all_data();//채용페이지 초기화  //페이지 전체시에 구직 데이터 (타이틀:전체 & 최신순 & 지역:전체 & 경력:무관)
    }else {

          if (($select_gu===($select_area_contents." 전체")) || ($select_gu===($select_area_contents."전체"))) {
              all_area_select($select_gu);
          }
          all_industry_select_data($select_gu);
    }
    break;
  case '전체>생산/제조/단순노무':
    $select_industryDtaile = $_GET['industryDtaile'];
      production_data();
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

//전체페이지에서 전체 데이터 가져올떄 함수
function all_data() {
  global $conn,$start,$list,$select_career,$user_id;

  //전체 페이지에서 전체 데이터 가져올떄 sql

  $filter_sql="select num, c.b_name, title, pay, period_start, period_end, work_place, file_name from corporate c join recruitment r on c.id = r.corporate_id where require_career='$select_career' order by num desc";

  $filter_result=mysqli_query($conn,$filter_sql);
  $count=mysqli_num_rows($filter_result);
  for($i=$start ; $i < $start+$list && $i < $count ; $i++){
    mysqli_data_seek($filter_result,$i);
    $row=mysqli_fetch_array($filter_result);
    $num=$row['num'];
    $b_name=$row['b_name'];
    $title=$row['title'];
    $pay=$row['pay'];
    $period_start=$row['period_start'];
    $period_end=$row['period_end'];
    $work_place=$row['work_place'];
    $file_name=$row['file_name'];
    $src='';
    if ($file_name) {
      $src='./img/'+$file_name;
    }else {
      $src='./img/basicimg.jpg';
    }

    // 로그인한 사용자가 해당 공고를 관심공고로 지정 했는지 점검
    $fav_sql="select count(*) from favorite where recruit_id=$num and member_id='$user_id'";
    $fav_result=mysqli_query($conn,$fav_sql);
    if($row = mysqli_fetch_array($fav_result)){
      if($row[0] > 0){
        // 관심공고로 지정한 경우
        echo "
                <li>
                  <a href='./recruit_details.php?pick_job_num=$num&img=$src&title=$title'>
                    <img src='".$src."' alt='회사이미지'>
                    <span id='ep_title'>".$title."</span>
                    <span id='ep_pay'>".$pay."</span>
                    <span id='ep_period'>접수기간 : ".$period_start." ~ ".$period_end."</span>
                  </a>
                  <div id='interest_insert'>
                      <p>관심 공고등록</p>
                      <span class='heart_img click_heart'></span>
                      <input type='hidden' name='pick_job' value='$num'>
                  </div>
                </li>
                <script>console.log('관심');</script>
        ";
      } else if ( $row[0] == 0) {
        // 관심공고로 지정하지 않은 경우
        echo "
              <li>
                <a href='./recruit_details.php?pick_job_num=$num&img=$src&title=$title'>
                  <img src='".$src."' alt='회사이미지'>
                  <span id='ep_title'>".$title."</span>
                  <span id='ep_pay'>".$pay."</span>
                  <span id='ep_period'>접수기간 : ".$period_start." ~ ".$period_end."</span>
                </a>
                <div id='interest_insert'>
                    <p>관심 공고등록</p>
                    <span class='heart_img'></span>
                    <input type='hidden' name='pick_job' value='$num'>
                </div>

              </li>
        ";
      }
    } else {
      echo mysqli_error($conn);
    }//



  } // end of for
}// end of all_data
//전체페이지에서 지역으로 찾을떄 사용된 함수
function all_industry_select_data($select_gu){
  global $conn,$start,$list,$select_career,$select_area_contents;

  $sql="select * from recruitment where num>0 and require_career='$select_career' and work_place like '%$select_area_contents%$select_gu%' order by num desc";

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
    $src='';
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

};

//전체페이지에서 각지역의 전체로 찾을때 (ex)서울 전체, 광주 전체 )
function all_area_select($select_gu){
  global $conn,$start,$list,$select_career,$select_area_contents;

  $sql="select * from recruitment where num>0 and require_career='$select_career' and work_place like '%$select_area_contents%' order by num desc";
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
    $src='';
    if ($file_name) {
      $src='./img/'+$file_name;
    }else {
      $src='./img/basicimg.jpg';
    }
    echo "
          <script>
            console.log('$select_career','$select_area_contents','$select_gu');
          </script>
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

// 다른 산업분류에서 데이터 가져올떄 함수
function production_data() {
  global $conn,$start,$list,$select_career,$select_industryDtaile,$select_area_contents,$select_gu;

  $sql='';
  if ($select_area_contents==="전체") {
    $sql="select * from recruitment where industry like '%$select_industryDtaile%' and require_career='$select_career' order by num desc";

  }else {
    if ($select_gu===($select_area_contents." 전체") || ($select_gu===($select_area_contents."전체"))) {
      $sql="select * from recruitment where industry like '%$select_industryDtaile%' and require_career='$select_career' and work_place like '%$select_area_contents%' order by num desc";
    }else{
      $sql="select * from recruitment where industry like '%$select_industryDtaile%' and require_career='$select_career' and work_place like '%$select_area_contents%$select_gu%' order by num desc";
    }
  }


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
    $src='';
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
