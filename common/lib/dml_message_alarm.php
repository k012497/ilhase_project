<?php

include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

    $id = $_POST['user_id'];

    if(!$id){
        echo "로그인 안함";
        return;
    }

    function isMessage(){ 
        global $conn, $id;
        
        // 14일 지난 알림은 자동 삭제
        $sql = "delete from notification where regist_date <= date_sub(now(), interval 14 DAY);";
        mysqli_query($conn, $sql);

        // 읽지 않은 메세지가 있는지 확인
        $is_message_sql="select * from notification where member_id='$id' and `read`=0";
        $ismessage_result=mysqli_query($conn,$is_message_sql);
        $message=mysqli_num_rows($ismessage_result);
    
        if($message > 0){
            //메세지 있을때
            echo true;
        } else {
            echo false;
        }      
    }

    echo isMessage();

    mysqli_close($conn);
?>