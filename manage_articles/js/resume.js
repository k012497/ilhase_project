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

    input_job.val();
    input_date.val();
    input_years.val();
  });

  $("#btn_license").click(function(event) {
    var license=input_license.val();
    var license_date=input_license_date.val();

    var temp =text_license.val();
      temp= temp.replace('\n\r','<br>');

    $("#text_license").val(temp + license +", " +license_date +" \n");

    input_license.val();
    input_license_date.val();
  });

  $("#btn_major").click(function(event) {
    var school=input_school.val();
    var graduation=input_graduation.val();
    var major=input_major.val();

    var temp =text_school.val();
      temp= temp.replace('\n\r','<br>');

    $("#text_school").val(temp + school +", " +graduation+", "+ major +" \n");

    input_school.val();
    input_graduation.val();
    input_major.val();
  });

  $("#btn_ok").click(function() {
    var form_data = $("#form_resume").serialize();
    form_data = form_data.replace(/%/g, '%25');
    console.log(form_data);
    $.ajax({
        cache : false,
        url : "resume.php",
        type : 'POST',
        data : form_data,
        success : function(data) {
            console.log(data);
        },
        error : function(xhr, status) {
            alert(xhr + " : " + status);
        }
    });
    alert("등록 되었습니다.");
    document.form_resume.submit();
  });








});
