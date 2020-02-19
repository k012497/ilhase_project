<!-- js -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- css -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">

<!-- html -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/index.php">일하세</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/index.php">홈<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <?php
          $id="";
          $username="";
          $member_type="";

          if(isset($_SESSION['userid']))
            $id   = $_SESSION['userid'];

          if(isset($_SESSION['username']))
            $username=$_SESSION["username"];

          if(isset($_SESSION["usermember_type"]))
            $member_type=$_SESSION["usermember_type"];
            if($member_type=="person"){
           ?>
          <a class="nav-link" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/search/search.php">
            채용</a>
            <?php
          }else{
             ?>
             <a class="nav-link" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/search/search.php">
               지원자</a>
               <?php
             }
                ?>
        </li>
        <li class="nav-item">
          <?php
              if($member_type=="person"){
           ?>
           <a class="nav-link" href="#">이력서</a>
             <?php
           }else{
              ?>
              <a class="nav-link" href="#">공고</a>
                <?php
              }
                 ?>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          고객센터
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/cs/faq.php">자주 묻는 질문</a>
              <a class="dropdown-item" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/cs/notice.php">공지사항</a>
              <a class="dropdown-item" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/cs/qna.php">1:1 문의</a>
          </div>
        </li>
        <li>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" id="search_box" type="search" placeholder="검색" aria-label="Search">
                <input id="btn_submit" type="image" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/search.png" alt="Submit"/>
            </form>
        </li>
        <?php
          if($member_type==""){
         ?>
        <li class="nav_login" id="nav_user"><a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/member_page/login_form.php">로그인</a></li>
        <?php
      }else if($member_type=="person"){
         ?>
        <li class="nav-item dropdown" id="nav_user">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
              echo $username;
             ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">내 정보</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">지원 내역</a>
                <a class="dropdown-item" href="#">관심 공고</a>
                <a class="dropdown-item" href="#">알림</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/lib/logout.php">로그아웃</a>
            </div>
        </li>
        <?php
      }else{
         ?>
         <li class="nav-item dropdown" id="nav_user">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <?php
               echo $username;
              ?>
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="#">내 정보</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="#">지원자 열람</a>
                 <a class="dropdown-item" href="#">공고 플랜관리</a>
                 <a class="dropdown-item" href="#">알림</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/lib/logout.php">로그아웃</a>
             </div>
         </li>
         <?php
       }
          ?>
    </ul>

  </div>
</nav>
