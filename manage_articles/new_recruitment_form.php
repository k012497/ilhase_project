<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
if(isset($_SESSION["userid"])){
  $userid=$_SESSION["userid"];
}else{
  $userid="";
}
if(isset($_SESSION["username"])){
  $username=$_SESSION["username"];
}else{
  $username="";
}

if(isset($_GET['num'])){
  $num = $_GET['num'];
} else {
  $num = "";
}

if (isset($_GET["mode"]) && $_GET["mode"]=="get_section") {
  $category=$_GET["category"];

  $section=array();
  $sql= "select section from job_industry where category='$category';";
  $result= mysqli_query($conn, $sql);
  if($result){
    while($row = mysqli_fetch_array($result)){
      array_push($section,$row[0]);
    }
    echo json_encode($section, JSON_UNESCAPED_UNICODE);
  }else{
    echo mysqli_error($conn);
  }
  exit;
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>일하세</title>
      <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
      <link rel="stylesheet" href="./css/recruiter.css">
      <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
      <script src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/manage_articles/js/recruit.js">
      </script>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>

  <?php

  if (isset($_GET["mode"])) {
    if ($_GET["mode"]=="update") {
      $num=$_GET["num"];
      $mode="update";

      $sql    = "select * from recruitment where num='$num'";
      $result = mysqli_query($conn, $sql);
      $row    = mysqli_fetch_array($result);

      $corporate_id=$row["corporate_id"];
      $title=$row["title"];
      $name = $row["recruiter_name"];
      $phone = $row["recruiter_phone"];
      $email = $row["recruiter_email"];
      $homepage = $row["homepage"];
      $personnel = $row["personnel"];
      // $require_career = $row["require_career"];
      $require_edu = $row["require_edu"];
      $recruit_type = $row["recruit_type"];
      $period_start = $row["period_start"];
      $period_end = $row["period_end"];
      $work_place = $row["work_place"];
      $file_name = $row["file_name"];
      $file_copied = $row["file_copied"];
      $regist_date = $row["regist_date"];

      $industry = explode(" ", $row["industry"]);
      $category = $industry[0];
      $section = $industry[1];

      $total_pay=explode(" ",$row["pay"]);
      $rdo_pay=$total_pay[0];
      $pay=$total_pay[1];

      $career=explode("년",$row["require_career"]);
      $require=$career[0];

      $total_detail=explode(" ",$row["details"]);
      $detail=$total_detail[0];
      $person_detail=$total_detail[1];
      $envir_detail=$total_detail[2];
    }
  }else{
    $corporate_id = $_SESSION['userid'];
    $mode="insert";
    $title="";
    $name="";
    $phone="";
    $email="";
    $homepage="";
    $personnel="";
    $require = "";
    $require_career="";
    $require_edu="";
    $recruit_type="";
    $period_start="";
    $period_end="";
    $work_place="";
    $file_name="";
    $regist_date="";
    $category="";
    $section="";
    $rdo_pay="";
    $pay="";
    $detail="";
    $person_detail="";
    $envir_detail="";
  }

        ?>
    <form id="form_recruit" name="form_recruit" action="recruit.php?mode=<?=$mode?>&num=<?=$num?>" method="post" enctype="multipart/form-data">
      <div id="div_main">
        <div class="title">
          <?php
            if ($mode=='update') {
              echo "<h3 id='recruiter_title'>공고 수정하기</h3>";
            }else{
              echo "<h3 id='recruiter_title'>신규 공고 등록</h3>";
            }
           ?>
        </div>
        <div class="title">
          <h3 id="recruiter_info">step1. 담당자 정보</h3>
        </div>
        <div id="div_recruiter_info">
          <div id="recruiter_first">
            <div id="div_recruiter_name">
              <input type="hidden" id="corporate_id" name="corporate_id" value="<?=$corporate_id?>">
              <p>채용 담당자 명<strong>*</strong></p>
              <input type="text" id="recruiter_name" name="recruiter_name" placeholder="이름" value="<?=$name?>">
              <p id="name_msg" style="display:none;">이름을 다시 적어주세요.</p>
            </div>
            <div id="div_recruiter_phone">
              <p>전화 번호<strong>*</strong></p>
              <input id="recruiter_phone"type="text" name="recruiter_phone"
              placeholder="(-)포함 휴대폰 번호" value="<?=$phone?>">
                <p id="phone_msg" style="display:none;">번호를 다시 입력 해주세요.</p>
            </div>
          </div>
          <div id="recruiter_second">
            <div id="div_recruiter_email">
              <p>이메일</p>
              <input type="text"id="recruiter_email" name="recruiter_email" value="<?=$email?>">
                <p id="email_msg" style="display:none;">이메일을 다시 입력 해주세요.</p>
            </div>
            <div id="div_recruiter_homepage">
              <p>홈페이지</p>
              <input type="text" id="recruiter_homepage"name="recruiter_homepage" value="<?=$homepage?>" maxlength="30"><p id="homepage_msg" style="display:none;">홈페이지를 다시 입력 해주세요.</p>
            </div>
          </div>
        </div>
        <div class="title">
          <h3 id="div_recruit_info">step2.구인 정보</h3>
        </div>
        <div id="div_industry">
          <p>산업 분류<strong>*</strong></p>
          <div id="div_category">
            <select id="category_select" size="1"name="industry" onchange="get_section(this.value);" >
              <option value="선택 없음">선택해주세요.</option>
              <option <?php if ($category=="생산/제조/단순노무") {
                  echo 'selected';
                }
               ?>value="생산/제조/단순노무">생산/제조/단순노무</option>
              <option <?php if ($category=="경비/시설관리") {
                  echo 'selected';
                }
               ?> value="경비/시설관리">경비/시설관리</option>
              <option <?php if ($category=="청소/미화") {
                  echo 'selected';
                }
               ?> value="청소/미화">청소/미화</option>
              <option <?php if ($category=="도우미") {
                  echo 'selected';
                }
               ?> value="도우미">도우미</option>
              <option <?php if ($category=="음식점/마트/주유") {
                  echo 'selected';
                }
               ?> value="음식점/마트/주유">음식점/마트/주유</option>
              <option <?php if ($category=="배달/운전/택배") {
                  echo 'selected';
                }
               ?> value="배달/운전/택배">배달/운전/택배</option>
              <option <?php if ($category=="안내/접수/상담") {
                  echo 'selected';
                }
               ?> value="안내/접수/상담">안내/접수/상담</option>
              <option <?php if ($category=="공공/전문") {
                  echo 'selected';
                }
               ?> value="공공/전문">공공/전문</option>
              <option <?php if ($category=="취업창업형(시장형)") {
                  echo 'selected';
                }
               ?> value="취업창업형(시장형)">취업창업형(시장형)</option>
            </select>
          </div>
          <div id="industry_detail">
            <select id="select_section" size="1" name="section">
              <option value="<?=$section?>" onchange="set_section();"><?=$section?></option>

            </select>
          </div>
          <div id="div_career">
            <div id="div_personnel">
              <p>모집 인원<strong>*</strong></p>
              <input type="number" name="personnel" value="<?=$personnel?>">명
            </div>
            <div id="div_require_career">
              <p>지원 자격<strong>*</strong></p>
                경력<input id="require" type="number" name="require" value="">년 이상 <input id="unrelate" type="checkbox" name="require_check" onclick="disable_input(this);" >무관
                <select id="edu_select" size="1" name="edu_select">
                  <option value="학력 선택">학력 선택</option>
                  <option <?php if ($require_edu=="무관") {
                      echo 'selected';
                    }
                   ?> value="무관">무관</option>
                  <option <?php if ($require_edu=="고졸 이상") {
                      echo 'selected';
                    }
                   ?> value="고졸 이상">고졸 이상</option>
                  <option <?php if ($require_edu=="대졸 이상") {
                      echo 'selected';
                    }
                   ?> value="대졸 이상">대졸 이상</option>
                  <option <?php if ($require_edu=="석/박사") {
                      echo 'selected';
                    }
                   ?> value="석/박사">석/박사</option>
                </select>
            </div>
          </div>
        <div id="div_pay">
          <p>급여<strong>*</strong></p>
        <div id="input_pay">
          <input type="number" id="pay" name="pay" placeholder="급여" value="<?=(int)$pay?>">원
          <input type="radio" id="hour_pay" name="rdo_pay" <?php if ($rdo_pay=="시급") {
              echo 'checked';
            }
           ?> value="시급" checked >시급
          <input type="radio" id="month_pay" name="rdo_pay" <?php if ($rdo_pay=="월급") {
              echo 'checked';
            }
           ?> value="월급" >월급
          <input type="radio" id="year_pay" name="rdo_pay" <?php if ($rdo_pay=="연봉") {
              echo 'checked';
            }
           ?> value="연봉" >연봉
        </div>
          </div>
        <div id="div_recruit_type">
          <p>고용 형태<strong>*</strong></p>
        <div id="recruit_type">
          <input type="radio"  name="rdo_type" <?php if ($recruit_type=="시간제") {
              echo 'checked';
            }
           ?> value="시간제" checked>시간제
          <input type="radio"  name="rdo_type" <?php if ($recruit_type=="계약직") {
              echo 'checked';
            }
           ?> value="계약직">계약직
          <input type="radio"  name="rdo_type" <?php if ($recruit_type=="정규직") {
              echo 'checked';
            }
           ?> value="정규직">정규직
          <input type="radio"  name="rdo_type" <?php if ($recruit_type=="기타") {
              echo 'checked';
            }
           ?> value="기타">기타
        </div>
          </div>
        <div id="div_period">
          <p>모집 기간<strong>*</strong></p>
        <div id="period">
          <input type="text" id="period_start" name="period_start" placeholder="접수 시작일" onfocus="(this.type='date')" value="<?=$period_start?>"> ~ <input type="text" id="period_end" name="period_end" placeholder="접수 마감일" onfocus="(this.type='date')" value="<?=$period_end?>">
        </div>
        </div>
        <div id="div_workplace">
          <p>근무지<strong>*</strong></p>
        <div id="workplace">
          <input type="text" id="text_work" name="text_work" placeholder="OO시 OO구 OO동 OO빌딩 4~5층" value="<?=$work_place?>" maxlength="30">
        </div>
        </div>
      </div>
      <div class="title">
        <h3>step3.상세요강</h3>
      </div>
      <div id="div_recruit_title">
        <p>제목<strong>*</strong></p>
        <div id="div_title">
          <input type="text" id="recruit_title" name="recruit_title" placeholder="제목" value="<?=$title?>" maxlength="20">
        </div>
      <div id="div_corporate_detail">
        <p>저희는 이런 회사예요<strong>*</strong></p>
        <textarea name="corporate_detail" rows="7" cols="75" placeholder="어떤 일을 하는 곳인가요 ?" style="resize: none;" ><?=$detail?></textarea>
      </div>
      <div id="div_person_detail">
        <p>이런 사람 원해요<strong>*</strong></p>
        <textarea name="person_detail" rows="7" cols="75" placeholder="특별히 원하는 인재상을 알려주세요." style="resize: none;"><?=$person_detail?></textarea>
      </div>
      <div id="div_environment_detail">
        <p>이런 환경에서 일해요<strong>*</strong></p>
        <textarea name="environment_detail" rows="7" cols="75" placeholder="구체적인 업무, 근무 시간, 근무 장소,주의할 점 등에 대해 알려주세요." style="resize: none;"><?=$envir_detail?></textarea>
      </div>
      <div id="div_image_upload">
        <p>사진 업로드</p>
        <input id="imageFile" type="file" name="upfile" accept="image/*"><img src="./img/plus.png" alt=""> <label for="imageFile" id="label_file"><?=$file_name?></label>
      </div>
      </div>
      <div id="div_btn_regist">
        <?php
          if ($mode=='update') {
            echo "<input type='button' name='btn_update' id='btn_update' value='수정하기'>";
          }else{
            echo "<input type='button' name='btn_regist' id='btn_regist' value='등록하기'>";
          }
         ?>
          <!-- <input type="button" name="btn_regist" id="btn_regist" value="등록하기"> -->
      </div>
    </div>
  </form>
    <script>
      const mode= "<?= $mode ?>";
      const input_career = document.querySelector('#require');
      function disable_input(chk){
        if(chk.checked){
          console.log("check!");
          input_career.disabled = true;
        }else {
          console.log("no");
          input_career.disabled = false;
        }
      }
      function require_value(){
        var check=document.querySelector("#unrelate");
        var career=document.querySelector("#require");
        var db_value="";
        if(mode === 'update'){
         db_value='<?=$require ?>';
        }
        console.log(db_value);
        if(db_value=="무관"){
          check.checked=true;
          career.disabled=true;
        }else{
          career.value=db_value;
        }
      }
      require_value();

      $(document).ready(function() {
          $('input[type=file]').on('change',function(event) {
            if(window.FileReader){
              var label=$(this).val().split('/').pop().split('\\').pop();
            }else{

              var label=$(this).val().split('/').pop().split('\\').pop();
            }
            $(this).siblings('#label_file').text(label);
          });
      });

    </script>
  </body>
</html>
