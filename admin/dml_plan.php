<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

    $mode = $_GET['mode'];
    $num = $name = $desciprtion = $price = "";

    if(isset($_GET['name'])){
        $name = $_GET['name'];
    }

    if($mode === 'insert'){
        $name = $_POST['name'];
        $count = $_POST['count'];
        $price = $_POST['price'];
    }

    switch($mode){
        case 'select':
            select_plan();
            break;

        case 'delete':
            delete_plan();
            break;

        case 'insert':
            insert_plan();
            break;
    }

    function select_plan(){
        global $conn;
        
        $plan_list = array();
        $sql = "select recruit_plan.num, recruit_plan.name, recruit_plan.count, recruit_plan.price, 
        (select count(*) from purchase where plan_num = recruit_plan.num) as sales, sum(purchase.price) as revenue 
        from recruit_plan left join purchase 
        on recruit_plan.num = purchase.plan_num 
        group by recruit_plan.num;";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $plan_data = array(
                'num' => $row['num'],
                'name' => $row['name'],
                'count' => $row['count'],
                'price' => $row['price'],
                'sales' => $row['sales'],
                'revenue' => $row['revenue']
            );

            array_push($plan_list, $plan_data);

        }
        echo json_encode($plan_list, JSON_UNESCAPED_UNICODE);
    }

    function delete_plan(){
        global $conn, $name;

        $sql = "delete from recruit_plan where name = '$name'";
        $result = mysqli_query($conn, $sql);
        if($result){
            // echo $num."삭제 성공";
        } else {
            echo "삭제 실패 ".mysqli_error($conn);
        }
    }

    function insert_plan(){
        global $conn, $name, $count, $price;

        $sql = "insert into recruit_plan values (null, '$name', '$count', '$price');";
        $result = mysqli_query($conn, $sql);
        if($result){
            $plan_data = array(
                'name' => $name,
                'count' => $count,
                'price' => $price,
                'sales' => 0
            );
            echo json_encode($plan_data, JSON_UNESCAPED_UNICODE);
        } else {
            echo "추가 실패";
        }
    }

?>