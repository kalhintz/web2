<? 
header( "Content-type: application/vnd.ms-excel" );
header( "Content-Disposition: attachment; filename=report.xls" );
header( "Content-Description: PHP4 Generated Data" );

require("php/util.php");
require("php/bbs_dbconn.include.php");

//AdminAuth();
//if ($_SESSION['p_memtype1']=="S" || $_SESSION['p_memtype1']=="A"){
//
//} else {
//	 msg("교직원만 이용하실 수 있습니다.");
//     echo("<meta http-equiv='Refresh' content='0; URL=javascript:history.back();'>");
//} 
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel='stylesheet' type='text/css' href='/admin/style/style.css'>
<link href="../php/text04.css" rel="stylesheet" type="text/css">
<link href="../php/style.css" rel="stylesheet" type="text/css">
<script language="javascript">
<!--
function admin_reg(numb,ch) { 
	document.form1.action="adminreg_ok.php?idx="+numb+"&ch="+ch+"&colgu=<?=$colgu?>";
	document.form1.submit();
	return true	;
}

function memtype_reg(mtype,numb) { 
	document.form1.action="adminreg_ok.php?idx="+numb+"&mtype="+mtype+"&colgu=<?=$colgu?>";
	document.form1.submit();
	return true	;
}
//-->
</script>
</head>
<BODY leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>
<table border=0 cellspacing=0 cellpadding=0 width=800>
<tr>
 <td valign=top>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="30" background="/admin/images/top1_bg.gif">&nbsp;</td>
  </tr>
  <tr> 
    <td height="54" background="/admin/images/top2_bg.gif"><img src='/admin/images/bar_index.gif'></td>
  </tr>
  <tr> 
    <td height="24" background="/admin/images/top3_bg.gif">&nbsp;</td>
  </tr>
  <tr>
          <td height="100%" align=center valign=middle> <br>
<?
if ($mode=='search') { //검색을 실행했으면
   $sql_where = "where $key like '%$key_value%' "; 
} else {
   $sql_where = ""; 
}

$query = "Select * From $tablename $sql_where"; 
$rs = mysql_query($query, $connect);
$total = mysqli_num_rows($rs);
mysql_free_result($rs);

switch($colgu){
	case 1: $bgcol0="#75d288";$bgcol1="#D3FBDC";break;
	case 2: $bgcol0="#FECFEC";$bgcol1="#fdeaf5";break;
	case 3: $bgcol0="#75d288";$bgcol1="#D3FBDC";break;
	case 4: $bgcol0="#fdc494";$bgcol1="#FEE9D7";break;
	case 5: $bgcol0="#b89eef";$bgcol1="#e4dbf9";
}

?> 
<center>
<form name="form1" method="post">
<span align=right>*회원 id를 클릭하시면 해당회원 정보확인,수정,삭제가 가능합니다.</span> <br>
<span align=right>*회원여부 = 회원 : 체크,&nbsp;&nbsp;탈퇴 : 체크해제</span> 
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr bgcolor="<?=$bgcol0?>"> <td height='3' colspan='9'> </td> </tr>
  <tr>
    <td width="40" height="24" align="center" valign="middle" bgcolor="<?=$bgcol1?>" class="style02">번호</td>
    <td width="70" height="24" align="center" valign="middle" bgcolor="<?=$bgcol1?>" class="style02">ID</td>
    <td width="70" height="24" align="center" valign="middle" bgcolor="<?=$bgcol1?>" class="style02">PW</td>
    <td width="60" height="24" align="center" valign="middle" bgcolor="<?=$bgcol1?>" class="style02">성명</td>
    <td width="110" height="24" align="center" valign="middle" bgcolor="<?=$bgcol1?>" class="style02">주민번호</td>
    <td width="90" height="24" align="center" valign="middle" bgcolor="<?=$bgcol1?>" class="style02">전화번호</td>
    <td width="200" height="24" align="center" valign="middle" bgcolor="<?=$bgcol1?>" class="style02">직장명</td>
    <td width="60" height="24" align="center" valign="middle" bgcolor="<?=$bgcol1?>" class="style02">회원여부</td>
    <td width="150" height="24" align="center" valign="middle" bgcolor="<?=$bgcol1?>" class="style02">회원유형</td>
  </tr>
  <tr bgcolor="<?=$bgcol0?>"> <td height=1 colspan=9> </td> </tr>
  <?
    $scale=20;  // 페이지크기
    if ($page == ''){  //$page에 값이 없으면
      $page=1;   // 1page로 설정
    }	    
    $totalpage = ceil($total/$scale);  //$totalpage : 총페이지수 = 총레코드수/페이지크기
        
    if ($page ==1) {
      $cline = 0 ;
    } else {
      $cline = ($page*$scale) - $scale ;
	} 
        
	$limit=$cline+$scale;
        
	 if ($limit >= $total) 
       $limit=$total;
 
    $scale1 = $limit - $cline;  //페이지별 실제 출력할 레코드수
				    

	$sqlb = "select * from $tablename $sql_where order by uno desc LIMIT $cline,$scale1 "; 
    $rst2 = mysql_query($sqlb, $connect);
    
