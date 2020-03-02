<script>
$(function () {
  var count=0;
  var inputId = $("#id"),
  idSubMsg = $("#idSubMsg"),
  passSubMsg1 = $("#passSubMsg1"),
  passSubMsg = $("#passSubMsg");
  var pass_1=$("#pass_1"),
      pass_2=$("#pass_2");

  $('.slick-prev').css('visibility','hidden');
  $('.slick-next').attr('disabled', true);
  $('#sample4_postcode').attr('disabled', true);
  $('#sample4_roadAddress').attr('disabled', true);
  $('#sample4_jibunAddress').attr('disabled', true);
  $("#id").keyup(function(){
    var idValue = inputId.val();
    var exp = /^[a-zA-Z0-9]{6,12}$/;
    if(idValue === ""){
      idSubMsg.html("<span style='color:red'>아이디입력요망</span>");
      $('.slick-next').attr('disabled', true);
    }else if(!exp.test(idValue)){
      idSubMsg.html("<span style='color:red'>특수문자없이 영어와 숫자를포함하여 6~12글자만 사용해주세요</span>");
      $('.slick-next').attr('disabled', true);
    }else{
      $.ajax({
        url: 'http://'+'<?=$_SERVER['HTTP_HOST']?>'+'/ilhase/common/lib/member_check_id.php',
        type: 'POST',
        data: {"inputId":idValue},
        success: function(data){
          if(data === "1"){
            idSubMsg.html("<span style='color:red'>중복된아이디 다시입력</span>");
            $('.slick-next').attr('disabled', true);
          }else if(data === "0"){
            idSubMsg.html("<span style='color:red'>사용가능한 아이디입니다.</span>");
            $('.slick-next').attr('disabled', false);
          }else{
            idSubMsg.html("<span style='color:red'>에러 발생.</span>");
            $('.slick-next').attr('disabled', true);
          }
        }
      })
      .done(function() {
      })
      .fail(function() {
      })
      .always(function() {
      });
    }
  }); //inputId.blur end regex
$("#pass_1").keyup(function(){
    var regex = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{6,15}$/;

    if(pass_1.val() === ""){
      passSubMsg1.html("<span style='color:red'>비밀번호 입력바람니다.</span>");
      $('.slick-next').attr('disabled', true);
    }else if(!regex.test(pass_1.val())){
      passSubMsg1.html("<span style='color:red'>영어 숫자 특수문자를 포함한 6글자 이상 15글자 이하로 써주시길 바람니다.</span>");
      $('.slick-next').attr('disabled', true);
    }else{
      passSubMsg1.html("<span style='color:red'>알맞은 비밀번호입니다.</span>");
      $('.slick-next').attr('disabled', false);
    }
  });
$("#pass_2").keyup(function(){
    var pass_1_value= pass_1.val();
    var pass_2_value= pass_2.val();
        if(pass_1_value==pass_2_value){
            passSubMsg.html("<span style='color:red'>패스워드가 일치합니다 다음으로 가세요</span>");
            $('.slick-next').attr('disabled', false);
        }else{
          passSubMsg.html("<span style='color:red'>패스워드가 틀립니다.</span>");
          $('.slick-next').attr('disabled', true);
        }
  });


  $('.slick-next').click(function(){
    count+=1;
    $('.slick-next').attr('disabled', true);
    if(count==2){
      $('.slick-next').attr('disabled', true);
    }else{
      setTimeout(function() {
        $('.slick-next').attr('disabled', false);
      }, 1000);
    }
    if(count==8){
      $('.slick-next').css('visibility','hidden');
    }
      $('.slick-prev').css('visibility','visible');
  });
  $('.slick-prev').click(function(){
    count-=1;
    if(count===1){
      $('.slick-next').attr('disabled', false);
    }
    $('.slick-prev').attr('disabled', true);
    setTimeout(function() {
      $('.slick-prev').attr('disabled', false);
    }, 1000);
      $('.slick-next').css('visibility','visible');
      if(count==0){
        $('.slick-prev').css('visibility','hidden');
      }
  });
  $("#submit_1").click(function(){

    var user_id=$("#id").val();
    var user_pass=$("#pass_2").val();
    var user_name=$("#name").val();
    var user_phone=$("#phone").val();
    var user_email=$("#email").val();
    var user_birth=$("#birth").val();
    var user_gender=$("#gender").val();
    var user_zipcode=$("#sample4_postcode").val();
    var user_roadAddress=$("#sample4_roadAddress").val();
    var user_jibunAddress=$("#sample4_jibunAddress").val();

    document.getElementById("i1").value= user_id;
    document.getElementById("i2").value= user_pass;
    document.getElementById("i3").value= user_name;
    document.getElementById("i4").value= user_phone;
    document.getElementById("i5").value= user_birth;
    document.getElementById("i6").value= user_gender;
    document.getElementById("i7").value= user_zipcode;
    document.getElementById("i8").value= user_roadAddress;
    document.getElementById("i9").value= user_jibunAddress;
    document.getElementById("i10").value= user_email;

    document.insert_person.submit();
  });
  var button=$('#button_1');
  var phone_num="";
  var valueSub=$('#valueSub');
  button.click(function(){
    var phone_val=document.getElementById("phone").value;
    $.ajax({
      url: 'http://'+'<?=$_SERVER['HTTP_HOST']?>'+'/ilhase/member_page/person/sign/moonja.php',
      type: 'POST',
      dataType : "text",
      data: {phone:phone_val}
    })
    .done(function(data) {
      phone_num=data;
      // alert(h_code);
      alert("문자인증 번호가 발송되었습니다.");
    })
    .fail(function() {
      alert("문자인증 번호 발송실패!");
    })
    .always(function() {
   });

  }); //inputId.blur end regex
$('#phone_num').keyup(function(){
    if($('#phone_num').val()==phone_num){
      valueSub.html("<span style='color:red'>인증이 완료되었습니다.</span>")
      $("#phone_injung").val(1);
      $('.slick-next').attr('disabled', false);
    }else{
      valueSub.html("<span style='color:red'>인증이 실패다!</span>")
      $("#phone_injung").val(0);
      $('.slick-next').attr('disabled', true);
    }
  });
});
$("#name").keyup(function(){
  if($("#name").val()===""){
    $('.name_space').html("<span style='color:red'>성함을 입력해주세요!</span>");
    $('.slick-next').attr('disabled', true);
  }else{
    $('.name_space').html("<span style='color:red'>다음으로 이동해주세요!</span>");
    $('.slick-next').attr('disabled', false);
  }
});
$("#phone_num").keyup(function(){
  if($("#phone_injung").val()==0){
    $('.slick-next').attr('disabled', true);
  }else{
    $('.slick-next').attr('disabled', false);
  }
});
$("#email").keyup(function(){
  if($("#email").val()==""){
    $('#email_sub').html("<span style='color:red'>이메일을 입력해주세요!</span>");
    $('.slick-next').attr('disabled', true);
  }else{
    $('#email_sub').html("<span style='color:red'>다음으로 이동해주세요!</span>");
    $('.slick-next').attr('disabled', false);
  }
});
$("#birth").keyup(function(){
  if($("#birth").val()==""||$("#gender").val()==""){
    $('#birth_sub').html("<span style='color:red'>주민등록번호를 입력해주세요!</span>");
    $('.slick-next').attr('disabled', true);
  }else{
    $('#birth_sub').html("<span style='color:red'>다음으로 이동해주세요!</span>");
    $('.slick-next').attr('disabled', false);
  }
});
$("#sample4_postcode").keyup(function(){
  if($("#sample4_postcode").val()==""){
    $('#adress_sub').html("<span style='color:red'>주소를 입력해주세요!</span>");
    $('.slick-next').attr('disabled', true);
  }else{
    $('#adress_sub').html("<span style='color:red'>다음으로 이동해주세요!</span>");
    $('.slick-next').attr('disabled', false);
  }
});
$('.visual').slick({
  draggable: false
});
</script>
