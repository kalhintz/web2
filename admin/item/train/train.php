
<?
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$sql="select * from item where code=2 order by num asc";
$result = mysqli_query($conn, $sql);

echo
"
<table id='tbrt' class='table classic stripeless'>
  <thead>
    <tr>
      <th width=30>번호</th>
      <th>상품구분</th>
      <th>상품이름</th>
      <th>요금구분</th>
      <th>요금</th>
      <th>수량</th>
      <th width=120>옵션</th>
    </tr>
  </thead>
";
$od = 1;
while($row = mysqli_fetch_array($result))
{
  $type2 = $row[type];
  $itemname = $row[itemname];
  $pricename = $row[pricename];
  $price = $row[price];
  $qut = $row[qut];
  echo "<tbody id='itd'>";
  echo "<tr>";
  echo "<td>".$od."</td>";
  echo "<td contenteditable=true>".$type2."</td>";
  echo "<td contenteditable=true>".$itemname."</td>";
  echo "<td contenteditable=true>".$pricename."</td>";
  echo "<td contenteditable=true>".$price."</td>";
  echo "<td contenteditable=true>".$qut."</td>";
  echo "<td><input type='button' class='btn focus mini' id='delbt' name='delbt' value='삭제' onclick='del(this);'></td>";
  echo "</tr>";
  echo "</tbody>";
  $od++;
}
mysqli_close($conn);
?>
</table>
