<?php
session_start();
// include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_setting.php";
  $sql="select * from recruit_plan";
  $result=mysqli_query($conn,$sql);
  $numrow = mysqli_num_rows($result);
   //행(ROW) 수 만큼
    for($i=0; $i<$numrow; $i++){
        // mysql_fetch_array를 반복합니다.
        $row[$i]=mysqli_fetch_array($result);
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/corporate/css/person.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <style media="screen">
      .container th{
        text-align: center;
      }
      .button_v {position: absolute;left:38px;top:110px;
      width:91px;height:91px;border-radius: 100%;background:skyblue;
      border:none;font-family:'xeicon';color:#fff;font-size: 45px;}
    </style>
  </head>
  <body>
      <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
      </header>
    <div id="div_left_menu">
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/member_page/corporate/member_side_menu.php";?>
    </div>
    <div class="container" style="margin-left:400px;margin-top:50px;">

    <!-- <div class="row">


        <div class="col-sm-offset-1 col-sm-2" style="background-color:lightgray;height:250px;border-radius:15px;">
          <h4><?php echo $row[0]['name']; ?></h4>
          <h5><?php echo $row[0]['description']; ?></h5>
          <h5><?php echo $row[0]['price']; ?></h5>
          <div class="button_v">
            <i class='xi-check-min xi-2x'></i>
          </div>
        </div>
        <div class="col-sm-2"style="background-color:lightgray;height:250px;border-radius:15px;margin-left:5px;">
          <h4><?php echo $row[1]['name']; ?></h4>
          <h5><?php echo $row[1]['description']; ?></h5>
          <h5><?php echo $row[1]['price']; ?></h5>
          <div class="button_v">
            <i class='xi-check-min xi-2x'></i>
          </div>
        </div>
        <div class="col-sm-2"style="background-color:lightgray;height:250px;border-radius:15px;margin-left:5px;">
          <h4><?php echo $row[2]['name']; ?></h4>
          <h5><?php echo $row[2]['description']; ?></h5>
          <h5><?php echo $row[2]['price']; ?></h5>
          <div class="button_v">
            <i class='xi-check-min xi-2x'></i>
          </div>
        </div>
        <div class="col-sm-2"style="background-color:lightgray;height:250px;border-radius:15px;margin-left:5px;">
          <h4><?php echo $row[3]['name']; ?></h4>
          <h5><?php echo $row[3]['description']; ?></h5>
          <h5><?php echo $row[3]['price']; ?></h5>
          <div class="button_v">
            <i class='xi-check-min xi-2x'></i>
          </div>
        </div>
    </div> -->
    <div class="col-md-offset-6 col-md-8">
      <p><button type="button" class="btn btn-primary btn-block">플랜 구매</button></p>
    </div>
    <h3>내가 가지고 있는 플랜</h3>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-4" style=";height:70px;border-radius:15px;">
          <table >
            <tr>
              <th style="border-radius:15px 0px 0px 15px; width:150px;border:0px;text-align:center;height:70px;"><?php echo $row[0]['name']; ?></th>
              <th style="border-radius: 0px 15px 15px 0px; width:150px; border:0px;text-align:center;height:70px;">0회</th>
            </tr>
          </table>
        </div>
        <div class="col-sm-4"style="height:70px;border-radius:15px;margin-left:5px;">
          <table >
            <tr>
              <th style="border-radius:15px 0px 0px 15px; width:150px;border:0px;text-align:center;height:70px;"><?php echo $row[1]['name']; ?></th>
              <th style="border-radius: 0px 15px 15px 0px; width:150px; border:0px;text-align:center;height:70px;">0회</th>
            </tr>
          </table>
        </div>
        <div class="col-sm-4"style="height:70px;border-radius:15px;margin-top:10px;">
          <table >
            <tr>
              <th style="border-radius:15px 0px 0px 15px; width:150px;border:0px;text-align:center;height:70px;"><?php echo $row[2]['name']; ?></th>
              <th style="border-radius: 0px 15px 15px 0px; width:150px; border:0px;text-align:center;height:70px;">0회</th>
            </tr>
          </table>
        </div>
        <div class="col-sm-4"style="height:70px;border-radius:15px;margin-left:5px;margin-top:10px;">
          <table >
            <tr>
              <th style="border-radius:15px 0px 0px 15px; width:150px;border:0px;text-align:center;height:70px;"><?php echo $row[3]['name']; ?></th>
              <th style="border-radius: 0px 15px 15px 0px; width:150px; border:0px;text-align:center;height:70px;">0회</th>
            </tr>
          </table>
        </div>
        <div class="row">

     </div>
    </div>
    <h3>구매내역</h3>
    <table class="table table-striped">
<thead>
  <tr>
    <th scope="col">구매번호</th>
    <th scope="col">구매 플랜</th>
    <th scope="col">결제 수단</th>
    <th scope="col">구매번호</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</tbody>
</table>
</div>


  </body>
</html>
