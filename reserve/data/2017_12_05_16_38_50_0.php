<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="php/style.css" rel="stylesheet" type="text/css">

</head>
<body>
<form name="frm" action="login_ok.php">
<table width="150" height=120 border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td width=150 align="center" valign="middle">
	<table width=150 border="0" cellspacing="1" cellpadding="0">
	 <tr align="center" valign="middle" >
	  <td colspan=2 height=30 class="f10">
		관리자 로그인
	  </td>
	 </tr>
	 <tr align="center" valign="middle" >
	  <td>아 이 디</td>
	  <td><input type='text' name='m_id' size='7' tabindex="1" style="ime-mode:disabled;"></td>
	 </tr>
	 <tr align="center" valign="middle" >
	  <td>비밀번호</td>
	  <td><input type='password' name='m_pw' size='7' tabindex="2" style="ime-mode:disabled;"></td>
	 </tr>
	 <tr align="center" valign="bottom" >
	  <td colspan=2 height=30><input type='submit' value='로그인' tabindex="3"></td>
	 </tr>
	</table>
	</td>
  </tr>
</table>
<script language="JavaScript">
<!--
frm.m_id.focus();
-->
</script>
</form>

</body>
</html>
