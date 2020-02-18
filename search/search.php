<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>일하세-채용</title>
    <link rel="stylesheet" href="./css/search.css">
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <section>
      <div class="wrap">
        <h1 class="title" id="search_all">
          <a href="./search.php">전체</a>
        </h1>
        <div id="job_box">
            <div class="col_box">
              <button>
                <img src="./img/searchimg1.jpg" alt="생산/제조">
                <span>생산/제조/단순노무</span>
              </button>
            </div>
            <div class="col_box">
              <button>
                <img src="./img/searchimg2.jpg" alt="경비/시설관리">
                <span>경비/시설관리</span>
              </button>
            </div>
            <div class="col_box">
              <button>
                <img src="./img/searchimg3.jpg" alt="청소/미화">
                <span>청소/미화</span>
              </button>
            </div>
            <div class="col_box">
              <button>
                <img src="./img/searchimg4.jpg" alt="도우미">
                <span>도우미</span>
              </button>
            </div>
            <div class="col_box">
              <button>
                <img src="./img/searchimg5.jpg" alt="음식점/마트/주유">
                <span>음식점/마트/주유</span>
              </button>
            </div>
            <div class="col_box">
              <button>
                <img src="./img/searchimg9.jpg" alt="배달/운전/택배">
                <span>배달/운전/택배</span>
              </button>
            </div>
            <div class="col_box">
              <button>
                <img src="./img/searchimg7.jpg" alt="안내/접수/상담">
                <span>안내/접수/상담</span>
              </button>
            </div>
            <div class="col_box">
              <button>
                <img src="./img/searchimg8.jpg" alt="공공/전문">
                <span>공공/전문</span>
              </button>
            </div>
        </div>
        <h2 class="title" id="sh_text"><span id="search_ico"></span>맞춤검색</h2>
        <div id="select_box">
          <select name="alignment">
            <option value="최신순" selected >최신순</option>
            <option value="인기순">인기순</option>
          </select>
          <div id="area_selectBox">
            <p>지역</p>
          </div>
          <select name="career">
            <option value="무관" selected >무관</option>
            <option value="신입">신입</option>
            <option value="경력">경력</option>
          </select>
          <select name="industry" id="industy_list">
          </select>
        </div>
        <div id="employment_data">
          <ul id="ep_databox">
          </ul>
        </div>
      </div>
      <div id="area_innerBox">
        <div id="area_contents">
            <h3>지역</h3>
            <ul id=area_tb>
              <li class="area">전체</li>
              <li class="area">서울</li>
              <li class="area">부산</li>
              <li class="area">대구</li>
              <li class="area">인천</li>
              <li class="area">광주</li>
              <li class="area">대전</li>
              <li class="area">울산</li>
              <li class="area">세종</li>
              <li class="area">경기</li>
              <li class="area">강원</li>
              <li class="area">충북</li>
              <li class="area">충남</li>
              <li class="area">전북</li>
              <li class="area">전남</li>
              <li class="area">경북</li>
              <li class="area">경남</li>
              <li class="area">제주</li>
            </ul>
            <div id="areaDetails_tb">
                <form action="#" method="post">
                  <div id="si_gun_gu">
                  </div>
                  <input id="btn_si_gun_gu" type="button"  value="선택하기">
                </form>
            </div>
            <span id="area_close">close</span>
        </div>
      </div>
    </section>
    <footer>
    </footer>
    <script type="text/javascript">

        $(function(){

          var area='', //지역
              si_gun_gu='',
              area_list=$('#area_tb li'),
              selectAreainit=$('#area_selectBox > p'),
              titleData=$('#search_all a').text(),
              industry_list=$('#industy_list'),
              select_industy='',
              industy_data='',
              start=0,
              list=8,
              select_alignment=$('select[name=alignment]').val(),
              select_area=$('#area_selectBox > p').text(),
              select_career=$('select[name=career]').val();



          if (select_area==="지역") {
              //처음에 들어올시에 지역 셀렉트 박스 전체로
                selectAreainit.text("전체");
            }
          if(titleData==="전체"){
              //처음에 들어올시에 전체 >>> 산업세부 셀렉트박스 숨기기
                industry_list.hide();
           }

           console.log(titleData+select_alignment+select_career+selectAreainit.text());

          //nav active 활성화
          $('.nav-item:nth-child(1)').removeClass('active');
          $('.nav-item:nth-child(2)').addClass('active');

          //전체 페이지에서 구직 데이터 (최신순 & 전체 & 경력무관)
          append_list(titleData,select_alignment,select_career,selectAreainit.text());


          //산업종류 선택시
          $('.col_box button').click(function(){
              select_industy=$.trim($(this).text());
              industry_list.show();
              industry_list.empty();
              // append_list(select_industy,select_alignment,select_career,area);
              $.ajax({
                    url:'./dml_job_industry.php',
                    type:'GET',
                          data:{"industy":select_industy},
                          success:function(data){
                             industy_data=JSON.parse(data);
                               for(var i=0;i<industy_data.length;i++){
                                 $('#industy_list').append('<option>'+industy_data[i].section+'</option>');
                                 $('#search_all').html('<a href="./search.php">전체</a>'+' > '+industy_data[i].category);
                               }
                          },
                          error:function(request,status,error){
                            console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                          }
                  });
              });

            //모달창(지역 셀렉트) 클릭 이벤트(열기)
            $('#area_selectBox').click(function(){
              $('#area_contents').addClass('open');
              $('#area_contents').removeClass('cancel');
                setTimeout(function(){
                  $('#area_innerBox').show();
                },200);

            });
            //모달창(지역 셀렉트) 클릭 이벤트(닫기)
            $('#area_close').click(function(){
                  modal_close();
            });

            //지역 selsect박스 안에 지역 데이터 구현
            $('#area_tb li').click(function(){
              area=$(this).text();
              area_list.removeClass('area_active');
              $(this).addClass('area_active');
              $('#si_gun_gu').empty();
               $.ajax({
                 url:'./dml_address.php',
                 type:'GET',
                 data:{"area":area},
                 success:function(data){
                    si_gun_gu=JSON.parse(data);
                      for(var i=0;i<si_gun_gu.length;i++){
                        $('#si_gun_gu').append('<label><input type="radio" name="si_gun_gu" value="'+si_gun_gu[i].areaName+'">'+si_gun_gu[i].areaName+'</label>');
                      }
                 },
                 error:function(request,status,error){
                   console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                 }
               });

            });




            //지역 셀렉트 박스안에 선택버튼  클릭시 이벤트
            $('#btn_si_gun_gu').click(function(){
                      var checkData=$('input[name=si_gun_gu]:checked').val(),
                          ischeckData=$('input[name=si_gun_gu]').is(':checked');
                          areaSelctBox=$('#area_selectBox > p');
                          if (area==="전체") {
                              areaSelctBox.text(area);
                              modal_close();
                              return;
                          }
                          if (checkData==="" || ischeckData===false) {
                            alert("시/군 을 선택해주세요!");
                            return;
                          }else {
                            areaSelctBox.text(area+" > "+checkData);
                              modal_close();
                          }
            });




            //스크롤 할시 구직 데이터 가져오기
            $(window).scroll(function(){

              var dh=$(document).height(),
                  wh=$(window).height(),
                  st=$(window).scrollTop(),
                  st=Math.ceil(st);
                  console.log("dh:"+dh+" | wh:"+wh+" | st:"+st);

                  if((wh+st)>=dh){
                    append_list(titleData,select_alignment,select_career,selectAreainit.text());
                  }

            });

            //구직 리스트 가져오기
            function append_list(tit,al,cr,sa) {

              $.ajax({
                url:'./dml_recruitment.php',
                type:'POST',
                data:{"start":start,"list":list,"titleData":tit,
                      "select_alignment":al,"select_career":cr,"select_area_contents":sa},
                success:function(data){
                  console.log(data);
                  if(data){
                    $('#ep_databox').append(data);
                    start+=list;
                    console.log(start);
                    $('#ep_databox li').each(function(index,item){
                        $(item).addClass("fadein");
                    });
                    return;
                  }
                  if(data===""){
                    alert("데이터를 모두 가져왔습니다.");
                    return;
                  }else {
                    alert("오류로 내용을 가져올 수 없습니다.");
                  }
                },
                error:function(request,status,error){
                  console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                }
              });
            }

            //모달창 닫기 함수
            function modal_close() {
              setTimeout(function(){
                   $('#area_innerBox').hide();
              },400);
              $('#area_contents').addClass('cancel');
              $('#area_contents').removeClass('open');
            };


        });
    </script>
  </body>
</html>
