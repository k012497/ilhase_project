<?php
  include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/db_connector.php";
    $num  = $_GET["num"]; //겟 방식으로 배열 방식으로 num을 $num에 저장
    $page = $_GET["page"];

    $subject    = $_POST["subject"];
    $content    = $_POST["content"];
    $upload_dir = './data/';

    $upfile_name	   = $_FILES["upfile"]["name"];
    $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
    $upfile_type     = $_FILES["upfile"]["type"];
    $upfile_size     = $_FILES["upfile"]["size"];
    $upfile_error    = $_FILES["upfile"]["error"];

    if ($upfile_name && !$upfile_error) {
      $file      = explode(".", $upfile_name); // ?
      $file_name = $file[0];
      $file_ext  = $file[1];

      // 추가
    	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

      $new_file_name    = date("Y_m_d_H_i_s");
      $new_file_name    = $new_file_name;
      $copied_file_name = $new_file_name.".".$file_ext;
      $uploaded_file    = $upload_dir.$copied_file_name;

      if( $upfile_size  > 2000000 ) {
          echo("
          <script>
          alert('업로드 파일 크기가 지정된 용량(2MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
          history.go(-1)
          </script>
          ");
          exit;
      }

      if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) )
      {
          echo("
            <script>
            alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
            history.go(-1)
            </script>
          ");
          exit;
      }
    } else {
      $upfile_name      = "";
      $upfile_type      = "";
      $copied_file_name = "";
  } // end of upfile_name && !upfile_error

  echo "/".$subject."/";
    $sql  = "update notice set subject='$subject', content='2222', file_name='$upfile_name', file_type='$upfile_type', file_copied='$copied_file_name' where num = $num;";

    $result = mysqli_query($conn,$sql);
    if(!$result){
      echo mysqli_error($result);
    } else {
      echo $subject.$content.$sql;
    }

    // mysqli_close($conn);
    // echo "
	  //     <script>
	  //       location.href = 'notice_view.php?page=$page';
	  //     </script>
	  // ";
?>
