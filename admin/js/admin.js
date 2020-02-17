
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
