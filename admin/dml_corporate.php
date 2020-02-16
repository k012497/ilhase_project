<?php
    // include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

    // $mode = $_GET['mode'];
    // $id = $_POST['id'];

    switch($mode){
        case 'select':
            $sql = "select * from corporate where id = '$id'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)){
                // 개인 회원 정보 모달창
                echo "<span>기업 회원 정보 모달창</span>";
            } else {
                echo "찾을 수 없습니다.";
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