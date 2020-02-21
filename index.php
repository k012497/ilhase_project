<?php
session_start();
$id="";
$username="";
$member_type="";
include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_setting.php";
if(isset($_SESSION['userid']))
  $id   = $_SESSION['userid'];

if(isset($_SESSION['username']))
  $username=$_SESSION["username"];

if(isset($_SESSION["usermember_type"]))
  $member_type=$_SESSION["usermember_type"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>일하세</title>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>
<body>
    <header>
        <?php
        if($member_type=="admin"){
          include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header_admin.php";
        }else{
          include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";
        }
        ?>
    </header>
    <!-- Jumbotron Header -->
    <div class="jumbotron">
      <div id="slide" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner"> <!-- 슬라이드 쇼 -->
          <div class="carousel-item active" > <!--가로-->
                <img class="d-block w-100" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/mainbanner1.jpg" alt="First slide">
                <div class="caption_slide">
                    <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/search/search.php" id="btn_go">구직공고 바로가기</a>
                </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/mainbanner3.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/mainbanner4.jpg" alt="Third slide">
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
            <h2 class="title" id="search_title">빠른 검색</h2>
            <form id="searchJob_box" action="#" method="post">
                <input id="search_job" type="text" placeholder="검색">
                <input id="btn_searchJob" type="image" name="" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/search.png" alt="searchJob">
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
                      <img class="card-img-top" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/introduce1.jpg" alt="사용설명서1">
                      <div class="card-body">
                              <h5 class="card-title">채용</h5>
                              <p class="card-text">채용 페이지에서 자세한 구직 탐색을 할 수 있습니다!</br>
                              세분화된 구직활동!</br>지금부터 시작해보세요!</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <img class="card-img-top" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/introduce2.jpg" alt="">
                          <div class="card-body">
                              <h5 class="card-title">간단한 이력서 작성</h5>
                              <p class="card-text">이력서! 고민하지 마세요!</br>저희 '일하세'가 간단하게 만들어드립니다!</br>
                                간단한 이력서로 구직신청해보세요! 
                              </p>
                          </div>
                      </div>
                  </div>

              <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <img class="card-img-top" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/introduce3.jpg" alt="">
                          <div class="card-body">
                              <h5 class="card-title">지원자 열람</h5>
                              <p class="card-text"></p>
                          </div>
                      </div>
                  </div>

              <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <img class="card-img-top" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/introduce4.jpg" alt="">
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
            <h2 class="title"><span>주변에서 이런 사람을 찾아요</span>
              <span id="current_location">(현재 위치 :</span>
              <span id="location_info"></span>
            </h2>
            <div id="near_location_job" class="row" >
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
    <script type="text/javascript">
     var lat = '37.562134';
     var lng = '127.035188';
     var address='';


      //지도 경도와 위치를 가져와서 구글 api로 지역주소 string으로 변환  
     function getLocation() {

      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function (position) {
                // lat = position.coords.latitude; //위도
                // lng = position.coords.longitude; //경도
                console.log(lat + " / " + lng);
                jQuery.ajax({
                    url: 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat + ',' + lng +
                            '&sensor=true&key=AIzaSyDYGArSYlSdtFgFIJ2CycLM2R_SibM_BIQ',
                    type: 'POST',
                    success: function (myJSONResult) {
                        if (myJSONResult.status == 'OK') {
                            //현재 컴퓨터의 위도 경도로 위치값이 전달되면 
                            address =  myJSONResult.results[5].formatted_address; //주소 받아옴
                            $('#location_info').text(address+")");
                            console.log(address);
                            $.ajax({
                                url:'./common/lib/recommend_based_on_location.php',
                                type : 'post',
                                data:{
                                   'loc' : address 
                                },
                                success:function(data){
                                  if(data){
                                    // 받은 리스트 뿌리기
                                  $('#near_location_job').append(data);

                                  }else {
                                    $('#location_info').text(data);
                                  }
                                  
                                  
                                },
                                error:function(request,status,error){
                                    console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                                }
                            });

                            } else if (myJSONResult.status == 'ZERO_RESULTS') {
                            alert(
                                "지오코딩이 성공했지만 반환된 결과가 없음을 나타냅니다.\n\n이는 지오코딩이 존재하지 않는 address 또는 원격 지역의 latlng을 전" +
                                "달받는 경우 발생할 수 있습니다."
                            )
                        } else if (myJSONResult.status == 'OVER_QUERY_LIMIT') {
                            alert("할당량이 초과되었습니다.");
                        } else if (myJSONResult.status == 'REQUEST_DENIED') {
                            alert("요청이 거부되었습니다.\n\n대부분의 경우 sensor 매개변수가 없기 때문입니다.");
                        } else if (myJSONResult.status == 'INVALID_REQUEST') {
                            alert("일반적으로 쿼리(address 또는 latlng)가 누락되었음을 나타냅니다.");
                        }
                    }
                });
            }, function (error) {
                console.error(error);
            }, {
                enableHighAccuracy: false, //배터리를 더 소모해서 더 정확한 위치를 찾음,
                maximumAge: 0, //한번 찾은 위치 정보를 해당 초만큼 캐싱
                timeout: Infinity // 주어진 초 안에 찾지 못하면 에러 발생
            });
    } else {
        alert('GPS를 지원하지 않습니다.');
    }

}
getLocation(); //함수 실행

</script>


</body>
</html>
