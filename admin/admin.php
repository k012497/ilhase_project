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
<body onload="init();">
    <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header_admin.php";?>
    </header>

    <!-- top -->
    <div id="admin_main_top" class="fit_height" src="" alt="">
        <div id="main_top_logo">
            <span style="font-size: 32px;">중장년 구인구직 플랫폼</span><br />
            <span style="font-size: 120px; font-weight:700;">일하세</span>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.7.0.min.js"></script>
    <script src="./js/jquery.animateNumber.js"></script>

    <!-- main container -->
    <div class="container">
        <!-- 회원 관리 -->
        <div class="fit_height admin_menu" id="manage_member">
            <h2 class="title">회원 관리</h2>
            <ul class="manage_member_list">
                <li>
                    <div class="manage_member_item">
                        <span >개인 회원 수</span>
                        <br /><br />
                        <span id="person_count" class="target" style="font-size: 30px;"></span><span>명</span>
                    </div>
                </li>
                <li>
                    <div class="manage_member_item">
                        <span>기업 회원 수</span>
                        <br /><br />
                        <span id="corporate_count" class="target" style="font-size: 30px;"></span><span>명</span>
                    </div>
                </li>
                <li>
                    <div class="manage_member_item">
                        <span>등록된 공고</span>
                        <br /><br />
                        <span id="recruitment_count" style="font-size: 30px;"></span><span>개</span>
                    </div>
                </li>
            </ul>
            <div class="search_member">
                <form action="" onsubmit="get_member_data(); return false;" id="search_member_form" method="post">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" style="margin-right : 1rem;">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="member_type" value="person" id="option1" autocomplete="off" checked> 개인 회원
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="member_type" value="corporate" id="option2" autocomplete="off"> 기업 회원
                        </label>
                    </div>

                    <input type="text" name="id" placeholder="ID" style="padding-left: 10px;" id="input_id">
                    <input type="button" onclick="get_member_data();" id="btn_search_member" value="조회">
                </form>
            </div>
            <div class="chart">
                <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/admin/member_chart.php";?>
            </div>
            
            <!-- person modal -->
            <div class="modal">
                <div class="modal_overlay"></div>
                <div class="modal_content">
                    <h4 class="modal_title"></h4>
                    <button class="btn_close" onclick="close_modal();">𝗫</button>
                    <br />
                    <form name="p_member_info" method="post">
                        <input type="hidden" name="id">
                        <label for="">이름</label><input type="text" name="name"><br />
                        <label for="">생년월일</label><input type="text" name="birth"><br />
                        <label for="">성별</label><input type="text" name="gender"><br />
                        <label for="">이메일</label><input type="text" name="email"><br />
                        <label for="">휴대폰</label><input type="text" name="phone"><br />
                        <label for="">주소</label><input type="text" name="address" disabled="true"><br />
                        <div class="apply_history">
                            <div>
                                <span class="col1">지원한 공고</span><span class="col2">직종</span><span class="col3">날짜</span>
                            </div>
                            <ul class="apply_history_list"></ul>
                        </div>
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

        <!-- 상품 관리 -->
        <div class="fit_height admin_menu" id="manage_product">
            <h2 class="title">상품 관리</h2>
            <div>
                <ul class="manage_product_list">
                    <li>
                        <div class="manage_product_item">
                            <span >총 매출액</span>
                            <br /><br />
                            <span id="total_revenue" class="target" style="font-size: 30px;"></span><span>원</span>
                        </div>
                    </li>
                    <li>
                        <div class="manage_product_item">
                            <span>총 판매량</span>
                            <br /><br />
                            <span id="sales_volume" class="target" style="font-size: 30px;"></span><span>개</span>
                        </div>
                    </li>
                    <li>
                        <div class="manage_product_item">
                            <span>효자 상품</span>
                            <br /><br />
                            <span id="best_product" style="font-size: 26px; letter-spacing: -1px;"></span>
                        </div>
                    </li>
                </ul>
                <div class="chart">
                    <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/admin/plan_chart.php";?>
                </div>
                <div class="add_plan">
                    <!-- <select name="sort" id="sort_plan_list">정렬
                        <option value="">번호순</option>
                        <option value="">판매량순</option>
                        <option value="">매출순</option>
                    </select><br /> -->
                    <ul class="plan_list">
                        <li>
                            <span class="col1">NO</span>
                            <span class="col2">이름</span>
                            <span class="col3">내용</span>
                            <span class="col4">가격</span>
                            <span class="col5">판매량</span>
                            <span class="col6">매출액</span>
                        </li>
                    </ul>
                    <form action="dml_plan.php?mode=insert" id="add_plan_form" method="post">
                        <label for="id">새로운 플랜 추가</label>
                        <input type="text" placeholder="이름" name="name">
                        <input type="text" placeholder="내용" name="description">
                        <input type="number" max="9999999" placeholder="가격" name="price">
                        <input type="button" id="btn_add_plan" value="추가">
                    </form>
                </div>
            </div>
        </div>

        <!-- 고객 센터 -->
        <div class="fit_height admin_menu" id="customer_support">
            <h2 class="title" style="display: inline-block; margin-right: 20px;">고객센터</h2>
            <button id="btn_write_notice" onclick="location.href='http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/cs/write_notice_form.php?mode=insert'"> ➕ 공지사항 등록하기 </button>
            <br />
            <div class="cs_content">
                <div id="cs_left">

                        <span>답변을 기다리는 문의</span> <br />
                        <span class="qna_count_container"><span class="qna_count">0</span>건</span>

                </div>
                <div id="cs_right">
                    <a href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/cs/qna_list.php">자세히 보기</a>
                </div>
                
            </div>
        </div>

        </div>
    </div>

    <style>
        .navbar {
            position: fixed;
        }
    </style>
    <script src="./js/admin.js"></script>
</body>
</html>