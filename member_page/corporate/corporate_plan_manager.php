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
    <style media="screen">

      .container .title {
        margin: 3rem 0;
      }

      #manage_plan {
        position: relative;
        top: 90px;
      }

      #manage_plan {
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
        font-style: italic;

      }

      .check_mark {
        position: relative;
        float: right;
        right: -2.5rem;
        z-index: 1;
        top: -250px;
        display: none;
      }

      th.plan_name {
        border-right: 2px solid #777;
        border-radius: 15px 0px 0px 15px; 
        width: 200px;
        text-align: center;
        height: 70px;
        padding: 0 1rem;
      }

      th.plan_count {
        border-radius: 0px 15px 15px 0px;
        width: 200px; 
        text-align: center;
        height: 70px;
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
        <h3 class="title">구인 플랜 구매</h3>
        <form class="row justify-content-center" id="plan_list">
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
        <h3 class="title">이용중인 플랜</h3>
        <div class="row" id="buy_plan">
          <?php
            for($i=0;$i<$numrow_purchase; $i++){
              echo "
              <div class='col-sm-4'style='height:70px;border-radius:15px;margin:5px;'>
                <table >
                  <tr>
                    <th class='plan_name'>
                    ".$row_purchase[$i]['plan_name']."</th>
                    <th class='plan_count'>
                    ".$row_purchase[$i]['available_count']."회
                    </th>
                  </tr>
                </table>
              </div>
              ";
            }
          ?>
        </div>

      

      </div><!-- manage plan -->
    </div><!-- container -->

    <style>
      .container .title {
        margin-top: 5rem;
        margin-bottom: 1rem;
      }

      .container .title:first-child {
        margin-top: 0;
      }

      .btn-primary, input[type="submit"].btn-block {
        background-color: rgb(133, 198, 241);
        width: 130px;
        padding: 0.5rem;
        margin: 1rem auto;
        border: 0;
      }

      .btn-primary:hover {
        background-color: #5DB6DE;
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
