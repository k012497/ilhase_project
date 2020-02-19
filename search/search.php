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
          <a href="./search.php">전체</a><span>></span></h1>
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
              titleData=$('#search_all').text(),
              industry_title=$.trim(titleData),
              industry_list=$('#industy_list'),
              ep_databox=$('#ep_databox'),
              start=0,
              list=10,
              idu_start=0,
              idu_list=10;
              select_industy='',
              industy_data='',
              select_alignment=$('select[name=alignment]').val(),
              select_area=$('#area_selectBox > p').text(),
              select_career=$('select[name=career]').val();

          if (select_area==="지역") {
              //처음에 들어올시에 지역 셀렉트 박스 전체로
                selectAreainit.text("전체");
            }
          if(industry_title==="전체>"){
              //처음에 들어올시에 전체 >>> 산업세부 셀렉트박스 숨기기
                industry_list.hide();
           }

           console.log(industry_title+select_alignment+select_career+selectAreainit.text());

          //nav active 활성화
          $('.nav-item:nth-child(1)').removeClass('active');
          $('.nav-item:nth-child(2)').addClass('active');

          //전체 페이지에서 구직 데이터 (최신순 & 전체 & 경력무관)
          append_list(industry_title,select_alignment,select_career,selectAreainit.text());


          //스크롤 할시 구직 데이터 가져오기
          $(window).scroll(function(){
            console.log("1");
            var dh=$(document).height(),
                wh=$(window).height(),
                st=$(window).scrollTop(),
                st=Math.ceil(st);
                console.log("dh:"+dh+" | wh:"+wh+" | st:"+st);
                var industryTitle=$.trim($('#search_all').text());
                if((wh+st) == dh){
                  if (industryTitle === "전체>") {
                    console.log(industryTitle);
                    append_list(industryTitle,select_alignment,select_career,selectAreainit.text());

                  } else {
                        console.log("2");
                        var select_industrydaile=$('#industy_list option:selected').val();
                        console.log(industryTitle+select_industrydaile);
                        industry_append_list(industryTitle,select_alignment,select_career,selectAreainit.text(),select_industrydaile);
                        console.log("3");
                  }
               }
          });

          //산업종류 선택시
           var title=$('.title#search_all');
          $('.col_box button').click(function(){
              select_industy=$.trim($(this).text());
              industry_list.show();
              industry_list.empty();
              var select_industrydaile='';
              ep_databox.empty();
              $.ajax({
                    url:'./dml_job_industry.php',
                    type:'GET',
                          data:{"industy":select_industy},
                          success:function(data){
                             industy_data=JSON.parse(data);
                               for(var i=0;i<industy_data.length;i++){
                                 $('#industy_list').append('<option value="'+industy_data[i].section+'">'+industy_data[i].section+'</option>');
                                 $('#search_all').html('<a href="./search.php">전체</a>'+'>'+industy_data[i].category);
                               }
                               $('#industy_list').find('option:first').attr('selected','selected');
                               select_industrydaile=$('#industy_list option:selected').val();

                                var change_industryList='';
                               console.log($.trim(title.text()));
                               console.log("선택된 상세산업리스트:"+select_industrydaile);
                              console.log("타이틀:"+title.text()+"/정렬:"+select_alignment+"/ 경력: "+select_career+"/ 지역:"+selectAreainit.text());
                              idu_start=0; //산업종류 클릭할떄마다 idu_start 초기화
                              industry_append_list(title.text(),select_alignment,select_career,selectAreainit.text(),select_industrydaile);


                          },

                          error:function(request,status,error){
                            console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                          }
                  });

              }); // end of click (.col_box button)

            // 세부 산업 선택했을 때 체인지 이벤트
            var change_industryList='';
            $('#industy_list').on("change",function(){
              change_industryList=$(this).val();
              console.log("디테일산업 클릭했을때 " + change_industryList + "/ idu_start : "+idu_start);
              ep_databox.empty();
              idu_start=0;
              industry_append_list(title.text(), select_alignment,select_career,selectAreainit.text(),change_industryList);
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


            //전체구직 리스트 가져오기
            function append_list(tit,al,cr,sa) {

              $.ajax({
                url:'./dml_recruitment.php',
                type:'POST',
                data:{"start":start,"list":list,"titleData":tit,
                      "select_alignment":al,"select_career":cr,"select_area_contents":sa},
                success:function(data){
                  // console.log(data);

                  if(data){
                      console.log("5");
                    $('#ep_databox').append(data);
                    start += list;
                    console.log("전체 start: "+start);
                    $('#ep_databox li').each(function(index,item){
                        $(item).addClass("fadein");
                    });
                    console.log("6");
                    return;
                  } else {
                      // empty 검사하기
                          $('#ep_databox').empty();
                          $('#ep_databox').append('<p>일치하는 데이터가 없습니다</p>');

                  }
                },
                error:function(request,status,error){
                  console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                }
              });
            }


            //세부산업 클릭시 가져오는 구직 리스트
            function industry_append_list(tit, al, cr, sa, industryDtaile) {
                $.ajax({
                  url:'./dml_recruitment.php?industryDtaile='+industryDtaile,
                  type:'POST',
                  data:{"start":idu_start,
                    "list":idu_list,
                    "titleData":tit,
                    "select_alignment":al,
                    "select_career":cr,
                    "select_area_contents":sa
                  },
                  success:function(data){
                    console.log(data, '도착한 데이터!');
                    if(data){
                          $('#ep_databox').append(data);
                          console.log("산업스타트 : "+idu_start);
                          console.log("데이터받을떄 is_bottom : "+is_bottom);
                          $('#ep_databox li').each(function(index,item){
                              $(item).addClass("fadein");
                          });
                          idu_start += idu_list;
                          return;
                    } else {
                      if($('#ep_databox').is(':empty')){
                        console.log($('#ep_databox').is(':empty'));
                        $('#ep_databox').empty();
                        $('#ep_databox').append('<p>일치하는 데이터가 없습니다</p>');
                      }
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
