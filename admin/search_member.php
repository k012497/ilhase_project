<?php
    $type = $_POST['member_type'];
    
    switch($type){
        case 'person':
            include $_SERVER["DOCUMENT_ROOT"]."/ilhase/admin/dml_person.php";
            break;

        case 'corporate':
            include $_SERVER["DOCUMENT_ROOT"]."/ilhase/admin/dml_corporate.php";
            break;
    }

?>