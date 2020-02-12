<?php
function insert_init_data($conn, $table_name){
  $is_empty = false; // 테이블이 비어 있는 지 유무
  $sql = "SELECT * from $table_name";
  $result=mysqli_query($conn, $sql) or die('Error: '.mysqli_error($conn));

  $records = mysqli_num_rows($result);

  if(empty($records) ){
    $is_empty = true;
  }

  // 테이블이 비어 있을 경우, 초기값을 넣어줌
  if($is_empty){
    switch($table_name){
        // 모든 테이블에 대한 초기값
        case '' :
            break;

        default:
            // 존재하지 않는 테이블명일 때
            echo "<script>alert('존재하지 않는 테이블명 입니다.');</script>";
            break;
    } // end of switch

    if(mysqli_query($conn, $sql)){
      echo "<script>alert('$table_name 테이블 초기값 셋팅 완료');</script>";
    } else {
      echo "실패원인".mysqli_error($conn);
    }
  } // end of if table is empty

} // end of function

?>
