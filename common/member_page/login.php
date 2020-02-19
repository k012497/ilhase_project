<?php
    if(isset($_SESSION['userid'])){
      unset( $_SESSION['userid'] );
    }if(isset($_SESSION['username'])){
      unset( $_SESSION['username'] );
    }if(isset($_SESSION['usermember_type'])){
      unset( $_SESSION['usermember_type'] );
    }

    $id   = $_POST["uid"];
    $pass = $_POST["upw"];


    $member_type=$_POST['member_type'];
   $con = mysqli_connect("localhost", "root", "123456", "ilhase");
   $sql = "select * from ".$member_type." where id='$id'";
   $result = mysqli_query($con, $sql);

   $num_match = mysqli_num_rows($result);
   if($id=="admin"&&$pass=="123456"){
     session_start();
     $_SESSION["userid"] = "admin";
     if($member_type=="person")
     $_SESSION["username"] = "123456";
     else {
       $_SESSION["username"] = "관리자";
     }
     $_SESSION["usermember_type"] = "admin";
     $root_path = $_SERVER['DOCUMENT_ROOT'];
     echo("
       <script>
         location.href = 'http://".$_SERVER['HTTP_HOST']."/ilhase/index.php';
       </script>
     ");
   }else if(!$num_match)
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysqli_fetch_array($result);
        $db_pass = $row["pw"];
        echo $db_pass;
        mysqli_close($con);

        if($pass != $db_pass)
        {
           echo("
              <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>
           ");
           exit;
        }
        else
        {
            session_start();
            $_SESSION["userid"] = $row["id"];
            if($member_type=="person")
            $_SESSION["username"] = $row["name"];
            else {
              $_SESSION["username"] = $row["ceo"];
            }
            $_SESSION["usermember_type"] = $member_type;

            echo("
              <script>
                location.href = 'http://".$_SERVER['HTTP_HOST']."/ilhase/index.php';
              </script>
            ");
        }
     }
?>
