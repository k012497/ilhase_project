<?php
$file_name = 'recruit2.jpg'; // 저장될 파일 이름
$file = './recruit2.jpg'; // 파일의 전체 경로
header('Content-type: application/octet-stream');
 header('Content-Disposition: attachment; filename="' . $file_name . '"');
 header('Content-Transfer-Encoding: binary');
header('Content-length: '.filesize($file));
header('Expires: 0');
 header("Pragma: public");
  $fp = fopen($file, 'rb');
  fpassthru($fp);
    fclose($fp);

  ?>
