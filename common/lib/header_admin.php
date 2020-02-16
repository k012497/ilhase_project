<!-- js -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- css -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/common/css/common.css">

<style>
    #navbarSupportedContent .nav-link {
        color: white;
    }

    #navbarSupportedContent .dropdown-toggle {
        padding-left: 20px;
    }
</style>

<!-- html -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black; position: fixed; width: 100%;">
  <a class="navbar-brand" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/index.php" style="color: white;">일하세</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" data-target="#manage_member" href="#">회원관리<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-target="#manage_product" href="#">상품관리</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-target="#customer_support" href="#">고객센터</a>
        </li>
        <li class="nav-item dropdown" id="nav_user">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            관리자
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">문의 메세지</a>
                <a class="dropdown-item" href="#">로그아웃</a>
            </div>
        </li>
    </ul>

    <button id="btn_top"> 🔝 </button>

  </div>
</nav>
