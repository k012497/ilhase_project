<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <title>일하세</title>
    <script type="text/javascript">
      $(function(){
        $('#option1_1').click(function(){
            $('#span_1').text("휴대폰 번호");
            $("#ph_1").attr( 'placeholder', '(-)을 포함한 휴대폰 번호' );
            $('input[name=member_type]').val("person");
        });
        $('#option1_2').click(function(){
            $('#span_1').text("이메일");
            $("#ph_1").attr( 'placeholder', '이메일을 써주세요' );
            $('input[name=member_type]').val("corporate");
        });
        $('#option2_1').click(function(){
            $('#span_2').text("휴대폰 번호");
            $("#ph_2").attr( 'placeholder', '(-)을 포함한 휴대폰 번호' );
            $('input[name=member_type1]').val("person");
        });
        $('#option2_2').click(function(){
            $('#span_2').text("이메일");
            $("#ph_2").attr( 'placeholder', '이메일을 써주세요' );
            $('input[name=member_type1]').val("corporate");
        });
        $('#id_check').click(function(){
          var obtion=$('input[name=member_type]').val();
          var name_1=$('#name_1').val();
          var ph_1=$('#ph_1').val();
          if(obtion=="person"){
            $.ajax({
              url: 'http://<?=$_SERVER['HTTP_HOST']?>/ilhase/member_page/find_id_pw_action.php',
              type: 'POST',
              data: {"name":name_1,
                     "ph":ph_1,
                     "mode":"person_id"
                    },
              success: function(data){
                alert(data+" 입니다.");
              }
            })
            .done(function() {
              console.log("success");
            })
            .fail(function() {
              console.log("error");
            });
        }else{
          $.ajax({
            url: 'http://localhost/ilhase/member_page/find_id_pw_action.php',
            type: 'POST',
            data: {"name":name_1,
                   "ph":ph_1,
                   "mode":"corporate_id"
                  },
            success: function(data){
              alert(data+" 입니다.");
            }
          })
          .done(function() {
            console.log("success");
          })
          .fail(function() {
            console.log("error");
          });
        }
      });
      $('#pw_check').click(function(){
        var obtion=$('input[name=member_type1]').val();
        var name_2=$('#name_2').val();
        var id=$('#id').val();
        var ph_2=$('#ph_2').val();
        if(obtion=="person"){
          $.ajax({
            url: 'http://localhost/ilhase/member_page/find_id_pw_action.php',
            type: 'POST',
            data: {"name":name_2,
                   "ph":ph_2,
                   "mode":"person_pw",
                   "id":id
                  },
            success: function(data){
              alert(data+" 입니다.");
            }
          })
          .done(function() {
            console.log("success");
          })
          .fail(function() {
            console.log("error");
          });
      }else{
        $.ajax({
          url: 'http://localhost/ilhase/member_page/find_id_pw_action.php',
          type: 'POST',
          data: {"name":name_2,
                 "ph":ph_2,
                 "mode":"corporate_pw",
                 "id":id
                },
          success: function(data){
            if(data!="찾으시는 정보가 없습니다.")
            alert(data+" 입니다.");
            else
            alert("찾으시는 정보가 없습니다.");
          }
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        });
      }
    });
    });
    </script>
</head>
<body>
    <?php
        include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";
    ?>

    <div class="container">

        <h3 class="title">아이디 찾기</h3>
        <form action="find_id_pw.php?mode=id" method="post">
            <div class="btn-group btn-group-toggle text-center" data-toggle="buttons">
                <label class="btn btn-secondary active" id="option1_1">
                    <input type="radio" name="member_type" value="person" id="option1" autocomplete="off" checked> 개인 회원
                </label>
                <label class="btn btn-secondary" id="option1_2">
                    <input type="radio" name="member_type" value="corporate" id="option2" autocomplete="off"> 기업 회원
                </label>
            </div><br/>
            <label for="id">이름</label><input id="name_1"type="text" name="name" required><br />
            <label for="pw"><span id="span_1">휴대폰 번호</span> </label><input type="text" id="ph_1"  name="phone" placeholder="(-)을 포함한 휴대폰 번호" required><br />
            <label></label><input id="id_check" type="button" value="찾기">
        </form>
        <hr />
        <h3 class="title">비밀번호 찾기</h3>
        <form action="find_id_pw.php?mode=pw" method="post">
            <div class="btn-group btn-group-toggle text-center" data-toggle="buttons">
                <label class="btn btn-secondary active" id="option2_1">
                    <input type="radio" name="member_type1" value="person" id="option3" autocomplete="off" checked> 개인 회원
                </label>
                <label class="btn btn-secondary" id="option2_2">
                    <input type="radio" name="member_type1" value="corporate" id="option4" autocomplete="off"> 기업 회원
                </label>
            </div><br/>
            <label for="id">아이디</label><input type="text" name="id" id="id" required><br />
            <label for="name">이름</label><input type="text" name="name" id="name_2" required><br />
            <label for="phone"><span id="span_2">휴대폰 번호</span></label><input type="tel" id="ph_2" name="phone" placeholder="(-)을 포함한 휴대폰 번호" required><br />
            <label></label><input type="button" id="pw_check" value="찾기">
        </form>
    </div>

    <?php
        include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/footer.php";
    ?>

    <style>

        .container form {
            min-height: 10rem;
            text-align: center;
        }

        .container button {
            width: 300px;
            padding: 0.5rem 1rem;
        }

        .container .title {
            margin: 3rem;
        }

        .container label {
            width: 100px;
        }

        .container input {
            width: 300px;
            height: 42px;
            margin-bottom: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            border: 1px solid #777;
            outline: 0;
        }

        .container input[type="submit"] {
            border: 0;
            background-color: gray;
            color: white;
        }

        .container {
            margin-bottom: 3rem;
        }

        .btn-group {
            margin-bottom: 0.5rem;
            width: 300px;
            margin-left: 100px;
        }

        .btn-group .btn-secondary {
            background-color: #ccc;
            width: 50%;
        }

        .btn-secondary:not(:disabled):not(.disabled).active {
            background-color: rgb(133, 198, 241);
        }

        .btn-group>.btn:not(:first-child), .btn-secondary:not(:disabled):not(.disabled).active,
        .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
            border: 0;
        }

        hr {
            margin-top: 3rem;
        }
    </style>
    <script>
        // nav-item 선택 제거
        document.querySelectorAll('.nav-item').forEach(function(data, idx){
          data.classList.remove('active');
        });
    </script>
</body>
</html>
