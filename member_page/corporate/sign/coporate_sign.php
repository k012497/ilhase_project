<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_setting.php";
if(isset($_SESSION["userid"])){
  $userid=$_SESSION["userid"];
}else{
  $userid="";
}
if(isset($_SESSION["username"])){
  $username=$_SESSION["username"];
}else{
  $username="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
    <!-- font -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function(){
      var id_check=0,
          pass_check=0,
          email_check=0,
          b_license_num_check=0;
      var email_check_num="";
      $(document).keyup(function(){
        if($('#email_check_num').val()==""){
          $('#email_sub').html("<span style='color:red'></span>");
          email_check=0;
        }else if($('#email_check_num').val()== String(email_check_num)){
          $('#email_sub').html("<span style='color:red'>인증되었습니다.</span>");
          email_check=1;
        }else if($('#email_check_num').val()==""){
          $('#email_sub').html("<span style='color:red'></span>");
          email_check=0;
        }else{
          $('#email_sub').html("<span style='color:red'>번호가 틀렸습니다..</span>");
          email_check=0;
        }
      });
      $('#email_check').click(function(){
        var emailValue=$('#email').val();
        $.ajax({
          url: './PHPMailer-master/PHPMailer_Test.php',
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
          url: 'b_license_num_check.php',
          type: 'POST',
          data: {"b_license_num":b_license_num_value},
          success: function(data){
            console.log(data);
            b_license_num_value_result=data;
            if(b_license_num_value_result==b_license_num_value){
              $("#b_license_num_h4").html("<span style='color:#777'>인증되었습니다.</span>");
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
      $('#pass_1').keyup(function(){
        var regex = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{6,15}$/;
        var pass_1=$('#pass_1').val(),
            pass_2=$('#pass_2').val();
        if(pass_1==""&&pass_2==""){
          $('#pass_sub').html("<span style='color:red'>비밀번호를 입력해주세요.</span>");
          pass_check=0;
        }else if(!regex.test(pass_1)){
          $('#pass_sub').html("<span style='color:red'>영어, 숫자, 특수문자를 포함한 6-15글자만 가능합니다.</span>");
          $('.slick-next').attr('disabled', true);
        }else if(pass_1==pass_2){
          $('#pass_sub').html("<span style='color:red'>비밀번호가 일치합니다.</span>");
          pass_check=1;
        }else{
          $('#pass_sub').html("");
          pass_check=0;
        }
      });

      $('#ceo').keyup(function(){
        var ceo=$('#ceo').val();
        var ckname = /^[가-힣]{2,5}$/;
        if(ceo === ""){
          $('#id_h5_1').html("<span style='color:red'>이름을 입력해주세요</span>");
        }else if(!ckname.test(ceo)){
          $('#id_h5_1').html("<span style='color:red'>한글 2-5자만 가능합니다</span>");
          id_check=0;
        }else{
          $('#id_h5_1').html("");
        }
      });

      $('#id').keyup(function(){
        var idValue=$('#id').val();
        var exp = /^[a-zA-Z0-9]{6,12}$/;
        if(idValue === ""){
          $('#id_h5').html("<span style='color:red'>아이디를 입력해주세요</span>");
          id_check=0;
        }else if(!exp.test(idValue)){
          $('#id_h5').html("<span style='color:red'>영어, 숫자 6-12자만 가능합니다.</span>");
          id_check=0;
        }else{
          $.ajax({
            url: 'member_check_id.php',
            type: 'POST',
            data: {"inputId":idValue},
            success: function(data){
              console.log(data);
              if(data==0){
                $("#id_h5").html("<span style='color:red'>사용 가능한 아이디입니다.</span>");
                id_check=1;
              }else{
                $("#id_h5").html("<span style='color:red'>사용중인 아이디입니다.</span>");
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

      $('#corporate_insert_button').click(function(){
        $("#jc option:selected").val();
        if(id_check==0){
          alert("아이디를 확인해주세요");
          return false;
        }else if(pass_check==0){
          alert("비밀번호를 확인해주세요");
          return false;
        }else if(b_license_num_check==0){
          alert("사업자 번호를 확인해주세요");
          return false;
        }else if(email_check==0){
          alert("이메일을 확인해주세요");
          return false;
        }else if($('#b_name').val()==""){
          alert("회사명을 확인해주세요");
          return false;
        }else if($("#jc option:selected").val()==$("#jc option:first").val()){
          alert("업종을 확인해주세요");
          return false;
        }else if($('#ceo').val()==""){
          alert("대표자명을 확인해주세요");
          return false;
        }else if($('#address').val()==""){
          alert("주소를 확인해주세요");
          return false;
        }else{
          document.coperate_insert_submit.submit();
        }
      });
    });
    </script>
    <title>일하세</title>
</head>
  <body>
    <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <div style="width:800px; margin: 5rem auto;">

    <div class="container">
      <h4>기업 회원 가입</h4>
      <br /><br />
      <table class="table table-sm">
      <tbody>
                <tr>
                    <td>
                        <form
                            name="coperate_update_submit"
                            action="corperate_insert.php"
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
                                <input type="button" class="form-control" value="조회" id="b_license_num_button">
                                <h4 id="b_license_num_h4"></h4>
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
                          <input type="button" class="form-control" value="회원 가입"
                          id="corporate_insert_button">
                        </td>
                        </tr>
                    </form>
                </tbody>
      </table>
    </div>
  </div>

  <!-- footer -->
  <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/footer.php";?>

  <style>
      .content-right {
        width: 700px;
        display: inline-block;
      }
      .table {
        width: 750px;
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
  </body>
</html>
