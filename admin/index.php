<?
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lib/util.php";
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

include $_SERVER['DOCUMENT_ROOT']."/admin/lib/admincount.php";
include $_SERVER['DOCUMENT_ROOT']."/admin/lib/cboard.php";

$sqlm = "select * from member";
$rsmm = mysqli_query($conn, $sqlm);
$mmrow = mysqli_num_rows($rsmm);

mysqli_close($conn);
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body class="centered">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <header>

          <div class="record">
                  <div class="panel">
                    <div class="panel-head" style="text-align:center">
                      <strong>방문자수</strong>
                    </div>
                    <div class="panel-body" style="text-align:center">
                      <strong><?=$count?> / <?=$total?></strong>
                    </div>
                  </div>
                <div class="panel">
                  <div class="panel-head" style="text-align:center">
                    <strong>예약자수</strong>
                  </div>
                  <div class="panel-body" style="text-align:center">
                    <strong><?=$ccre?> / <?=$ccre2?></strong>
                  </div>
                </div>
              <div class="panel">
                <div class="panel-head" style="text-align:center">
                  <strong>총게시물수</strong>
                </div>
                <div class="panel-body" style="text-align:center">
                  <strong><?=$ccno[0]?></strong>
                </div>
              </div>
            <div class="panel">
              <div class="panel-head" style="text-align:center">
                <strong>회원수</strong>
              </div>
              <div class="panel-body" style="text-align:center">
                <strong><?=$mmrow?></strong>
              </div>
            </div>
          </div>
          <div class="navbar">
              <h1>Admin</h1>
          </div>
        </header>

        <nav>
          <div class="centered">
            <p class="">
              <a href="#" class="userm" id="userm" onclick="showDB(this.id)">회원관리</a>
            </p>
            <p class="">
              <a href="#" class="boardm" id="boardm" onclick="showDB(this.id)">게시판관리</a>
            </p>
            <p class="">
              <a href="#" class="itemm" id="itemm" onclick="showDB(this.id)">상품관리</a>
            </p>
            <p class="">
              <a href="#" class="bookm" id='bookm' onclick="showDB(this.id)">예약관리</a>
            </p>
            <p class="">
              <a href="#"  class="setm" id='setm' onclick="showDB(this.id)">환경설정</a>
            </p>
          </div>
      </nav>


          <div class="content" id="txtHint">

          </div>


        <footer>

        </footer>

        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script type="text/javascript" src="js/vendor/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/vendor/jquery.form.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>
