<?php
    session_start();

    if(isset($_SESSION['userid'])){
        $user_id = $_SESSION['userid'];
        $user_name = $_SESSION['username'];
    } else {
        echo "<script>
                alert('로그인 후 이용하실 수 있습니다.');
                history.go(-1);
            </script>";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <title>1:1 문의</title>
</head>
<body>
    <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>

    <div class="container">
        <h3 class="title">1:1 문의</h3>
            <div class="send_question">
                <!-- 일하세 메세지 -->
                <div style="margin-bottom: 1rem;">
                    <div id="top_description">
                        <span>불편한 점이 있으신가요?</span><br />
                        <span>문의하실 내용을 보내주시면 검토 후 답변드리겠습니다.</span>
                    </div>
                    <div class="profile">
                        <img src="https://image.flaticon.com/icons/svg/42/42877.svg" alt="administrator" srcset=""><br />
                        <span>일하세</span>
                    </div>
                </div>
                <!-- 사용자 메세지 -->
                <div>
                    <div class="profile">
                        <img src="https://image.flaticon.com/icons/svg/42/42877.svg" alt="user" srcset=""><br />
                        <span><?=$user_name?></span>
                    </div>
                    <form action="dml_qna.php?mode=q_insert" method="post">
                        <input type="hidden" name="user_id" value="<?=$user_id?>">
                        <input type="hidden" name="user_name" value="<?=$user_name?>">
                        <textarea name="content" cols="30" rows="10" placeholder="이곳에 문의할 내용을 입력하신 후, 전송하기 버튼을 눌러주세요."></textarea>
                        <input type="submit" value="전송하기"></button>
                    </form>
                </div>
            </div>

        <h3 class="title past_qna">지난 문의 내역</h3>
        <div class="past_qna">
            <!-- 동적으로 추가 -->
            
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // $.ajax({
            //     type: "post",
            //     url: "url",
            //     data: "data",
            //     dataType: "dataType",
            //     success: function (response) {
                    
            //     }
            // });
            $.post('dml_qna.php?mode=select_by_user', { user_id : '<?=$user_id?>' }, function(data){
                console.log(data, 'test');
                if(data){
                    $('div.past_qna').append(data);
                } else {
                    $('div.past_qna').append('<p style="text-align: center; color: gray;"> 📄 문의 내역이 없습니다.</p>');
                }
            });
        });
    </script>
    <link rel="stylesheet" href="./css/qna.css">
</body>
</html>