<?php
  session_start();
  include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
  if(isset($_SESSION["userid"])){
    $userid=$_SESSION["userid"];
  }else{
    $userid="";
  }

    $sql = "select num, file_copied from recruitment where period_end < DATE_FORMAT(now(), '%y-%m-%d');";


    $result = mysqli_query($conn, $sql);
      echo '<script>console.log($result)</script>';
    while($row = mysqli_fetch_array($result)){
      $num=$row["num"];
      $copied_name = $row["file_copied"];
      $sql="delete from recruitment where num = '$num';";
      if ($copied_name) {
        $file_path = "./data/".$copied_name;
        unlink($file_path);
      }
    }

    $sql = "delete from recruitment where period_end < DATE_FORMAT(now(), '%Y-%m-%d') and corporate_id = '$userid';";
    mysqli_query($conn, $sql);

    echo "
         <script>
             alert('마감된 공고를 삭제했어요 :D ');
           location.href = 'manage_recruitment_form.php';
         </script>
       ";

    mysqli_close($conn);





 ?>
