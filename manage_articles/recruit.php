<?php
session_start();
  include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
  if(isset($_SESSION['userid'])){
    $id = $_SESSION['userid'];
  } else {
    echo "<script>alert('로그인 후 이용해주세요');
      history.go(-1);
    </script>";
  }
  //모드를 검사하여 창을 띄운다.
  if (isset($_GET['mode'])) {
    $mode=$_GET['mode'];
  }

  switch ($mode) {
    case 'update':
        update_recruitment();
      break;
    case 'insert':
        insert_recruitment();
      break;
    case 'delete':
        delete_recruitment();
      break;
  }


  mysqli_close($conn);

  echo "
      <script>
        location.href = './manage_recruitment_form.php';
      </script>
  ";

  function insert_recruitment(){
    global $conn, $require;

    $sqli="SELECT * FROM purchase WHERE member_id='".$_SESSION['userid']."' ORDER BY num ASC;";

    $result_count = mysqli_query($conn, $sqli);
    $numrow = mysqli_num_rows($result_count);
    if($numrow==0) {
      echo "<script> alert('공고를 올릴 수 없습니다. 플랜을 구입해주세요');
        location.href = '../member_page/corporate/corporate_plan_manager.php';
      </script>";
      exit;
    }
     //행(ROW) 수 만큼
      for($i=0; $i<$numrow; $i++){
          // mysql_fetch_array를 반복합니다.
          $row[$i]=mysqli_fetch_array($result_count);
      }
      for($i=0; $i<$numrow; $i++){
        if($row[$i]['available_count']==0){
          $i++;
          $count1=$row[$i]['available_count']-1;
          $sqli2="update purchase set available_count=".$count1." where num=".$row[$i]['num'].";";
          mysqli_query($conn, $sqli2);
          break;
        }else{
          $count1=$row[$i]['available_count']-1;
          $sqli2="update purchase set available_count=".$count1." where num=".$row[$i]['num'].";";
          mysqli_query($conn, $sqli2);
          break;
        }
      }


    $corporate_id=filter_data($_POST["corporate_id"]);
    $name=filter_data($_POST["recruiter_name"]);
    $phone=filter_data($_POST["recruiter_phone"]);
    $email=filter_data($_POST["recruiter_email"]);
    $homepage=filter_data($_POST["recruiter_homepage"]);
    $industry=filter_data($_POST["industry"]);
    $section=filter_data($_POST["section"]);
    $personnel=filter_data($_POST["personnel"]);
    $edu=filter_data($_POST["edu_select"]);
    $pay=filter_data($_POST["pay"]);
    $rdo_pay=filter_data($_POST["rdo_pay"]);
    $rdo_type=filter_data($_POST["rdo_type"]);
    $start=filter_data($_POST["period_start"]);
    $end=filter_data($_POST["period_end"]);
    $work=filter_data($_POST["text_work"]);
    $title=filter_data($_POST["recruit_title"]);
    $detail=filter_data($_POST["corporate_detail"]);
    $person_detail=filter_data( $_POST["person_detail"]);
    $envir_detail=filter_data($_POST["environment_detail"]);

    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/upload_file.php"; // 파일 업로드

    if (isset($_POST["require_check"])) {
        $career= "무관";
    }else{
        $require=filter_data($_POST["require"]);
        $career="경력 ".$require."년";
    }

    $category = $industry." ".$section;
    $total_pay = $rdo_pay." ".$pay."원";
    $total_detail = "우리는 이런 회사예요\n".$detail."\n\n이런 사람 원해요\n".$person_detail."\n\n이런 환경에서 일해요\n".$envir_detail;
    $total_detail = mysqli_real_escape_string($conn, $total_detail);

    $sql="insert into recruitment(corporate_id, title, details, recruiter_name, recruiter_phone, recruiter_email, homepage, industry, personnel, require_career, require_edu, pay, recruit_type, period_start, period_end, work_place, file_name, file_copied, regist_date)";
    $sql .= "values('$corporate_id', '$title', '$total_detail', '$name', '$phone', '$email', '$homepage', '$category', '$personnel', '$career', '$edu', '$total_pay', '$rdo_type', '$start', '$end', '$work', '$upfile_name', '$copied_file_name', now());";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
      echo mysqli_error($conn).$sql;
    }
  }

  function update_recruitment(){
    global $conn;

    $num=$_GET["num"];
    $name=filter_data($_POST["recruiter_name"]);
    $phone=filter_data($_POST["recruiter_phone"]);
    $email=filter_data($_POST["recruiter_email"]);
    $homepage=filter_data($_POST["recruiter_homepage"]);
    $industry=filter_data($_POST["industry"]);
    $section=filter_data($_POST["section"]);
    $personnel=filter_data($_POST["personnel"]);
    $edu=filter_data($_POST["edu_select"]);
    $pay=filter_data($_POST["pay"]);
    $rdo_pay=filter_data($_POST["rdo_pay"]);
    $rdo_type=filter_data($_POST["rdo_type"]);
    $start=filter_data($_POST["period_start"]);
    $end=filter_data($_POST["period_end"]);
    $work=filter_data($_POST["text_work"]);
    $title=filter_data($_POST["recruit_title"]);
    $detail=filter_data($_POST["corporate_detail"]);
    $person_detail=filter_data( $_POST["person_detail"]);
    $envir_detail=filter_data($_POST["environment_detail"]);

    if (isset($_POST["require_check"])) {
        $career= "무관";
    }else{
        $require=filter_data($_POST["require"]);
        $career=$require."년";
    }

    $category=$industry." ".$section;
    $total_pay=$rdo_pay." ".$pay."원";
    $total_detail=$detail." ".$person_detail." ".$envir_detail;

    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/upload_file.php"; // 파일 업로드

    // 기존에 올렸던 파일이 있고 수정 시 파일을 업로드하지 않았을 때
    $sql = "select file_copied from recruitment where num = '$num'";
    $file_exists = mysqli_fetch_array(mysqli_query($conn, $sql))[0];
    if($file_exists && !$upfile_name){
      $sql = "update recruitment set title='".$title."', details='".$total_detail."', recruiter_name='".$name."', recruiter_phone='".$phone."', recruiter_email='".$email."', homepage='".$homepage."',industry='".$category."', personnel='".$personnel."', require_career='".$career."',require_edu='".$edu."', pay='".$total_pay."', recruit_type='".$rdo_type."', period_start='".$start."', period_end='".$end."' , work_place='".$work."' where num ='$num';";
    } else {
      //
      $sql= "update recruitment set title='".$title."', details='".$total_detail."', recruiter_name='".$name."', recruiter_phone='".$phone."', recruiter_email='".$email."', homepage='".$homepage."',industry='".$category."', personnel='".$personnel."', require_career='".$career."',require_edu='".$edu."', pay='".$total_pay."', recruit_type='".$rdo_type."', period_start='".$start."', period_end='".$end."' , work_place='".$work."', file_name='$upfile_name', file_copied='$copied_file_name' where num ='$num';";
    }


    $result=mysqli_query($conn, $sql);
    if (!$result) {
      echo mysqli_error($conn).$sql;
    }
  }

  function delete_recruitment(){
    global $conn;

    $num   = $_GET["num"];
    $sql = "select file_copied from recruitment where num = $num";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $copied_name = $row["file_copied"];

    if ($copied_name) {
        $file_path = "./data/".$copied_name;
        unlink($file_path);
    }

    $sql = "delete from recruitment where num = $num";
    mysqli_query($conn, $sql);


  }
 ?>
