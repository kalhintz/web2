<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="../js/style1.css">
</head>

<body >
<script language="javascript">
function GoSearch()
{
    fom = document.forms[0];
	if ( document.member.m_id.value == ""  )
	{
	  alert("ID 를 입력해 주십시요!");
      fom.m_id.focus();
	  return;
	}

	document.member.submit();
}
</script>
<form name="member" method="post" action="CheckID_Process.php">

<div class="form-group">
  <h2>등록할 ID 를 입력해 주십시요</h2>
  <input type="text" name="m_id" value="<?=$id?>"  style=""="ime-mode:disabled" class="form-control"  style="width:150">
            <input type="submit" value="검색" onClick=GoSearch()>
</div>

</form>

</body>
<script language="JavaScript">
    fom = document.forms[0];
    fom.m_id.focus();
</script>
</html>
