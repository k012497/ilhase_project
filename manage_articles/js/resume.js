$(document).ready(function() {
  var input_job=$("#input_job");
  var input_date=$("#input_date");
  var input_years=$("#input_years");
  var input_license=$("#input_license");
  var input_license_date=$("#input_license_date");
  var input_school=$("#input_school");
  var input_graduation=$("#input_graduation");
  var input_major=$("#input_major");

  var text_job=$("#text_job");
  var text_license=$("#text_license");
  var text_school=$("#text_school");


  $("#btn_job").click(function(event) {
    var job=input_job.val();
    var date=input_date.val();
    var years=input_years.val();

    var temp =text_job.val();
      temp= temp.replace('\n\r','<br>');

    $("#text_job").val(temp + job +", " +date+", " +years+" \n");

    input_job.val("");
    input_date.val("");
    input_years.val("");
  });

  $("#btn_license").click(function(event) {
    var license=input_license.val();
    var license_date=input_license_date.val();

    var temp =text_license.val();
      temp= temp.replace('\n\r','<br>');

    $("#text_license").val(temp + license +", " +license_date +" \n");

    input_license.val("");
    input_license_date.val("");
  });

  $("#btn_major").click(function(event) {
    var school=input_school.val();
    var graduation=input_graduation.val();
    var major=input_major.val();

    var temp =text_school.val();
      temp= temp.replace('\n\r','<br>');

    $("#text_school").val(temp + school +", " +graduation+", "+ major +" \n");

    input_school.val("");
    input_graduation.val("");
    input_major.val("");
  });

  $("#btn_insert").click(function() {
    if($('#cover_letter').val() == "" || $('#input_title').val() == ""){
      alert('제목과 자기소개는 필수입니다.');
      return;
    } else {
      alert("등록 되었습니다.");
      document.form_resume.submit();
    }
  });

  $("#btn_update").click(function() {
    if($('#cover_letter').val() == "" || $('#input_title').val() == ""){
      alert('제목과 자기소개는 필수입니다.');
      return;
    } else {
      alert("수정 되었습니다.");
      document.form_resume.submit();
    }
  });

  $("#btn_cancel").click(function() {
     location.href="manage_recruitment_form.php";
  });








});
