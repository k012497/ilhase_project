<?php

include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

    $id = $_POST['user_id'];
    if(isset($_GET['mode']) && $_GET['mode'] === 'check_period'){
        check_recruit_period_end();
    }

    if(!$id){
        echo "로그인 안함";
        return;
    }

    function check_recruit_period_end(){
        global $conn, $id;

        // 마감이 임박한 공고 확인 (마감이 3일 이내로 남은 공고들)
        $sql = "select title, period_end from recruitment where num in (select recruit_id from favorite where member_id = '$id') and period_end >  date_sub(now(), interval 3 DAY) and period_end < now();";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            die ('check_recruit_period_end error :' . mysqli_error($conn));
        }
        
        while($row = mysqli_fetch_array($result)){
            $title = $row['title'];
            $period_end = $row['period_end'];

            // 알림 보내기 - notification에 insert
            insert_notification('채용 마감이 임박한 관심 공고가 있습니다.', '서두르세요! 관심 목록에 등록한 ['.$title.']의 마감일이 '.$period_end.'입니다. ', $id);
        }
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