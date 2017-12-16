<?session_start();?>
<meta charset="utf-8">
<?

include $_SERVER['DOCUMENT_ROOT']."/lib/util.php";
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";


	$query="select user_id,user_name,mem_yn,mem_type from member where user_id = '$m_id' and passwd='$m_pwd' and mem_yn='Y'";
	$result = mysqli_query($conn, $query);
	$rows = mysqli_fetch_array($result);
  if(!$m_id) {
    echo("
          <script>
            window.alert('아이디를 입력하세요.')
            history.go(-1)
          </script>
        ");
        exit;
  }

  if(!$m_pwd) {
    echo("
          <script>
            window.alert('비밀번호를 입력하세요.')
            history.go(-1)
          </script>
        ");
        exit;
  }

   if(!$rows) {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다.')
             history.go(-1)
           </script>
         ");
   }
   else{
	 $sql2 = "update member set last_joining_time = now() where user_id='".$m_id."'";
	 $rst = mysqli_query($conn, $sql2);

	 $p_id=$rows[user_id];
	 $p_name=$rows[user_name];
	 $p_memtype=$rows[mem_type];
	 $userip = $_SERVER['REMOTE_ADDR'];

// 	 $_SESSION['p_id']=$p_id;
//	 $_SESSION['p_name']=$p_name;
//	 $_SESSION['p_gu']=$p_gu;
//	 $_SESSION['p_memtype']=$p_memtype;

  $_SESSION['p_id']=$p_id;
  $_SESSION['p_name']=$p_name;
  $_SESSION['p_memtype']=$p_memtype;
	$_SESSION["uip"]=$userip;

	 if($rows[mem_type]=='S') {
		 $p_grade="master";
		 $_SESSION['p_grade']=$p_grade;
	   // setcookie("p_grade",$p_grade,60*60+time(),"/");
     }
     echo("
        <script>
          location.href = '../index.php';
        </script>
     ");
}
mysqli_close($conn);
?>
