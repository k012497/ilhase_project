let member_obj = ""; 
let person_count = "";
let corporate_count = "";
const personal_modal = document.getElementsByClassName('modal')[0];
const corporate_modal = document.getElementsByClassName('modal')[1];
const PLAN_COLUMNS = 6;
let plan_list_max_num = 0;
let comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',');

function get_person_count(){
    $.ajax({
        cache : false,
        url : "dml_person.php?mode=select_count",
        type : 'GET', 
        data : "", 
        success : function(data) {
            $('#person_count').animateNumber(
            {
                number: data,
                numberStep: comma_separator_number_step
            },
            {
                easing: 'swing',
                duration: data * 90
            }
        );
        }, // success 
        error : function(xhr, status) {
            alert(xhr + " : " + status);
        }
    });
}

function get_corporate_count(){
    $.ajax({
        cache : false,
        url : "dml_corporate.php?mode=select_count",
        type : 'GET', 
        data : "", 
        success : function(data) {
            console.log(data);
            $('#corporate_count').animateNumber(
            {
                number: data,
                numberStep: comma_separator_number_step
            },
            {
                easing: 'swing',
                duration: data * 90
            }
        );
        }, // success 
        error : function(xhr, status) {
            alert(xhr + " : " + status);
        }
    });
}

function get_total_count(){

}

function get_member_data(){
    var form_data = $("#search_member_form").serialize();
    $.ajax({
        cache : false,
        url : "search_member.php?mode=select",
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


function get_plan_list(){
    $.ajax({
        cache : false,
        url : "dml_plan.php?mode=select",
        type : 'GET', 
        data : "", 
        success : function(data) {
            plan_obj = JSON.parse(data);
            console.log(plan_obj);
            set_plan_list(plan_obj);
        }, // success 
        error : function(xhr, status) {
            alert(xhr + " : " + status);
        }
    });
}


function set_plan_list(plan_obj){
    plan_list_max_num = plan_obj.length + 1;
    // 데이터를 담은 li를 (plan_obj.length)개 만들어 붙이기
    for(let i = 0 ; i < plan_obj.length ; i++){
        display_plan_list(plan_obj[i], (i + 1));
        // console.log(plan_obj[i], '세팅중');
    }

}

function display_plan_list(plan, num) {
    // 부모가 될 ul
    const ul = document.querySelector('.plan_list');

    // 플랜 데이터를 담은 li 생성
    const li = document.createElement('li');
    li.classList.add('plan_list_item');
    ul.appendChild(li); // .plan_list의 자식으로 추가
    for(let i = 0 ; i < PLAN_COLUMNS ; i++){
        const span = document.createElement('span');
        span.classList.add('col' + (i + 1));

        switch(i){
            case 0:
                span.innerHTML = num;
                break;

            case 1:
                span.innerHTML = plan.name;
                break;

            case 2:
                span.innerHTML = plan.description;
                break;

            case 3:
                span.innerHTML = plan.price + "원";
                break;

            case 4:
                span.innerHTML = plan.sales + "개";
                break;

            case 5:
                if(plan.revenue){
                    span.innerHTML = plan.revenue + "원";
                } else {
                    span.innerHTML = "-";
                }
                break;
        }
        li.appendChild(span);
    }

    const btn_delete = document.createElement('a');
    btn_delete.innerHTML = "𝗫";
    // btn_delete.href = "dml_plan.php?mode=delete&num=" + plan.num;
    btn_delete.addEventListener('click', function(){
        $.get('dml_plan.php', {mode : 'delete', name : plan.name}, function () {
            // 새로고침
            console.log("reload");
            ul.removeChild(li);
            // get_plan_list();
        });
    });
    li.appendChild(btn_delete);

}

// // count up animation
// $('.target').animateNumber(
//     {
//         number: 1533,
//         numberStep: comma_separator_number_step
//     },
//     {
//         easing: 'swing',
//         duration: 1500
//     }
// );


$(document).ready(function () {
    $("#btn_add_plan").click(function(){
        var form_data = $("#add_plan_form").serialize();

        $.ajax({
            cache : false,
            url : "dml_plan.php?mode=insert",
            type : 'POST', 
            data : form_data, 
            success : function(data) {
                var plan_obj = JSON.parse(data);
                display_plan_list(plan_obj, plan_list_max_num);
                plan_list_max_num++;
            }, // success 
            error : function(xhr, status) {
                alert(xhr + " : " + status);
            }
        });
    });

    // 스크롤 이동
    $(".nav-link, #btn_top").click(function() {
        var scrollPosition = $($(this).attr("data-target")).offset().top;
        console.log("clicked!", scrollPosition);
        get_person_count();
        get_corporate_count();

        $('html, body').animate({
            scrollTop: scrollPosition - 71
        }, 500);
    });

    // 크기에 따른 높이 설정
    const fit_height = $('.fit_height');
    fit_height.css({
        'min-height' : window.innerHeight,
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

function init() { 
    // manage member
    get_person_count();
    get_corporate_count();

    // manage product
    get_plan_list();

    // cs
}