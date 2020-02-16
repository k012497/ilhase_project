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
                <form action="search_member.php?mode=select" method="post">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="member_type" value="person" id="option1" autocomplete="off" checked> 개인 회원
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="member_type" value="corporate" id="option2" autocomplete="off"> 기업 회원
                        </label>
                    </div>

                    <input type="text" name="id" placeholder="ID" style="padding-left: 10px;">
                    <input type="submit" id="btn_search_member" value="조회">
                </form>
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