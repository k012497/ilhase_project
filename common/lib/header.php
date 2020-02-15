<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/index.php">일하세</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" id="nav_home" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/index.php">홈<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="nav_employment" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/search/search.php">채용</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="nav_resume" href="#">이력서</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="nav_customerService" href="#">고객센터</a>
        </li>
        <li>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" id="search_box" type="search" placeholder="검색" aria-label="Search">
                <input id="btn_submit" type="image" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/search.png" alt="Submit"/>
            </form>
        </li>
        <li class="nav_login" id="nav_user"><a href="#">로그인</a></li>
        <!-- <li class="nav-item dropdown" id="nav_user">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            홍길동
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">내 정보</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">지원 내역</a>
                <a class="dropdown-item" href="#">관심 공고</a>
                <a class="dropdown-item" href="#">알림</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">로그아웃</a>
            </div>
        </li> -->
    </ul>

  </div>
</nav>
