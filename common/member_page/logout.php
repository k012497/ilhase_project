<?php
  session_start();
  if(isset($_SESSION['userid'])){
    unset( $_SESSION['userid'] );
  }if(isset($_SESSION['username'])){
    unset( $_SESSION['username'] );
  }if(isset($_SESSION['usermember_type'])){
    unset( $_SESSION['usermember_type'] );
  }

  echo("
       <script>
          location.href = 'http://".$_SERVER['HTTP_HOST']."/ilhase/index.php';
         </script>
       ");
?>
