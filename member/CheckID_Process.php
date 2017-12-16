<?
session_start();
require("../lib/util.php");
require("../lib/dbconn.php");

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>아이디검색</title>
<link rel="stylesheet" href="../js/style1.css">
<script language="JavaScript">
<!--
function onClick() {

    fom = opener.document.memberfrm;
    fom.m_id.value = document.members.m_id.value;
    fom.m_id.focus();
}
//-->
</script>
</head>

<body>

<?
$id_yn=" ";
$sql = "select user_id from member where user_id='".$m_id."'";
$rs = mysqli_query($conn, $sql);
$total = mysqli_num_rows($rs);
if (!$total) {
?>

				  <form name="members" method="post">

                    <strong>중복되는
                        ID</strong> 가 없습니다. 쓰시겠습니까?


                    <a href="javascript:self.close();onClick();">네</a>
					  <input type="hidden" id=text1 name=m_id value="<?=$m_id?>">

					</form>

<?
} else {
?>

				  <form name="members" method="post">
				<strong>중복되는
                        ID</strong> 가 있습니다.<br> 다시 검색하겠습니까?
                    <a href="javascript:history.back();">네</a>

					</form>


<?
}
?>

  <a href="javascript:window.close();"></a>

</body>
</html>
