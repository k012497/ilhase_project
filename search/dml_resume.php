<?php
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
    // $mode=$_GET['mode'];
    $user_id=$_POST['user_id'];
        
    $find_resume_sql="select * from resume where m_id='$user_id'";

    $result=mysqli_query($conn,$find_resume_sql);

    $count=mysqli_num_rows($result);
    if($count===0){
            echo "<p id='none_message'>입력하신 기본 이력서가 없습니다.<br>기본 입력서를 작성해주세요!</p>
                <a href='http://".$_SERVER["HTTP_HOST"]."/ilhase/manage_articles/write_resume_form.php' id='go_resume'>기본이력서 작성하러 가기</a>
            ";
        exit;
    }else{
            for($i=0;$i<$count;$i++){
                $row=mysqli_fetch_array($result);
                $title=$row['title'];
                $num=$row['num'];
                
                    echo"<label class='select_resume'>
                        <input type='radio' name='resume' value='".$title.",".$num."' />
                        ".$title."</label>";
                
            }
    }

         
    // <input id='select_resume' type='hidden' name='num' value='".$num.">
        
  

    
    
    

    mysqli_close($conn);

?>