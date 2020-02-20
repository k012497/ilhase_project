
<?php
include $_SERVER['DOCUMENT_ROOT']."/ilhase/common/lib/db_connector.php";

$mode = $_GET['mode'];

$num = $page = "";
if(isset($_GET['num'])){
  $num = $_GET['num'];
}

if(isset($_GET['page'])){
  $page = $_GET['page'];
}

// 제목 / 내용 / 첨부파일 폼

if($mode === 'update'){
  // 수정일 경우
  // 원래 글을 불러온다.
  $sql = "select * from notice where num = $num";
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }

  $row = mysqli_fetch_array($result);
  $subject = $row['subject'];
  $content = $row['content'];
  $file_name = $row['file_name'];
  $file_type = $row['file_type'];
  $file_copied = $row['file_copied'];
  $hit = $row['hit'];
  $regist_date = $row['regist_date'];

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/ilhase/common/css/notice.css">

    <script>

      function check_input() {
        const subject = document.getElementById('input_subject');
        const content = document.getElementById('textarea_content');
          if (!subject.value)
          {
              alert("제목을 입력하세요!");
              document.write_notice.subject.focus();
              return;
          } else if (!content.value) {
              alert("내용을 입력하세요!");
              document.write_notice.content.focus();
              return;
          } else {
            document.write_notice.submit();
          }
       }
    </script>
    <title></title>
  </head>
  <body>
    <header>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
      <div id="content">
          <h2 class="title">공지사항 > 내용 > 수정</h2>
	    <form name="write_notice" method="post" action="update_notice.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
          <!-- ul, li 만들기 -->
          <ul id="write_notice">
            <li class="col1">제목 : <input id="input_subject" type="text" name="subject" value="<?=$subject?>"></li>
            <li class="col2">내용 : <textarea id="textarea_content" name="content"><?=$content?></textarea></li>

          </li>
          <li>
            <div class="col1">파일업로드</div>
            <div class="col2">
              <?php
                if($mode=="insert"){
                  echo '<input type="file" name="upfile" >이미지(2MB)파일(0.5MB)';
                }else{
              ?>
                <input type="file" name="upfile" onclick='document.getElementById("del_file").checked=true; document.getElementById("del_file").disabled=true'>
             <?php
                }
              ?>
              <?php
                if($mode=="update" && !empty($file_name)){
                  echo "$file_name 파일등록";
                  echo '<input type="checkbox" id="del_file" name="del_file" value="1">삭제';
                  echo '<div class="clear"></div>';
                }
              ?>
            </div><!--end of col2  -->
          </li>
          </ul>

      </form>
      <!-- php로 mode 검사 해서 수정일 경우 제목,내용,파일 불러오기 -->
      <ul class="buttons">
        <li><button type="button" onclick="check_input()">수정하기</button></li>
        <li>
          <button onclick="location.href='notice_view.php?page=<?=$page?>&num=<?=$num?>'">취소</button></li>
        </ul>
      </div> <!--End Of Content -->


    <footer>
        <?php include "footer.php";?>
    </footer>
  </body>
</html>