if ($total==0) {
?>

  <tr bgcolor='#FFFFFF' class='text02' height="24"> <td colspan='9' align="center">가입회원이 없습니다.</td></tr>

<?
}
else {
          
        for($i=1; $list=mysqli_fetch_array($rst2); $i++){
           $bunho = $total - ( $i + $cline) + 1; 
 ?>       
  <tr>
	<td height="24" align="center" valign="middle" class="text01"><?=$bunho?></td>
    <td height="24" align="left" valign="middle" class="text01">
        <a href="member_modify.html?tablename=<?=$tablename?>&idx=<?=$list[uno]?>&colgu=<?=$colgu?>" target="_self"> <?=$list[user_id]?></a>
	</td>
    <td height="24" align="center" valign="middle" class="text01"><?=$list[passwd]?></td>
    <td height="24" align="center" valign="middle" class="text01"><?=$list[user_name]?></td>
    <td height="24" align="center" valign="middle" class="text01"><?=$list[security_id1]?>-<?=$list[security_id2]?></td>
    <td height="24" align="center" valign="middle"><?=$list[hand_tel1]?>-<?=$list[hand_tel2]?>-<?=$list[hand_tel3]?></td>
    <td height="24" align="center" valign="middle" class="text01"><?=$list[com_name]?></td>
    <td height="24" align="center" valign="middle" class="text01">
<?
	  $numb=$list[uno];
   if($list[mem_yn]=="Y") { //회원여부 체크(회원 : Y, 탈퇴 : N)
	  echo "<input type=checkbox name=adminok checked onclick=admin_reg('$numb','Y')>";
 } else {
	  echo "<input type=checkbox name=adminok onclick=admin_reg('$numb','N')>"; }
?>					
	</td>
    <td height="24" align="center" valign="middle" class="text01"><!-- 회원유형선택 -->
	  <select name="mem_type" onChange="memtype_reg(this.value,'<?=$numb?>')">
		<option value="" <? if($list[mem_type]=='') echo "selected" ?>>::선택::</option>
		<option value="S" <? if($list[mem_type]=='S') echo "selected" ?>>관리자</option>
		<option value="A" <? if($list[mem_type]=='A') echo "selected" ?>>직원</option>
		<option value="B" <? if($list[mem_type]=='B') echo "selected" ?>>알르바이트</option>
		<option value="C" <? if($list[mem_type]=='C') echo "selected" ?>>신청자</option>
		<option value="D" <? if($list[mem_type]=='D') echo "selected" ?>>재학생</option>
		<option value="E" <? if($list[mem_type]=='E') echo "selected" ?>>수료생</option>
		<option value="F" <? if($list[mem_type]=='F') echo "selected" ?>>탈락생</option>
		<option value="G" <? if($list[mem_type]=='G') echo "selected" ?>>기업회원</option>
		<option value="H" <? if($list[mem_type]=='H') echo "selected" ?>>일반회원</option>
	  </select>	
	</td>
  </tr>
  <tr>
    <td colspan=9 height="1" align="center" valign="middle" bgcolor="<?=$bgcol0?>"></td>
  </tr>

  <?
    }
    mysql_free_result($rst2); 
} //else의 end부분
  ?>
  <tr>
    <td colspan=9 height="1" align="center" valign="middle" bgcolor="<?=$bgcol0?>"></td>
  </tr>
</table>
</form>
<br>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td height="40" align="center" class="text">
	<?
	 $url = "mem_list.php?tablename=$tablename&gu=$gu&colgu=$colgu&mode=$mode&key=$key&key_value=$key_value"; 
 	 page_avg($totalpage,$page,$url); 
   ?>
	&nbsp; </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <form name='f' method='post' action='mem_list.php?tablename=<?=$tablename?>&gu=<?=$gu?>&colgu=<?=$colgu?>'>  
  <tr> 
   <td  colspan="10" align='center' > 
	<select name='key'>
	<option value='mem_type'>회원유형</option>
	<option value='com_name'>기관명</option>
	<option value='user_id'>ID</option>
	<option value='user_name'>성명</option>
	<option value='security_id2'>주민번호뒤7자리</option>
	</select>
	<input type='hidden' name='mode' value='search' align=absmiddle>
	<input type='text' name='key_value' size='30' class=input align=absmiddle>
	<input name="Submit4" type="image" class="text01" src="images/icon_05.jpg" align=absmiddle> 
   </td>
  </tr>
  </form>
</table>
</center>
           
            <br>
          </td>
	</tr>
</table></td>
	</tr>
</table><br>
