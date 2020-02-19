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
  inputId.blur(function(){
    var idValue = inputId.val();
    var exp = /^[a-zA-Z0-9]{6,12}$/;
    if(idValue === ""){
      idSubMsg.html("<span style='color:red'>아이디입력요망</span>");
      $('.slick-next').attr('disabled', true);
    }else if(!exp.test(idValue)){
      idSubMsg.html("<span style='color:red'>형식안맞어/^[a-zA-Z0-9]{6,12}$/</span>");
      $('.slick-next').attr('disabled', true);
    }else{
      $.ajax({
        url: 'member_check_id.php',
        type: 'POST',
        data: {"inputId":idValue},
        success: function(data){
          console.log(data);
          if(data === "1"){
            idSubMsg.html("<span style='color:red'>중복된아이디 다시입력</span>");
            $('.slick-next').attr('disabled', true);
          }else if(data === "0"){
            idSubMsg.html("<span style='color:red'>사용가능한 아이디입니다.</span>");
            $('.slick-next').attr('disabled', false);
          }else{
            idSubMsg.html("<span style='color:red'>비상사태 정부는 정신차려라.</span>");
            $('.slick-next').attr('disabled', true);
          }
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
    }
  }); //inputId.blur end regex
  pass_1.blur(function(){
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
  pass_2.blur(function(){
    var pass_1_value= pass_1.val(),
        pass_2_value= pass_2.val();
        if(pass_1_value===pass_2_value){
            passSubMsg.html("<span style='color:red'>패스워드가 똑같아요 다음으로 가세요</span>");
            $('.slick-next').attr('disabled', false);
        }else{
          passSubMsg.html("<span style='color:red'>패스워드가 틀려요 ㅠㅠ</span>");
          $('.slick-next').attr('disabled', true);
        }
  });


  $('.slick-next').click(function(){
    count+=1;
    console.log(count);
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
    console.log(count);
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
  var button=$('#button');
  var phone_num="";
  var valueSub=$('#valueSub');
  button.click(function(){
    var phone_val=document.getElementById("phone").value;
    console.log(phone_val);
    $.ajax({
      url: 'moonja.php',
      type: 'POST',
      dataType : "text",
      data: {phone:phone_val}
    })
    .done(function(data) {
      console.log(data);
      phone_num=data;
      // alert(h_code);
      alert("문자인증 번호가 발송되었습니다.");
    })
    .fail(function() {
      alert("문자인증 번호 발송실패!");
      console.log("error");
    })
    .always(function() {
      console.log("complete");
   });

  }); //inputId.blur end regex
  $('#phone_num').blur(function(){
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
$("#name").blur(function(){
  if($("#name").val()===""){
    $('.name_space').html("<span style='color:red'>성함을 입력해주세요!</span>");
    $('.slick-next').attr('disabled', true);
  }else{
    $('.name_space').html("<span style='color:red'>다음으로 이동해주세요!</span>");
    $('.slick-next').attr('disabled', false);
  }
});
$("#phone_injung").blur(function(){
  if($("#phone_injung").val()==0){
    $('.slick-next').attr('disabled', true);
  }else{
    $('.slick-next').attr('disabled', false);
  }
});
$("#email").blur(function(){
  if($("#phone_injung").val()==""){
    $('#email_sub').html("<span style='color:red'>이메일을 입력해주세요!</span>");
    $('.slick-next').attr('disabled', true);
  }else{
    $('#email_sub').html("<span style='color:red'>다음으로 이동해주세요!</span>");
    $('.slick-next').attr('disabled', false);
  }
});
$("#birth").blur(function(){
  if($("#birth").val()==""&&$("#gender").val()==""){
    $('#birth_sub').html("<span style='color:red'>주민등록번호를 입력해주세요!</span>");
    $('.slick-next').attr('disabled', true);
  }else{
    $('#birth_sub').html("<span style='color:red'>다음으로 이동해주세요!</span>");
    $('.slick-next').attr('disabled', false);
  }
});
$('#sample4_postcode').blur(function(){
  if($("#sample4_postcode").val()==""){
    $('#adress_sub').html("<span style='color:red'>주민등록번호를 입력해주세요!</span>");
    $('.slick-next').attr('disabled', true);
  }else{
    $('#adress_sub').html("<span style='color:red'>다음으로 이동해주세요!</span>");
    $('.slick-next').attr('disabled', false);
  }
});
$('.visual').slick({
  draggable: false
});
