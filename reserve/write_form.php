<?
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include $_SERVER['DOCUMENT_ROOT']."/lib/util.php";
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="Description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/common.css" rel="stylesheet" type="text/css" media="all">
<link href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/concert.css" rel="stylesheet" type="text/css" media="all">
<link href=<?$_SERVER['DOCUMENT_ROOT']?>"/editor.css" rel="stylesheet" type="text/css" media="all">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src=<?$_SERVER['DOCUMENT_ROOT']?>"/se2/js/service/HuskyEZCreator.js" charset="utf-8"></script>
<?php include $_SERVER['DOCUMENT_ROOT']."/lib/menu.php"; ?>
</head>

<body>

	<div class="container">
		<? echo "<div class='page-header'><h1>$titles[$table]</h1></div>";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/reserve/write_main.php"; ?>
</div>
</body>
</html>
