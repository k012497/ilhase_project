<?php
// $email=$_POST['email'];

$resume=$_POST['resume'];
$num=$_POST['num'];

$receiver_email=$_POST['receiver_email'];
$rv_email=preg_replace("/\s+/", "",$receiver_email);
$receiver_name=$_POST['receiver_name'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./PHPMailer/src/PHPMailer.php";
require "./PHPMailer/src/SMTP.php";
require "./PHPMailer/src/Exception.php";


include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";


// echo $receiver_email.$receiver_name;

$find_sql="select * from resume where num=$num and title='".$resume."'";
$result_resume=mysqli_query($conn,$find_sql);
$row=mysqli_fetch_array($result_resume);

$sender_name=$row['m_name'];
$sender_email=$row['m_email'];
$sender_address=$row['m_address'];
$sender_gender=$row['m_gender'];
$sender_birthday=$row['m_birthday'];
$sender_phone=$row['m_phone'];
$sender_contents=$row['cover_letter'];
$sender_career=$row['career'];
$sender_license=$row['license'];
$sender_education=$row['education'];
$sender_file_name=$row['file_name'];

if($sender_career===null){
    $sender_career="무";
}
if($sender_license===null){
    $sender_license="무";
}
if($sender_education===null){
    $sender_education="무";
}
if($sender_file_name===null){
    $sender_file_name="http://".$_SERVER["HTTP_HOST"]."/ilhase/common/img/user.png";
} 


mysqli_close($conn);



$mail = new PHPMailer(true);

try {

    // 서버세팅
    $mail ->SMTPDebug = 0;    // 디버깅 설정
    $mail -> isSMTP();               // SMTP 사용 설정

    $mail ->Host = "smtp.naver.com";                      // email 보낼때 사용할 서버를 지정
    $mail ->SMTPAuth = true;                                // SMTP 인증을 사용함
    $mail ->Username = "a980721a@naver.com";  // 메일 계정
    $mail ->Password = "ses303030";                   // 메일 비밀번호
    $mail ->SMTPSecure = "ssl";                             // SSL을 사용함
    $mail ->Port =465;                                        // email 보낼때 사용할 포트를 지정
    $mail ->CharSet = "utf-8";                                // 문자셋 인코딩

    // 보내는 메일
    $mail -> setFrom("a980721a@naver.com",$sender_name);

    // 받는 메일
    // $mail -> addAddress("애플ID@me.com", "receive01");
    $mail -> addAddress($rv_email,$receiver_name);

    // 첨부파일
    // $mail -> addAttachment("./kim.jpg");
    // $mail -> addAttachment("./anjihyn.jpg");
    // srand((double)microtime()*1000000); //난수값 초기화
    // $code=rand(100000,999999);
    // 메일 내용
    $mail -> isHTML(true);                                                         // HTML 태그 사용 여부
    $mail ->Subject = $sender_name."님 의 이력서입니다";                  // 메일 제목
    $mail ->Body = "

    <img id='img_upload' src='".$sender_file_name."' alt='camera'>
    <div>
      <h1><이력서></h1>
      <ul>
        <li><h4>이름 : ".$sender_name."</h4></li>
        <li>생년월일 : ".$sender_birthday.", 성별: ".$sender_gender."</li>
        <li>전화번호 :".$sender_phone."</li>
        <li>이메일 :".$sender_email."</li>
        <li>주소 : ".$sender_address."</li>
      </ul>
    </div>
    <div>
      <h2>간단하게 자기를 소개 해보세요!!</h2>
      <p> - ".$sender_contents."</p></br>
    </div> 
     <div>
        <h2>이전에 하셨던 일이 있나요 ?</h2>
        <p> -".$sender_career."</p></br>
     </div>
    <div>
        <h2>보유하신 자격증이 있나요?</h2>
        <p> -".$sender_license."</br>
      </div>
      <div>
        <h2>학력도 적어주세요!</h2>
        <p>".$sender_education."</p>
      </div>

    ";    // 메일 내용

    // 메일 전송
    $mail -> send();



    echo "<script>
                alert('담당자에게 메일을 보냈습니다!');
                history.go(-1);
    </script>";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error :", $mail ->ErrorInfo;
}
?>
