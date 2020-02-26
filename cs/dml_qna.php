<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/db_connector.php";
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
    if(isset($_POST['user_id'])){
        $user_id = $_POST['user_id'];
    } else {
      $user_id = $_SESSION['userid'];
    }
    if(isset($_POST['user_name'])){
        $user_name = $_POST['user_name'];
    }
    switch($mode){
        case 'q_insert':
            // 질문 등록
            insert_question();
            break;

        case 'r_insert':
            // 답변 등록
            insert_response();
            break;

        case 'update':
            break;

        case 'delete':
            break;

        case 'insert':
            break;

        case 'select_by_user':
            select_by_user();
            break;
    }

    function insert_question(){
        global $conn, $user_id, $user_name;

        $subject = "1:1 문의합니다.";
        $content = filter_data($_POST["content"]);
        $q_content = mysqli_real_escape_string($conn, $content);
        $regist_date = date("Y-m-d (H:i)");
        $sql = "insert into qna values(null, 0, 0, 0, '$user_id', '$user_name', '$subject', '$q_content', 0, '$regist_date');";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            mysqli_error($conn);
        } else {
            // insert 성공 시 group_num 세팅
            $sql="SELECT max(num) from qna;"; // 방금 insert한 글의 num 가져오기
            $result = mysqli_query($conn, $sql);
            if (!$result) {
              die('insert_question error1: ' . mysqli_error($conn));
            }
            $row=mysqli_fetch_array($result);
            $max_num=$row['max(num)'];
            $sql="update qna set group_num= $max_num where num = $max_num;"; // 그 num을 group_num으로 세팅
            $result = mysqli_query($conn, $sql);
            if (!$result) {
              die('insert_question error2: ' . mysqli_error($conn));
            }

            echo "<script>
                alert('문의 메세지를 성공적으로 남겼습니다.');
                location.href = 'http://".$_SERVER['HTTP_HOST']."/ilhase/cs/qna.php';
            </script>";
        }
    }

    function select_by_user(){
        global $conn, $user_id;

        $sql = "select * from qna where group_num in (select group_num from qna where id = '$user_id');";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            die('select_by_user error: ' . mysqli_error($conn));
        }

        while($row = mysqli_fetch_array($result)){
            $num = $row['num'];
            $hit = $row['hit'];
            $content = str_replace(" ", "&nbsp;", $row['content']);
            $content = str_replace("\n", "<br>", $row['content']);

            if($row['depth'] === '0' ){
                // 질문글인 경우
                echo '
                    <div class="question_preview">
                        <a href="qna_view.php?num='.$num.'&hit='.$hit.'"><span class="message">'.$content.'</span></a>
                        <span class="date">'.$row['regist_date'].'</span>
                    </div>';
            } else {
                // 답변글인 경우
                echo '
                    <div class="answer_preview">
                        <span class="date">'.$row['regist_date'].'</span>
                        <span class="message">'.$content.'</span>
                    </div>';
            }
        }

    }

    function insert_response(){
      global $conn, $user_id;

      $short_content = substr($_POST["content"], 0, 8);

      $subject = filter_data($_POST["subject"]);
      $content = filter_data($_POST["content"]);

      $user_name = $_SESSION['username'];
      $num = filter_data($_GET["num"]);
      // $hit = filter_data($_POST["hit"]);
      $hit =0;
      $q_subject = mysqli_real_escape_string($conn, $subject);
      $q_content = mysqli_real_escape_string($conn, $content);
      $q_num = mysqli_real_escape_string($conn, $num);
      $regist_day=date("Y-m-d (H:i)");

      $sql="SELECT * from qna where num =$q_num;";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
      $row=mysqli_fetch_array($result);

      // 질문글 작성자
      $writer = $row['id'];

      //현재 그룹넘버값을 가져와서 저장한다.
      $group_num=(int)$row['group_num'];
      //현재 들여쓰기값을 가져와서 증가한후 저장한다.
      $depth=(int)$row['depth'] + 1;
      //현재 순서값을 가져와서 증가한후 저장한다.
      $order=(int)$row['order'] + 1;

      //현재 그룹넘버가 같은 모든 레코드를 찾아서 현재 $ord값보다 같거나 큰 레코드에 $ord 값을 1을 증가시켜 저장한다.
      $sql="UPDATE `qna` SET `order`=`order`+1 WHERE `group_num` = $group_num and `order` >= $order";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('UPDATE Error: ' . mysqli_error($conn));
      }

      $sql="INSERT INTO `qna` VALUES (null,
        $group_num, $depth, $order, '$user_id','$user_name','$q_subject','$q_content', $hit,'$regist_day');";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('INSERT Error: ' . mysqli_error($conn));
      }

      $sql="SELECT max(num) from qna;";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('SELECT Error: ' . mysqli_error($conn));
      }
      $row = mysqli_fetch_array($result);
      $max_num = $row['max(num)'];

      // 답변 등록 알림
      $noti_sql = "insert into notification values (null, '1:1문의 답변이 도착했습니다.', '문의하신 [$short_content...]에 대한 답변이 도착하였습니다.', now(), 0, '$writer');";
      $noti_result = mysqli_query($conn, $noti_sql);
      if(!$noti_result){
          echo mysqli_error($conn);
      }else {
          echo "<script>location.href='./qna_view.php?num=$max_num&hit=$hit';</script>";
      }


    }

?>
