<?
require("php/util.php");
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<!--style type="text/css">  
 A            {text-decoration: none; color:blue}  
 A:hover      {text-decoration: none; color:red}  
</style-->

<script language="JavaScript">
     function list(view){ 
       document.all.kiupsuyo.style.display = "none"
       document.all.hopesuyo.style.display = "none"  
       //document.all.주메뉴3_ID.style.display = "none"
       
       if (view.style.display != "none") 
           view.style.display = "none" 
       else 
           view.style.display = "" 
    }  
</script>
<script language="JavaScript">
function toggle_A(item_ma) {
if(item_ma.style.display =="none") item_ma.style.display = "";
else item_ma.style.display = "none";
}
</script>
</head>
<body  leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" >
<link rel="stylesheet" type="text/css" href="style/style.css">
<table width="180" border="0" cellpadding="0" cellspacing="0" background="images/right_bg.gif">
<tr> 
    <td><img src="images/admin_title.gif" border=0></a></td>
	<td><img src="images/admin_title2.gif"></td></tr>
	<tr><td>&nbsp;</td>
    <td valign='top'> 
<table border="0" cellpadding="3" cellspacing="0" width="160" align='center'>
        <tr> 
          <td align="center">
<? 
if ($_COOKIE[p_name1]==""){
?>
<iframe name="hide1" id="hide1" align = "center" src = "admin_login.php" frameborder="0" topmargin="0" marginheight="0" marginwidth="0" scrolling="no"  width="150" height=120 border= "0"></iframe>
<? } else { ?>
<iframe name="hide1" id="hide1" align = "center" src = "logon.php" frameborder="0" topmargin="0" marginheight="0" marginwidth="0" scrolling="no"  width="150" height=120 border= "0"></iframe>
<?
} ?>
		  </td>
        </tr>
        <tr> 
          <td height='10'></td>
        </tr>
        <tr> 
          <td background="images/left_title_bg.gif" height=28 align=center><font color=ffffff><b>기본관리</b></font></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='CFCFCF'></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='ffffff'></td>
        </tr>
        </tr>
        <tr> 
          <td><img src="images/left_title_icon.gif">&nbsp;<a href=../ target=_parent>홈으로</a></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='CFCFCF'></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='ffffff'></td>
        </tr>
        <tr> 
          <td><img src="images/left_title_icon.gif">&nbsp;<a href="company/info.php" target=right>환경설정관리</a></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='CFCFCF'></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='ffffff'></td>
        </tr>
        <tr> 
          <td><img src="images/left_title_icon.gif">&nbsp;<a href=member/mem_list.php?tablename=member&colgu=2 target=right>회원관리</a></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='CFCFCF'></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='ffffff'></td>
        </tr>
        <tr> 
          <td><img src="images/left_title_icon.gif">&nbsp;<a href=product/maemul_list.php target=right>상품관리</a></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='CFCFCF'></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='ffffff'></td>
        </tr>
        <tr> 
          <td><img src="images/left_title_icon.gif">&nbsp;<a href=order/order_list.php target=right>주문관리</a></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='CFCFCF'></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='ffffff'></td>
        </tr>
        <tr> 
          <td><img src="images/left_title_icon.gif">&nbsp;<a href=order/cancel_list.php target=right>주문취소목록</a></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='CFCFCF'></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='ffffff'></td>
        </tr>
        <tr> 
          <td><img src="images/left_title_icon.gif">&nbsp;<a href=store/view.php target=right>직영식당관리</a></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='CFCFCF'></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='ffffff'></td>
        </tr>
        <tr> 
          <td><img src="images/left_title_icon.gif">&nbsp;<a href=board/list_.php?mo=51 target=right>공지사항관리</a></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='CFCFCF'></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='ffffff'></td>
        </tr>
        <tr> 
          <td><img src="images/left_title_icon.gif">&nbsp;<a href=board/list_.php?mo=52 target=right>질의답변(Q&A)관리</a></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='CFCFCF'></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='ffffff'></td>
        </tr>
        <tr> 
          <td><img src="images/left_title_icon.gif">&nbsp;<a href=board/list_.php?mo=53 target=right>구매후기관리</a></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='CFCFCF'></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='ffffff'></td>
        </tr>
        <tr> 
          <td><img src="images/left_title_icon.gif">&nbsp;<a href=board/list_.php?mo=54 target=right>자유게시판관리</a></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='CFCFCF'></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='ffffff'></td>
        </tr>
        <!--tr> 
          <td><img src="images/left_title_icon.gif">&nbsp;<a href=agent/list_.php target=right>대리점관리</a></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='CFCFCF'></td>
        </tr>
        <tr> 
          <td height='1' bgcolor='ffffff'></td>
        </tr-->
        <tr> 
          <td height=92 align=center valign=bottom> <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p></td>
        </tr>
      </table>
		</td>
  </tr>
  <tr><td>&nbsp;</td><td><img src='images/left_img.gif'></td></tr>
</table>
</body>

</html>
