<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

// include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

  $sql="select * from purchase where member_id='".$_SESSION['userid']."'
  ORDER BY num DESC;";
  $result_purchase=mysqli_query($conn,$sql);
  $numrow_purchase = mysqli_num_rows($result_purchase);
   //행(ROW) 수 만큼
    for($i=0; $i<$numrow_purchase; $i++){
        // mysql_fetch_array를 반복합니다.
        $row_purchase[$i]=mysqli_fetch_array($result_purchase);
    }
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
    </style>
    <script type="text/javascript">
      $(function(){
        $('#plan_buy').click(function(){
          console.log($('input[name="options"]:checked').val());
          location.href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/corporate/kakaopay.php?plan="+$('input[name="options"]:checked').val()
          +"&id=<?=$_SESSION['userid']?>";
        });
    });
    </script>
  </head>
  <body>
      <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
      </header>
    <div id="div_left_menu">
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/member_page/corporate/member_side_menu.php";?>
    </div>
    <div class="container" style="margin-left:400px;margin-top:50px;">
      <div class='row'>
      <?php
          for ($i=0; $i<$numrow; $i++) {
              echo "
              <div class='col-sm-2' style='background-color:lightgray;height:250px;border-radius:15px;
              margin-right:5px;margin-top:5px;'>
                <h4>".$row[$i]['name']."</h4>
                <h4>".$row[$i]['description']."</h4>
                <h5>".$row[$i]['price']."</h5>
                <input type='radio' name='options' value='".$row[$i]['name']."'/>
                <span class='radio'></span>
                <span class='label'>".$row[$i]['name']."</span>
              </div>

              ";
          }


       ?>
       </div>
    <div class="col-md-offset-6 col-md-8">
      <p><button type="button" class="btn btn-primary btn-block" id="plan_buy">플랜 구매</button></p>
    </div><br>
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
    <th scope="col">구매일자</th>
    <th scope="col">구매 플랜</th>
    <th scope="col">결제 수단</th>
    <th scope="col">구매가격</th>
  </tr>
</thead>
<tbody>
  <?php
  for($i=0; $i<$numrow_purchase; $i++){
    echo "
    <tr>
      <td>".$row_purchase[$i]['date']."</td>
      <td>".$row_purchase[$i]['plan_name']."</td>
      <td>".$row_purchase[$i]['method']."</td>
      <td>".$row_purchase[$i]['price']."</td>
    </tr>
    ";
  }
   ?>
</tbody>
</table>
</div>


  </body>
</html>
