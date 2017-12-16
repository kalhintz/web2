<?
require("../lib/util.php");
require("../lib/dbconn.php");

$sql = "update emailcounsel set process_ok='S' where uno=$idx";
$result2 = mysqli_query($conn, $sql);

redirect("mail_list.php?tablename=emailcounsel&colgu=$colgu");
?>
