<?php
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
<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/common/css/common.css">

<aside>
  <h3 id="profile" class="title"><?=$_SESSION['username']?></h3>
  <div id="left_menu">
    <ul>
    <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/person/edit_info_form.php"><li class="side_menu_item">내 정보수정</li></a>
    <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/person/apply_history.php"><li class="side_menu_item">지원내역</li></a>
    <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/person/favorite.php"><li class="side_menu_item">관심공고</li></a>
    <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/common/notification.php"><li class="side_menu_item">알림</li></a>
    </ul>
  </div>
</aside>
