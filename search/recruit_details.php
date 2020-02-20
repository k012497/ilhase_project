<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <?php
    session_start();
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
    $pick_job_num=$_GET['pick_job_num'];
    $src=$_GET['img'];
    $title=$_GET['title'];

    //회사정보와 구직데이터를 모두 가져오는 쿼리
    $find_corporate_info="select * from corporate c join recruitment r on c.id=r.corporate_id where num=$pick_job_num";
    $result=mysqli_query($conn,$find_corporate_info);
    $row=mysqli_fetch_array($result);

    $period_start   = $row['period_start'];
    $period_end     = $row['period_end'];
    $b_name         = $row['b_name'];
    $ceo            = $row['ceo'];
    $job_category   = $row['job_category'];
    $address        = $row['address'];
    $require_career = $row['require_career'];
    $require_edu    = $row['require_edu'];
    $pay            = $row['pay'];
    $work_place     = $row['work_place'];
    $details        = $row['details'];
    $content = str_replace(" ", "&nbsp;", $details);
    $content = str_replace("\n", "&#10;", $details);
    $personnel        = $row['personnel'];
    $recruiter_name        = $row['recruiter_name'];
    $recruiter_phone        = $row['recruiter_phone'];
    $recruiter_email        = $row['recruiter_email'];
    $recruit_type           = $row['recruit_type'];



   ?>
  <head>
    <meta charset="utf-8">
    <title>일하세-상세공고</title>
    <link rel="stylesheet" href="./css/recruit_details.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=15cd74be6a94ce8c97c9dfc47e4be577&libraries=services"></script>
  </head>
  <body>
    <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <section>
        <div id="wrap">
            <div id="company_img">
              <img src="<?=$src?>" alt="회사이미지">
            </div>
            <h1 id="announcement_title">
              <?=$title?>
              <span id="sub_title">(<?=$b_name?>)</span>
              <span id="period"><?=$period_start?> ~ <?=$period_end?><button id="btn_apply" type="submit" name="button">지원하기</button></span>
            </h1>
            <div id="company_info">
              <h2 class="info_title"> > 기업정보</h2>
              <ul>
                <li><span class="colum">회&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;사&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;명</span><span class="colum2"><?=$b_name?></span></li>
                <li><span class="colum">대&nbsp;&nbsp;표&nbsp;&nbsp;자&nbsp;&nbsp;명  </span><span class="colum2"><?=$ceo?></span></li>
                <li><span class="colum">업&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;종 </span><span class="colum2"><?=$job_category?></span></li>
                <li><span class="colum">4대보험가입 </span><span  class="colum2">4대보험 가입</span></li>
                <li><span class="colum">주&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;소 </span><span  class="colum2"><?=$address?></span></li>
              </ul>
              <div id="container">
                <div id="rvWrapper">
                  <div id="roadview" style="width:100%;height:100%;"></div> <!--로드뷰를 표시할 div 입니다 -->
                  <div id="close" title="로드뷰닫기" onclick="closeRoadview()"><span class="img"></span></div>
                </div>
                <div id="mapWrapper">
                    <div id="map" style="width:100%;height:400px;"></div><!--지도를 표시할 div -->
                    <div id="roadviewControl" onclick="setRoadviewRoad()"></div>
                </div>
            </div>
            </div>
            <div id="employment_info">
              <h2 class="info_title"> > 구인정보</h2>
              <ul>
                <li><span class="colum">지원자격</span><span class="colum3">학력 : (<?=$require_edu?>) / 경력 (<?=$require_career?>)</span></li>
                <li><span class="colum">근무조건</span><span class="colum3">급여 : <?=$recruit_type?>(<?=$pay?>) / 근무지역 (<?=$work_place?>)</span></li>
              </ul>
            </div>
            <div id="details_info">
              <h2 class="info_title"> > 상세모집요강</h2>
                <p><?=$content?></p>
                <ul>
                  <li><span class="colum">모&nbsp;&nbsp;집&nbsp;&nbsp;인&nbsp;&nbsp;원</span><span class="colum3"> <?=$personnel?>명</span></li>
                  <li><span class="colum">접&nbsp;&nbsp;수&nbsp;&nbsp;기&nbsp;&nbsp;간</span><span class="colum3"><?=$period_start?> ~ <?=$period_end?></span></li>
                  <li><span class="colum">담당자연락처</span><span class="colum3"><?=$recruiter_name?>(<?=$recruiter_phone?>) / 이메일 : <?=$recruiter_email?>
                    <span id="notice">※자세한 문의 사항은 담당자에게 연락해주세요!<span>
                  </span></li>
                </ul>
            </div>
        </div>
    </section>
    <footer id="footer_box" >
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

        var overlayOn= false, //지도위에 로드뷰 오버레이가 추가된 상태를 가지고 있을 변수
            container=document.getElementById('container'), //지도와 로드뷰를 감싸고 있는 div
            mapWrapper=document.getElementById('mapWrapper'), //지도를 감싸고 있는 div
            mapContainer=document.getElementById('map'), //지도를 표시할 div
            rvContainer = document.getElementById('roadview');//로드뷰를 표시할 div
            var address = '<?=$address?>'; // 서버에서 받아온 회사의 주소
            var b_name = '<?=$b_name?>'; // 서버에서 받아온 회사의 이름
            var mapCenter = new kakao.maps.LatLng(33.45042 , 126.57091), // 지도의 중심좌표
            mapOption = {
                center: mapCenter, // 지도의 중심좌표
                level: 3 // 지도의 확대 레벨
            };
      // 지도를 생성
      var map = new kakao.maps.Map(mapContainer, mapOption);

      //주소-좌표 변환 객체를 생성
      var geocoder = new kakao.maps.services.Geocoder();

      //주소로 좌표를 검색합
      geocoder.addressSearch(address,function(result,status){
          //정상적으로 검색이 완료됐으면
          if(status === kakao.maps.services.Status.OK) {
              var coords=new kakao.maps.LatLng(result[0].y, result[0].x);

                // 결과값으로 받은 위치를 마커로 표시
              var marker = new kakao.maps.Marker({
                  map: map,
                  position: coords
              });

              // 인포윈도우로 장소에 대한 설명을 표시
              var infowindow = new kakao.maps.InfoWindow({
                  content: '<div style="width:150px;text-align:center;padding:6px 0;"><a target="_blank" href="https://map.kakao.com/link/to/'+b_name+','+result[0].y+','+result[0].x+'">'+b_name+' 길찾기</a></div>'
              });
              infowindow.open(map, marker);
              infowindow.open(map, marker);
              map.setCenter(coords);

          }

      });
    //로드뷰 객체를 생성
    var rv=new kakao.maps.Roadview(rvContainer);
    // 좌표로부터 로드뷰 파노라마 ID를 가져올 로드뷰 클라이언트 객체를 생성
    var rvClient=new kakao.maps.RoadviewClient();
    // 로드뷰에 좌표가 바뀌었을 때 발생하는 이벤트를 등록
    kakao.maps.event.addListener(rv, 'position_changed', function() {
          // 현재 로드뷰의 위치 좌표를 얻어옴
          var rvPosition = rv.getPosition();
          // 지도의 중심을 현재 로드뷰의 위치로 설정
          map.setCenter(rvPosition);
          // 지도 위에 로드뷰 도로 오버레이가 추가된 상태이면
          if(overlayOn) {
              // 마커의 위치를 현재 로드뷰의 위치로 설정
              marker.setPosition(rvPosition);
          }
  });

    //마커 이미지를 생성
    var markImage=new kakao.maps.MarkerImage(
      'https://t1.daumcdn.net/localimg/localimages/07/2018/pc/roadview_minimap_wk_2018.png',
      new kakao.maps.Size(26, 46),
      {
          // 스프라이트 이미지를 사용
          // 스프라이트 이미지 전체의 크기를 지정하고
          spriteSize: new kakao.maps.Size(1666, 168),
          // 사용하고 싶은 영역의 좌상단 좌표를 입력
          // background-position으로 지정하는 값이며 부호는 반대
          spriteOrigin: new kakao.maps.Point(705, 114),
          offset: new kakao.maps.Point(13, 46)
      }
    );

    //드래그가 가능한 마커를 생성
    var marker = new kakao.maps.Marker({
      image : markImage,
      position: mapCenter,
      draggable: true
    });
    //마커에 dragend 이벤트를 등록.
    kakao.maps.event.addListener(marker,'dragend', function(mouseEvent) {
      // 현재 마커가 놓인 자리의 좌표
      var position = marker.getPosition();
      // 마커가 놓인 위치를 기준으로 로드뷰를 설정
      toggleRoadview(position);
    });
    //지도에 클릭 이벤트를 등록
      kakao.maps.event.addListener(map, 'click', function(mouseEvent){
          // 지도 위에 로드뷰 도로 오버레이가 추가된 상태가 아니면 클릭이벤트를 무시.
          if(!overlayOn) {
              return;
          }
          // 클릭한 위치의 좌표
          var position = mouseEvent.latLng;
          // 마커를 클릭한 위치로 옮김
          marker.setPosition(position);
          // 클락한 위치를 기준으로 로드뷰를 설정
          toggleRoadview(position);
      });


    // 전달받은 좌표(position)에 가까운 로드뷰의 파노라마 ID를 추출하여
    // 로드뷰를 설정하는 함수
    function toggleRoadview(position){
        rvClient.getNearestPanoId(position, 50, function(panoId) {
            // 파노라마 ID가 null 이면 로드뷰를 숨김
            if (panoId === null) {
                toggleMapWrapper(true, position);
            } else {
             toggleMapWrapper(false, position);
                // panoId로 로드뷰를 설정
                rv.setPanoId(panoId,position);
            }
        });
    }
    // 지도를 감싸고 있는 div의 크기를 조정하는 함수
      function toggleMapWrapper(active, position) {
          if (active) {
              // 지도를 감싸고 있는 div의 너비가 100%가 되도록 class를 변경
              container.className = '';
              // 지도의 크기가 변경되었기 때문에 relayout 함수를 호출
              map.relayout();
              // 지도의 너비가 변경될 때 지도중심을 입력받은 위치(position)로 설정
              map.setCenter(position);
          } else {

              // 지도만 보여지고 있는 상태이면 지도의 너비가 50%가 되도록 class를 변경하여
              // 로드뷰가 함께 표시되게 합니다
              if (container.className.indexOf('view_roadview') === -1) {
                  container.className = 'view_roadview';
                  // 지도의 크기가 변경되었기 때문에 relayout 함수를 호출합니다
                  map.relayout();
                  // 지도의 너비가 변경될 때 지도중심을 입력받은 위치(position)로 설정합니다
                  map.setCenter(position);
              }
          }
      }

      // 지도 위의 로드뷰 도로 오버레이를 추가,제거하는 함수
      function toggleOverlay(active) {
          if (active) {
              overlayOn = true;
              // 지도 위에 로드뷰 도로 오버레이를 추가
              map.addOverlayMapTypeId(kakao.maps.MapTypeId.ROADVIEW);
              // 지도 위에 마커를 표시
              marker.setMap(map);
              // 마커의 위치를 지도 중심으로 설정
              marker.setPosition(map.getCenter());
              // 로드뷰의 위치를 지도 중심으로 설정
              toggleRoadview(map.getCenter());

          } else {
              overlayOn = false;

              // 지도 위의 로드뷰 도로 오버레이를 제거
              map.removeOverlayMapTypeId(kakao.maps.MapTypeId.ROADVIEW);
              // 지도 위의 마커를 제거
              marker.setMap(null);
          }
      }

      // 지도 위의 로드뷰 버튼을 눌렀을 때 호출되는 함수
      function setRoadviewRoad() {
          var control = document.getElementById('roadviewControl');
          // 버튼이 눌린 상태가 아니면
          if (control.className.indexOf('active') === -1) {
              control.className = 'active';
              // 로드뷰 도로 오버레이가 보이게 함
              toggleOverlay(true);
          } else {
              control.className = '';
              // 로드뷰 도로 오버레이를 제거함
              toggleOverlay(false);
          }
      }

      // 로드뷰에서 X버튼을 눌렀을 때 로드뷰를 지도 뒤로 숨기는 함수
      function closeRoadview() {
          var position = marker.getPosition();
          toggleMapWrapper(true, position);
      }


      //


      //지원하기 버튼
      $('#btn_apply').click(function(){



      });

    </script>
  </body>
</html>
