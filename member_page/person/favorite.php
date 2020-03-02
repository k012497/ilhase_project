<?php
    session_start();

    if(isset($_SESSION['userid'])){
        $user_id = $_SESSION['userid'];
    } else {
        $user_id = "";
        echo "<script>
            alert('잘못된 접근!');
            history.go(-1);
        </scipt>";
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>일하세</title>
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/search/css/search.css">
    <link rel="stylesheet" href="./css/person.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <div class="container">
        <div id="div_left_menu">
          <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/member_page/common/member_side_menu.php";?>
        </div>
        <div id="div_apply">
            <tr>
            <div id="employment_data">
                <ul id="ep_databox">
            <?php
                include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";

                $sql = "select r.title, r.num, r.work_place, r.period_start, r.period_end, r.file_name from favorite f join recruitment r on f.recruit_id = r.num where f.member_id = '".$user_id."';";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_array($result)){
                    $num = $row['num'];
                    $title = $row['title'];
                    $work_place = $row['work_place'];
                    $period_start = $row['period_start'];
                    $period_end = $row['period_end'];
                    if($row['file_name']){
                        // 파일이 존재하는 경우
                        $real_file_name = $row['file_name'];
                        $src_path = 'http://'.$_SERVER['HTTP_HOST'].'/ilhase/search/img/'.$row['file_name'].''; // 경로 설정
                    } else {
                        // 기본 이미지 사용
                        $real_file_name = './img/basicimg.jpg';
                        $src_path = 'http://'.$_SERVER['HTTP_HOST'].'/ilhase/search/img/basicimg.jpg';
                    }

                    // <a href="http://'.$_SERVER['HTTP_HOST'].'ilhase/search/recruit_details.php?pick_job_num='.$num.'&img='.$real_file_name.'&title='.$title.'">
                    echo '<li>
                        <a href="../../search/recruit_details.php?pick_job_num='.$num.'&img='.$real_file_name.'&title='.$title.'">
                        <img src="'.$src_path.'" alt="회사이미지">
                        <div class="recruit_text_box">
                            <span id="ep_title">'.$title.'</span>
                            <span id="work_place">근무지 : '.$work_place.'</span>
                            <span id="ep_period">접수기간 : '.$period_start.' ~ '.$period_end.'</span>
                        </div>
                        </a>
                        <div id="interest_insert">
                            <span class="heart_img click_heart"></span>
                            <input type="hidden" name="pick_job" value="$num">
                        </div>
                    </li>';
                }
            ?>
            </ul>
        </div>
    </div>
    </div>
    <script>
        //nav active 활성화
        document.querySelectorAll('.nav-item').forEach(function(data, idx){
          data.classList.remove('active');

          if(idx === 4){
            data.classList.add('active');
          }
        });

        // 사이드 메뉴 표시
        const current_menu = document.querySelectorAll('.side_menu_item')[2];
        current_menu.style.backgroundColor = 'rgb(133, 198, 241)';
        current_menu.style.color = 'white';

        const id = '<?=$user_id?>';

        //관심공고 누를떄(하트누를떄)
        $(function () {
            $('#interest_insert p').click(function (e) {
                console.log("cliclick", e);
                var pick_job_num = $(this)
                    .nextAll('input[type=hidden]')
                    .val();
                if ($(this).next().hasClass('click_heart')) {
                    console.log('has class?');
                    favorite_job_remove(id, pick_job_num);
                    $(this)
                        .next()
                        .removeClass('click_heart');
                } else {
                    favorite_job_add(id, pick_job_num);
                    $(this)
                        .next()
                        .addClass('click_heart');
                }
            });
        });

        // 관심공고 등록
        function favorite_job_add(id,pick_job_num){
            $.ajax({
            url:'http://' + '<?=$_SERVER['HTTP_HOST']?>' + '/ilhase/search/dml_favorite.php?mode=add',
            type:'POST',
            data:{ "user_id" : id, "pick_job_num" : pick_job_num },
            success: function(data){
                    console.log(data);
                    alert('관심 공고에 등록되었습니다!');

            },
            error: function(request,status,error){
                console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
            });

            }

            // 관심공고 삭제
            function favorite_job_remove(id,pick_job_num){
            console.log('favorite_job_remove?');
            $.ajax({
            url:'http://' + '<?=$_SERVER['HTTP_HOST']?>' + '/ilhase/search/dml_favorite.php?mode=remove',
            type:'POST',
            data:{ "user_id" : id, "pick_job_num" : pick_job_num },
            success:function(){
                    console.log('success!');
                    alert('관심 공고에서 삭제되었습니다!');

            },
            error:function(request,status,error){
                console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
        });
        }
    </script>
    <style>
        .title {
            padding: 0;
        }

        #div_apply {
            display: inline-block;
            width: 77%;
        }

        #employment_data {
            display: inline;
        }

        #employment_data ul {
            grid-template-columns: repeat(3, 33.8%);
        }
    </style>
  </body>
</html>
