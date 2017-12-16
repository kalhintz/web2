<?

$wdate = date('Y-m-d');
$sqlx = "select * from countb where regdate='$wdate'";
$rsxx = mysqli_query($conn, $sqlx);
$rsrow = mysqli_num_rows($rsxx);

if(!$rsrow) {
	$count = 0; }
else {
	$rsx = mysqli_fetch_array($rsxx);
	$count = $rsx[counter];
}

$sqly = "select sum(counter) from countb";
$rsyy = mysqli_query($conn, $sqly);
$rsyyy = mysqli_num_rows($rsyy);
if(!$rsyyy) {
	$total = 0; }
else {
	$rsy = mysqli_fetch_array($rsyy);
	$total = $rsy[0];
}

?>
