<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../common/common.css">
    <link rel="stylesheet" href="./person.css">
  </head>
  <body>
    <form class="" action="index.html" method="post">
      <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
      </header>
    <div id="div_left_menu">
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/member_page/person/member_side_menu.php";?>
    </div>
    <div id="div_member">
      <div id="member_name">
        <label for="name"><strong>*</strong>이름</label> <input id="input_name" type="text" name="name" placeholder="이름">
        <div id="div_toggle" class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-secondary active">
              <input type="radio" name="member_type" value="person" id="option1" autocomplete="off" checked> 남
          </label>
          <label class="btn btn-secondary">
              <input type="radio" name="member_type" value="corporate" id="option2" autocomplete="off"> 여
          </label>
      </div>
      </div>
      <div id="member_birth">
        <label for="birth"><strong>*</strong>생년월일</label> <input type="text" name="birth" value="1992-12-12">
      </div>
      <div id="member_email">
        <label for="email"><strong>*</strong>이메일</label> <input type="email" name="email" placeholder="coals2020@Naver.com">
      </div>
      <div id="member_birth">
        <label for="phone"><strong>*</strong>핸드폰 번호</label> <input type="number" name="phone">
      </div>
      <div id="member_address">
          <label for="address"><strong>*</strong>주 소</label> <input type="text" name="address"> <input id="btn_address" type="button" name="btn_address" value="우편검색">
      </div>
      <div id="add_address">
        <input id="basic_address" type="text" name="basic_address" value="">
        <input id="detail_address" type="text" name="detail_address" value="">
      </div>
      <div id="div_button">
        <input type="button" name="btn_edit" value="수정하기">
      </div>
    </div>
  </body>
    </form>
</html>
