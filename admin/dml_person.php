<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
    $mode = $_GET['mode'];
    $id = "";
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }

    switch($mode){
        case 'select':
            select_person();
            break;

        case 'select_count':
            select_person_count();
            break;

        case 'delete':
            delete_person();
            break;

        case 'update':
            update_person();
            echo "update".$id;
            break;

        default:
            echo "wrong mode!";
            break;
    }

    function select_person(){
        global $conn, $id, $type;

        $sql = "select * from person where id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($row = mysqli_fetch_array($result)){
            $member_data = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'birth' => $row['birth'],
                'gender' => $row['gender'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'zipcode' => $row['zipcode'],
                'new_address' => $row['new_address'],
                'old_address' => $row['old_address'],
                'member_type' => $type
              );
            echo json_encode($member_data, JSON_UNESCAPED_UNICODE);
        } else {
            echo "찾을 수 없습니다.";
        }
    }

    function select_person_count(){
        global $conn;

        $sql = "select count(*) from person";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo mysqli_fetch_array($result)[0];
        }

    }

    function update_person(){
        global $conn, $id;

        $name = $_POST['name'];
        $birth = $_POST['birth'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "update person set name = '$name', birth = '$birth', gender = '$gender', email = '$email', phone = '$phone' where id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "업데이트 성공";
        } else {
            echo "업데이트 실패".mysqli_error($conn);
        }
    }

    function delete_person(){
        global $conn, $id;

        $sql = "delete from person where id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "삭제 성공";
        } else {
            echo "삭제 실패 ".mysqli_error($conn);
        }
    }

?>