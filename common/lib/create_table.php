<?php
function create_table($conn, $table_name){
    $table_exists = false; // 테이블의 존재 유무
    $sql = "show tables from ilhase";
    $result = mysqli_query($conn, $sql) or die('Error: ' . mysqli_error($conn));
    
    while ($row = mysqli_fetch_row($result)) {
        if($row[0] === "$table_name"){
          $table_exists = true;
          break;
        }
    }
    
    // 테이블이 존재하지 않는 경우, 테이블 생성
    if (!$table_exists) {
        switch ($table_name) {
            default :
                // 필요하지 않은 테이블명일 때 생성하지 않음
                break;
        }//end of switch

        if(mysqli_query($conn,$sql)){
            echo '<script >
                alert("'.$table_name.' 테이블이 생성되었습니다.");
            </script>';
        } else {
            echo "테이블 생성 실패! ".mysqli_error($conn);
        }
    } // end of if table doesn't exist

}