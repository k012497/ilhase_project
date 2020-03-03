let member_obj = ""; 
let person_count = "";
let corporate_count = "";
let recruitment_count = "";
const personal_modal = document.getElementsByClassName('modal')[0];
const corporate_modal = document.getElementsByClassName('modal')[1];
const PLAN_COLUMNS = 6;
const APPLY_HISTORY_COLUMN = 3;
let plan_list_max_num = 0;
let comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',');

function animate_count_up(target, data){
    $(target).animateNumber({
            number: 0,
        }, {
            duration: 0
        }
    );
    $(target).animateNumber({
            number: data,
            numberStep: comma_separator_number_step
        }, {
            easing: 'swing',
            duration: 1000
        }
    );
}

function get_person_count(){
    $.ajax({
        // async : false,
        cache : false,
        url : "dml_person.php?mode=select_count",
        type : 'GET', 
        data : "", 
        success : function(data) {
            animate_count_up('#person_count', data);
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
            animate_count_up('#corporate_count', data);
        },
        error : function(xhr, status) {
            alert(xhr + " : " + status);
        }
    });
}

function get_recruitment_count(){
    $.ajax({
        cache : false,
        url : "dml_chart.php?mode=recruitment_count",
        type : 'GET', 
        data : "", 
        success : function(data) {
            animate_count_up('#recruitment_count', data);
        },
        error : function(xhr, status) {
            alert(xhr + " : " + status);
        }
    });
}

function get_member_data(){
    var form_data = $("#search_member_form").serialize();

    $.ajax({
        cache : false,
        url : "search_member.php?mode=select",
        type : 'POST',
        data : form_data, 
        success : function(data) {
            if(!data){
                alert('아이디를 확인해 주세요!');
                    return;
            } else {
                member_obj = JSON.parse(data);
                get_apply_data(member_obj.id);
            }
            
        },
        error : function(xhr, status) {
            alert(xhr + " : " + status);
        }
    });
}

function get_apply_data(id){
    $.get('dml_person.php?mode=apply_history', { id : id }, function(apply_history){
        history_obj = JSON.parse(apply_history);
        // 전달 받은 회원정보를 담은 모달창 오픈
        open_info_modal(member_obj, history_obj);
    });
}

function set_person_input_data(){
    input = personal_modal.children[1].querySelectorAll('input');
            input[0].value = member_obj.id;
            input[1].value = member_obj.name;
            input[2].value = member_obj.birth;
            input[3].value = member_obj.gender;
            input[4].value = member_obj.email;
            input[5].value = member_obj.phone;
            input[6].value = member_obj.old_address + "(" + member_obj.zipcode + ")";
}

function set_apply_history_data(history_obj){
    // console.log('set_apply_history_data', history_obj);
    // 개인 회원의 지원 내역을 li 태그에 담아서 ul의 자식으로 추가
    const apply_list = document.querySelector('.apply_history_list');
    apply_list.innerHTML = "";

    if(history_obj){
        for(let i = 0 ; i < history_obj.length ; i++){
            let list_item = document.createElement('li');

            for(let j = 0 ; j < APPLY_HISTORY_COLUMN ; j++){
                let column = document.createElement('span');
                column.className = "col" + (j + 1);
                if(j === 0) {
                    column.innerHTML = history_obj[i].title;
                } else if(j === 1) {
                    column.innerHTML = history_obj[i].industry.split(" ")[0];
                } else if(j === 2) {
                    column.innerHTML = history_obj[i].apply_date;
                }
                list_item.appendChild(column);
            }

            apply_list.appendChild(list_item);
        }
    }
}

function open_info_modal(member_obj, history_obj){
    // console.log(member_obj.member_type);
    let title = null;
    let input = null;
    switch(member_obj.member_type){
        case 'person' :
            title = personal_modal.children[1].querySelector('.modal_title');
            title.textContent = member_obj.name + "(" + member_obj.id+ ")" +"님의 회원 정보";
            
            set_person_input_data(member_obj);
            set_apply_history_data(history_obj);

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

            corporate_modal.style.display = 'block';
            break;
    }

}

function close_modal() {
    personal_modal.style.display = 'none';
    corporate_modal.style.display = 'none';
}

