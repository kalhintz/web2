<?
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lib/util.php";
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

if($_SESSION["uip"]==$userip) return true;
else
{ $_SESSION["uip"]=$userip;


//======== 방문자수 count start ========
$wdate = date('Y-m-d');
$sqly = "select * from countb where regdate='$wdate'";
$rsyy = mysqli_query($conn, $sqly);


$rsrow = mysqli_num_rows($rsyy);
if(!$rsrow) {
	$count = 0; }
else {
	$rsy = mysqli_fetch_array($rsyy);
	$count = $rsy[counter];
}
$count++;
if($count==1)
	$sqlz = "insert into countb(counter,regdate) values($count,'$wdate')";
else
	$sqlz = "update countb set counter=$count where regdate='$wdate'";

mysqli_query($conn, $sqlz);
mysqli_close($conn);
//======== 방문자수 count end ========
}
?>
