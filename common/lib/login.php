<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

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
   $sql = "select * from ".$member_type." where id='$id'";
   $result = mysqli_query($conn, $sql);

   $num_match = mysqli_num_rows($result);
   if($id=="admin" && $pass=="123456"){
     // 관리자
     session_start();
     $_SESSION["userid"] = "admin";
     $_SESSION["username"] = "관리자";
     $_SESSION["usermember_type"] = "admin";
     $root_path = $_SERVER['DOCUMENT_ROOT'];
     echo("
       <script>
         location.href = 'http://".$_SERVER['HTTP_HOST']."/ilhase/admin/admin.php?main=true';
       </script>
     ");
   }else if(!$num_match){
     // 등록되지 않은 아이디의 회원일 때, 관리자 비밀번호 틀렸을 때
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!')
             history.go(-1)
           </script>
         ");
    } else {
      // 일반 회원(개인/기업)일 때
        $row = mysqli_fetch_array($result);
        $db_pass = $row["pw"];
        mysqli_close($conn);

        if($pass != $db_pass){
          // 회원 비밀번호가 틀렸을 때
           echo("
              <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>
           ");
           exit;
        } else {
          // 로그인 성공
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
