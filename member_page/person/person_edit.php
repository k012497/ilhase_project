<?php
  include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_setting.php";
  $id   = $_POST["id"];
  $pass = $_POST["pass_1"];
  $name = $_POST["name"];
  $birth= $_POST["birth"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  $phone = $_POST["phone"];
  $zipcode = $_POST["zipcode"];
  $new_address = $_POST["new_address"];
  $old_address = $_POST["old_address"];

    $sql = "update person set name='$name', pw='$pass', email='$email', phone='$phone',zipcode='$zipcode',new_address='$new_address',old_address='$old_address'";
    $sql .= " where id='$id'";

    mysqli_query($conn, $sql);

    mysqli_close($conn);

    echo "
	      <script>
	          location.href = 'person_edit_form.php';
	      </script>
	  ";
?>
