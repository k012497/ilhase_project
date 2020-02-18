<?php
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
$area=$_GET['area'];
$area_ar=array();

//선택한 지역의 시,구 가져오기
$sql="select si_gun_gu from address where si_do='$area'";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($result)) {
  $area_data= array('areaName' => $row['si_gun_gu'] );
  array_push($area_ar,$area_data);
}
echo json_encode($area_ar,JSON_UNESCAPED_UNICODE);

mysqli_close($conn);



?>
