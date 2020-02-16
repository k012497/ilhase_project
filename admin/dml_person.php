<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

    $mode = $_GET['mode'];
    $id = $_POST['id'];

    switch($mode){
        case 'select':
            $sql = "select * from person where id = '$id'";
            $result = mysqli_query($conn, $sql);
            if(!mysqli_num_rows($result)){
                $sql = "select * from corporate where id = '$id'";
                $result = mysqli_query($conn, $sql);
            
                if(mysqli_num_rows($result)){
                    // 기업 회원 정보 모달창
                    echo "<span>기업 회원 정보 모달창 yes</span>";
                }
            } else {
                // 개인 회원 정보 모달창
                echo "<span>개인 회원 정보 모달창</span>";
            }
            break;
        case 'delete':
            break;
        case 'update':
            break;
        default:
            echo "wrong mode!";
            break;
}

?>