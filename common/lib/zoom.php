<div id="zoom_box">
    <ul>
        <li id="btn_zoomOut" onclick="zoomOut();"><img src="http://<?= $_SERVER["HTTP_HOST"] ?>/ilhase/common/img/zoomOut.png" alt="축소하기"></li>
        <li id="btn_reset" onclick="zoomReset();">원래&nbsp;크기로</li>
        <li id="btn_zoomIn" onclick="zoomIn();"><img src="http://<?= $_SERVER["HTTP_HOST"] ?>/ilhase/common/img/zoomIn.png" alt="확대하기"></li>
    </ul>
</div>
<script>
var distance= 620;
    
    var scale=1;
    var nowZoom=1;

    function zoomIn(){
        scale +=0.05;
        nowZoom += 0.05;
        if(scale>=1.2 || nowZoom>=1.2){
            scale=1.2;
            nowZoom=1.2;
        }

        zoom();
    }

    function zoomOut(){
        scale -= 0.05;
        nowZoom -= 0.05;
        if(scale <=0.95 || scale <= 0.95){
            scale = 0.95;
            nowZoom=0.95;          
        }
        zoom();
    }
    
    function zoomReset(){
        scale=1;
        nowZoom=1;
        zoom();
    }

    function zoom() {
        if(scale==0.95 || nowZoom==0.95){
           alert("더이상 축소할 수 없습니다.");
            return;
       }

       if(nowZoom==1.2 || nowZoom==1.2){
        alert(" 더이상 확대 할 수 없습니다.");
        return;
       }

        document.body.style.zoom = nowZoom;
        document.body.style.webkitTransform='scale('+scale+')';
        document.body.style.transformOrigin= '0% 0%';

        distance = parseInt($('#zoom_box').offset().top);
    }

    //쫄쫄이 메뉴
    $(function(){
        $('#zoom_box').offset({top : $(window).scrollTop() + (innerHeight * 0.9)});

        $(window).resize(function(){
            window.innerHeight;
        });
        
        //스크롤 할때
        $(window).scroll(function(){
            if(scale == 1){
                $('#zoom_box').offset({top : $(window).scrollTop() + (innerHeight * 0.9)});
            } else if(scale > 1 && scale <= 1.1){
                $('#zoom_box').offset({top : $(window).scrollTop() + (innerHeight * 0.8)});
            } else {
                $('#zoom_box').offset({top : $(window).scrollTop() + (innerHeight * 0.7)});
            }
        });
    });

</script>