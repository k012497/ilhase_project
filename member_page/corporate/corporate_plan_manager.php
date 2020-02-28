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
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <style media="screen">
    #text_div_1{
      position: absolute;
      left: 350px;
    }
    #text_div_2{
      position: absolute;
      left: 350px;
      top: 509px;
    }
    #text_div_3{
      position: absolute;
      left: 350px;
      top: 746px;
    }
      #div_left_menu{
        position: absolute;
        left:100px;
      }
      #row_div{
        overflow-y: scroll;
        position: absolute;
        top: 112px;
        left: 350px;
        width: 1000px;
        height: 330px;
      }
      #row_div > .col-sm-3{
        width:150px;
      }
      .button_div{
        position: absolute;
        top: 452px;
        width: 400px;
        left: 524px;
      }
      #buy_plan{
        overflow-y: scroll;
        position: absolute;
        top: 562px;
        left: 388px;
        width: 1000px;
        height: 163px;
      }
      #purchase_history{
        overflow-y: scroll;
        position: absolute;
        top: 816px;
        left: 258px;
        width: 1000px;
        height: 196px;
      }
      #purchase_history th{
        text-align: center;
      }
    </style>
    <script type="text/javascript">
          $(function(){
            $('#option1_0').click(function(){
                $('input[name=options]').val();
            });
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
    <div id="text_div_1">
      <h3>구인 플랜</h3>
    </div>
    <div class="row" id="row_div">

      <?php
      // echo "<div class='btn-group btn-group-toggle text-center' data-toggle='buttons'>";
          for ($i=0; $i<$numrow; $i++) {
            if($i==0){
              $sec="checked";
            }else{
              $sec="";
            }
              echo "
              <div class='col-sm-3' style='background-color:lightgray;height:150px;border-radius:15px;
              margin-right:5px;margin-top:5px;'>
                <h4>".$row[$i]['name']."</h4>
                <h4>공고 ".$row[$i]['count']." 개</h4>
                <h5>".$row[$i]['price']."원</h5>
                <input type='radio' autocomplete='off'
                ".$sec."
                name='options' value='".$row[$i]['name']."'/>
                <span class='radio'></span>
                <span class='label' id='span_".$i."'>".$row[$i]['name']."</span>
                <input type='hidden' value='".$row[$i]['name']."'
                id='input_".$i."'>
              </div>
              ";
          }
       ?>
    </div>
    <div class="button_div">
      <p><button type="button" class="btn btn-primary btn-block" id="plan_buy">플랜 구매</button></p>
    </div>
    <div id="text_div_2">
      <h3>이용중인 플랜</h3>
    </div>
      <div class="row" id="buy_plan">
        <?php
          for($i=0;$i<$numrow_purchase; $i++){
            echo "
            <div class='col-sm-4'style='height:70px;border-radius:15px;margin:5px;'>
              <table >
                <tr>
                  <th style='border-radius:15px 0px 0px 15px; width:150px;border:0px;text-align:center;height:70px;'>
                  ".$row_purchase[$i]['plan_name']."</th>
                  <th style='border-radius: 0px 15px 15px 0px; width:150px; border:0px;text-align:center;height:70px;'>
                  ".$row_purchase[$i]['available_count']."회
                  </th>
                </tr>
              </table>
            </div>
            ";
          }
         ?>
    </div>
    <div id="text_div_3">
      <h3>구매 내역 <span class="xi-credit-card"></span> </h3>
    </div>
    <div id="purchase_history">
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
