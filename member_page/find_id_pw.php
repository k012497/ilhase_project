<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/img/favicon.png" sizes="128x128">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <title>일하세</title>
</head>
<body>
    <?php
        include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";

        if(isset($_GET['mode'])){
            $mode = $_GET['mode'];
        } else {
            $mode = "";
        }

        switch ($mode){
            case 'id':
                // 아이디 찾기
                break;

            case 'pw':
                // 비밀번호 찾기
                break;

            default :
                break;
        }

    ?>

    <div class="container">

        <h3 class="title">아이디 찾기</h3>
        <form action="find_id_pw.php?mode=id" method="post">
            <div class="btn-group btn-group-toggle text-center" data-toggle="buttons">
                <label class="btn btn-secondary active">
                    <input type="radio" name="member_type" value="person" id="option1" autocomplete="off" checked> 개인 회원
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="member_type" value="corporate" id="option2" autocomplete="off"> 기업 회원
                </label>
            </div><br/>
            <label for="id">이름</label><input type="text" name="name" required><br />
            <label for="pw">휴대폰 번호</label><input type="tel" name="phone" placeholder="(-)을 포함한 휴대폰 번호" required><br />
            <label></label><input type="submit" value="찾기">
        </form>
        <hr />
        <h3 class="title">비밀번호 찾기</h3>
        <form action="find_id_pw.php?mode=pw" method="post">
            <div class="btn-group btn-group-toggle text-center" data-toggle="buttons">
                <label class="btn btn-secondary active">
                    <input type="radio" name="member_type" value="person" id="option1" autocomplete="off" checked> 개인 회원
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="member_type" value="corporate" id="option2" autocomplete="off"> 기업 회원
                </label>
            </div><br/>
            <label for="id">아이디</label><input type="text" name="id" required><br />
            <label for="name">이름</label><input type="text" name="name" required><br />
            <label for="phone">휴대폰 번호</label><input type="tel" name="phone" placeholder="(-)을 포함한 휴대폰 번호" required><br />
            <label></label><input type="submit" value="찾기">
        </form>
    </div>

    <?php
        include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/footer.php";
    ?>

    <style>

        .container form {
            min-height: 10rem;
            text-align: center;
        }
        
        .container button {
            width: 300px;
            padding: 0.5rem 1rem;
        }
        
        .container .title {
            margin: 3rem;
        }
        
        .container label {
            width: 100px;
        }

        .container input {
            width: 300px;
            height: 42px;
            margin-bottom: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            border: 1px solid #777;
            outline: 0;
        }

        .container input[type="submit"] {
            border: 0;
            background-color: gray;
            color: white;
        }

        .container {
            margin-bottom: 3rem;
        }

        .btn-group {
            margin-bottom: 0.5rem;
            width: 300px;
            margin-left: 100px;
        }

        .btn-group .btn-secondary {
            background-color: #ccc;
            width: 50%;
        }

        .btn-secondary:not(:disabled):not(.disabled).active {
            background-color: rgb(133, 198, 241);
        }

        .btn-group>.btn:not(:first-child), .btn-secondary:not(:disabled):not(.disabled).active,
        .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
            border: 0;
        }

        hr {
            margin-top: 3rem;
        }
    </style>
    <script>
        // nav-item 선택 제거
        document.querySelectorAll('.nav-item').forEach(function(data, idx){
          data.classList.remove('active');
        });
    </script>
</body>
</html>