<?
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lib/util.php";
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
//msg($mode);

$table = "reserve";
$wday = date('Ymd');
$wdate = date('Y-m-d');

$tt_count=0;
if($strlist) $tt_count=1;

$chk_count = count($chk_play);
//print_r ($chk_play); exit;
 $sum = "";

for($i=0; $i<$chk_count; $i++)
{
if($chk_play[$i]) { $chk[$i]='C';}
else {$chk[$i]='U'; $chk_play[$i]='N';}
}

$query = "Select * From $table";
$result = mysqli_query($conn, $query);
$total = mysqli_num_rows($result);
mysqli_free_result($result);

if (!$total) $total=0;


if ($mode=="edit") {   //EDIT start
   $sql = "update $table set iname='$iname',email='$email',comment='$comment',hp='$hp',strlist='$strlist',stcount='$tt_count',total1='$total1',reservation_date_time='$reservation_date_time'";
   for($a=0; $a<$chk_count; $a++){
     if(!empty($chk_play[$a])&&!empty($chk[$a]))
    $sum.= "$chk[$a],$chk_play[$a],";
  }
   $sql.= ",code='$sum'";
   $sql.=" where uno=$uno";
  //    echo $sql; exit;
   $result2 = mysqli_query($conn, $sql);
   if($result2) {
     msg('수정 성공하였습니다.');
     mysqli_close($conn);
     echo "
        <script>
         location.href = 'list.php?table=$table&page=$page';
        </script>
     ";
   } else {
     err_msg('수정 실패하였습니다.');
   }

} else if( $mode=="CANCEL" ) { //EDIT-end, CANCEL-start
   $sql = "update $table set status='2'";
   $sql.=" where uno=$idx";
/*   echo $sql; */
   $result3 = mysqli_query($conn, $sql);
 if($result3) {
   msg('예약이 취소되었습니다.');
   redirect("list.php");
 } else {
   err_msg('취소 실패하였습니다.');  }

} else { //CANCEL-end, REPLY-start

 $num= $total + 1;
 if ($mode=="REPLY") {  //답변글 저장준비
    $gno=$gno;
    $re_step = $re_step + 1;
	if($re_step == 1)
	{
		$sqla = "select max(replynum) as aa from $table where gno=$gno";
		$rs = mysqli_query($conn, $sqla);
		$lst=mysqli_fetch_array($rs);

		if(!$lst)
			$replynum = 1;
		else
			$replynum = $lst[aa] + 1;
		mysqli_free_result($rs);
	}
 }
 else {   // 새글 저장 준비
   $gno = $num;
   $re_step = 0;
   $replynum = 0;
 }

 $wname=addslashes($wname);
 $title=addslashes($title);
 $email=addslashes($email);
 $contents=addslashes($contents);
 $wday=date('Y-m-d');



 $sqlb= "insert into $table(iname, email, comment, hp, strlist, total1, reservation_date_time";
  $sqlb.=", code";
 $sqlb.=", register_date, hit, num, gno, replynum, stcount, status) values('$iname', '$email', '$comment', '$hp', '$strlist','$total1', '$reservation_date_time',";
 for($a=0; $a<$chk_count; $a++){
   if(!empty($chk_play[$a])&&!empty($chk[$a]))
  $sum.= "$chk[$a],$chk_play[$a],";
}
 $sqlb.= " '$sum'";
 $sqlb.=", '$wdate', 0, $num, $gno, $replynum, $tt_count, '$stat[0]')";

 /*foreach($chk as $sa) {
   if($sa!="")
 echo "$sa<br/>";
}*/
//echo $sqlb; exit;
 $rs1 = mysqli_query($conn, $sqlb);

 if($rs1) {
   msg('내용이 등록되었습니다.');
   mysqli_close($conn);
   echo "
 	   <script>
 	    location.href = 'list.php?table=$table&page=$page';
 	   </script>
 	";
}else {
   mysqli_close($conn);
   err_msg('저장 실패하였습니다.');
 }

}  // INSERT-end
?>
</body>
