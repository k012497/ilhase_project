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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <style media="screen">

      .container .title {
        margin: 3rem 0;
      }

      #manage_plan {
        position: relative;
        top: 20px;
        width: 700px;
        display: inline-block;
      }

      .plan_item {
        border: 1px solid lightgray;
        height: 230px;
        margin: 0.5rem;
        border-radius: 15px;
      }

      .col-sm-5 {
        padding: 0;
      }

      .plan_item label {
        padding: 2rem;
        width: 100%;
        height: 100%;
        margin: 0;
        cursor: pointer;
      }

      .plan_item img {
        margin-bottom: 0.2rem;
      }

      .plan_item input[type="radio"] {
        display: none;
      }

      .plan_item p {
        margin-bottom: 1rem;
      }

      #plan_list {
        text-align: center;
      }

      .plan_name {
        font-size: larger;
        font-weight: 600;
      }

      .plan_count {
        font-weight: 500;
      }

      .check_mark {
        position: relative;
        float: right;
        right: -2.5rem;
        z-index: 1;
        top: -250px;
        display: none;
      }

      span.plan_name {
        border: 1px solid #777;
        border-radius: 15px 0px 0px 15px;
        /* width: 200px; */
        text-align: center;
        /* height: 70px; */
        padding: 0.5rem;
      }

      span.plan_count {
        border: 1px solid #777;
        border-radius: 0px 15px 15px 0px;
        /* width: 200px;  */
        text-align: center;
        /* height: 70px; */
        padding: 0.5rem;
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

        function select_plan(label){
          const radio_array = document.querySelectorAll('input[type="radio"]');
          radio_array.forEach(function(radio){
            radio.nextElementSibling.nextElementSibling.style.display = "none";
          });

          const check_sign = label.nextElementSibling;
          const radio = label.control;
          console.log(radio, check_sign);
          console.log(radio.checked);

          check_sign.style.display = "inline";

        }
    </script>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <div class="container">
      <div id="div_left_menu">
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/member_page/common/member_side_menu.php";?>
      </div>
      <div id="manage_plan">
        <!-- 플랜 구매 -->
        <h3 class="subtitle">📌 구인 플랜 구매</h3>
        <form class="row justify-content-center" id="plan_list"
        action="purchase_form.php">
        <input type="hidden" name="id" value="<?=$_SESSION['userid']?>">
          <?php
            // echo "<div class='btn-group btn-group-toggle text-center' data-toggle='buttons'>";
            for ($i=0; $i < $numrow; $i++) {
              if($i==0){
                $sec="checked";
              }else{
                $sec="";
              }
                echo "
                <div class='col-sm-5 plan_item'>
                <input type='radio' autocomplete='off'
                ".$sec." name='recruit_plan' value='".$row[$i]['num']."' id='input_".$i."'/>
                <label for='input_".$i."' onclick='select_plan(this);'>
                  <p class='plan_name' id='span_".$i."'>".$row[$i]['name']."</p>
                  <img src='./img/file.png'>
                  <p class='plan_count'>공고 ".$row[$i]['count']." 개</p>
                  <p class='plan_price'>".$row[$i]['price']."원</p>
                </label>
                <img class='check_mark' src='./img/tick.png'>
                </div>
                ";
              }
          ?>
          <input type="submit" class="btn btn-primary btn-block" id="purchase_plan" value="구매하기">
        </form>


        <!-- 이용중인 플랜 -->
    <h3 class="subtitle">이용중인 플랜</h3>
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
      <h3 class="subtitle">구매 내역 <span class="xi-credit-card"></span> </h3>
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

      </div><!-- manage plan -->
    </div><!-- container -->

    <style>
      .container .subtitle {
        font-size: 20px;
        font-weight: 600;
        margin-top: 5rem;
        margin-bottom: 2rem;
      }

      .container .title:first-child {
        margin-top: 0;
      }

      .btn-primary, input[type="submit"].btn-block {
        background-color: rgb(133, 198, 241);
        width: 130px;
        padding: 0.5rem;
        margin: 2rem auto;
        border: 0;
      }

      .btn-primary:hover {
        background-color: #5DB6DE;
      }

      #available_plan .col-sm-4 {
        height:70px;
        border-radius:15px;
      }
    </style>
    <script>
	  //nav active 활성화
	  document.querySelectorAll('.nav-item').forEach(function(data, idx){
          data.classList.remove('active');

          if(idx === 4){
            data.classList.add('active');
          }
        });

        // 사이드 메뉴 표시
        const current_menu = document.querySelectorAll('.side_menu_item')[2];
        current_menu.style.backgroundColor = 'rgb(133, 198, 241)';
		current_menu.style.color = 'white';
	</script>
  </body>
</html>
