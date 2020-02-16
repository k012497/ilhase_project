<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
    $mode = $_GET['mode'];
    $id = $_POST['id'];

    switch($mode){
        case 'select':
            select_corporate();
            break;
        case 'delete':
            delete_corporate();
            break;
        case 'update':
            update_corporate();
            break;
        default:
            echo "wrong mode!";
            break;
    }

    function select_corporate(){
        global $conn, $id, $type;

        $sql = "select * from corporate where id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($row = mysqli_fetch_array($result)){
            $member_data = array(
                'id' => $row['id'],
                'b_name' => $row['b_name'],
                'job_category' => $row['job_category'],
                'ceo' => $row['ceo'],
                'b_license_num' => $row['b_license_num'],
                'address' => $row['address'],
                'email' => $row['email'],
                'available_service' => $row['available_service'],
                'member_type' => $type
              );
            echo json_encode($member_data, JSON_UNESCAPED_UNICODE);
        } else {
            echo "찾을 수 없습니다.";
        }
    }

    function delete_corporate(){
        global $conn, $id;

        $sql = "delete from corporate where id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "삭제 성공";
        } else {
            echo "삭제 실패 ".mysqli_error($conn);
        }
    }

    function update_corporate(){
        global $conn, $id;

        $b_name = $_POST['b_name'];
        $ceo = $_POST['ceo'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $available_service = $_POST['available_service'];

        $sql = "update corporate set b_name = '$b_name', ceo = '$ceo', address = '$address', email = '$email', available_service = '$available_service' where id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "업데이트 성공";
        } else {
            echo "업데이트 실패 ".mysqli_error($conn);
        }
    }


?>