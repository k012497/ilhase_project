<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

    $mode = $_GET['mode'];

    switch($mode){
        case 'select':
            $sql = "select * from qna";
            break;
        case 'insert':
            break;
        case 'delete':
            break;
        default:
            echo "wrong mode!";
            break;
    }

?>