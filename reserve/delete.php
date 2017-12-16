<?
session_start();
?>
<meta charset="UTF-8">

<?
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

if($mode=="memo")
{
  $sql = "delete from memo where num = $num";
   mysqli_query($conn, $sql);

  mysqli_close($conn);

  echo "
     <script>
      location.href = '../reserve/list.php?table=$mode';
     </script>
  ";
}

   $sql = "select * from $table where num = $num";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_array($result);

   $copied_name[0] = $row[file_copied_0];
   $copied_name[1] = $row[file_copied_1];
   $copied_name[2] = $row[file_copied_2];

   for ($i=0; $i<3; $i++)
   {
		if ($copied_name[$i])
	   {
			$image_name = "./data/".$copied_name[$i];
			unlink($image_name);
	   }
   }

   $sql = "delete from $table where num = $num";
   mysqli_query($conn, $sql);

   mysqli_close($conn);

	 echo "
	   <script>
	    location.href = '../reserve/list.php?table=$table&kind=$kind';
	   </script>
	";
?>
