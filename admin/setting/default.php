<?
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$sql = "select * from mainimg";
$result = mysqli_query($conn, $sql);

$sql2 = "select * from payment";
$rs = mysqli_query($conn,$sql2);
$row2=mysqli_fetch_array($rs);

echo $row2[bank];

while($row = mysqli_fetch_assoc($result))
$src[] = $row[src];

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body id='default'>
    <h1>환경설정</h1>
    <div class="" style="border:1px solid #000;">
      <form action="" id="frm1" method="post" enctype="multipart/form-data"> <!--../admin/lib/upload.php-->
        <div id="MainImg">
          <h3>메인사진변경</h3>
          <div id='imgdetail'>
          <label for=""><b>1번이미지</b></label> <input type="text" name="imgup[]" value=<?=$src[0]?>>
          <input type="file" name="fileup[]"><br/>
          <label for=""><b>2번이미지</b></label> <input type="text" name="imgup[]" value=<?=$src[1]?>>
          <input type="file" name="fileup[]"><br/>
          <label for=""><b>3번이미지</b></label> <input type="text" name="imgup[]" value=<?=$src[2]?>>
          <input type="file" name="fileup[]"><br/>
        </div>
        </div>
        <div id="payment">
          <h3>결제정보변경</h3>
          <div id='paydetail'>
          <label for=""><b>은행정보</b></label>
          <input type="radio" name="bank[]" id="" value='1' <?if($row2[bank]=='1')echo"checked";?>><img class='banklg' src="setting/banks/농협.jpg" alt="">
          <input type="radio" name="bank[]" id="" value='2' <?if($row2[bank]=='2')echo"checked";?>><img class='banklg' src="setting/banks/국민.jpg" alt="">
          <input type="radio" name="bank[]" id="" value='3' <?if($row2[bank]=='3')echo"checked";?>><img class='banklg' src="setting/banks/신한.jpg" alt="">
          <input type="radio" name="bank[]" id="" value='4' <?if($row2[bank]=='4')echo"checked";?>><img class='banklg' src="setting/banks/우리.jpg" alt="">
          <br/>
          <label for=""><b>계좌번호</b></label>  <input type="text" name="account" value=<?=$row2[account]?>><br/>
          <label for=""><b>예금주명</b></label>  <input type="text" name="acname" value=<?=$row2[name]?>><br/>
        </div>
        </div>
        <input type="button" id="enter" value="변경하기" style="float:right">
        </form>
    </div>
  </body>
</html>
