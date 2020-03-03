<?php
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
$location = $_POST['loc'];
$user_id=$_POST['user_id'];


if($user_id==""){
    //유저 아이디가 없을 때 api 오류났을떄 디폴트 '서울 강남구' 로 찾기
    if($location==="서울 강남구") {

        $near_location_sql="select num, c.b_name, title, pay, period_start, period_end, work_place, file_copied from corporate c join recruitment r on c.id = r.corporate_id where work_place like '%서울%' and work_place like '%강남%' order by num desc";

        $find_job_result=mysqli_query($conn,$near_location_sql);

        for($i=0 ; $i<4 ; $i++) {
            $row=mysqli_fetch_array($find_job_result);
            $num=$row['num'];
            $b_name=$row['b_name'];
            $title=$row['title'];
            $pay=$row['pay'];
            $period_start=$row['period_start'];
            $period_end=$row['period_end'];
            $work_place=$row['work_place'];
            $file_copied=$row['file_copied'];

            $src='';
            if ($file_copied) {
            $src="http://".$_SERVER['HTTP_HOST']."/ilhase/manage_articles/data/".$file_copied;
            }else {
            $src="http://".$_SERVER['HTTP_HOST']."/ilhase/common/img/basicimg.jpg";
            }

            if($num==""){
                echo "가깝게 있는 구직공고가 없습니다!";
                exit;
            }else{
                echo "
                <div class='col-lg-3 col-md-6 mb-4'>
                    <div class='card h-100'>
                        <img class='card-img-top' src='".$src."' alt='회사이미지'>
                        <div class='card-body'>
                            <a id='go_recruit_details' href='http://".$_SERVER['HTTP_HOST']."/ilhase/search/recruit_details.php?pick_job_num=$num&img=$src&title=$title'>
                                <h5 id='card_title' class='card-title'>".$title."</h5>
                                <span id='ep_b_name'>".$b_name."</span>
                            </a>
                        </div>
                    </div>
                </div>
            ";


            }//end of $num==''

        }//end of for구문
        exit;
    }//end of 디폴트 if문


    $location_str=explode(" ",$location);
    if(count($location_str)>=3){
        $si_do=$location_str[1];
        $si_gun_gu=$location_str[2];
    }else{
        $si_do=$location_str[1];
        $si_gun_gu = "";
    }

    change_area(); //sql 문을 위한 지역 변환 ex) 서울특별시 -> 서울
    $near_location_sql='';
    if(count($location_str)>=3){
        $near_location_sql="select num, c.b_name, title, pay, period_start, period_end, work_place, file_copied from corporate c join recruitment r on c.id = r.corporate_id where work_place like '%$si_do%' and work_place like '%$si_gun_gu%' order by num desc";
    }else {
        $near_location_sql="select num, c.b_name, title, pay, period_start, period_end, work_place, file_copied from corporate c join recruitment r on c.id = r.corporate_id where work_place like '%$si_do%' or work_place like '%$si_gun_gu%' order by num desc";
    }


    $find_job_result=mysqli_query($conn,$near_location_sql);

    for($i=0 ; $i<4 ; $i++) {
        $row=mysqli_fetch_array($find_job_result);
        $num=$row['num'];
        $b_name=$row['b_name'];
        $title=$row['title'];
        $pay=$row['pay'];
        $period_start=$row['period_start'];
        $period_end=$row['period_end'];
        $work_place=$row['work_place'];
        $file_copied=$row['file_copied'];

        $src='';
        if ($file_copied) {
          $src="http://".$_SERVER['HTTP_HOST']."/ilhase/manage_articles/data/".$file_copied;
        }else {
          $src="http://".$_SERVER['HTTP_HOST']."/ilhase/common/img/basicimg.jpg";
        }

        if($num==""){
            echo "가깝게 있는 구직공고가 없습니다!";
            exit;
        }else{
            echo "
            <div class='col-lg-3 col-md-6 mb-4'>
                <div class='card h-100'>
                    <img class='card-img-top' src='".$src."' alt='회사이미지'>
                    <div class='card-body'>
                        <a id='go_recruit_details' href='http://".$_SERVER['HTTP_HOST']."/ilhase/search/recruit_details.php?pick_job_num=$num&img=$src&title=$title'>
                            <h5 id='card_title' class='card-title'>".$title."</h5>
                            <span id='ep_b_name'>".$b_name."</span>
                        </a>
                    </div>
                </div>
            </div>
        ";


        }//end of $num==''

    }//end of for구문


}else {

    //유저 아이디가 있을때 api 오류났을떄 디폴트 '서울 강남구' 로 찾기
    if($location==="서울 강남구") {

        $near_location_sql="select num, c.b_name, title, pay, period_start, period_end, work_place, file_copied from corporate c join recruitment r on c.id = r.corporate_id where work_place like '%서울%' and work_place like '%강남구%' order by num desc";

        $find_job_result=mysqli_query($conn,$near_location_sql);

        for($i=0 ; $i<4 ; $i++) {
            $row=mysqli_fetch_array($find_job_result);
            $num=$row['num'];
            $b_name=$row['b_name'];
            $title=$row['title'];
            $pay=$row['pay'];
            $period_start=$row['period_start'];
            $period_end=$row['period_end'];
            $work_place=$row['work_place'];
            $file_copied=$row['file_copied'];

            $src='';
            if ($file_copied) {
            $src="http://".$_SERVER['HTTP_HOST']."/ilhase/manage_articles/data/".$file_copied;
            }else {
            $src="http://".$_SERVER['HTTP_HOST']."/ilhase/common/img/basicimg.jpg";
            }

            if($num==""){
                echo "가깝게 있는 구직공고가 없습니다!";
                exit;
            }else{
                echo "
                <div class='col-lg-3 col-md-6 mb-4'>
                    <div class='card h-100'>
                        <img class='card-img-top' src='".$src."' alt='회사이미지'>
                        <div class='card-body'>
                            <a id='go_recruit_details' href='http://".$_SERVER['HTTP_HOST']."/ilhase/search/recruit_details.php?pick_job_num=$num&img=$src&title=$title'>
                                <h5 id='card_title' class='card-title'>".$title."</h5>
                                <span id='ep_b_name'>".$b_name."</span>
                            </a>
                        </div>
                    </div>
                </div>
            ";


            }//end of $num==''

        }//end of for구문
        exit;
    }//end of 디폴트 if문


    // userId가 있으면 user의 집근처 장소로 찾기

    $user_address_sql="select new_address from person where id='$user_id'";
    $user_result=mysqli_query($conn,$user_address_sql);
    $find_row=mysqli_fetch_array($user_result);

    $user_address=explode(" ",$find_row[0]);
    $user_si_do=$user_address[0];
    $user_si_gun_gu=$user_address[0];

    $near_location_sql="select num, c.b_name, title, pay, period_start, period_end, work_place, file_copied from corporate c join recruitment r on c.id = r.corporate_id where work_place like '%$user_si_do%' and work_place like '%$user_si_gun_gu%' order by num desc";

    $find_job_result=mysqli_query($conn,$near_location_sql);

    for($i=0 ; $i<4 ; $i++) {
        $row=mysqli_fetch_array($find_job_result);
        $num=$row['num'];
        $b_name=$row['b_name'];
        $title=$row['title'];
        $pay=$row['pay'];
        $period_start=$row['period_start'];
        $period_end=$row['period_end'];
        $work_place=$row['work_place'];
        $file_copied=$row['file_copied'];

        $src='';
        if ($file_copied) {
          $src="http://".$_SERVER['HTTP_HOST']."/ilhase/manage_articles/data/".$file_copied;
        }else {
          $src="http://".$_SERVER['HTTP_HOST']."/ilhase/common/img/basicimg.jpg";
        }

        if($num==""){
            echo "가깝게 있는 구직공고가 없습니다!";
            exit;
        }else{
            echo "
            <div class='col-lg-3 col-md-6 mb-4'>
                <div class='card h-100'>
                    <img class='card-img-top' src='".$src."' alt='회사이미지'>
                    <div class='card-body'>
                        <a id='go_recruit_details' href='http://".$_SERVER['HTTP_HOST']."/ilhase/search/recruit_details.php?pick_job_num=$num&img=$src&title=$title'>
                            <h5 id='card_title' class='card-title'>".$title."</h5>
                            <span id='ep_b_name'>".$b_name."</span>
                        </a>
                    </div>
                </div>
            </div>
        ";


        }

    }



}//end of if(user_id)

//주소 변환
function change_area(){
    global $si_do;
        switch ($si_do) {
            case '서울특별시':
                    $si_do='서울';
                    break;
            case '부산광역시':
                    $si_do='부산';
                    break;
            case '대구광역시':
                    $si_do='대구';
                    break;
            case '인천광역시':
                    $si_do='인천';
                    break;
            case '광주광역시':
                    $si_do='광주';
                    break;
            case '대전광역시':
                    $si_do='대전';
                    break;
            case '울산광역시':
                    $si_do='울산';
                    break;
            case '세종특별자치시':
                    $si_do='세종';
                    break;
            case '경기도':
                    $si_do='경기';
                    break;
            case '강원도':
                    $si_do='강원';
                    break;
            case '충청북도':
                    $si_do='충북';
                    break;
            case '충청남도':
                $si_do='충남';
                break;
            case '전라북도':
                $si_do='전북';
                break;
            case '전라남도':
                $si_do='전남';
                break;
            case '경상북도':
                $si_do='경북';
                break;
            case '경상남도':
                $si_do='경북';
                break;
            case '제주특별자치도':
                $si_do='제주';
                break;
        }
  }

  mysqli_close($conn);

?>
