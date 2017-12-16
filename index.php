<? session_start();
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$sql = "select * from mainimg";
$result = mysqli_query($conn, $sql);

$pay = "select * from payment";
$payrs = mysqli_query($conn,$pay);
$payrw = mysqli_fetch_array($payrs);

switch ($payrw[bank]) {
  case '1':$payrw[bank]='농협';break;
  case '2':$payrw[bank]='국민';break;
  case '3':$payrw[bank]='신한';break;
  case '4':$payrw[bank]='우리';break;
  default:break;
}

while($row = mysqli_fetch_array($result))
$src[]=$row[src];

?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>폭설</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
	<!--[if lt IE 9]> <script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script> <![endif]-->
        <!-- Place favicon.ico in the root directory -->
<? include $_SERVER['DOCUMENT_ROOT']."/lib/menu.php"; ?>
    </head>
<body>

<? include $_SERVER['DOCUMENT_ROOT']."/lib/counter.php"; ?>


<!-- start slider Section -->
<section id="slider_sec">
	<div class="container">
		<div class="row">
			<div class="slider">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators" style="top: 600px;">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
					<div class="item active">
						<div class="wrap_caption">
						  <div class="caption_carousel">
							<img src=<?="admin/lib/".$src[0]?> alt=""/>
						  </div>
						</div>
					</div>
					<div class="item">
						<div class="wrap_caption">
						  <div class="caption_carousel">
							<img src=<?="admin/lib/".$src[1]?> alt=""/>
						  </div>
						</div>
					</div>
					<div class="item ">
						<div class="wrap_caption">
						  <div class="caption_carousel">
							<img src=<?="admin/lib/".$src[2]?> alt="" />
						  </div>
						</div>
					</div>
				  </div>

				  <!-- Controls -->
				  <a class="left left_crousel_btn" href="#carousel-example-generic" role="button" data-slide="prev">
					<i class="fa fa-angle-left"></i>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right right_crousel_btn" href="#carousel-example-generic" role="button" data-slide="next">
					<i class="fa fa-angle-right"></i>
					<span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End slider Section -->

<!-- start about Section -->
<section id="abt_sec" class="container">
      <div class="container-fluid text-center" style="">
      <div class="row">

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
          <div class="thumbnail">
            <a href="#">
              <img src="img/quick01.gif" alt="요금">
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
          <div class="thumbnail">
            <a href="#">
              <img src="img/quick02.gif" alt="에약">
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
          <div class="thumbnail">
            <a href="#">
              <img src="img/quick03.gif" alt="숙박">
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
          <div class="thumbnail">
            <a href="#">
              <img src="img/quick04.gif" alt="오시는길">
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
          <div class="thumbnail">
            <a href="#">
              <img src="img/quick05.gif" alt="이용후기">
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
          <div class="thumbnail">
            <a href="#">
              <img src="img/quick06.gif" alt="포토갤러리">
            </a>
          </div>
        </div>
      </div>
</div>

<div class="container">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
  <div class="title_sec">
    <ul class="nav nav-pills">
      <li class="active"><a data-toggle="pill" href="#home">공지사항</a></li>
      <li><a data-toggle="pill" href="#menu1">이벤트</a></li>
    </ul>
  </div>
  <div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <ol>
    <? latest_article("notice", 10, 30); ?>
  </ol>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>이벤트탭</h3>
    <p>이벤트</p>
  </div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
  <div class="panel panel-primary">
      <div class="panel-heading text-center"><h4 style='color:#fff'>결제방식안내</h4></div>
      <div class="panel-body text-center">
        <span class="col-md-3 bg-info">은행정보</span>
        <span class="col-md-9">
          <img src="admin/setting/banks/<?=$payrw[bank]?>.jpg" alt="<?=$payrw[bank]?>"width="100px;"></span>
        <span class="col-md-3 bg-info">계좌번호</span>
        <span class="col-md-9"><?=$payrw[account]?></span>
        <span class="col-md-3 bg-info">예금주명</span>
        <span class="col-md-9"><?=$payrw[name]?></span>
      </div>
    </div>
