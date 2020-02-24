<?php
  include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/db_connector.php";
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
    if(isset($_POST['user_id'])){
        $user_id = $_POST['user_id'];
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

        $sql = "select * from qna where id = '$user_id';";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            die('select_by_user error: ' . mysqli_error($conn));
        }

        while($row = mysqli_fetch_array($result)){
            $content = str_replace(" ", "&nbsp;", $row['content']);
            $content = str_replace("\n", "<br>", $row['content']);

            if($row['depth'] === '0' ){
                // 질문글인 경우
                echo '
                    <div class="question_preview">
                        <span class="message">'.$content.'</span>
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

?>

