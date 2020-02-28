<div id="zoom_box">
    <ul>
        <li id="btn_zoomIn" onclick="zoomIn();"><img src="http://<?= $_SERVER["HTTP_HOST"] ?>/ilhase/common/img/zoomIn.png" alt="확대하기"></li>
        <li id="btn_reset" onclick="zoomReset();">원래<br>크기로</li>
        <li id="btn_zoomOut" onclick="zoomOut();"><img src="http://<?= $_SERVER["HTTP_HOST"] ?>/ilhase/common/img/zoomOut.png" alt="축소하기"></li>
    </ul>
</div>
<script>

    
 
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
       console.log(scale);
    }
    //쫄쫄이 메뉴
    $(function(){

        var zoom_top=$('#zoom_box').offset().top; // zoom_box의 offsetTop
        console.log(zoom_top);

        $(window).scroll(function(){
            //스크롤 할때
        if ($(window).scrollTop() > zoom_top ) {
				// 스크롤탑 - 박스탑
				// $(window).scrollTop() - box_top
				// 브라우저 상단에서 박스까지의 거리값
				$('#zoom_box').stop().animate({
					'margin-top' : $(window).scrollTop() - zoom_top +50
				},300);
			} else {
				$('#zoom_box').stop().animate({
					'margin-top' : 0
				},300);
		    }
      });

    });

</script>