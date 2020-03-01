<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_setting.php";
if(isset($_SESSION["userid"])){
  $userid=$_SESSION["userid"];
}else{
  $userid="";
}
if(isset($_SESSION["username"])){
  $username=$_SESSION["username"];
}else{
  $username="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <!-- font -->
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <link rel="stylesheet" href="./slider.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <style media="screen">
    .visual{right: 200px;;position:relative;width:1360px;}
    .visual button {position:absolute;z-index:10; top:50%;transform:translateY(-50%);
    width:71px;height:71px;border-radius: 100%;background:rgba(0,0,0,.5);
    border:none;}
    .visual button:before{font-family: 'xeicon';color:#fff;font-size: 45px;}
    .visual button.slick-prev {left:0; font-size:0;color:transparent;}
    .visual button.slick-prev:before{content:"\e93d";}
    .visual button.slick-next {right:0;font-size:0;color:transparent;}
    .visual button.slick-next:before{content:"\e940";}
    .input1 {margin-top:50px;margin-left: 230px; height: 80px;font-size: 24px;
    text-align:center;}
    .input2 {margin-top:20px;margin-left: 230px; height: 80px;font-size: 24px;
    text-align:center;}
    .div1 {margin-top:100px;margin-left: 230px; height: 80px;font-size: 24px;}
    .div1 h3{margin-left: 30px;}
    .div1 h1{margin-left: 0px;}
    .div2 {margin-top:40px;margin-left: 230px; height: 80px;font-size: 24px;}
    .div2 h3{margin-left: 70px;}
    .div2 h1{margin-left: -60px;}
     h4{margin-left: 250px;color:red;}
    </style>
    <title>일하세</title>
    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script src="../js/daumMap.js"></script>

    </script>
</head>
<body>
    <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header_plain.php";?>
    </header>
    <div style="height:550px">
    <div class="container">
      <!-- 메인 슬라이드 -->

      <div class="visual">
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3>1/8</h3>
            <h1>사용하실 아이디를 적어주세요</h1>
          </div>
          <input type="text" name="id" id="id" size="50" class="input1"  value="a9807221a"><br>
          <h4 id="idSubMsg">*공백없이 2~6글자만 가능합니다.</h4>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3>2/8</h3>
            <h1 >사용하실 비밀번호를 적어주세요</h1>
          </div>
          <input type="text" name="pass" id="pass_1" size="50" class="input1"  value="12"><br>
          <h4 id="passSubMsg1">*공백없이 6~15글자만 가능합니다.</h4>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3>2/8</h3>
            <h1 >사용하실 비밀번호를 다시 적어주세요</h1>
          </div>
          <input type="text" id="pass_2" size="50" class="input1"><br>
          <h4 id="passSubMsg">*똑같이 적어주세요.</h4>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3 id="h3_2">3/8</h3>
            <h1 id="h1_2">성함을 적어주세요</h1>
          </div>
          <input type="text" value="" size="50" class="input1" id="name" name="name"><br>
          <h4 id="h4_2" class="name_space">*공백없이 2~6글자만 가능합니다.</h4>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div2">
            <h3>4/8</h3>
            <h1>연락 가능한 번호를 적은 후, 인증 버튼을 눌러주세요.</h1>
          </div>
          <input type="text" value="" size="50" class="input2" name="phone" id="phone">
          <input type="button" value="인증" id="button_1" style="width:100px;height: 80px;font-size: 24px;
          text-align:center;"><br>
          <input type="text" value="" id="phone_num"size="50" class="input1"><br>
          <h3 id='valueSub' style="margin-left: 330px;"></h3>
        <input type="hidden" name="" id="phone_injung" value=0>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3>5/8</h3>
            <h1>자주 사용하시는 이메일을 적어주세요.</h1>
          </div>
          <input type="text" value="" size="50" class="input1" id="email" name="email"><br>
          <h4 id="email_sub"style="margin-left:330px;color:red;"></h4>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3>6/8</h3>
            <h1>주민번호 앞자리와 뒷자리 첫번째 자리수를 적어주세요</h1>
          </div>
          <input type="text" value="" size="20" class="input1" id="birth" name="birth"><span style="font-size:160px" >-</span>
          <input type="text" value="" size="1" style="height:80px;font-size:24px;" id="gender"name="gender"><span style="font-size:60px">******</span><br>
          <h4 id="birth_sub"style="margin-left:330px;color:red;"></h4>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3>7/8</h3>
            <h1>주소를 입력해주세요</h1>
          </div>
          <input type="text" id="sample4_postcode" placeholder="우편번호" size="30"style="margin-top:50px;margin-left: 430px; height: 80px;font-size: 24px;
          text-align:center;" name="postcode">
          <input type="button" onclick="sample4_execDaumPostcode()" value="우편번호 찾기" style="height: 80px;font-size: 24px;
          text-align:center;"><br>
          <input type="text" id="sample4_roadAddress" placeholder="도로명주소" size="30"style="margin-left: 430px;height: 80px;font-size: 24px;
          text-align:center;" name="roadAddress">
          <input type="text" id="sample4_jibunAddress" placeholder="지번주소" size="30"style="height: 80px;font-size: 24px;
          text-align:center;" name="jibunAddress">
          <span id="guide" style="color:#999;display:none"></span><br>
          <input type="text" id="sample4_detailAddress" placeholder="상세주소" size="30"style="margin-left: 430px;height: 80px;font-size: 24px;
          text-align:center;">
          <input type="text" id="sample4_extraAddress" placeholder="참고항목" size="30"style="height: 80px;font-size: 24px;
          text-align:center;">
          <h4 id="adress_sub"style="margin-left:330px;color:red;"></h4>
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
          <div class="div1">
            <h3>마지막 단계입니다.</h3>
            <h1>다음 이용약관을 확인해주세요</h1>
          </div>
          <textarea style="    overflow: hidden auto;
                               margin-top: 21px;
                               margin-bottom: 0px;
                               margin-left: 200px;
                               width: 700px;
                               height: 168px;"disabled>정보통신망법 규정에 따라 일하세버에 회원가입 신청하시는 분께 수집하는 개인정보의 항목, 개인정보의 수집 및 이용목적, 개인정보의 보유 및 이용기간을 안내 드리오니 자세히 읽은 후 동의하여 주시기 바랍니다.
1. 수집하는 개인정보
이용자는 회원가입을 하지 않아도 정보 검색, 뉴스 보기 등 대부분의 일하세 서비스를 회원과 동일하게 이용할 수 있습니다. 이용자가 메일, 캘린더, 카페, 블로그 등과 같이 개인화 혹은 회원제 서비스를 이용하기 위해 회원가입을 할 경우, 일하세는 서비스 이용을 위해 필요한 최소한의 개인정보를 수집합니다.

회원가입 시점에 일하세가 이용자로부터 수집하는 개인정보는 아래와 같습니다.
- 회원 가입 시에 ‘아이디, 비밀번호, 이름, 생년월일, 성별, 휴대전화번호’를 필수항목으로 수집합니다. 만약 이용자가 입력하는 생년월일이 만14세 미만 아동일 경우에는 법정대리인 정보(법정대리인의 이름, 생년월일, 성별, 중복가입확인정보(DI), 휴대전화번호)를 추가로 수집합니다. 그리고 선택항목으로 이메일 주소, 프로필 정보를 수집합니다.
- 단체아이디로 회원가입 시 단체아이디, 비밀번호, 단체이름, 이메일주소, 휴대전화번호를 필수항목으로 수집합니다. 그리고 단체 대표자명을 선택항목으로 수집합니다.
서비스 이용 과정에서 이용자로부터 수집하는 개인정보는 아래와 같습니다.
NAVER 내의 개별 서비스 이용, 이벤트 응모 및 경품 신청 과정에서 해당 서비스의 이용자에 한해 추가 개인정보 수집이 발생할 수 있습니다. 추가로 개인정보를 수집할 경우에는 해당 개인정보 수집 시점에서 이용자에게 ‘수집하는 개인정보 항목, 개인정보의 수집 및 이용목적, 개인정보의 보관기간’에 대해 안내 드리고 동의를 받습니다.

서비스 이용 과정에서 IP 주소, 쿠키, 서비스 이용 기록, 기기정보, 위치정보가 생성되어 수집될 수 있습니다. 또한 이미지 및 음성을 이용한 검색 서비스 등에서 이미지나 음성이 수집될 수 있습니다.
구체적으로 1) 서비스 이용 과정에서 이용자에 관한 정보를 자동화된 방법으로 생성하여 이를 저장(수집)하거나,
2) 이용자 기기의 고유한 정보를 원래의 값을 확인하지 못 하도록 안전하게 변환하여 수집합니다. 서비스 이용 과정에서 위치정보가 수집될 수 있으며,
일하세에서 제공하는 위치기반 서비스에 대해서는 '일하세 위치정보 이용약관'에서 자세하게 규정하고 있습니다.
이와 같이 수집된 정보는 개인정보와의 연계 여부 등에 따라 개인정보에 해당할 수 있고, 개인정보에 해당하지 않을 수도 있습니다.

