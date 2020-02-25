<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

    $mode = $_GET['mode'];

    $area = $industry = "";

    if(isset($_GET['area'])){
        $area = $_GET['area'];
    }

    if(isset($_GET['industry'])){
        $industry = $_GET['industry'];
    }

    switch($mode){
        case 'recruitment_count':
            get_recruitment_count();
            break;

        case 'revenue':
            get_revenue();
            break;

        case 'sales':
            get_sales();
            break;

        case 'best_product':
            get_best_product();
            break;

        case 'count_by_area':
            get_count_by_area();
            break;

        case 'count_by_industry':
            get_count_by_industry();
            break;

        case 'area_name':
            get_area_name();
            break;
        
        case 'industry_name':
            get_industry_name();
            break;

        case 'questions_count':
            get_questions_count();
            break;
    }

    function get_recruitment_count(){
        global $conn;

        $sql = "select count(*) from recruitment";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo mysqli_fetch_array($result)[0];
        } else {
            echo mysqli_error($conn);
        }
        
    }

    function get_revenue(){
        global $conn;

        $sql = "select sum(price) from purchase";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo mysqli_fetch_array($result)[0];
        }
    }

    function get_sales(){
        global $conn;

        $sql = "select count(*) from purchase";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo mysqli_fetch_array($result)[0];
        }
    }

    function get_best_product(){
        global $conn;

        $sql = "select plan_name from purchase group by plan_name order by sum(price) desc limit 1;";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo mysqli_fetch_array($result)[0];
        }
    }

    function get_area_name(){
        global $conn;

        $area_name = array();
        $sql = "select si_do from address group by si_do";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            array_push($area_name, $row[0]);
        }

        echo json_encode($area_name, JSON_UNESCAPED_UNICODE);
    }

    function get_count_by_area(){
        global $conn, $area;
        
        $sql = "select count(*) from recruitment where work_place like '%$area%';";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo mysqli_fetch_array($result)[0];
        }
    }

    function get_industry_name(){
        global $conn;

        $industry_name = array();
        $sql = "select category from job_industry group by category;";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result)){
            array_push($industry_name, $row[0]);
        }

        echo json_encode($industry_name, JSON_UNESCAPED_UNICODE);
    }

    function get_count_by_industry(){
        global $conn, $industry;
        
        $sql = "select count(*) from recruitment where industry like '%$industry%';";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo mysqli_fetch_array($result)[0];
        }
    }

    function get_questions_count(){
        global $conn;

        $sql = "select count(*) from qna group by group_num;";
        $result = mysqli_query($conn, $sql);
        if($result){
            $count = 0;
            while($row = mysqli_fetch_array($result)){
                if($row[0] === '1'){
                    // 답변이 달리지 않은 경우만 카운팅
                    $count++;
                }
            }
            echo $count;
        }
    }

    function get_monthly_revenue(){
        global $conn;

        $sql = "select sum(price), MID(date, 1, 7) as m from purchase where plan_name = 'small plan' group by m order by m desc limit 6;";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            //echo;
        }
        
    }
?>