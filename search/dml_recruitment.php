<?php
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

$mode=$_GET['mode'];

switch ($mode) {
  case 'applicant' :
      $applay_start=$_GET['apply_start'];
      $applay_list=$_GET['apply_list'];

      $all_applicant_sql="select * from resume where public=1 order by num desc";
      $result=mysqli_query($conn,$all_applicant_sql);
      $count=mysqli_num_rows($result);
      for($i=$applay_start;$i<$applay_start+$applay_list && $i < $count;$i++){
        $row=mysqli_fetch_array($result);
        $num=$row['num'];
        $m_name=$row['m_name'];
        $m_address=$row['m_address'];
        $m_gender=$row['m_gender'];
        $m_title=$row['title'];
        $file_name=$row['file_name'];

        $src='';
        if ($file_name) {
        $src='./img/'+$file_name;
        }else {
        $src='../common/img/user.png';
        }
        echo "   
            <li>
              <div id='apply_box'>
                <a href='http://".$_SERVER["HTTP_HOST"]."/ilhase/manage_articles/write_resume_form.php?num=".$num."'>
                  <div id='ap_img'>
                    <img  src='".$src."' alt='회사이미지'>
                  </div>
                  <span id='ap_title'>".$m_title."</span>
                  <span id='ap_pay'>".$m_name."(".$m_gender.")</span>
                  <span id='ap_address'>주소 : ".$m_address."</span>
                </a>
              </div>
            </li>   
        ";

      }
      

  break;
  case 'auto_keyword':
      //자동검색어 keyword 들어왔을때 (산업,지역 )
      $keyword=$_GET['keyword'];
      $keyWord_area_sql="select concat(si_do,' ',si_gun_gu) find_keyword from address where si_gun_gu not like '%전체'";
      $keyWord_industry_sql="select distinct section from job_industry where section like '%$keyword%'";

      $area_keyword_result=mysqli_query($conn,$keyWord_area_sql);
      $industry_keyword_result=mysqli_query($conn,$keyWord_industry_sql);

      $area_count=mysqli_num_rows($area_keyword_result);
      $industry_count=mysqli_num_rows($industry_keyword_result);
      
      for($i=0;$i<$area_count;$i++){
        $area_row=mysqli_fetch_array($area_keyword_result);
        
        if(strchr($area_row['find_keyword'],$keyword)){
          echo"<script>console.log('".$area_row['find_keyword']."')</script><li>".$area_row['find_keyword']."</li>"; 
        }             
      }
      for($i=0;$i<$industry_count;$i++){
        $industry_row=mysqli_fetch_array($industry_keyword_result);
        echo"<li>".$industry_row['section']."</li>";
      }
    break;
  case 'index_search':
    //인덱스에서 검색해서 들어왔을때
    $serch_word=$_GET['search_word'];
    $user_id=$_GET['user_id'];
    $search_start=$_GET['search_start'];
    $search_list=$_GET['search_list'];

    search_find_data($conn,$serch_word,$user_id,$search_start,$search_list);
    
    break;
  case 'recruitment':
    //채용이나 지원자 페이지로 들어갔을때
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
              all_data($conn,$start,$list,$select_career,$user_id);//채용페이지 초기화  //페이지 전체시에 구직 데이터 (타이틀:전체 & 최신순 & 지역:전체 & 경력:무관)
        }else {
              if (($select_gu===($select_area_contents." 전체")) || ($select_gu===($select_area_contents."전체"))) {
                  all_area_select($conn,$start,$list,$select_career,$select_area_contents,$user_id,$select_gu);
              }
              all_industry_select_data($conn,$start,$list,$select_career,$select_area_contents,$user_id,$select_gu);
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
    
    break;
  
  default:
    
    break;
}



//전체페이지에서 전체 데이터 가져올떄 함수
function all_data($conn,$start,$list,$select_career,$user_id) {
  // global $conn,$start,$list,$select_career,$user_id;

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
                    <span id='ep_title'>".$title."(".$b_name.")</span>
                    <span id='ep_pay'>".$pay."</span>
                    <span id='work_place'>근무지 : ".$work_place."</span>
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
      } else if ( $row[0] == 0 ) {
        // 관심공고로 지정하지 않은 경우
        echo "
              <li>
                <a href='./recruit_details.php?pick_job_num=$num&img=$src&title=$title'>
                  <img src='".$src."' alt='회사이미지'>
                  <span id='ep_title'>".$title."(".$b_name.")</span>
                  <span id='ep_pay'>".$pay."</span>
                  <span id='work_place'>근무지 : ".$work_place."</span>
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
function all_industry_select_data($conn,$start,$list,$select_career,$select_area_contents,$user_id,$select_gu){
  // global $conn,$start,$list,$select_career,$select_area_contents,$user_id;


  $filter_sql="select num, c.b_name, title, pay, period_start, period_end, work_place, file_name from corporate c join recruitment r on c.id = r.corporate_id where num>0 and require_career='$select_career' and work_place like '%$select_area_contents%$select_gu%' order by num desc";

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
                  <span id='ep_title'>".$title."(".$b_name.")</span>
                  <span id='ep_pay'>".$pay."</span>
                  <span id='work_place'>근무지 : ".$work_place."</span>
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
                  <span id='ep_title'>".$title."(".$b_name.")</span>
                  <span id='ep_pay'>".$pay."</span>
                  <span id='work_place'>근무지 : ".$work_place."</span>
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


  }//end of for

};

