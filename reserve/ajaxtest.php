<?
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include $_SERVER['DOCUMENT_ROOT']."/lib/util.php";
//require $_SERVER['DOCUMENT_ROOT']."/reserve/write_main.php";

$file = $_FILES["upfile"];

print_r ("$file");


$files = array($v);
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

?>