2. 수집한 개인정보의 이용
일하세 및 일하세 관련 제반 서비스(모바일 웹/앱 포함)의 회원관리, 서비스 개발・제공 및 향상, 안전한 인터넷 이용환경 구축 등 아래의 목적으로만 개인정보를 이용합니다.

- 회원 가입 의사의 확인, 연령 확인 및 법정대리인 동의 진행, 이용자 및 법정대리인의 본인 확인, 이용자 식별, 회원탈퇴 의사의 확인 등 회원관리를 위하여 개인정보를 이용합니다.
- 콘텐츠 등 기존 서비스 제공(광고 포함)에 더하여, 인구통계학적 분석, 서비스 방문 및 이용기록의 분석, 개인정보 및 관심에 기반한 이용자간 관계의 형성, 지인 및 관심사 등에 기반한 맞춤형 서비스 제공 등 신규 서비스 요소의 발굴 및 기존 서비스 개선 등을 위하여 개인정보를 이용합니다.
- 법령 및 일하세 이용약관을 위반하는 회원에 대한 이용 제한 조치, 부정 이용 행위를 포함하여 서비스의 원활한 운영에 지장을 주는 행위에 대한 방지 및 제재, 계정도용 및 부정거래 방지, 약관 개정 등의 고지사항 전달, 분쟁조정을 위한 기록 보존, 민원처리 등 이용자 보호 및 서비스 운영을 위하여 개인정보를 이용합니다.
- 유료 서비스 제공에 따르는 본인인증, 구매 및 요금 결제, 상품 및 서비스의 배송을 위하여 개인정보를 이용합니다.
- 이벤트 정보 및 참여기회 제공, 광고성 정보 제공 등 마케팅 및 프로모션 목적으로 개인정보를 이용합니다.
- 서비스 이용기록과 접속 빈도 분석, 서비스 이용에 대한 통계, 서비스 분석 및 통계에 따른 맞춤 서비스 제공 및 광고 게재 등에 개인정보를 이용합니다.
- 보안, 프라이버시, 안전 측면에서 이용자가 안심하고 이용할 수 있는 서비스 이용환경 구축을 위해 개인정보를 이용합니다.
3. 개인정보의 파기
회사는 원칙적으로 이용자의 개인정보를 회원 탈퇴 시 지체없이 파기하고 있습니다.
단, 이용자에게 개인정보 보관기간에 대해 별도의 동의를 얻은 경우, 또는 법령에서 일정 기간 정보보관 의무를 부과하는 경우에는 해당 기간 동안 개인정보를 안전하게 보관합니다.

