<?
   session_start();
?>
<meta charset="utf-8">
<?
   if(!$p_id) {
     echo("
	   <script>
	     window.alert('로그인 후 이용하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";       // dconn.php 파일을 불러옴

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장


   // 레코드 삽입 명령
   if($mode=="memo")
   {
     $sql = "insert into memo_ripple (parent, id, name, nick, content, regist_day) ";
     $sql .= "values($num, '$p_id', '$username', '$usernick', '$ripple_content', '$regist_day')";
   } else if ($mode=="response")
   {
   $sql = "insert into free_ripple (parent, id, name, nick, content, regist_day, type) ";
   $sql .= "values($num, '$p_id', '$username', '$usernick', '$ripple_content', '$regist_day', '$table.re')";
 }
   else {
   $sql = "insert into free_ripple (parent, id, name, nick, content, regist_day, type) ";
   $sql .= "values($num, '$p_id', '$username', '$usernick', '$ripple_content', '$regist_day', '$table')";
  }
   mysqli_query($conn, $sql);  // $sql 에 저장된 명령 실행
   mysqli_close($conn);                // DB 연결 끊기

   if($mode=="memo")
   {
     echo "
   		 <script>
   			location.href = 'list.php?table=$mode';
   		 </script>
   	";
   }
   echo "
	   <script>
	    location.href = 'view.php?table=$table&num=$num';
	   </script>
	";
?>
