<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

  if(isset($_GET['recruit_plan'])){
    $recruit_plan=$_GET['recruit_plan'];
  }
  if(isset($_GET['id'])){
    $id=$_GET['id'];
  }
  $sql="select * from recruit_plan where num='$recruit_plan'";
  $result_recruit_plan=mysqli_query($conn,$sql);
  $row_recruit_plan=mysqli_fetch_array($result_recruit_plan);
  $sql="select * from corporate where id='".$id."'";
  $result_corporate=mysqli_query($conn,$sql);
  $row_corporate=mysqli_fetch_array($result_corporate);

  $sql="select * from recruit_plan where num='".$recruit_plan."';";
  $result_purchase=mysqli_query($conn,$sql);
  $numrow_purchase = mysqli_num_rows($result_purchase);
  $row_purchase=mysqli_fetch_array($result_purchase);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>일하세</title>
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    </style>
    <style media="screen">
      .hid{
        display: none;
      }
    </style>
    <script type="text/javascript">
    $(function(){
      var num=0;
      $('#kakaopay').mouseup(function(){
        $('.hid').css('display','none');
      });
      $('#mutong').mouseup(function(){
        $('.hid').css('display','inline-table');

      });
      $('#plan_purchest_button').click(function(){
        var purchase_plan=$('input[name="purchase_method"]:checked').val();
        var p_typeValue=$("#pc option:selected").val()

        if(purchase_plan=="무통장"){
          if($("#pc option:selected").val()=="-입금계좌를 선택해 주세요-"){
            alert("입금계좌를 선택해 주세요");
            return;
          }

          $.ajax({
             url: "./purchase_insert.php",
             type: 'POST',
             data: {
                id : "<?php echo $id ?>",
                num : "<?php echo $row_recruit_plan['num'] ?>",
                name : "<?php echo $row_recruit_plan['name'] ?>",
                price : "<?php echo $row_recruit_plan['price'] ?>",
                p_type : p_typeValue
             }
           }).done(function(data){
             console.log(data);
           }).fail(function() {
             console.log("error");
           });
           alert('결제가 완료되었습니다.');
          location.href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/corporate/corporate_plan_manager.php"

        }else if(purchase_plan=="kakao"){
          location.href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/corporate/kakaopay.php?num="+"<?=$recruit_plan?>"
          +"&id=<?=$id?>";
        }
      });
    });
    </script>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <div class="container" style="margin-top:100px;">
      <table class="table table-sm">
          <tbody>
            <tr>
              <td colspan="2">
                <h4><span style="color:red">*</span>선택된 플랜</h4>
                <h4><?echo $row_purchase['name']?>, <?echo $row_purchase['price']?></h4>
              </td>
            </tr>
              <tr class="hid">
                  <td class="hid">
                      <form
                          name="coperate_update_submit"
                          action="corperate_update.php?id='<?php echo $row['id']; ?>'&jc='<?php echo $row['job_category'] ?>&b_license_num=<?php echo $row['b_license_num'] ?>'"
                          method="post">
                      </td>
                  </tr>
                  <tr>
                    <td colspan="2" class="hid">
                      <h5 id="purchase"></h5>
                    </td>
                  </tr>
                  <tr>
                      <td>
                          <h6><span style="color:red">*</span>무통장 입금</h6>
                          <input
                              type="radio"
                              class="form-control"
                              name="purchase_method"
                              value="무통장"
                              id="mutong"
                              style="ime-mode:disabled;">
                      </td>
                      <td>
                          <h6><span style="color:red">*</span>카카오페이</h6>
                          <input
                              type="radio"
                              class="form-control"
                              value="kakao"
                              name="purchase_method"
                              id="kakaopay"
                              style="ime-mode:disabled;">
                      </td>
                  </tr>
                  <tr class="hid">
                    <td colspan="2" class="hid">
                      <h5><span style="color:red">*</span>무통장 </h3>
                        <select class="form-control"name="pc" id="pc">
                        <option>-입금계좌를 선택해 주세요-</option>
                        <option>농협 123-10-1234567</option>
                        <option>신한 12-2424-23232</option>
                        <option>국민 13-123-1313-31</option>
                        <option>하나 123-10-1234567</option>
                        <option>우리 12-2424-23232</option>
                        <option>외환 13-123-1313-31</option>
                        <option>기업 123-10-1234567</option>
                        <option>신한 12-2424-23232</option>
                        <option>우체국 13-123-1313-31</option>
                        <option>수협 123-10-1234567</option>
                      </select>
                  </tr>
                      <tr>
                          <td colspan="2">
                              <input type="button" class="form-control" value="결제" id="plan_purchest_button">
                          </td>
                      </tr>
                  </form>
              </tbody>
          </table>
          <br><br><br>
          <h4 style="color:red">*주의 사항 : 무통장입금시 신청후 24시간이내에 입금을 하셔야지
          플랜을 구입이 완료됩니다.</h4>
    </div>
  </body>
</html>
