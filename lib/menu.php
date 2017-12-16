<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/normalize.css">
<link rel="stylesheet" href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/main.css">
<link rel="stylesheet" href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/owl.carousel.css">
<link rel="stylesheet" href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/responsive.css">
<link rel="stylesheet" href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/style.css">
<script src=<?$_SERVER['DOCUMENT_ROOT']?>"/js/vendor/jquery-3.2.1.min.js"></script>
<script src=<?$_SERVER['DOCUMENT_ROOT']?>"/js/bootstrap.min.js"></script>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href=<?$_SERVER['DOCUMENT_ROOT']?>"/index.php"><i class="fa fa-snowflake-o" style="font-size:40px;color:white;"><b style="font-family: 'NanumBrush';"> 폭설</b></i></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav pull-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">소개 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href=<?$_SERVER['DOCUMENT_ROOT']?>"/intro/intro.php">인사말/시설</a></li>
            <li><a href=<?$_SERVER['DOCUMENT_ROOT']?>"/intro/map.php">오시는길</a></li>
          </ul>
        </li>

        <li><a href=<?$_SERVER['DOCUMENT_ROOT']?>"/rental/rental.php">렌탈&amp;요금</i></a>
        </li>

          <li><a href=<?$_SERVER['DOCUMENT_ROOT']?>"/pension/pension.php">숙박시설안내</a></li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">예약서비스 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href=<?$_SERVER['DOCUMENT_ROOT']?>"/reserve/list.php?table=odreserve&mode=order">예약견적문의</a></li>
            <li><a href=<?$_SERVER['DOCUMENT_ROOT']?>"/reserve/list.php?table=reserve">예약견적확인</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">고객센터 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href=<?$_SERVER['DOCUMENT_ROOT']?>"/reserve/list.php?table=notice">공지사항</a></li>
            <li><a href=<?$_SERVER['DOCUMENT_ROOT']?>"/reserve/list.php?table=free">자유게시판</a></li>
            <li><a href=<?$_SERVER['DOCUMENT_ROOT']?>"/reserve/list.php?table=photo">포토갤러리</a></li>
          </ul>
        </li>

      <ul class="nav navbar-nav" style="">
        <li><a class="" href=<?$_SERVER['DOCUMENT_ROOT']?>"/member/member.php"><span class="glyphicon glyphicon-user"></span>  회원가입</a></li>
        <li>
          <?if(!$p_name){?>
         <a class="" href=<?$_SERVER['DOCUMENT_ROOT']?>"/member/loginform.php"><span class="glyphicon glyphicon-log-in"></span> 로그인</a>
        <?} else {?>
          <a class="" href=<?$_SERVER['DOCUMENT_ROOT']?>"/member/logout.php"><span class="glyphicon glyphicon-log-in"></span> 로그아웃</a>
          <?}?>
        </li>
      </ul>
      <?
      if($p_memtype=='A')
      echo "<li><a href=../admin/index.php><span class=glyphicon glyphicon-user></span>ADMIN</a></li>"
      ?>
        </ul>
    </div>
  </div>
</nav>
