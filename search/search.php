<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <?php
    session_start();
    $mode=$_GET['mode'];
    $serch_word='';
    if($mode==="index_search"){
      $serch_word=$_GET['search_word'];
      if($serch_word===""){
        echo "<script>
            alert('내용을 적어주세요!');
            history.go(-1);
        </script>";   
        exit;
      }
    }

   ?>
  <head>
    <meta charset="utf-8">
    <title>일하세</title>
    <link rel="stylesheet" href="./css/search.css">
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <section>
      <div class="wrap">
        <h1 class="title" id="search_all">
          <?php
            if($mode==='index_search'){
              //검색해서 들어왔을 때
              echo "검색 > ".$serch_word;
            }else if($mode==='applicant'){
              //기업회원으로 로그인해서 인재를 눌렀을 때
              echo "> 인재";
            }else { 
              //채용을 클릭했을때
              echo "<a href='./search.php?mode=recruitment'>전체</a><span>></span>";
            }
          ?>
        </h1>
        <?php
            //검색 모드나 인재 모드가 아닐떄  
            if(!($mode==='index_search') && !($mode==='applicant')){
        ?>
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
        <?php
          }
          if(!($mode==='applicant')){
        ?>
        <h2 class="title" id="sh_text"><span id="search_ico"></span>맞춤검색</h2>
        <?php
          }
          if($mode==='index_search'){    
              echo"<p>\"".$serch_word."\"의 대한 검색결과 입니다</p>";
          }else if($mode==='applicant'){
              echo "<h3 id='apply_title'><span id='apply_log'></span><span id='apply_inner'>이력서<span id='ex_text'>구인자들 중에 공개된 이력서입니다!</span></span></h3>
              ";
          }else{
        ?>
        <div id="select_box">
          <select name="alignment">
            <option value="최신순" selected >최신순</option>
            <option value="인기순">인기순</option>
          </select>
          <div id="area_selectBox">
            <p>지역</p>
          </div>
          <select name="career" id="career_list">
            <option value="무관" selected >무관</option>
            <option value="경력">경력</option>
          </select>
          <select name="industry" id="industy_list">
          </select>
        </div>
        <?php
          }
        ?>
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
              idu_list=10,
              select_industy='',
              industy_data='',
              select_alignment=$('select[name=alignment]').val(),
              select_area=$('#area_selectBox > p').text(),
              select_career=$('select[name=career]').val();
              var isSelectArea=false;
              var isheartClick=false;
              var count=0;
              var user_id='<?=$id?>';
              var mode='<?=$mode?>';
              var search_start=0;
              var search_list=10;
              var applay_start=0;
              var applay_list=10;
              
              console.log(mode);

          if (select_area==="지역") {
              //처음에 들어올시에 지역 셀렉트 박스 전체로
                selectAreainit.text("전체");
            }
          if(industry_title==="전체>"){
              //처음에 들어올시에 전체 >>> 산업세부 셀렉트박스 숨기기
                industry_list.hide();
           }

           console.log(industry_title+select_alignment+select_career+selectAreainit.text());

          

          var strArea=select_area.replace(/(\s*)/g,"");
          var area_text=strArea.split('>');

           
          if(mode==="recruitment"){
             //전체 페이지에서 구직 데이터 (최신순 & 전체 & 경력무관)
              append_list(industry_title,select_alignment,select_career,$.trim(selectAreainit.text()),area_text[1],user_id,mode);
          }else if(mode==='applicant'){
            //기업회원이 인재페이지로 들어올시
            applay_start=0;
            show_all_applicant(mode);
          }else if(mode==="index_search"){
             //검색에서 온 데이터로 찾기
             var serch_word ='<?=$serch_word?>';
             console.log(serch_word, user_id, mode, "gggggggggggg");
             search_result(serch_word,user_id,mode);
          }

        
          //스크롤 할시 구직 데이터 가져오기
          $(window).scroll(function(){
            console.log("1");
            var dh=$(document).height(),
                wh=$(window).height(),
                st=$(window).scrollTop(),
                st=Math.ceil(st);
                // console.log("dh:"+dh+" | wh:"+wh+" | st:"+st);
                
                if((wh+st) == dh){

                  if(mode==="recruitment"){
                    var industryTitle=$.trim($('#search_all').text());
                    var select_area=$('#area_selectBox > p').text();
                    var select_career=$('select[name=career]').val();
                    var strArea=select_area.replace(/(\s*)/g,"");
                    var area_text=strArea.split('>'); 
                    if (industryTitle === "전체>") {
                      console.log(industryTitle);
                      append_list(industryTitle,select_alignment,select_career,area_text[0],area_text[1],user_id,mode);
                    } else {
                          console.log("2");
                          var select_industrydaile=$('#industy_list option:selected').val();
                          console.log(industryTitle+select_industrydaile);
                          industry_append_list(industryTitle,select_alignment,select_career,area_text[0],area_text[1],select_industrydaile,user_id,mode);
                          console.log("3");
                    }//end of industriTitle 

                  }else if(mode==="applicant"){
                    //기업이 인재로 들어올시 
                    show_all_applicant(mode);

                  }else if(mode==="index_search"){
                        //검색에서 온 데이터로 찾기
                      search_result(serch_word,user_id,mode);

                  }
               }// end of (wh+st == dh)
             });

          //산업종류 선택시
          $('.col_box button').click(function(){
              select_industy=$.trim($(this).text());
              industry_list.show();
              industry_list.empty();

              ep_databox.empty();
              $.ajax({
                    url:'./dml_job_industry.php',
                    type:'GET',
                          data:{"industy":select_industy},
                          success:function(data){
                             industy_data=JSON.parse(data);
                               for(var i=0;i<industy_data.length;i++){
                                 $('#industy_list').append('<option value="'+industy_data[i].section+'">'+industy_data[i].section+'</option>');
                                 $('#search_all').html('<a href="./search.php?mode=recruitment">전체</a>'+'>'+industy_data[i].category);
                               }
                               $('#industy_list').find('option:first').attr('selected','selected');

                                var select_industrydaile=$('#industy_list option:selected').val();
                                var title=$('.title#search_all');
                                var select_alignment=$('select[name=alignment]').val();
                                var select_career=$('select[name=career]').val();
                                var select_area=$('#area_selectBox > p').text();
                                var strArea=select_area.replace(/(\s*)/g,"");
                                var area_text=strArea.split('>');
                               console.log($.trim(title.text()));
                               console.log("선택된 상세산업리스트:"+select_industrydaile);
                              console.log("타이틀:"+title.text()+"/정렬:"+select_alignment+"/ 경력: "+select_career+"/ 지역:"+selectAreainit.text());
                              idu_start=0; //산업종류 클릭할떄마다 idu_start 초기화
                              industry_append_list($.trim(title.text()),select_alignment,select_career,area_text[0],area_text[1],select_industrydaile,user_id,mode);


                          },

                          error:function(request,status,error){
                            console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                          }
                  });

            }); // end of click (.col_box button)

            // 세부 산업셀렉트박스 선택했을 때 체인지 이벤트
            $('#industy_list').on("change",function(){
              var title=$('.title#search_all');
              var change_industryList=$(this).val();
              var select_career=$('select[name=career]').val();
              var select_area=$('#area_selectBox > p').text();
              var strArea=select_area.replace(/(\s*)/g,"");
              var area_text=strArea.split('>');
              console.log("디테일산업 클릭했을때 " + change_industryList + "/ idu_start : "+idu_start);
              ep_databox.empty();
              idu_start=0;
              industry_append_list($.trim(title.text()), select_alignment,select_career,area_text[0],area_text[1],change_industryList,user_id,'recruitment');
            });


            //경력셀렉트 선택했을 떄 체인지 이벤트
              $('#career_list').on("change",function(){
                  var title=$('.title#search_all'),
                      select_alignment=$('select[name=alignment]').val(),
                      select_area=$('#area_selectBox > p').text();
                  var strArea=select_area.replace(/(\s*)/g,"");
                  var area_text=strArea.split('>');
                  var select_career_data=$(this).val();
                  var select_industrydaile=$('select[name=industry]').val();
                  if ($.trim(title.text())=="전체>") {
                      console.log("전체에서  " + select_career_data + "/ start : "+start+" / select_area : "+area_text[0]+area_text[1]);
                      ep_databox.empty();
                      start=0;
                      append_list($.trim(title.text()),select_alignment,select_career_data,area_text[0],area_text[1],user_id,mode);
                  }else {
                      console.log("디테일산업 클릭했을때 " + select_career_data + "/"+select_alignment+"/"+area_text[0]+"/"+area_text[1]);
                      ep_databox.empty();
                      idu_start=0;
                      industry_append_list($.trim(title.text()),select_alignment,select_career_data,area_text[0],area_text[1],select_industrydaile,user_id,mode);
                  }
               });



           

            var area_list=$('#area_tb li');
            //지역 selsect박스 안에 지역 데이터 구현
            $('#area_tb li').click(function(){
              area=$(this).text();
              console.log(area);
              isSelectArea=true;
              area_list.removeClass('area_active');
              $(this).addClass('area_active');

               $.ajax({
                 url:'./dml_address.php',
                 type:'GET',
                 data:{"area":area},
                 success:function(data){
                    si_gun_gu=JSON.parse(data);
                      $('#si_gun_gu').empty();
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
                      area_list.removeClass('area_active');
                      var checkData=$('input[name=si_gun_gu]:checked').val(),
                          ischeckData=$('input[name=si_gun_gu]').is(':checked'),
                          industry_title=$('#search_all').text(),
                          areaSelctBox=$('#area_selectBox > p'),
                          select_industrydaile=$('#industy_list option:selected').val();
                          if(isSelectArea===false){
                            alert("검색할 지역을 선택해주세요!");
                            return;
                          }

                        if ($.trim(industry_title)==="전체>") {

                            if (area==="전체") {
                                areaSelctBox.text(area);
                                isSelectArea=false;
                                console.log($.trim(industry_title)+"/"+select_alignment+"/"+select_career+"/"+area+"/"+checkData);
                                ep_databox.empty();
                                start=0;
                                append_list($.trim(industry_title),select_alignment,select_career,area,checkData,user_id,mode);
                                modal_close();
                                return;
                            }else {
                                if (ischeckData===false) {
                                  alert("시/군 을 선택해주세요!");
                                  return;
                                }
                                isSelectArea=false;
                                console.log($.trim(industry_title)+"/"+select_alignment+"/"+select_career+"/"+area+"/"+checkData);
                                ep_databox.empty();
                                start=0;
                                append_list($.trim(industry_title),select_alignment,select_career,area,checkData,user_id,mode);
                                modal_close();

                           }


                         }else{

                           if (area==="전체") {
                              areaSelctBox.text(area);
                               console.log($.trim(industry_title)+"/"+select_alignment+"/"+select_career+"/"+area+"/"+checkData+"/"+select_industrydaile);
                               ep_databox.empty();
                               idu_start=0;
                               isSelectArea=false;
                               industry_append_list($.trim(industry_title),select_alignment,select_career,area,checkData,select_industrydaile,user_id,mode);
                              modal_close();
                              return;
                            }else{
                                if (ischeckData===false) {
                                    alert("시/군 을 선택해주세요!");
                                    return;
                                }
                                console.log($.trim(industry_title)+"/"+select_alignment+"/"+select_career+"/"+area+"/"+checkData+"/"+select_industrydaile);
                                ep_databox.empty();
                                idu_start=0;
                                isSelectArea=false;
                                industry_append_list($.trim(industry_title),select_alignment,select_career,area,checkData,select_industrydaile,user_id,mode);
                                modal_close();
                           }

                         }//end of ($.trim(industry_title)==="전체>")
                         if(ischeckData===true) {
                           areaSelctBox.text(area+" > "+checkData);
                             isSelectArea=false;

                             modal_close();
                         }

            }); // end of onclick btn_si_gun_gu


            //전체구직 리스트 가져오기
            function append_list(tit,al,cr,sa,select_gu,user_id,mode) {
              console.log(2);
              $.ajax({
                url:'./dml_recruitment.php?select_gu='+select_gu+'&mode='+mode,
                type:'POST',
                data:{"start":start,
                      "list":list,
                      "titleData":tit,
                      "select_alignment":al,
                      "select_career":cr,
                      "select_area_contents":sa,
                      "user_id":user_id
                    },
                success:function(data){
                  // console.log(data);
                  if(data){
                    //관심공고 등록 비교
                    $('#ep_databox').append(data);
                      // var num=$('#interest_insert p').nextAll('input[type=hidden]').val();
                      // console.log(num);
                      // check_favorite_job(num,user_id);
                    start += list;
                    console.log("전체 start: "+start);
                    $('#ep_databox li').each(function(index,item){
                        $(item).addClass("fadein");
                    });

                    // 기존 이벤트 제거
                    $('#interest_insert p').off('click');
                    //관심공고 누를떄(하트누를떄)
                    $('#interest_insert p').click(function(e){
                      console.log("cliclick", e);
                      var pick_job_num=$(this).nextAll('input[type=hidden]').val();
                      if (user_id=='') {
                        alert('로그인 해주세요!');
                        return;
                      }
                      if($(this).next().hasClass('click_heart')){
                        console.log('has class?');
                        favorite_job_remove(user_id,pick_job_num);
                        $(this).next().removeClass('click_heart');
                      }else{
                        favorite_job_add(user_id,pick_job_num);
                        $(this).next().addClass('click_heart');
                      }
                    });

                    return;
                  } else {
                    
                    if($('#ep_databox li').length===0){
                      console.log($('#ep_databox li').length);
                      $('#ep_databox').empty();
                      $('#ep_databox').append('<p>일치하는 데이터가 없습니다</p>');
                    }else {
                      alert("더이상 데이터가 없습니다!");
                    }

                  }
                },
                error:function(request,status,error){
                  console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                }
              });
            }



          //세부산업 클릭시 가져오는 구직 리스트
            function industry_append_list(tit, al, cr, sa,select_gu,industryDtaile,user_id,mode) {
                $.ajax({
                  url:'./dml_recruitment.php?industryDtaile='+industryDtaile+'&select_gu='+select_gu+'&mode='+mode,
                  type:'POST',
                  data:{"start":idu_start,
                    "list":idu_list,
                    "titleData":tit,
                    "select_alignment":al,
                    "select_career":cr,
                    "select_area_contents":sa,
                    "user_id":user_id
                  },
                  success:function(data){
                    // console.log(data, '도착한 데이터!');
                    if(data){
                          $('#ep_databox').append(data);
                          console.log("산업스타트 : "+idu_start);
                          $('#ep_databox li').each(function(index,item){
                              $(item).addClass("fadein");
                          });
                          idu_start += idu_list;
                          return;
                    } else {
                      if($('#ep_databox li').length===0){
                        console.log($('#ep_databox li').length);
                        $('#ep_databox').empty();
                        $('#ep_databox').append('<p>일치하는 데이터가 없습니다</p>');
                      }else{
                          alert("더이상 데이터가 없습니다!");
                      }
                    }
                  },
                  error:function(request,status,error){
                    console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                  }
                });

            }


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


            //모달창 닫기 함수
            function modal_close() {
              setTimeout(function(){
                   $('#area_innerBox').hide();
              },350);
              $('#area_contents').addClass('cancel');
              $('#area_contents').removeClass('open');
            };

            //관심공고 등록
            function favorite_job_add(id,pick_job_num){

              $.ajax({
                url:'./dml_favorite.php?mode=add',
                type:'POST',
                data:{"user_id":id,"pick_job_num":pick_job_num},
                success:function(data){
                      console.log(data);
                      alert('관심공고에 등록되었습니다!');

                },
                error:function(request,status,error){
                  console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                }
              });

            }

            //관심공고 삭제
            function favorite_job_remove(id,pick_job_num){
              console.log('favorite_job_remove?');
              $.ajax({
                url:'./dml_favorite.php?mode=remove',
                type:'POST',
                data:{"user_id":id,"pick_job_num":pick_job_num},
                success:function(){
                      console.log('success!');
                      alert('관심공고에 삭제되었습니다!');

                },
                error:function(request,status,error){
                  console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                }
              });

            }

            //메인에서 검색했을때
            function search_result(search_word,user_id,mode){

              $.ajax({
                url:'./dml_recruitment.php',
                type:'get',
                data:{"search_start":search_start,
                      "search_list":search_list,
                      "search_word":$.trim(search_word),
                      "user_id":user_id,
                      "mode":mode
                    },
                success:function(data){
                  // console.log(data);
                  if(data){
    
                    $('#ep_databox').append(data);
                    search_start += search_list;
                    console.log("전체 start: "+search_start);

                    $('#ep_databox li').each(function(index,item){
                        $(item).addClass("fadein");
                    });

                    // 기존 이벤트 제거
                    $('#interest_insert p').off('click');

                    //관심공고 누를떄(하트누를떄)
                    $('#interest_insert p').click(function(e){
                      console.log("cliclick", e);
                      var pick_job_num=$(this).nextAll('input[type=hidden]').val();
                      if (user_id=='') {
                        alert('로그인 해주세요!');
                        return;
                      }
                      if($(this).next().hasClass('click_heart')){
                        console.log('has class?');
                        favorite_job_remove(user_id,pick_job_num);
                        $(this).next().removeClass('click_heart');
                      }else{
                        favorite_job_add(user_id,pick_job_num);
                        $(this).next().addClass('click_heart');
                      }
                    });

                    return;
                  } else {
                    if($('#ep_databox li').length===0){
                      console.log($('#ep_databox li').length);
                      $('#ep_databox').empty();
                      $('#ep_databox').append('<p>일치하는 데이터가 없습니다</p>');
                    }else {
                      alert("더이상 데이터가 없습니다!");
                    }

                  }
                },
                error:function(request,status,error){
                  console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                }
              });
              
            }//end of search_result
            
   
            //기업회원이 인재 페이지로 들어올시 전체 인재 데이터
            function show_all_applicant(mode){

              $.ajax({
                url:'./dml_recruitment.php?mode='+mode,
                type:'get',
                data:{
                  'apply_start':applay_start,
                  'apply_list':applay_list
                },
                success:function(data){
                  console.log(data);
                  $('#ep_databox').append(data);
                  applay_start += applay_list;
                  $('#ep_databox li').each(function(index,item){
                        $(item).addClass("fadein");
                  });

                }

              });

            }//end of show_all_applicant

          
            
           
           
            




  });


  //nav active 활성화
    document.querySelectorAll('.nav-item').forEach(function(data, idx){
    console.log(data, idx);
    data.classList.remove('active');

    if(idx === 1){
        data.classList.add('active');
        }
    });


    </script>
  </body>
  
</html>
