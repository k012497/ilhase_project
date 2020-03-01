<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
    $mode = $_GET['mode'];
    $id = "";
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }else if(isset($_GET['id'])){
        $id = $_GET['id'];
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
            break;

        case 'apply_history':
            get_apply_history();
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
            echo false;
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
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "update person set name = '$name', gender = '$gender', email = '$email', phone = '$phone' where id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>
                alert('$id 회원 정보를 수정하였습니다.');
                history.go(-1);
            </script>";
        } else {
            echo "업데이트 실패 ".mysqli_error($conn);
        }
    }

    function delete_person(){
        global $conn, $id;

        $sql = "delete from person where id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>
                alert('$id 회원을 삭제하였습니다.');
                history.go(-1);
            </script>";
        } else {
            echo "삭제 실패 ".mysqli_error($conn);
        }
    }

    function get_apply_history(){
        global $conn, $id;

        $apply_data_list = array();
        $sql = "select title, r.industry, a.regist_date as apply_date from recruitment r join apply a where r.num in (select recruit_id from apply where member_id = '$id');";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_row($result)){
            $apply_data = array(
                'title' => filter_data($row[0]),
                'industry' => filter_data($row[1]),
                'apply_date' => filter_data($row[2])
            );

            array_push($apply_data_list, $apply_data);
        }
        
        echo json_encode($apply_data_list, JSON_UNESCAPED_UNICODE);
    }

?>