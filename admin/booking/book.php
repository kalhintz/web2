<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <?
    include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

    $sql="select * from reserve";
    $result = mysqli_query($conn, $sql);


    echo
    "
    <table id='users' class=''>
    <thead>
    <tr>
    <th>번호</th>
    <th>예약자</th>
    <th>핸드폰</th>
    <th>사용일자</th>
    <th>예약일자</th>
    <th>예약사항</th>
    <th>예약상태</th>
    <th></th>
    </tr>
    </thead>
    ";

    while($row = mysqli_fetch_array($result))
    {
      echo "<tbody>";
      echo "<tr>";
      echo "<td>".$row['num']."</td>";
      echo "<td>".$row['iname']."</td>";
      echo "<td>".$row['hp']."</td>";
      echo "<td>".$row['reservation_date_time']."</td>";
      echo "<td>".$row['register_date']."</td>";
      echo "<td>".$row['comment']."</td>";
      echo "<td>".$row['status']."</td>";
      echo "<td>".$row['mem_type']."</td>";
      echo "</tr>";
      echo "</tbody>";
    }
    mysqli_close($conn);
    ?>
    </table>

  </body>
</html>
