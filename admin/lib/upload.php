<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$files = $_FILES["fileup"];
$count = count($files["name"]);

$upload_dir = "data/".$updir;
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

if (!$upfile_error[$i])
{
//  $new_file_name = $upfile_name[$i];
  $copied_file_name[$i] = $upfile_name[$i];
  $uploaded_file[$i] = $upload_dir.$copied_file_name[$i];

  if( $upfile_size[$i]  > 500000 ) {
    echo("
    <script>
    alert('업로드 파일 크기가 지정된 용량(500KB)을 초과합니다!\\n파일 크기를 체크해주세요! ');
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
$sql="select * from mainimg";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($res);

$src = $row[src];
if($fileup[$i]=="")
{
  $sql2="update mainimg set src='$imgup[$i]' where num=$i+1";
  $res2 = mysqli_query($conn,$sql2);
}
else {
  $sql2="update mainimg set src='$uploaded_file[$i]' where num=$i+1";
  $res2 = mysqli_query($conn,$sql2);
}
}


foreach ($bank as $banks) {}
$sql="update payment set bank=$banks, account='$account', name='$acname'";
mysqli_query($conn,$sql);

if($account=="" && $acname=="")
{
  echo "빈칸을 입력해주세요.";
}
else {
  echo "수정성공";
}



mysqli_close($conn);
/*


$target_dir = "imgs/";
$target_file = $target_dir.basename($_FILES["fileup"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileup"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileup"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileup"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileup"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}*/
?>
