<?php
if (isset($_POST["inputId"])) {
  $id = $_POST["inputId"];
}else{
  echo "뭐지";
  return false;
}

      $con = mysqli_connect("localhost", "root", "123456", "ilhase");
      $sql = "select * from person where id='".$id."'";
      $result = mysqli_query($con, $sql);
      $recode_array=mysqli_fetch_array($result);
      $num_record = mysqli_num_rows($result);
      if ($num_record){
        echo "1";
      }else{
        echo "0";
      }
      mysqli_close($con);
?>
