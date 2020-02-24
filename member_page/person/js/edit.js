$(document).ready(function() {
    var ckname = /^[가-힣]{2,5}$/;
    var ckpass1 = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{6,15}$/;
    var ckpass2 = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{6,15}$/;
    var ckphone = /^01\d{1}-\d{4}-\d{4}$/;
    var nameMsg=$("#nameMsg");
    var passSubMsg1=$("#passSubMsg1");
    var passSubMsg=$("#passSubMsg");
    var phoneMsg=$("#phoneMsg");


    var name = $('#input_name'),
    pass1 = $('#pass_1'),
    pass2 = $('#pass_2'),
    phone = $('#phone');
    // var phone1 = document.getElementById("zipcode").value;
    // var phone2 = document.getElementById("new_address").value;
    // var phone3 = document.getElementById("old_address").value;

    $("#input_name").blur(function(event) {
      var name_value=name.val();
      if (!(ckname.test(name_value))) {
        console.log(name_value, !(ckname.test(name_value)));
        nameMsg.show();
        return;
      }else{
        console.log(name_value, !(ckname.test(name_value)));
        nameMsg.hide();
        return;
      }
    });
    $("#pass_1").blur(function(event) {
      var pass_value=pass1.val();
      if (!(ckpass1.test(pass_value))){
        passSubMsg1.show();
        return;
      }else{
        passSubMsg1.hide();
        return;
      }
    });
    $("#pass_2").blur(function(event) {
      var pass_value2=pass2.val();
      if (!(pass_value2 === pass1.val())){
        console.log(pass_value2,!(pass_value2 === pass1));
        passSubMsg.show();
        return;
      }else{
        console.log(pass_value2,!(pass_value2 === pass1));
        passSubMsg.hide();
        return;
      }
    });
    $("#phone").blur(function(event) {
      var phone_value=phone.val();
      if (!(ckphone.test(phone_value))){
          console.log(phone_value,!(ckphone.test(phone_value)));
        phoneMsg.show();
        return;
      }else{
          console.log(phone_value,!(ckphone.test(phone_value)));
        phoneMsg.hide();
        return;
      }
    });

    $("#btn_edit").click(function() {
      var form_data = $("#form_edit").serialize();
      form_data = form_data.replace(/%/g, '%25');
      console.log(form_data);
      $.ajax({
          cache : false,
          url : "person_edit.php",
          type : 'POST',
          data : form_data,
          success : function(data) {
              console.log(data);
          },
          error : function(xhr, status) {
              alert(xhr + " : " + status);
          }
      });
      if(!($("#input_name").val())){
        alert("이름을 입력해주세요.");
        return;
      }
      if(!($("#pass_1").val())){
        alert("비밀번호를 입력해주세요.");
        return;
      }
      if(!($("#pass_2").val())){
        alert("비밀번호를 확인해주세요.");
        return;
      }
      if(!($("#phone").val())){
        alert("번호를 입력해주세요.");
        return;
      }
        alert("수정 되었습니다.");
        document.form_edit.submit();
  });

});
