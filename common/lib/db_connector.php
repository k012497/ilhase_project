<?php
    date_default_timezone_set("Asia/seoul");

    $db_exists = false; // ilhase DB의 존재 유무

    $server_name = "127.0.0.1";
    $user_name = "root";
    $password = "123456";
    $conn = mysqli_connect($server_name, $user_name, $password);
    if(!$conn){
        die("Connection _failed: " . mysqli_connect_error());
    }

    $sql = "show databases";
    $result = mysqli_query($conn,$sql) or die('Error: ' . mysqli_error($conn));
    while ($row = mysqli_fetch_row($result)) {
        if($row[0] === "ilhase"){
            $db_exists = true;
            break;
        }
    }

    // ilhase DB가 존재하지 않는 경우, DB 생성
    if(!$db_exists) {
        $sql = "CREATE database ilhase";
        $result = mysqli_query($conn, $sql);
        if(!$result) {
            echo "DB 생성 실패! ".mysqli_error($conn);
        }
    }

    $dbconn = mysqli_select_db($conn, "ilhase") or die('Error:' . mysqli_error($conn));

    // filtering data from user
    function filter_data($data) {
        $data = trim($data); // 양 끝의 공백 제거
        $data = stripslashes($data); //  backslash 제거
        $data = htmlspecialchars($data); // 특수문자를 HTML entities로 변환

        return $data;
    }

    function insert_notification($title, $content, $id){
        global $conn;

        $sql = "insert into notification values (null, '$title', '$content', now(), 0, '$id')";
        $result = mysqli_query($conn, $sql);
        if(!$result){
          mysqli_error($conn);
        }
    }
?>
