<?php
    // include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

    // $mode = $_GET['mode'];
    // $id = $_POST['id'];

    switch($mode){
        case 'select':
            $sql = "select * from person where id = '$id'";
            $result = mysqli_query($conn, $sql);
            if($row = mysqli_fetch_array($result)){
                $id = $row['id'];
                $name = $row['name'];
                $birth = $row['birth'];
                $gender = $row['gender'];
                $email = $row['email'];
                $phone = $row['phone'];
                $zipcode = $row['zipcode'];
                $new_address = $row['new_address'];
                $old_address = $row['old_address'];

                // 개인 회원 정보 모달창
                echo "<span>개인 회원 정보 모달창 - $id, $name, $birth, $gender, $phone, $zipcode, $new_address, $old_address</span>";
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