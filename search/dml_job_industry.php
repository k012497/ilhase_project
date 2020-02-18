<?php
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
$industy=$_GET['industy'];
$area_ar=array();

//선택한 지역의 시,구 가져오기
$sql="select * from job_industry where category='$industy'";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($result)) {
  $industy_data= array('section' => $row['section'],
                      'category' => $row['category']

  );
  array_push($area_ar,$industy_data);
}
echo json_encode($area_ar,JSON_UNESCAPED_UNICODE);

mysqli_close($conn);



?>