이용자에게 개인정보 보관기간에 대해 회원가입 시 또는 서비스 가입 시 동의를 얻은 경우는 아래와 같습니다.
부정가입 및 징계기록 등의 부정이용기록은 부정 가입 및 이용 방지를 위하여 수집 시점으로부터 6개월간 보관하고 파기하고 있습니다. 부정이용기록 내 개인정보는 가입인증 휴대폰 번호(만 14세 미만 회원의 경우 법정대리인 DI)가 있습니다.
부정이용으로 징계를 받기 전에 회원 가입 및 탈퇴를 반복하며 서비스를 부정 이용하는 사례를 막기 위해 탈퇴한 이용자의 휴대전화번호를 복호화가 불가능한 일방향 암호화(해시 처리)하여 6개월간 보관합니다. QR코드 서비스에서 연락처를 등록한 이후 QR코드 삭제 시, 복구 요청 대응을 위해 삭제 시점으로 부터 6개월 보관합니다. 스마트 플레이스 서비스에서 휴대전화번호를 등록한 경우 분쟁 조정 및 고객문의 등을 목적으로 업체 등록/수정 요청시, 또는 등록 이후 업체 삭제 요청 시로부터 최대 1년간 보관 할 수 있습니다.

전자상거래 등에서의 소비자 보호에 관한 법률, 전자금융거래법, 통신비밀보호법 등 법령에서 일정기간 정보의 보관을 규정하는 경우는 아래와 같습니다. 일하세는 이 기간 동안 법령의 규정에 따라 개인정보를 보관하며, 본 정보를 다른 목적으로는 절대 이용하지 않습니다.
- 전자상거래 등에서 소비자 보호에 관한 법률
계약 또는 청약철회 등에 관한 기록: 5년 보관
대금결제 및 재화 등의 공급에 관한 기록: 5년 보관
소비자의 불만 또는 분쟁처리에 관한 기록: 3년 보관
- 전자금융거래법
전자금융에 관한 기록: 5년 보관
- 통신비밀보호법
로그인 기록: 3개월
회원탈퇴, 서비스 종료, 이용자에게 동의받은 개인정보 보유기간의 도래와 같이 개인정보의 수집 및 이용목적이 달성된 개인정보는 재생이 불가능한 방법으로 파기하고 있습니다. 법령에서 보존의무를 부과한 정보에 대해서도 해당 기간 경과 후 지체없이 재생이 불가능한 방법으로 파기합니다.

