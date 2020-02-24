<?php
  include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/db_connector.php";

  $mode = $_GET['mode'];
  $member_id = array();
  
  switch ($mode){
    case 'insert':
      insert_notice();
      break;

    case 'update':
      update_notice();
      break;

    case 'delete':
      delete_notice();
      break;
  }

function insert_notice(){
  global $conn;

  $subject = filter_data($_POST["subject"]);
  $content = filter_data($_POST["content"]);
  $n_subject = mysqli_real_escape_string($conn, $subject);
  $n_content = mysqli_real_escape_string($conn, $content);
  $regist_date = date("Y-m-d (H:i)");
  $hit = 0;

  include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/upload_file.php"; // 파일을 검사 후 저장

  $sql="INSERT INTO `notice` VALUES (null, '$n_subject', '$n_content', '$upfile_name', '$upfile_type', '$copied_file_name', $hit, '$regist_date');";
  $result = mysqli_query($conn,$sql);
  if(!$result){
    echo mysqli_error($conn);
  } else {
    // 모든 회원에게 알림 보내기
    $noti_title = "새로운 공지사항이 등록되었습니다.";
    $noti_content = "새로운 공지사항 [".$n_subject."]이 등록되었습니다. 지금 확인해보세요!";
    send_notification($noti_title, $noti_content);
    echo "<script>
      location.href = 'notice.php';
    </script>";

    // reset($member_id);
    
  }
}

function update_notice(){
  global $conn;

  $num  = $_GET["num"]; //겟 방식으로 배열 방식으로 num을 $num에 저장
  $page = $_GET["page"];

  $subject = filter_data($_POST["subject"]);
  $content = filter_data($_POST["content"]);
  $n_subject = mysqli_real_escape_string($conn, $subject);
  $n_content = mysqli_real_escape_string($conn, $content);
  $regist_date = date("Y-m-d (H:i)");
  $hit = $_POST["hit"];

  // 원래 파일 삭제하기
  if(isset($_POST['del_file']) && $_POST['del_file'] == '1'){
    $sql="SELECT `file_copied` from `free` where num ='$num';";
    $result = mysqli_query($conn,$sql);

    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    } 

    $row = mysqli_fetch_array($result);
    $file_copied = $row['file_copied'];
    if(!empty($file_copied)){
      unlink("./data/".$file_copied); // 파일 삭제
    }

    $sql="UPDATE `free` SET `file_name`='', `file_copied` ='', `file_type` =''  WHERE `num`=$num;";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
  } // end of isset($_POST['del_file']) && $_POST['del_file'] == '1'

  // 새로운 파일 업로드
  if(!empty($_FILES['upfile']['name'])){
    include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/upload_file.php"; // 파일을 검사 후 저장
    $sql="UPDATE `free` SET `file_name`= '$upfile_name', `file_copied` ='$copied_file_name', `file_type` ='$upfile_type' WHERE `num`=$num;";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
  } // end of !empty($_FILES['upfile']['name'])

  $sql  = "update notice set subject='$n_subject', content='$n_content', file_name='$upfile_name', file_type='$upfile_type', file_copied='$copied_file_name' where num = $num;";

  $result = mysqli_query($conn,$sql);
  if(!$result){
    echo mysqli_error($result);
  } else {
    echo $subject.$content.$sql;
  }

  mysqli_close($conn);
  echo "
	    <script>
	      location.href = './notice_view.php?num=$num&page=$page';
	    </script>
	";

} // end of update_notice

function delete_notice(){
  global $conn;

  $num   = $_GET["num"];
  $page   = $_GET["page"];

  $sql = "select * from notice where num = $num;";
  $result = mysqli_query($conn, $sql);
  if(!$result){
    die('Error: ' . mysqli_error($conn));
  }

  $row = mysqli_fetch_array($result);
  $copied_name = $row["file_copied"];

	if ($copied_name)
	{
		$file_path = "./data/".$copied_name;
		unlink($file_path);
    }

    $sql = "delete from notice where num = $num";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    echo "
	     <script>
	         location.href = 'notice.php?page=$page';
	     </script>
	   ";
}

function send_notification($title, $content){
  global $conn, $member_id;

  get_all_members_id();
  echo count($member_id);

  foreach($member_id as $id){
    $sql = "insert into notification values (null, '$title', '$content', now(), 0, '$id')";
    $result = mysqli_query($conn, $sql);
    if(!$result){
      mysqli_error($conn);
    }
  }

}

function get_all_members_id(){
  global $conn, $member_id;
  
  $sql = "select id from person";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)){
    array_push($member_id, $row[0]);
  }

  $sql = "select id from corporate";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)){
    array_push($member_id, $row[0]);
  }
}

?>
