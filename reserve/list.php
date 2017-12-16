<?
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lib/util.php";
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$cssname="../css/$table.css";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/css/style2.css" rel="stylesheet" type="text/css">
<script src="/js/common.js" type="text/javascript"></script>
<link href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/common.css" rel="stylesheet" type="text/css" media="all">
<link href=<?if(file_exists($cssname)) echo $cssname; else "";?> rel="stylesheet" type="text/css" media="all">

<?php include $_SERVER['DOCUMENT_ROOT']."/lib/menu.php"; ?>
</head>

<body>
<div class="clearfix">
</div>

	<div class=<?if($table=='odreserve')echo"'centered col-lg-10 col-md-10 col-sm-10 container'"; else if ($table=='reserve') echo 'container'; else echo "'centered container'";?> <?if($table!="odreserve") echo "style=left:0px;"; else echo '';?>>

			<? echo "<div class='page-header'><h1>$titles[$table]</h1></div>";?>

<?
if($table!="odreserve" && $table!="photo") {include $_SERVER['DOCUMENT_ROOT']."/reserve/list_main.php";}
else if($table=="photo") include $_SERVER['DOCUMENT_ROOT']."/reserve/photo.php";
else include $_SERVER['DOCUMENT_ROOT']."/reserve/reserve.php";
 ?>
</div>
</body>

</html>