전자적 파일 형태의 경우 복구 및 재생이 되지 않도록 기술적인 방법을 이용하여 안전하게 삭제하며, 출력물 등은 분쇄하거나 소각하는 방식 등으로 파기합니다.

참고로 일하세는 ‘개인정보 유효기간제’에 따라 1년간 서비스를 이용하지 않은 회원의 개인정보를 별도로 분리 보관하여 관리하고 있습니다.
          </textarea>
          <br>
          <input type="button" name="" id="submit_1" value="등록"
          style="    margin-top: 1px;
                     margin-left: 377px;
                     width: 300px;">
          <br>
        </div>
        <div class=""><img src="../img/slide-3.jpg" alt="">
        </div>
        <div class="" style="background-image:url('../img/white.jpg');">
        </div>
      </div>
    <form name="insert_person" action="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/lib/person_insert.php" method="post">
      <input type="hidden" name="id1" id="i1">
      <input type="hidden" name="pass" id="i2">
      <input type="hidden" name="name" id="i3">
      <input type="hidden" name="phone" id="i4">
      <input type="hidden" name="birth" id="i5">
      <input type="hidden" name="gender" id="i6">
      <input type="hidden" name="postcode" id="i7">
      <input type="hidden" name="roadAddress" id="i8">
      <input type="hidden" name="jibunAddress" id="i9">
      <input type="hidden" name="email" id="i10">
    </form>
      <?php
        include $_SERVER["DOCUMENT_ROOT"]."/ilhase/member_page/person/sign/slider.php";
      ?>
<!-- 메인 슬라이드 End -->

    </div>
    </div>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; ilhase 2020</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</body>
</html>
