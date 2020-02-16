<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/admin/css/admin.css">

</head>
<body>
    <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header_admin.php";?>
    </header>
    <script>
        // 외부로 빼기 ------------------------
        

        $(document).ready(function () {

            // 스크롤 이동
            $(".nav-link, #btn_top").click(function() {
                var scrollPosition = $($(this).attr("data-target")).offset().top;
                console.log("clicked!", scrollPosition);

                $('html, body').animate({
                    scrollTop: scrollPosition - 71
                }, 500);
            });

            // 크기에 따른 높이 설정
            const fit_height = $('.fit_height');
            fit_height.css({
                'height' : window.innerHeight,
            });

            // 창크기 변화 감지
            $(window).resize(function() {
                // $('#admin_main_top').css({
                //     'width' : '100%',
                //     'background-size': '100%'
                // });
                fit_height.css({
                'height' : window.innerHeight,
            });

            console.log(window.outerHeight, window.innerHeight, window.outerWidth, window.outerWidth);
            });

        $("body").animate({
	        scrollTop: 300
        }, 500);
        });
    </script>

    <div id="admin_main_top" class="fit_height" src="" alt="">
        <div id="main_top_logo">
            <span style="font-size: 32px;">중장년 구인구직 플랫폼</span><br />
            <span style="font-size: 120px; font-weight:500;">일하세</span>
        </div>
    </div>


    <!-- <p>Fun level <span id="target" style="font-size: 30px;"></span>.</p> -->
    
    <script src="http://code.jquery.com/jquery-1.7.0.min.js"></script>
    <script src="jquery.animateNumber.js"></script>

    <div class="container">
        <div class="fit_height admin_menu" id="manage_member">
            <h2 class="title">회원 관리</h2>
            <ul class="manage_member_list">
                <li>
                    <div class="manage_member_item">
                        <span >개인 회원 수</span>
                        <br /><br />
                        <span class="target" style="font-size: 30px;"></span>
                    </div>
                </li>
                <li>
                    <div class="manage_member_item">
                        <span>개인 회원 수</span>
                        <br /><br />
                        <span class="target" style="font-size: 30px;"></span>
                    </div>
                </li>
                <li>
                    <div class="manage_member_item">
                        <span>개인 회원 수</span>
                        <br /><br />
                        <span class="target" style="font-size: 30px;"></span>
                    </div>
                </li>
            </ul>
            <div class="search_memeber">
                <form action="search_member.php?mode=select" id="search_member_form" method="post">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="member_type" value="person" id="option1" autocomplete="off" checked> 개인 회원
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="member_type" value="corporate" id="option2" autocomplete="off"> 기업 회원
                        </label>
                    </div>

                    <input type="text" name="id" placeholder="ID" style="padding-left: 10px;">
                    <input type="button" onclick="get_member_data();" id="btn_search_member" value="조회">
                </form>
            </div>
            <!-- person modal -->
            <div class="modal">
                <div class="modal_overlay"></div>
                <div class="modal_content">
                    <h4 class="modal_title"></h4>
                    <button class="btn_close" onclick="close_modal();">𝗫</button>
                    <br /><br />
                    <form name="p_member_info" method="post">
                        <input type="hidden" name="id">
                        <label for="">이름</label><input type="text" name="name"><br />
                        <label for="">생년월일</label><input type="text" name="birth"><br />
                        <label for="">성별</label><input type="text" name="gender"><br />
                        <label for="">이메일</label><input type="text" name="email"><br />
                        <label for="">휴대폰</label><input type="text" name="phone"><br />
                        <label for="">주소</label><input type="text" name="address" disabled="true"><br />
                    </form>

                    <button onclick="query_person('update');">수정</button>
                    <button onclick="query_person('delete');">삭제</button>
                </div>
            </div>
            <!-- corporate modal -->
            <div class="modal">
                <div class="modal_overlay"></div>
                <div class="modal_content">
                    <h4 class="modal_title"></h4>
                    <button class="btn_close" onclick="close_modal();">𝗫</button>
                    <br /><br />
                    <form name="c_member_info" method="post">
                        <input type="hidden" name="id">
                        <label for="">회사명</label><input type="text" name="b_name"><br />
                        <label for="">업종</label><input type="text" name="job_category" disabled="true"><br />
                        <label for="">대표자명</label><input type="text" name="ceo"><br />
                        <label for="">사업자 번호</label><input type="text" name="b_license_num" disabled="true"><br />
                        <label for="">주소</label><input type="text" name="address"><br />
                        <label for="">이메일</label><input type="text" name="email"><br />
                        <label for="">남은 이용 횟수</label><input type="text" name="available_service" ><br />
                    </form>

                    <button onclick="query_corporate('update');">수정</button>
                    <button onclick="query_corporate('delete');">삭제</button>
                </div>
            </div>
        </div>

        <div class="fit_height admin_menu" id="manage_product">
            <h2 class="title">상품 관리</h2>
            <div>
                <ul class="manage_product_list">
                    <li>
                        <div class="manage_product_item">
                            <span >총 매출액</span>
                            <br /><br />
                            <span class="target" style="font-size: 30px;"></span>
                        </div>
                    </li>
                    <li>
                        <div class="manage_product_item">
                            <span>총 판매량</span>
                            <br /><br />
                            <span class="target" style="font-size: 30px;"></span>
                        </div>
                    </li>
                    <li>
                        <div class="manage_product_item">
                            <span>뭐하지</span>
                            <br /><br />
                            <span class="target" style="font-size: 30px;"></span>
                        </div>
                    </li>
                </ul>
                <div class="add_plan">
                    <select name="sort" id="sort_plan_list">정렬
                        <option value="">번호순</option>
                        <option value="">판매량순</option>
                        <option value="">매출순</option>
                    </select><br />
                    <ul class="plan_list">
                        <li>
                            <span class="col1">NO</span>
                            <span class="col2">이름</span>
                            <span class="col3">내용</span>
                            <span class="col4">가격</span>
                            <span class="col5">판매량</span>
                            <span class="col6">매출</span>
                        </li>
                    </ul>
                    <form action="#" method="post">
                        <label for="id">새로운 플랜 추가</label>
                        <input type="text" placeholder="이름" name="name">
                        <input type="text" placeholder="내용" name="description">
                        <input type="text" placeholder="가격" name="price">
                        <input type="button" value="추가">
                    </form>
                </div>
            </div>
        </div>
        <div class="fit_height admin_menu" id="customer_support">
            <h2 class="title" style="display: inline; margin-right: 20px;">고객센터</h2> <button id="btn_write_notice"> ➕ 공지사항 등록하기 </button>
            <br />
            <div class="cs_content">
                <div id="cs_left">
                    <span>답변을 기다리는 문의</span> <br />
                    <span>0건</span>
                </div>
                <div id="cs_right">자세히 보기</div>
            </div>
        </div>
        </div>
    </div>


    <script>
        let member_obj = ""; 
        const personal_modal = document.getElementsByClassName('modal')[0];
        const corporate_modal = document.getElementsByClassName('modal')[1];

        function get_member_data(){
            var form_data = $("#search_member_form").serialize();

            $.ajax({
            cache : false,
            url : "search_member.php?mode=select", // 요기에
            type : 'POST', 
            data : form_data, 
            success : function(data) {
                member_obj = JSON.parse(data);
                console.log(member_obj);
                // 전달 받은 회원정보를 담은 모달창 오픈
                open_info_modal(member_obj);
            }, // success 
            error : function(xhr, status) {
                alert(xhr + " : " + status);
            }
            });
        }

        function open_info_modal(member_obj){
            console.log(member_obj.member_type);
            let title = null;
            let input = null;
            switch(member_obj.member_type){
                case 'person' :
                    title = personal_modal.children[1].querySelector('.modal_title');
                    title.textContent = member_obj.name + "(" + member_obj.id+ ")" +"님의 회원 정보";

                    input = personal_modal.children[1].querySelectorAll('input');
                    input[0].value = member_obj.id;
                    input[1].value = member_obj.name;
                    input[2].value = member_obj.birth;
                    input[3].value = member_obj.gender;
                    input[4].value = member_obj.email;
                    input[5].value = member_obj.phone;
                    input[6].value = member_obj.old_address + "(" + member_obj.zipcode + ")";


                    personal_modal.style.display = 'block';
                    break;

                case 'corporate' :
                    console.log('hee');
                    title = corporate_modal.children[1].querySelector('.modal_title');
                    title.textContent = member_obj.b_name + "(" + member_obj.id+ ")" +"님의 회원 정보";

                    input = corporate_modal.children[1].querySelectorAll('input');
                    input[0].value = member_obj.id;
                    input[1].value = member_obj.b_name;
                    input[2].value = member_obj.job_category;
                    input[3].value = member_obj.ceo;
                    input[4].value = member_obj.b_license_num;
                    input[5].value = member_obj.address;
                    input[6].value = member_obj.email;
                    input[7].value = member_obj.available_service;

                    console.log('open@@@@');
                    console.log(member_obj.member_type);

                    corporate_modal.style.display = 'block';
                    break;
            }

            

        }

        function close_modal() {
            personal_modal.style.display = 'none';
            corporate_modal.style.display = 'none';
        }

        function query_person(mode) {
            document.p_member_info.action = "dml_person.php?mode=" + mode;
            document.p_member_info.submit();
        }

        function query_corporate(mode) {
            document.c_member_info.action = "dml_corporate.php?mode=" + mode;
            document.c_member_info.submit();
        }


        // count up animation
        var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
        $('.target').animateNumber(
            {
                number: 1533,
                numberStep: comma_separator_number_step
            },
            {
                easing: 'swing',
                duration: 1500
            }
        );
    </script>
</body>
</html>