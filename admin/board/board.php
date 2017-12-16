<!DOCTYPE html>
<html>
<head>

</head>
<body class="">

<?

include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include $_SERVER['DOCUMENT_ROOT']."/lib/util.php";

echo
"
<form method=post>
<div class=dropdown style='display: block;'>
  <select name=selb onchange=sss(this.value)>
    <option value=0>게시판 선택</option>
    <option value=1>공지사항</option>
    <option value=2>자유게시판</option>
    <option value=3>포토갤러리</option>
    </select>
  </div>
    </form>
";

switch ($r) {
  case '1':
    $r='notice';
    break;
    case '2':
    $r='free';
    break;
    case '3':
    $r='photo';
        break;
  default:
    # code...
    break;
}

echo "<div class='h1'>게시판이름 : <input type='text' value='$titles[$r]'>
      <input type='button' value='수정하기'></div>";


echo
"
<table id='users' class=''>
<thead>
<tr>
<th>글번호</th>
<th>제목</th>
<th>작성자</th>
<th>첨부파일</th>
<th>등록일</th>
<th>조회수</th>
</tr>
</thead>
";
if($r!="")
{
  if($r=='photo')
  {
    $sql = "SELECT * FROM `$r` WHERE content like '%img src%'";
    $result = mysqli_query($conn, $sql);
  }
  else {
    $sql="select * from $r";
    $result = mysqli_query($conn, $sql);
  }
while($row = mysqli_fetch_array($result))
{
  $number = $row[num];
  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
  $author=$row[id];
  $regidate=$row[regist_day];

  $file_name[0]   = $row[file_name_0];
  $file_name[1]   = $row[file_name_1];
  $file_name[2]   = $row[file_name_2];

  $imgsrc=$row[content];

  preg_match_all("/<img[^>]*src=[']?([^>']+)[']?[^>]*>/", $imgsrc, $imgs1);
  preg_match_all('/(<p(>|\s+[^>]*>).*?<img[^>])/i', $imgsrc, $txt1);

  echo "<tbody>";
  echo "<tr>";
  echo "<td>".$number."</td>";
  echo "<td>".$item_subject."</td>";
  echo "<td>".$author."</td>";
  echo "<td>";
  if($r!='photo')
  {
  for($i=0; $i<3; $i++)
  {
    if($file_name[$i])
    {
    echo "[$file_name[$i]]";
    }
  }
}
else {
  echo "<a href=".$imgs1['1']['0']." target=_blank>사진보기</a>
";
}
  echo "</td>";
  echo "<td>".substr($regidate,0,10)."</td>";
  echo "<td>".$row['hit']."</td>";
  echo "</tr>";
  echo "</tbody>";

}
  echo "</table>";
}
mysqli_close($conn);
?>

</body>
</html>