function query_person(mode) {
    if(mode === 'delete'){
        const response = confirm('정말 삭제하시겠습니까?');
        if(!response){
            return;
        }
    }
    document.p_member_info.action = "dml_person.php?mode=" + mode;
    document.p_member_info.submit();
}

function query_corporate(mode) {
    if(mode === 'delete'){
        const response = confirm('정말 삭제하시겠습니까?');
        if(!response){
            return;
        }
    }
    document.c_member_info.action = "dml_corporate.php?mode=" + mode;
    document.c_member_info.submit();
}

function get_revenue(){
    $.get('dml_chart.php', {mode : 'revenue'}, function(data){
        animate_count_up('#total_revenue', data);
    });
}

function get_sales() {
    $.get('dml_chart.php', {mode : 'sales'}, function(data){
        animate_count_up('#sales_volume', data);
    });
}

function get_best_product(){
    $.get('dml_chart.php', {mode : 'best_product'}, function(data){
        $('#best_product').text(data);
    });
}

function get_plan_list(){
    $.ajax({
        async : false,
        cache : false,
        url : "dml_plan.php?mode=select",
        type : 'GET', 
        data : "", 
        success : function(data) {
            plan_obj = JSON.parse(data);
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
                span.innerHTML = plan.count + "개";
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
        const response = confirm('정말 삭제하시겠습니까?');
        if(response){
            $.get('dml_plan.php', {mode : 'delete', name : plan.name}, function () {
                ul.removeChild(li);
            });
        }
    });
    li.appendChild(btn_delete);

}

function get_unanswerd_questions(){
    $.get('dml_chart.php', {mode : 'questions_count'}, function(data){
        animate_count_up('.qna_count', data);
        if(data != 0){
            $('.notification').show();
        }
    });
}

$(document).ready(function () {
    const add_plan_form = $("#add_plan_form");

    // btn_add_plan 누를 때
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
                add_plan_form.each(function(){
                    this.reset();
                });
            }, // success 
            error : function(xhr, status) {
                alert(xhr + " : " + status);
            }
        });
    });

    // 스크롤 이동
    $(".nav-link, #btn_top").click(function() {
        const target = $(this).attr("data-target");
        if(target){
            var scrollPosition = $(target).offset().top;

            switch(target){
                case '#manage_member':
                    // animate
                    get_person_count();
                    get_corporate_count();
                    get_recruitment_count();
                    break;
                case '#manage_product':
                    // animate
                    get_sales();
                    get_revenue();
                    break;
                case '#customer_support':
                    // animate
                    get_unanswerd_questions();
                    break;
            }
    
            $('html, body').animate({
                scrollTop: scrollPosition - 71
            }, 500);
        }
    });

    $(window).scroll(function(){
        // const scroll_top = $(this).scrollTop(); //스크롤바의 상단위치
        // const scroll_height = $(window).height(); //스크롤바를 갖는 window의 높이
        // const scroll_position = scroll_top + scroll_height;

        // if(scroll_position >= 905 && scroll_position <= 912){
        //     // console.log('회원관리');
        //     get_person_count();
        //     get_corporate_count();
        //     get_recruitment_count();
        // } else if(scroll_position >= 1990 && scroll_position <= 1997) {
        //     // console.log('상품관리');
        //     get_sales();
        //     get_revenue();
        // } else if(scroll_position >= 3125 && scroll_position <= 3132){
        //     // console.log('고객센터');
        //     get_unanswerd_questions();
        // }

    });

    // 크기에 따른 높이 설정
    const fit_height = $('.fit_height');
    fit_height.css({
        'min-height' : window.innerHeight,
    });

    // 창크기 변화 감지
    $(window).resize(function() {
        fit_height.css({
        'min-height' : window.innerHeight,
        });

        // console.log(window.outerHeight, window.innerHeight, window.outerWidth, window.outerWidth);
    });

    $("body").animate({
        scrollTop: 300
    }, 500);
});

function init() { 

    // manage member
    get_person_count();
    get_corporate_count();
    get_recruitment_count();

    // manage product
    get_revenue();
    get_sales();
    get_best_product();
    get_plan_list();

    // cs
    get_unanswerd_questions();
}

document.getElementById('input_id').addEventListener('submit', function(e){
    e.preventDefault();
});