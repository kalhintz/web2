<meta charset="UTF-8">
<?
session_start();


	if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}
		if ($table=="reserve") $sql_where = "where $find like '%$search%'";
		else $sql_where = "where depth=0 and $find like '%$search%'";
	}
	else
	{
		if ($table=="reserve") $sql_where = "";
		else $sql_where = "where depth=0";
	}
	if ($table=="reserve") $sql = "select * from $table $sql_where ";
	else $sql = "select * from $table $sql_where order by group_num desc, ord asc";
//echo $sql; exit;
	$result = mysqli_query($conn, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글 수

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


		<form  name="board_form" method="post" action="?table=<?=$table?>&mode=search">
		<div id="list_search">
			<div id="list_search1">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다.  </div>
			<div id="list_search2"></div>
			<div id="list_search3">
				<select name="find" class="form-control">
					<?if($table=="reserve"){?>
					<option value='reservation_date_time'>사용일자</option>
					<option value='register_date'>예약일자</option>
					<option value='iname'>예약자</option>
					<option value='hp'>핸드폰번호</option>
					<?}else{?>
						<option value='subject'>제목</option>
						<option value='content'>내용</option>
						<option value='name'>이름</option>
						<?}?>
				</select>
			</div>
			<div id="list_search4"><input type="text" class="form-control" name="search"></div>
			<div id="list_search5"><input class="btn btn-default" type="button" value="검색"></div>
		</div>
		</form>

		<div class="clear"></div>

		<div id="list_top_title" class="bg-primary">

		</div>
		<div id="list_content">
<?
	$scale = 6;  // 페이지크기

    if(!$page) {
      $page=1;
    }
    $totalpage = ceil($total_record/$scale);  //$totalpage : 총페이지수 = 총레코드수/페이지크기

if (!$total_record) {

	if($table=="reserve")
	echo "<div id='list_item'>예약견적문의가 없습니다.</div>";
	else
	echo "<div id='list_item'>작성된 글이 없습니다.</div>";
} else {


	if ($page==1) {
      $cline = 0 ;
    } else {
      $cline = ($page*$scale) - $scale ;
	}

	$limit=$cline+$scale;

	if ($limit >= $total_record)
       $limit=$total_record;

    $scale1 = $limit - $cline;  //페이지별 실제 출력할 레코드수

}?>
<?
$sql2 = "SELECT * FROM `photo` WHERE content like '%img src%' order by group_num desc LIMIT $cline,$scale1";
$result2 = mysqli_query($conn, $sql2);
for($i=1; $row2 = mysqli_fetch_assoc($result2); $i++)
{
  $imgsrc=$row2[content];
  $subject=$row2[subject];
  $id=$row2[id];
  $regidate=$row2[regist_day];

  preg_match_all("/<img[^>]*src=[']?([^>']+)[']?[^>]*>/", $imgsrc, $imgs1);
  preg_match_all('/(<p(>|\s+[^>]*>).*?<img[^>])/i', $imgsrc, $txt1);
//echo $imgs1[1][0];

//print_r($imgs1);
echo "<div class='row center-block'>";
?>

        <div class="col-md-2">
          <div class="thumbnail">
            <a href=<?=$imgs1[1][0]?> target="_blank">
              <img src=<?=$imgs1[1][0]?> boader=0 style="width:100%; height:20%;"></a>
              <div class="caption text-center">
                <p><a href="view.php?table=<?=$table?>&num=<?=$row2[num]?>&page=<?=$page?>"><?=$subject?></a></p>
                <span><?=$regidate?></span>
                <span><b><?=$id?></b></span>
              </div>

          </div>
        </div>


<?} echo "</div>";?>
<script>
$(document).ready(function(){
	$("#list_content_re<?=$row[num]?>").hide();
    $("#btn1<?=$row[num]?>").click(function(){
        $("#list_content_re<?=$row[num]?>").toggle();
    });
		});

</script>
			<div class="center-block" id="page_button">
				<ul class="pagination" id="page_num">
<?
				 $url = "?table=$table&mode=$mode";
				 page_avg($totalpage,$page,$url,10);
?>
				</ul>
				<div class="" id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>"><input class="btn btn-default" type="button" value="글목록"></a>&nbsp;
<?
	if($p_id)
	{
?>
		<a href="write_form.php?table=<?=$table?>"><input class="btn btn-default" type="button" value="글작성"></a>
<?
	}
?>

				</div>
			</div> <!-- end of page_button -->

        </div> <!-- end of list content -->
