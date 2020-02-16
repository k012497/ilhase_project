<?php

    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";


    $mode = $_GET['mode'];

    $id = $_POST['id'];
    $type = $_POST['member_type'];
    
    switch($type){
        case 'person':
            include $_SERVER["DOCUMENT_ROOT"]."/ilhase/admin/dml_person.php";
            break;

        case 'corporate':
            include $_SERVER["DOCUMENT_ROOT"]."/ilhase/admin/dml_corporate.php";
            break;
    }

    $result = mysqli_query($conn, $sql);

?>