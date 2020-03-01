<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

    if (isset($_POST["inputId"])) {
      $id = $_POST["inputId"];
    }else{
      // echo "뭐지";
      return false;
    }

    $sql = "select * from corporate where id='".$id."'";
    $result = mysqli_query($conn, $sql);
    $recode_array=mysqli_fetch_array($result);
    $num_record = mysqli_num_rows($result);
    if ($num_record){
      echo "1";
    }else{
      echo "0";
    }
    mysqli_close($conn);
?>