</div>
</div>
</section>
<!-- End About Section -->


<!-- start Service Section -->
<section id="pr_sec">
	<div class="jumbotron container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>폭설강촌점</h1>
					<h2>강촌리조트에서의 멋진 추억을 만드실 수 있도록 저희 <b>폭설 강촌점</b>이 책임지겠습니다.
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">
					<a href="#"><img src="img/ski.jpg" alt=""/></a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">
					<a href="#"><img src="img/ski2.jpg" alt=""/></a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">
					<a href="#"><img src="img/ski3.jpg" alt=""/></a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">
					<a href="#"><img src="img/ski.jpg" alt=""/></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Service Section -->

<!-- start pricing Section -->
<section id="pricing_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>시즌권 안내</h1>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="sngl_pricing">
					<h2 class="title_bg_1">전일권</h2>
					<h3>380,000<span class="currency">원</span></h3>
					<ul>
            <li>소인 : 290,000원</li>
						<li>유아 : 140,000원</li>
						<li><a href="" class="btn pricing_btn">Send</a></li>

					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="sngl_pricing">
					<h2 class="title_bg_2">주중권</h2>
					<h3>310,000<span class="currency">원</span></h3>
					<ul>
            <li>소인 : 240,000원</li>
						<li>친구끼리 : 360,000원</li>
						<li><a href="" class="btn pricing_btn">Send</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="sngl_pricing">
					<h2 class="title_bg_3">심야권</h2>
					<h3>140,000<span class="currency">원</span></h3>
					<ul>
            <li>소인 : 240,000원</li>
						<li>친구끼리 : 360,000원</li>
						<li><a href="" class="btn pricing_btn">Send</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End pricing Section -->


<!-- start contact us Section -->
<section id="ctn_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>Contact Info</h1>
					<h2></h2>
				</div>
			</div>
			<div class="col-sm-6">
				<div id="cnt_form">
					<form id="contact-form" class="contact" name="contact-form" method="post" action="send-mail.php">
						<div class="form-group">
						<input type="text" name="name" class="form-control name-field" required="required" placeholder="성명">
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control mail-field" required="required" placeholder="이메일주소">
						</div>
						<div class="form-group">
							<textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="남기실말씀"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">보내기</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="cnt_info">
					<ul>
						<li><i class="fa fa-home"></i><p>(주)폭설스키장 강원도 춘천시 ㅁㅁㅁ ㅁㅁㅁㅁ 111</p></li>
            <li><i class="fa fa-phone"></i><p>TEL : (예약문의) 1588-0009 (현장문의) 033-335-5757</p></li>
						<li><i class="fa fa-envelope"></i><p>email@email.com</p></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End contact us  Section -->

<!-- start footer Section -->
<footer id="ft_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ft">
					<ul>
						<li><a href=""><i class="fa fa-facebook"></i></a></li>
						<li><a href=""><i class="fa fa-twitter"></i></a></li>
						<li><a href=""><i class="fa fa-dribbble"></i></a></li>
						<li><a href=""><i class="fa fa-rss"></i></a></li>
						<li><a href=""><i class="fa fa-flickr"></i></a></li>
						<li><a href=""><i class="fa fa-pinterest"></i></a></li>
						<li><a href=""><i class="fa fa-linkedin"></i></a></li>
						<li><a href=""><i class="fa fa-skype"></i></a></li>
						<li><a href=""><i class="fa fa-google"></i></a></li>
					</ul>
				</div>
				<ul class="copy_right">
          <li>대표이사 : 권승환 사업자등록번호: 111-11-11111 통신판매업 신고번호 : 제 2004-3호 개인정보관리책임 : 마케팅1팀 권승환</li>
      		<li><br/>Copyright 2017 POKSUL RESORT All rights reserved.</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- End footer Section -->

<script type="text/javascript" src="js/vendor/jquery-3.2.1.min.js"></script>
<!--<script src="js/vendor/jquery-1.11.3.min" charset="utf-8"></script>-->

<script src="js/isotope.pkgd.min.js"></script>
<script src="js/appear.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/scrolling-nav.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script>
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>

    </body>
</html>
