<?
  session_start();
  unset($_SESSION['p_id']);
  unset($_SESSION['p_name']);
  unset($_SESSION['p_memtype']);
  unset($_SESSION['p_grade']);

  echo("
       <script>
          location.href = '../index.php';
         </script>
       ");
  session_destory();
?>
