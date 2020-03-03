function get_section(val){
  var section_array;
  console.log(val);
  if(val==="선택 없음"){
    return;
  }
  $.ajax({
    url: 'new_recruitment_form.php?category='+val+"&mode=get_section",
    type: 'GET',
    data: "",
    success: function(data){
      section_array = JSON.parse(data);
      set_section(section_array);
      console.log('1', section_array.length);
    }
  })
}

function set_section(section_array){
  var select=document.getElementById('select_section');
  select.innerHTML="";
  section_array.forEach(function(section){
    var option=document.createElement('option');
    console.log(section);
    // option 만들어서 value값으로 넣기
      // #select_section에 appendChild
    option.value=section;
    option.innerHTML=section;
    select.appendChild(option);
  });
}

$(document).ready(function() {
  var ckname = /^[가-힣]{2,5}$/;
  var ckphone = /^01(?:0|1|[6-9])-(?:\d{3}|\d{4})-\d{4}$/;
  var ckemail = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
  var ckhomepage=/^(((http(s?))\:\/\/)?)([0-9a-zA-Z\-]+\.)+[a-zA-Z]{2,6}(\:[0-9]+)?(\/\S*)?$/


  var name_msg=$('#name_msg'),
  phone_msg=$('#phone_msg'),
  email_msg=$('#email_msg'),
  homepage_msg=$('#homepage_msg');

  var name=$('#recruiter_name'),
  phone=$('#recruiter_phone'),
  email=$('#recruiter_email'),
  homepage=$('#recruiter_homepage');

  $("#recruiter_name").blur(function(event) {
    var name_value=name.val();
    if (!(ckname.test(name_value))){
      name_msg.show();
      return;
    }else{
      name_msg.hide();
      return;
    }
  });
  $("#recruiter_phone").blur(function(event) {
    var phone_value=phone.val();
    if (!(ckphone.test(phone_value))){
      phone_msg.show();
      return;
    }else{
      phone_msg.hide();
      return;
    }
  });
  $("#recruiter_email").blur(function(event) {
    var email_value=email.val();
    if (email_value==""){
      email_msg.hide();
      return;
    }else if(!(ckemail.test(email_value))){
      email_msg.show();
      return;
    }else{
      email_msg.hide();
      return;
    }
  });
  $("#recruiter_homepage").keyup(function(event) {
    var homepage_value=homepage.val();
    if (homepage_value==""){
      homepage_msg.hide();
      return;
    }else if(!(ckhomepage.test(homepage_value))){
      homepage_msg.show();
      return;
    }else{
      homepage_msg.hide();
      return;
    }
  });

    var temp =$('input:radio[name="rdo_pay"]:checked').val();
    console.log(temp);
    for(var i=0;i<$(".rdo_pay").length;i++){
      if($('input:radio[name="rdo_pay"]').is(':checked')){
          var check =$("#rdo_pay")[i].val();
      }
    }

    var type =$('input:radio[name="rdo_type"]:checked').val();
    console.log(type);





});
