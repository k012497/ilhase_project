function get_unanswerd_questions(){
    $.get('../admin/dml_chart.php', {mode : 'questions_count'}, function(data){
        if(data != 0){
            $('.notification').show();
        } else {
          $('.notification').hide();
          console.log("get", data);
        }
      });
}