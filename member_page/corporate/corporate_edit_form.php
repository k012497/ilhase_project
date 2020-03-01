<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
// include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_setting.php";
if(isset($_SESSION['userid']))
  $id   = $_SESSION['userid'];
  $sql="select * from corporate where id='$id'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <title>일하세</title>
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function(){
      $('#id').val("<?php echo $row['id'] ?>");
      $('#b_name').val("<?php echo $row['b_name'] ?>");
      $('#jc').val("<?php echo $row['job_category'] ?>");
      $('#ceo').val("<?php echo $row['ceo'] ?>");
      $('#profile').val("<?php echo $row['ceo'] ?>");
      $('#b_license_num').val("<?php echo $row['b_license_num'] ?>");
      $('#email').val("<?php echo $row['email'] ?>");
      $('#address').val("<?php echo $row['address'] ?>");
      $('#id').attr('disabled', true);
      $('#b_license_num').attr('disabled', true);
      $('#jc').attr('disabled', true);
      var id_check=0,
          pass_check=0,
          email_check=0,
          b_license_num_check=0;
      var email_check_num="";
      $('#email_check_num').blur(function(){
        if($('#email_check_num').val()== String(email_check_num)){
          $('#email_sub').html("<span style='color:red'>인증되었습니다.</span>");
          email_check=1;
        }else{
          $('#email_sub').html("<span style='color:red'>번호가 틀렸습니다..</span>");
          email_check=0;
        }
      });
      $('#email_check').click(function(){
        var emailValue=$('#email').val();
        $.ajax({
          url: './sign/PHPMailer-master/PHPMailer_Test.php',
          type: 'POST',
          data: {"email":emailValue},
          success: function(data){
            console.log(data);
            email_check_num=data;
            $('#email_check_num').prop("type", "text");
          }
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
      });
      $('#b_license_num_button').click(function(){
        var b_license_num_value=$('#b_license_num').val();
        var b_license_num_value_result="";
        $.ajax({
          url: './sign/b_license_num_check.php',
          type: 'POST',
          data: {"b_license_num":b_license_num_value},
          success: function(data){
            console.log(data);
            b_license_num_value_result=data;
            if(b_license_num_value_result==b_license_num_value){
              $("#b_license_num_h4").html("<span style='color:red'>인증되었습니다.</span>");
              b_license_num_check=1;
            }else{
              $("#b_license_num_h4").html("<span style='color:red'>올바른 번호를 입력해주세요.</span>");
              b_license_num_check=0;
            }
          }
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
          $("#b_license_num_h4").html("<span style='color:red'>올바른 번호를 입력해주세요.</span>");
        })
        .always(function() {
          console.log("complete");
        });
      });
      $('#pass_2').blur(function(){
        var regex = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{6,15}$/;
        var pass_1=$('#pass_1').val(),
            pass_2=$('#pass_2').val();
        if(pass_1==""&&pass_2==""){
          $('#pass_sub').html("<span style='color:red'>비밀번호를 입력해주세요.</span>");
          pass_check=0;
        }else if(!regex.test(pass_1)){
          $('#pass_sub').html("<span style='color:red'>영어/숫자/특수문자 혼용 6-15글자만 허용됩니다.</span>");
          $('.slick-next').attr('disabled', true);
        }else if(pass_1==pass_2){
          $('#pass_sub').html("<span style='color:red'>비밀번호가 일치합니다.</span>");
          pass_check=1;
        }else{
          $('#pass_sub').html("<span style='color:red'>비밀번호가 불일치합니다.</span>");
          pass_check=0;
        }
      });
      $('#id').blur(function(){
        var idValue=$('#id').val();
        var exp = /^[a-zA-Z0-9]{6,12}$/;
        if(idValue === ""){
          $('#id_h5').html("<span style='color:red'>아이디를 입력해주세요</span>");
          id_check=0;
        }else if(!exp.test(idValue)){
          $('#id_h5').html("<span style='color:red'>형식안맞어/^[a-zA-Z0-9]{6,12}$/</span>");
          id_check=0;
        }else{
        $.ajax({
          url: './sign/member_check_id.php',
          type: 'POST',
          data: {"inputId":idValue},
          success: function(data){
            console.log(data);
            if(data==0){
              $("#id_h5").html("<span style='color:red'>사용가능한 아이디입니다.</span>");
              id_check=1;
            }else{
              $("#id_h5").html("<span style='color:red'>아이디가 중복됩니다.</span>");
              id_check=0;
            }
          }
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
          $("#id_h5").html("<span style='color:red'>올바른 아이디를 입력해주세요.</span>");
          id_check=0;
        })
        .always(function() {
          console.log("complete");
        });
      }
      });
      $('#corporate_update_button').click(function(){
        $("#jc option:selected").val();
         if(pass_check==0){
          alert("비밀번호를 확인해주세요");
          return false;
        }else if(email_check==0){
          alert("이메일를 확인해주세요");
          return false;
        }else if($('#b_name').val()==""){
          alert("회사명를 확인해주세요");
          return false;
        }else if($("#jc option:selected").val()==$("#jc option:first").val()){
          alert("업종  확인해주세요");
          return false;
        }else if($('#ceo').val()==""){
          alert("대표자 명를 확인해주세요");
          return false;
        }else if($('#address').val()==""){
          alert("주소를 확인해주세요");
          return false;
        }else{
          document.coperate_update_submit.submit();
        }
      });
    });
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
        <div class="content-right">
        <table class="table table-sm">
            <tbody>
                <tr>
                    <td>
                        <form
                            name="coperate_update_submit"
                            action="corperate_update.php?id='<?php echo $row['id']; ?>'&jc='<?php echo $row['job_category'] ?>&b_license_num=<?php echo $row['b_license_num'] ?>'"
                            method="post">

                            <h6><span style="color:red">*</span>아이디</h6>
                            <input type="text" class="form-control" placeholder="아이디를 입력해주세요" id="id" name="id">
                            <h6 id="id_h5"></h6>
                        </td>
                        <td>
                            <h6><span style="color:red">*</span>회사명</h6>
                            <input type="text" class="form-control" placeholder="회사명을 입력해주세요" name="b_name"
                                id="b_name"></td>
                    </tr>
                    <tr>
                        <td>
                            <h6><span style="color:red">*</span>비밀번호</h6>
                            <input
                                type="password"
                                class="form-control"
                                placeholder="비밀번호 입력해주세요"
                                id="pass_1"
                                style="ime-mode:disabled;"></td>
                        <td>
                            <h6><span style="color:red">*</span>비밀번호 확인</h6>
                            <input
                                type="password"
                                class="form-control"
                                placeholder="비밀번호를 다시 입력해주세요"
                                id="pass_2"
                                name="pass"
                                style="ime-mode:disabled;">
                            <h6 id="pass_sub"></h6>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h6><span style="color:red">*</span>업종</h6>
                            <select class="form-control" name="jc" id="jc">
                                <option>-업종을 선택해 주세요-</option>
                                <option>농업/임업/어업</option>
                                <option>제조업</option>
                                <option>보건/사회복지</option>
                                <option>전기/가스/수도</option>
                                <option>공공행정</option>
                                <option>숙박/음식점업</option>
                                <option>교육 서비스업</option>
                                <option>건설업</option>
                                <option>운수업</option>
                                <option>부동산/임대업</option>
                                <option>금융/보험업</option>
                                <option>보건/사회복지</option>
                                <option>공공행정</option>
                                <option>예술/스포츠/여가</option>
                                <option>여가하수/폐기물</option>
                                <option>출판/영상/방송</option>
                            </select>
                            <td>
                                <h6><span style="color:red">*</span>대표자 명</h6>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="대표자 명을 입력해주세요"
                                    name="ceo"
                                    id="ceo"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h6><span style="color:red">*</span>사업자 등록번호</h6>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="사업자 등록번호를 입력해주세요"
                                    id="b_license_num"
                                    name="b_license_num">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h6><span style="color:red">*</span>대표주소</h6>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="대표주소를 입력해주세요"
                                    name="address"
                                    id="address">

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h6><span style="color:red">*</span>이메일</h6>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="자주쓰는 이메일 입력해주세요"
                                    id="email"
                                    name="email">
                                <input type="button" class="form-control" value="인증" id="email_check">
                                <input
                                    type="hidden"
                                    class="form-control"
                                    id="email_check_num">
                                <h6 id="email_sub">메일 입력 후 인증을 버튼을 눌러주세요</h6>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="button" class="form-control" value="수정" id="corporate_update_button">
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
      </div>
    <!-- container -->
    <style>
      .content-right {
        width: 700px;
        display: inline-block;
      }
      .table {
        width: 750px;
        position: relative;
        top: 90px;
      }

      .table td {
        border: 0;
      }

      .table .form-control {
        border: 1px solid #aaa;
        border-radius: 5px;
      }

      .table h6 {
        margin-top: 0.7rem;
      }

      #email {
        width: 79%;
        margin-right: 0.2rem;
        display: inline-block;
      }

      #email_check {
        display: inline-block;
        width: 20%;
        margin: 0.5rem 0;
        border: 0;
        background-color: #777;
        color: white;
      }

      #corporate_update_button {
        margin-top: 3rem;
        background-color: rgb(133, 198, 241);
        border: 0;
        color: white;
      }

      #email_sub {
        color: #777;
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
        const current_menu = document.querySelectorAll('.side_menu_item')[0];
        current_menu.style.backgroundColor = 'rgb(133, 198, 241)';
		current_menu.style.color = 'white';
	</script>
  </body>
</html>
