<!DOCTYPE html>
<html>
<head>

</head>
<body class="">

<?
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

echo
"
<div class=dropdown style='display: block;'>
  <select name=selb onchange=itm(this.value)>
    <option value=0>품목 선택</option>
    <option value=1>렌탈</option>
    <option value=2>강습</option>
    <option value=3>펜션</option>
    </select>
  </div>
";
?>
  <?
switch ($t) {
  case '1':
    include "rental/rental.php";
    break;
    case '2':
    include "train/train.php";
    break;
    case '3':
    include "pension/pension.php";
        break;
  default:
    # code...
    break;
}

?>
</body>

</html>
