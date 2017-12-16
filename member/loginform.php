<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/css/style2.css" rel="stylesheet" type="text/css">
<script src="/js/common.js" type="text/javascript"></script>
<link href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/common.css" rel="stylesheet" type="text/css" media="all">
<link href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/<?=$table?>.css" rel="stylesheet" type="text/css" media="all">
<script language="JavaScript">
<!--
function openWin(sr)
{
		window.open(sr, 'bigimage', 'toolbar=no,location=no,directories=no,status=no, menubar=no, scrollbars=no, resizable=no,width=640,height=790');
}
//-->
</script>
<?php include $_SERVER['DOCUMENT_ROOT']."/lib/menu.php"; ?>
</head>

<body>
<div class="clearfix">
</div>
        <div class="col-md-4 centered" style="top: 50px;">
                 <div class="login-box well">
               <form method="post" action="login.php" class="center-block">
                   <legend>로그인</legend>
                   <div class="form-group">
                       <label for="username-email">아이디</label>
                       <input name="m_id" value='' id="username-email" placeholder="Username" type="text" class="form-control" />
                   </div>
                   <div class="form-group">
                       <label for="password">비밀번호</label>
                       <input name="m_pwd" id="password" value='' placeholder="Password" type="password" class="form-control" />
                   </div>
                   <div class="form-group">
                       <input type="submit" class="btn btn-default btn-login-submit btn-block m-t-md" value="Login" />
                   </div>
                   <hr />
               </form>
                 </div>
               </div>
</body>
</html>