//전체페이지에서 각지역의 전체로 찾을때 (ex)서울 전체, 광주 전체 )
function all_area_select($conn,$start,$list,$select_career,$select_area_contents,$user_id,$select_gu){
  // global $conn,$start,$list,$select_career,$select_area_contents,$user_id;

  $filter_sql="select num, c.b_name, title, pay, period_start, period_end, work_place, file_name from corporate c join recruitment r on c.id = r.corporate_id where num>0 and require_career='$select_career' and work_place like '%$select_area_contents%' order by num desc";
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
                    <span id='ep_title'>".$title."(".$b_name.")</span>
                    <span id='ep_pay'>".$pay."</span>
                    <span id='work_place'>근무지 : ".$work_place."</span>
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
                  <span id='ep_title'>".$title."(".$b_name.")</span>
                  <span id='ep_pay'>".$pay."</span>
                  <span id='work_place'>근무지 : ".$work_place."</span>
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

  }//end of for

}

// 다른 산업분류에서 데이터 가져올떄 함수
function production_data() {
  global $conn,$start,$list,$select_career,$select_industryDtaile,$select_area_contents,$select_gu,$user_id;

  $filter_sql='';
  if ($select_area_contents==="전체") {
    //지역을 선택할떄 전체일때
    $filter_sql="select num, c.b_name, title, pay, period_start, period_end, work_place, file_name from corporate c join recruitment r on c.id = r.corporate_id where industry like '%$select_industryDtaile%' and require_career='$select_career' order by num desc";

  }else {
    //지역을 선택할때 각 지역의 전체를 선택할떄 (ex. 서울 전체 , 광주 전체)
    if ($select_gu===($select_area_contents." 전체") || ($select_gu===($select_area_contents."전체"))) {
      $filter_sql="select num, c.b_name, title, pay, period_start, period_end, work_place, file_name from corporate c join recruitment r on c.id = r.corporate_id where industry like '%$select_industryDtaile%' and require_career='$select_career' and work_place like '%$select_area_contents%' order by num desc";
    }else{
      //그외 지역 선택할떄
      $filter_sql="select num, c.b_name, title, pay, period_start, period_end, work_place, file_name from corporate c join recruitment r on c.id = r.corporate_id where industry like '%$select_industryDtaile%' and require_career='$select_career' and work_place like '%$select_area_contents%$select_gu%' order by num desc";
    }
  }


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
                  <span id='ep_title'>".$title."(".$b_name.")</span>
                  <span id='ep_pay'>".$pay."</span>
                  <span id='work_place'>근무지 : ".$work_place."</span>
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
                  <span id='ep_title'>".$title."(".$b_name.")</span>
                  <span id='ep_pay'>".$pay."</span>
                  <span id='work_place'>근무지 : ".$work_place."</span>
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

  }//end of for

}

//인덱스에서 온 검색데이터 함수
function search_find_data($conn,$serch_word,$user_id,$search_start,$search_list) {

  $search_sql="select num, c.b_name, title, pay, period_start, period_end, work_place, file_name from corporate c join recruitment r on c.id = r.corporate_id where title like '%$serch_word%' or industry like '%$serch_word%' or".
  " details like '%$serch_word%' or work_place like '%$serch_word%' or c.b_name like '%$serch_word%' or recruit_type like '%$serch_word%' or require_career like '%$serch_word%' or require_edu like '%$serch_word%'";
  

  $filter_result=mysqli_query($conn,$search_sql);
  $count=mysqli_num_rows($filter_result);

  for($i=$search_start ; $i < $search_start+$search_list && $i < $count ; $i++){
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
                    <span id='ep_title'>".$title."(".$b_name.")</span>
                    <span id='ep_pay'>".$pay."</span>
                    <span id='work_place'>근무지 : ".$work_place."</span>
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
                  <span id='ep_title'>".$title."(".$b_name.")</span>
                  <span id='ep_pay'>".$pay."</span>
                  <span id='work_place'>근무지 : ".$work_place."</span>
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

  }//end of for



}

mysqli_close($conn);
?>
