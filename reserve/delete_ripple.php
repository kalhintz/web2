<?
      include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

      if($mode=="memo")
      {
        $sql = "delete from memo_ripple where num=$num";
      }
      else
      {
      $sql = "delete from free_ripple where num=$ripple_num";
      }
      mysqli_query($conn, $sql);

     mysqli_close($conn);

     if($mode=="memo")
     {
       echo "
         <script>
          location.href = 'list.php?table=$mode';
         </script>
       ";
     }else{
     echo "
      <script>
       location.href = '../reserve/view.php?table=$table&num=$num';
      </script>
   ";
 }
?>
