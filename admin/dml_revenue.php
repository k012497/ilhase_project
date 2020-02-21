<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

    // 최근 6개월 데이터만
    $limit = 6;
    
    // category - 최근 년월 e.g. 2020-02, 2020-01, 2019-12, ...
    $month_array = array();
    
    // series data - 각 상품의 해당 년월 총 매출액 
    $monthly_data_array = array();

    // series name - 거래된 상품명
    $products_array = array();

    function get_products_list(){
        global $conn, $products_array;

        $sql = "select plan_name from purchase group by plan_name;";

        $result = mysqli_query($conn, $sql);
        if($result){
            while($row = mysqli_fetch_array($result)){
                array_push($products_array, $row[0]);
            }
        } else {
            echo mysqli_error($conn);
        }
    }

    function get_month_list(){
        global $conn, $month_array, $limit;

        $sql = "select MID(date, 1, 7) as monthly from purchase group by monthly order by monthly asc limit ".$limit.";";
        $result = mysqli_query($conn, $sql);
        if($result){
            while($row = mysqli_fetch_array($result)){
                array_push($month_array, $row[0]);
            }
        } else {
            echo mysqli_error($conn);
        }
    }
    
    // 1. 매출이 발생한 상품 이름 리스트 구하기 
    get_products_list();

    // 2. 매출이 발생한 최근 6개의 날짜(yyyy-mm) 리스트 구하기
    get_month_list();

    // 3. 월별 매출액을 monthly_data_array에 담음
    foreach ( $products_array as $plan_name ) {
        $data = get_revenue_data($plan_name);
    }

    // 특정 상품의 최근 판매 실적 가져오기
    function get_revenue_data($plan_name){
        global $conn, $monthly_data_array, $month_array;
        
        foreach($month_array as $month){
            echo "<script>console.log('$plan_name', '$month', 'get_revenue_data');</script>";
            $sql = "select sum(price) from purchase where plan_name = '$plan_name' and date like '%$month%';";
            $result = mysqli_query($conn, $sql);
            if($result){
                while($row = mysqli_fetch_array($result)){
                    $revenue_data = array(
                        'plan' => $plan_name,
                        'revenue' => $row['sum(price)']
                    );
                    array_push($monthly_data_array, $revenue_data);
                }
            } else {
                echo mysqli_error($conn);
            }
        }
    }

?>