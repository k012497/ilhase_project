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
    <?php
        if($member_type=="person"){
     ?>
    <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/person/edit_info_form.php"><li class="side_menu_item">내 정보수정</li></a>
    <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/person/apply_history.php"><li class="side_menu_item">지원내역</li></a>
    <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/person/favorite.php"><li class="side_menu_item">관심공고</li></a>
    <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/common/notification.php"><li class="side_menu_item">알림</li></a>
    <?php
  }else{
     ?>
     <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/corporate/corporate_edit_form.php"><li class="side_menu_item">내 정보수정</li></a>
     <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/corporate/corporate_applicant_reading.php"><li class="side_menu_item">지원내역</li></a>
     <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/corporate/corporate_plan_manager.php"><li class="side_menu_item">관심공고</li></a>
     <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase\member_page\common\notification.php"><li class="side_menu_item">알림</li></a>
     <?php
   }
      ?>
    </ul>
  </div>
</aside>
