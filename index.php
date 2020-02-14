<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_setting.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="./common/css/common.css">
    <title>일하세</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <!-- Jumbotron Header -->
    <div class="jumbotron">
      <div id="slide" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner"> <!-- 슬라이드 쇼 -->
          <div class="carousel-item active" > <!--가로-->
                <img class="d-block w-100" src="http://127.0.0.1/ilhase/img/mainbanner1.jpg" alt="First slide">
                <div class="caption_slide">
                    <a href="#" id="btn_go">구직공고 바로가기</a>
                </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://127.0.0.1/ilhase/img/mainbanner1.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://127.0.0.1/ilhase/img/mainbanner1.jpg" alt="Third slide">
          </div>
        </div>

        <!-- 왼쪽 오른쪽 화살표 버튼 -->
        <a class="carousel-control-prev" href="#slide" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span> <!-- <span>Previous</span> -->
        </a>
        <a class="carousel-control-next" href="#slide" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span> <!-- <span>Next</span> -->
        </a>
        <!-- / 화살표 버튼 끝 -->

        <!-- 인디케이터 -->
        <ul class="carousel-indicators">
          <li data-target="#slide" data-slide-to="0" class="active"></li> <!--0번부터시작-->
          <li data-target="#slide" data-slide-to="1"></li>
          <li data-target="#slide" data-slide-to="2"></li>
        </ul> <!-- 인디케이터 끝 -->
      </div>
    </div>
    <div class="container">
          <div class="search">
            <h2  class="title" id="search_title">빠른 검색</h2>
            <form id="searchJob_box" action="#" method="post">
                <input id="search_job" type="text" placeholder="검색">
                <input id="btn_searchJob" type="image" name="" src="http://127.0.0.1/ilhase/img/search.png" alt="searchJob">
            </form>
            <div id="pick_job">
                <ul>
                  <li><a href="#">#인기구직1</a></li>
                  <li><a href="#">#인기구직2</a></li>
                  <li><a href="#">#인기구직3</a></li>
                  <li><a href="#">#인기구직4</a></li>
                </ul>
            </div>
          </div>
          <div id="intro_wrap" class="floatnone">
            <h2 class="title">이렇게 이용해 보세요!</h2>
            <!--홈페이지 사용 설명-->
            <div id="intro_box" class="row">
              <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <img class="card-img-top" src="http://127.0.0.1/ilhase/img/introduce1.jpg" alt="사용설명서1">
                      <div class="card-body">
                              <h5 class="card-title">1. 일하세 사용법</h5>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing
                              elit. Explicabo magni sapiente, tempore debitis beatae culpa natus
                              architecto.</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <img class="card-img-top" src="http://127.0.0.1/ilhase/img/introduce2.jpg" alt="">
                          <div class="card-body">
                              <h5 class="card-title">2. 일하세 사용법</h5>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing
                              elit. Sapiente esse necessitatibus neque.</p>
                          </div>
                      </div>
                  </div>

              <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <img class="card-img-top" src="http://127.0.0.1/ilhase/img/introduce3.jpg" alt="">
                          <div class="card-body">
                              <h5 class="card-title">3. 일하세 사용법</h5>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing
                              elit. Explicabo magni sapiente, tempore debitis beatae culpa natus
                              architecto.</p>
                          </div>
                      </div>
                  </div>

              <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <img class="card-img-top" src="http://127.0.0.1/ilhase/img/introduce4.jpg" alt="">
                          <div class="card-body">
                              <h5 class="card-title">4. 일하세 사용법</h5>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing
                              elit. Explicabo magni sapiente, tempore debitis beatae culpa natus
                              architecto.</p>
                          </div>
                  </div>
              </div>
            </div>
          </div>
          <div id="recommend_box">
            <!-- 지역 기반 추천 공고 -->
            <h2 class="title">주변에서 이런 사람을 찾아요</h2>
            <div class="row text-center" id="recommend_inner">
                <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/recommend_based_on_location.php";?>
            </div>
          </div>

    </div>

    <!-- Footer -->
    <footer class="py-5" id="footer_box">
        <div class="container">
            <div id="footer_info">
              <h1 class="navbar-brand" id="footer_title">일하세</h1>
              <ul>
                <li><a href="#">서비스 소개</a></li>
                <li><a href="#">이용약관 및 정책</a></li>
                <li><a href="#">관리자 모드</a></li>
              </ul>
              <ul>
                <li>일하세(대표이사:김소진)</li>
                <li>서울특별시 성동구 도선동</li>
                <li>개인정보관리자 : 남채현</li>
                <li>통신판매번호 : 2020-서울성동-9999</li>
              </ul>
              <ul>
                <li>유료직업소개사업등록번호 : 제2020-12341234-20-5-01234호</li>
                <li>사업자등록번호 : F123-45-678</li>
                <li>서비스 및 기업 문의 : 02-123-4515</li>
              </ul>
            </div>
            <p class="m-0" id="copyrihgt">Copyright &copy; ilhase 2020</p>
        </div>
    </footer>

    <script>
    $('.carousel').carousel({
      interval: 5000
    })
    $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");

    </script>

</body>
</html>
