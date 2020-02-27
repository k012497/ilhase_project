<?php
    include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/db_connector.php";
    include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/create_table.php";
    include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/init_table.php";

    create_table($conn, 'admin');
    create_table($conn, 'person');
    create_table($conn, 'corporate');
    create_table($conn, 'recruitment');
    create_table($conn, 'address');
    create_table($conn, 'apply');
    create_table($conn, 'favorite');
    create_table($conn, 'job_industry');
    create_table($conn, 'notice');
    create_table($conn, 'notification');
    create_table($conn, 'qna');
    create_table($conn, 'recruit_plan');
    create_table($conn, 'purchase');
    create_table($conn, 'resume');
    create_table($conn, 'notice_comment');

    insert_init_data($conn, 'admin');
    insert_init_data($conn, 'person');
    insert_init_data($conn, 'corporate');
    insert_init_data($conn, 'recruitment');
    insert_init_data($conn, 'resume');
    insert_init_data($conn, 'apply');
    insert_init_data($conn, 'favorite');
    insert_init_data($conn, 'notice');
    insert_init_data($conn, 'notification');
    insert_init_data($conn, 'recruit_plan');
    insert_init_data($conn, 'purchase');
    insert_init_data($conn, 'qna');
    insert_init_data($conn, 'address');
    insert_init_data($conn, 'job_industry');

?>