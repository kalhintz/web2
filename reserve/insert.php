<?
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
?>

<meta charset="utf-8">
<?

if(!$p_id) {
	echo("
	<script>
		 window.alert('로그인 후 이용해 주세요.')
		 history.go(-1)
	 </script>
	");
	exit;
}

if(!$subject && $table!="memo" && $table!="demand_survey") {
	echo("
	 <script>
		 window.alert('제목을 입력하세요.')
		 history.go(-1)
	 </script>
	");
 exit;
}

if(!$content && $table!="demand_survey") {
	echo("
	 <script>
		 window.alert('내용을 입력하세요.')
		 history.go(-1)
	 </script>
	");
 exit;
	}
	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

/*   단일 파일 업로드
$upfile_name	 = $_FILES["upfile"]["name"];		$upfile
$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];	$upfile_name
$upfile_type     = $_FILES["upfile"]["type"];		$upfile_type=substr( strrchr($upfile,"."),1);
$upfile_size     = $_FILES["upfile"]["size"];		$upfile_size
$upfile_error    = $_FILES["upfile"]["error"];
*/


if($mode=="demand_survey")
{
	$sql = "select * from member where id='$userid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);

	$email = explode("@", $row[email]);
	$email1 = $email[0];
	$email2 = $email[1];
	echo $zip;

$sql = "insert into demand_survey () ";
$sql .= "values(null, '$coname', '$tel1', '$tel2', '$tel3', '$zip', '$address1', '$address2', '$pname', '$jikwi', '$email1', '$email2', '$upjong', '$upjong_etc', '$plan', $inwon, '$skill1', '$skill2', '$skill3', '$skill4', '$skill5', '$skill6', '$skill7', '$skill8', '$mind', '$regist_day')";

mysqli_query($conn, $sql);  // $sql 에 저장된 명령 실행
mysqli_close($conn);                // DB 연결 끊기

echo "
	 <script>
		location.href = 'list.php?table=$mode';
	 </script>
";
}


	if($table=="memo")
	{
		$sql = "select * from member where id='$userid'";
		$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);

	$name = $row[name];
	$nick = $row[nick];

	$sql = "insert into memo (id, name, nick, content, regist_day) ";
	$sql .= "values('$userid', '$name', '$nick', '$content', '$regist_day')";

	mysqli_query($conn, $sql);  // $sql 에 저장된 명령 실행

	mysqli_close($conn);                // DB 연결 끊기

	echo "
		 <script>
			location.href = 'list.php?table=$table';
		 </script>
	";
	}


	// 다중 파일 업로드
	$files = $_FILES["upfile"];
	$count = count($files["name"]);

	$upload_dir = "./data/".$updir;
	if(!is_dir($upload_dir)){
		@mkdir($upload_dir, 0777);
	}


	for ($i=0; $i<$count; $i++)
	{
		$upfile_name[$i]     = $files["name"][$i];		//$upfile[$i]
		$upfile_tmp_name[$i] = $files["tmp_name"][$i];	//$upfile_name[$i]
		$upfile_type[$i]     = $files["type"][$i];		//$upfile_type[$i]=substr( strrchr($upfile[$i],"."),1);
		$upfile_size[$i]     = $files["size"][$i];		//$upfile_size[$i]
		$upfile_error[$i]    = $files["error"][$i];

		$file = explode(".", $upfile_name[$i]);
		$file_name = $file[0];
		$upfile_type[$i]  = $file[1];//확장자

		echo "$upfile_name[$i]";

		if (!$upfile_error[$i])
		{
			$new_file_name = date("Y_m_d_H_i_s");
			$new_file_name = $new_file_name."_".$i;
			$copied_file_name[$i] = $new_file_name.".".$upfile_type[$i];
			$uploaded_file[$i] = $upload_dir.$copied_file_name[$i];

			if( $upfile_size[$i]  > 500000 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(500KB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
				exit;
			}

			if (!move_uploaded_file($upfile_tmp_name[$i], $uploaded_file[$i]) )
			{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
			}
		}
	}

	if ($mode=="modify")
	{
		$num_checked = count($_POST['del_file']);
		$position = $_POST['del_file'];

		for($i=0; $i<$num_checked; $i++)                      // delete checked item
		{
			$index = $position[$i];
			$del_ok[$index] = "y";
		}

		$sql = "select * from $table where num=$num";   // get target record
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);

		for ($i=0; $i<$count; $i++)					// update DB with the value of file input box
		{

			$field_org_name = "file_name_".$i;
			$field_real_name = "file_copied_".$i;
			$field_type = "file_type_".$i;
			$field_size = "file_size_".$i;

			$org_name_value = $upfile_name[$i];
			$org_real_value = $copied_file_name[$i];
			if ($del_ok[$i] == "y")
			{
				$delete_field = "file_copied_".$i;
				$delete_name = $row[$delete_field];

				$delete_path = "./data/".$delete_name;

				unlink($delete_path);

				$sql = "update $table set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value', $field_type='$upfile_type[$i]', $field_size='$upfile_size[$i]'  where num=$num";
				mysqli_query($conn,$sql);  // $sql 에 저장된 명령 실행
			}
			else
			{
				if (!$upfile_error[$i])
				{
					$sql = "update $table set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value', $field_type='$upfile_type[$i]', $field_size='$upfile_size[$i]'  where num=$num";
					mysqli_query($conn,$sql);  // $sql 에 저장된 명령 실행
				}
			}

		}
		$sql = "update $table set subject='$subject', content='$content' where num=$num";
		mysqli_query($conn,$sql);  // $sql 에 저장된 명령 실행
	}
	else
	{
//		$content = htmlspecialchars($content);

		if ($mode=="response")
		{
			// 부모 글 가져오기
			$sql = "select * from $table where num = $num"; //$num : 부모레코드번호
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result);

			// 부모 글로 부터 group_num, depth, ord 값 설정
			$group_num = $row[group_num];
			$depth = $row[depth] + 1;
			$ord = $row[ord] + 1;

			// 해당 그룹에서 ord 가 부모글의 ord($row[ord]) 보다 큰 경우엔
			// ord 값 1 증가 시킴
			$sql = "update $table set ord = ord + 1 where group_num = $row[group_num] and ord > $row[ord]";
			mysqli_query($conn,$sql);

			// 레코드 삽입
			$sql = "insert into $table (group_num, depth, ord, id, name, nick, subject, content, regist_day, hit, ";
			$sql .= " file_name_0, file_name_1, file_name_2, file_copied_0,  file_copied_1, file_copied_2, file_type_0,  file_type_1, file_type_2, file_size_0,  file_size_1, file_size_2) ";
			$sql .= "values($group_num, $depth, $ord, '$p_id', '$username', '$usernick', '$subject', '$content', '$regist_day', 0, ";
			$sql .= "'$upfile_name[0]', '$upfile_name[1]',  '$upfile_name[2]', '$copied_file_name[0]', '$copied_file_name[1]','$copied_file_name[2]','$upfile_type[0]','$upfile_type[1]','$upfile_type[2]','$upfile_size[0]','$upfile_size[1]','$upfile_size[2]')";

			mysqli_query($conn,$sql);  // $sql 에 저장된 명령 실행
		}
		else //원새글
		{
			$depth = 0;   // depth, ord 를 0으로 초기화
			$ord = 0;

			// 레코드 삽입(group_num 제외)
			$sql = "insert into $table (depth, ord, id, name, nick, subject, content, regist_day, hit, ";
			$sql .= " file_name_0, file_name_1, file_name_2, file_copied_0,  file_copied_1, file_copied_2, file_type_0,  file_type_1, file_type_2, file_size_0,  file_size_1, file_size_2) ";
			$sql .= "values($depth, $ord, '$p_id', '$username', '$usernick', '$subject', '$content', '$regist_day', 0, ";
			$sql .= "'$upfile_name[0]', '$upfile_name[1]',  '$upfile_name[2]', '$copied_file_name[0]', '$copied_file_name[1]','$copied_file_name[2]','$upfile_type[0]','$upfile_type[1]','$upfile_type[2]','$upfile_size[0]','$upfile_size[1]','$upfile_size[2]')";
			mysqli_query($conn,$sql);  // $sql 에 저장된 명령 실행

			// 최근 auto_increment 필드(num) 값 가져오기
			$sql = "select last_insert_id()";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result);
			$auto_num = $row[0];

			// group_num 값 업데이트
			$sql = "update $table set group_num = $auto_num where num=$auto_num";
			mysqli_query($conn,$sql);
		}
	}
	mysqli_close($conn);                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'list.php?table=$table&page=$page';
	   </script>
	";
?>
