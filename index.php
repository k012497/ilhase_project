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
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!--fancybox css & js  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
   
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <!-- Jumbotron Header -->
    <div class="jumbotron">
      <div id="slide" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner"> <!-- 슬라이드 쇼 -->
          <div class="carousel-item active" > <!--가로-->
                <img class="d-block w-100" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/mainbanner1.jpg" alt="First slide">
                <div class="caption_slide">
                    <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/search/search.php?mode=recruitment" id="btn_go">구직공고 바로가기</a>
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
            <form id="searchJob_box" name="search_box" action="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/search/search.php" method="get">
                <input id="search_job" name="search_word" type="textbox" placeholder="ex) 서울,부산,경비,제조,청소,신입,경력...">
                <input type="hidden" name="mode" value="index_search"> 
                <input id="btn_searchJob" type="image" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/search.png" alt="searchJob">
            </form>
            <div id="atuo_keword">
                  <ul>
                  </ul>
            </div>
            <div id="pick_job">
                <ul>
                <?php
                  $many_recruitment_sql="select industry, count(*) as count from recruitment group by industry having count > 1 order by count desc limit 4";
                  $recruitment_result=mysqli_query($conn,$many_recruitment_sql);
                  $count=mysqli_num_rows($recruitment_result);

                  for($i=0;$i<$count;$i++){
                    $row=mysqli_fetch_array($recruitment_result);
                    $industry=$row['industry'];
                   
                    $array_industry=explode("/",$industry);
                    $industry_str=end($array_industry);
                    
                    echo"
                        <script>console.log('".$industry_str."');</script>
                        <li>#".$industry_str."</li>  
                    ";
                  }
                ?>
                </ul>
              
            </div>
          </div>
          <div id="intro_wrap" class="floatnone">
            <h2 class="title">이렇게 이용해 보세요!</h2>
            <!--홈페이지 사용 설명-->
            <div id="intro_box" class="row">
              <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card h-100 manual_box">
                      <a data-fancybox="instruction"  data-caption="채용"  href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/introduce1.jpg">
                        <img class="card-img-top" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/introduce1.jpg" alt="사용설명서1">        
                        <div class="card-body">
                                <h5 class="card-title">채용</h5>
                                <p class="card-text">채용 페이지에서 자세한 구직 탐색을 할 수 있습니다!</br>
                                세분화된 구직활동!</br>지금부터 시작해보세요!</p>
                        </div>
                      </a>
                      <div class="magnifier_img"></div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card h-100 manual_box">
                        <a data-fancybox="instruction"  data-caption="간단한 이력서작성" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/introduce2.jpg">
                            <img class="card-img-top" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/introduce2.jpg" alt="사용설명서2">
                        
                          <div class="card-body">
                              <h5 class="card-title">간단한 이력서 작성</h5>
                              <p class="card-text">이력서! 고민하지 마세요!</br>저희 '일하세'가 간단하게 만들어드립니다!</br>
                                간단한 이력서로 구직신청해보세요! 
                              </p>
                          </div>
                          </a>
                          <div class="magnifier_img"></div>
                      </div>
                  </div>

              <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card h-100 manual_box">
                        <a data-fancybox="instruction"  data-caption="관심공고 등록" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/introduce3.jpg">
                            <img class="card-img-top" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/introduce3.jpg" alt="">
                           
                        <div class="card-body">
                                <h5 class="card-title">관심공고 등록</h5>
                                <p class="card-text">
                                   관심있는 공고에 마음껏 담아 비교하고 지원하세요!
                                </p>
                        </div>
                        </a>
                        <div class="magnifier_img"></div>
                    </div>
                        
                  </div>

              <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card h-100 manual_box">
                  <a data-fancybox="instruction"  data-caption="인재 열람" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/introduce4.jpg">
                      <img class="card-img-top" src="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/introduce4.jpg" alt="">
                          <div class="card-body">
                              <h5 class="card-title">생각안남ㅠㅠ</h5>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing
                              elit. Explicabo magni sapiente, tempore debitis beatae culpa natus
                              architecto.</p>
                          </div>
                          </a>
                        <div class="magnifier_img"></div>
                  </div>
              </div>
            </div>
          </div>
          <?php
            if(!($member_type==="corporate")){  
              //기업 회원이 아니면 지역 추천 공고가 구직자의 이력서가 보이게끔 함.    
          ?>
              <div id="recommend_box">
                <!-- 지역 기반 추천 공고 -->
                <h2 class="title"><span>주변에서 이런 사람을 찾아요</span>
                  <?php
                    $user_address_sql="select new_address from person where id='$id'";
                    $user_result=mysqli_query($conn,$user_address_sql);
                    $find_row=mysqli_fetch_array($user_result);
                    mysqli_close($conn);

                    if($id==''){
                      //로그인 안되면 기존 ip로 위치 
                  ?>
                  <span id="current_location">(현재 위치 :</span>
                  <span id="location_info"></span>
                  <?php
                    }else {
                  ?>
                  <span id="current_location"><?=$id?>님의 주소 : </span>
                  <span id="location_info"><?=$find_row[0]?></span>
                  <?php
                    }
                  ?>
                </h2>
                <div id="near_location_job" class="row" >
                </div>
              </div>
          <?php
            }else{
          ?>
            <div id="recommend_box">
                <!-- 인재 공고 -->
                <h2 class="title"><span>공개된 이력서를 추천해드립니다!</span></h2>
                  <?php
                    $jobSeeker_sql="select * from resume where public=1 limit 4";
                    $user_result=mysqli_query($conn,$jobSeeker_sql);
                    mysqli_close($conn);
                    //등록된 모든 유저의 공개된 이력서가 없을떄
                    if(!$user_result){
                        echo "<p>등록된 모든 유저의 이력서가 없습니다</p>";
                        
                    } else{
                       //등록된 모든 유저의 공개된 이력서가 있을때
                    $count=mysqli_num_rows($user_result);
                    for($i=0;$i<$count;$i++){
                      $row=mysqli_fetch_array($user_result);
                      $num=$row['num'];
                      $m_name=$row['m_name'];
                      $m_address=$row['m_address'];
                      $m_gender=$row['m_gender'];
                      $m_title=$row['title'];
                      $file_name=$row['file_name'];
              
                      $src='';
                      if ($file_name) {
                      $src='./img/'+$file_name;
                      }else {
                      $src='http://'.$_SERVER["HTTP_HOST"].'/ilhase/common/img/user.png';
                      }
                      echo " 
                         
                          <div id='open_resume' class='col-lg-3 col-md-6 mb-4'>
                            <div id='open_resume_box' class='card h-100'>
                                <img class='card-img-top' src='".$src."' alt='userimg'>
                                <div class='card-body'>
                                    <a id='go_recruit_details' href='http://".$_SERVER["HTTP_HOST"]."/ilhase/manage_articles/write_resume_form.php?num=".$num."'>
                                        <h5 id='card_title' class='card-title'>".$m_title."</h5>
                                        <span id='ep_b_name'>".$m_name."</span>
                                    </a>
                                </div>
                            </div>
                          </div>     
                        </div>
                      ";
              
                    }//end of for()
                  }//ensd of if(!$user_result)
                }//end of if($member_type==="corporate") 
 
                  ?>
              </div>
    </div>
    <!-- Footer -->
    <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/footer.php";?>
    <script type="text/javascript">
     var lat = '';
     var lng = '';
     var user_id="<?=$id?>";
     var address='';
     var rute="<?= $_SERVER['HTTP_HOST']?>";
     console.log(rute);

      //지도 경도와 위치를 가져와서 구글 api로 지역주소 string으로 변환  
     function getLocation() {

      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function (position) {
                lat = position.coords.latitude; //위도
                lng = position.coords.longitude; //경도
                console.log(lat + " / " + lng);
                jQuery.ajax({
                    url: 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat + ',' + lng +
                            '&sensor=true&key=AIzaSyD0d6XLU_Z9YZZUKaOqLKtOfy-ZXoJ4ysU',
                    type: 'POST',
                    success: function (myJSONResult) {
                        if (myJSONResult.status == 'OK') {
                            //현재 컴퓨터의 위도 경도로 위치값이 전달되면 
                            address =  myJSONResult.results[5].formatted_address; //주소 받아옴
                            if(user_id==''){
                              $('#location_info').text(address+")");
                            }
                            console.log(address);
                            $.ajax({
                                url:'./common/lib/recommend_based_on_location.php',
                                type : 'post',
                                data:{
                                   'loc' : address,
                                   'user_id' : user_id
                                },
                                success:function(data){
                                  if(data){
                                    // 받은 데이터 리스트 뿌리기
                                  $('#near_location_job').append(data);

                                  }else {
                                     // 받은 데이터 없을때
                                    $('#near_location_job').text(data);
                                  }
                                  
                                  
                                },
                                error:function(request,status,error){
                                    console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                                }
                            }); // end of ajax

                            } else if (myJSONResult.status == 'ZERO_RESULTS') {
                            alert(
                                "지오코딩이 성공했지만 반환된 결과가 없음을 나타냅니다.\n\n이는 지오코딩이 존재하지 않는 address 또는 원격 지역의 latlng을 전" +
                                "달받는 경우 발생할 수 있습니다."
                            )
                        } else if (myJSONResult.status == 'OVER_QUERY_LIMIT') {
                            alert("할당량이 초과되었습니다.");
                        } else if (myJSONResult.status == 'REQUEST_DENIED') {
                            alert("요청이 거부되었습니다.\n\n대부분의 경우 sensor 매개변수가 없기 때문입니다.");
                            //api 요청에러 일떄 거부됬을때 디폴트 값으로 위치 찾기
                            $('#location_info').text("서울 강남구)");
                            $.ajax({
                                url:'./common/lib/recommend_based_on_location.php',
                                type : 'post',
                                data:{
                                   'loc' : '서울 강남구',
                                   'user_id' : user_id
                                },
                                success:function(data){
                                  if(data){
                                    // 받은 데이터 리스트 뿌리기
                                  $('#near_location_job').append(data);

                                  }else {
                                     // 받은 데이터 없을때
                                    $('#near_location_job').text(data);
                                  }
                                  
                                  
                                },
                                error:function(request,status,error){
                                    console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                                }
                            }); // end of ajax
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
getLocation(); //위치 공고 함수 실행

$(function(){
  //자동검색어
  $('#search_job').keyup(function(){

      if($(this).val()===""){
        $('#atuo_keword ul').empty();
        $("#atuo_keword").hide();
      }else {
        $.ajax({
          // async : false,
          url:"http://"+rute+"/ilhase/search/dml_recruitment.php?mode=auto_keyword",
          data:{"keyword" : $(this).val() },
          method:'GET',
          success:function(data){
            $('#atuo_keword').show();
            $('#atuo_keword ul').empty();
            $('#atuo_keword ul').append(data);
            $('#atuo_keword ul li').each(function(){
                $(this).click(function(){
                  // $('#search_job').val('');
                  $('#search_job').val($(this).text());
                  console.log($('#search_job').val());
                });

            }); //end of each
          }//end of data
        });//end of ajax
      } // end of $(this).val()

  });//end of keyup 


   
});
//body누르면 자동검색창 hide
$('body').click(function(){
  $("#atuo_keword").hide();
});
//빠른검색창 효과
$('#search_job').focus(function(){
  $('#searchJob_box').css({"border" : "1px solid #333" });
});
$('#search_job').blur(function(){
  $('#searchJob_box').css({"border" : "1px solid #A6A6A6" });
});

$('#pick_job ul li').off('click');
//추천 검색어 누를시
$('#pick_job ul li').click(function(){

    var select_word =$(this).text();
    console.log(select_word);
    var str_select=select_word.split("#");
    $('input[name=search_word]').eq(1).val(str_select[1]);


});





</script>


</body>
</html>
