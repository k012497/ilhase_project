<?php
$b_license_num=$_POST['b_license_num'];
  $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://business.api.friday24.com/closedown/'.$b_license_num);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'Authorization: Bearer QxqBmOWc58efT6q2X5ug';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

  $json_string = json_decode($result);
  echo $json_string->bizNum;
 ?>
