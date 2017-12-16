<!DOCTYPE html>
<html>
<head>
<style media="screen">
  th{
  }
</style>
</head>
<body class="">
<?
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$sql="select * from member";
$result = mysqli_query($conn, $sql);

echo
"
<span style='float:right; margin-right:60px'>
<input type=text id='search' />
</span>
<table id='ttt'>
<thead>
<tr>
<th>번호</th>
<th>성명</th>
<th>아이디</th>
<th>패스워드</th>
<th>휴대전화</th>
<th>우편번호</th>
<th width=250px;>상세주소</th>
<th>회원등급</th>
<th>가입날짜</th>
<th>최근로그인</th>
</tr>
</thead>
";

while($row = mysqli_fetch_array($result))
{
  echo "<tbody id='users'>";
  echo "<tr>";
  echo "<td>".$row['uno']."</td>";
  echo "<td contenteditable=true>".$row['user_name']."</td>";
  echo "<td>".$row['user_id']."</td>";
  echo "<td>".$row['passwd']."</td>";
  echo "<td contenteditable=true>".$row['hand_tel1']."</td>";
  echo "<td contenteditable=true>".$row['czip1']."</td>";
  echo "<td width=150px;>".$row['caddress']."</td>";
  echo "<td contenteditable=true>".$row['mem_type']."</td>";
  echo "<td>".$row['joining_time']."</td>";
  echo "<td>".$row['last_joining_time']."</td>";
  echo "</tr>";
  echo "</tbody>";
}
echo "</table>";
mysqli_close($conn);
?>
</body>
</html>
