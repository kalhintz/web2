<meta charset="UTF-8">
<?
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
		<form name="board_form" method="post" action="?table=<?=$table?>&mode=search">
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
			<ul>
				<? if($table=="reserve"){?>
				<li id="list_title1">번호</li>
				<li id="list_title2">예약자</li>
				<li id="list_title3">핸드폰</li>
				<li id="list_title4">사용일자</li>
				<li id="list_title5">예약일자</li>
				<li id="list_title6">예약사항</li>
				<li id="list_title7">예약상태</li>
				<li id="list_title8">조회수</li>
			<?} else {?>
			<li id="list_title1">글번호</li>
			<li id="list_title2">제목</li>
			<li id="list_title3">작성자</li>
			<li id="list_title4">첨부파일</li>
			<li id="list_title5">등록일</li>
			<li id="list_title6">조회수</li>
			<?}?>
			</ul>
		</div>
		<div id="list_content">
<?
	$scale = 5;  // 페이지크기

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

//	$sql2 = "select * from $tablename $sql_where order by group_num desc, ord asc LIMIT $cline,$scale1 ";
if($table=="reserve")
	$sql2 = "select * from $table $sql_where order by uno desc, replynum, stcount LIMIT $cline,$scale1 ";
	else
		$sql2 = "select * from $table $sql_where order by group_num asc LIMIT $cline,$scale1 ";

//echo $sql2; exit;
	$result2 = mysqli_query($conn, $sql2);

	for($i=1; $row=mysqli_fetch_array($result2); $i++){
//		$number = $total_record - ( $i + $cline) + 1;
		$number = $row[num];

		$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

		$file_name[0]   = $row[file_name_0];
		$file_name[1]   = $row[file_name_1];
		$file_name[2]   = $row[file_name_2];

		$file_copied[0] = $row[file_copied_0];
		$file_copied[1] = $row[file_copied_1];
		$file_copied[2] = $row[file_copied_2];


		if($table!="reserve")
		{
		//답변글
		$sql_re = "select * from $table where group_num='$row[group_num]' and depth>0 order by ord asc";
//echo $sql_re; exit;
		$rs_re = mysqli_query($conn, $sql_re);
		$re_cnt = mysqli_num_rows($rs_re);


		$sql_co = "select * from free_ripple where parent='$row[group_num]' and type='$table'";
//echo $sql_re; exit;
		$rs_co = mysqli_query($conn, $sql_co);
		$co_cnt = mysqli_num_rows($rs_co);
}
?>
		<?
			if($table=="reserve"){
					$iname=$row[iname];
			  	$hp =$row[hp];
				  $reservdate=$row[reservation_date_time] ;
					$regidate=$row[register_date];
					$detail=$row[comment];
					$status=$row[status];
			?>
				<div id="list_item">
					<div id="list_item1"><?= $number ?></div>
			<div id="list_item2">
					<a href=<?$_SERVER['DOCUMENT_ROOT']?>"/reserve/list.php?table=odreserve&mode=view&num=<?=$row[num]?>&page=<?=$page?>"><?= $iname ?></a>
					</div>
					<div id="list_item3"><?= $hp?> </div>
					<div id="list_item4"><?=substr($reservdate, 0, 10) ?></div>
					<div id="list_item5"><?= substr($regidate, 0, 10) ?></div>
					<div id="list_item6"><?= $detail ?></div>
					<div id="list_item7"><?= $status?></div>
					<div id="list_item8"><a href=<?$_SERVER['DOCUMENT_ROOT']?>"/reserve/list.php?table=odreserve&mode=edit&num=<?=$row[num]?>&page=<?=$page?>">수정</a>

					</div>
				</div> <!-- id="list_item" -->
			<?} else {?>
			<div id="list_item">
				<div id="list_item1"><?= $number ?></div>
		<div id="list_item2">
				<a href="view.php?table=<?=$table?>&num=<?=$row[num]?>&page=<?=$page?>"><?= $item_subject ?></a>
				<?
				if($co_cnt>0 && $table!='notice'){
					echo "<span  id='btn2$row[num]'>
								<a href=view.php?table=$table&num=$row[num]&page=$page&kind=$kind#ripple_box2 style='color:#f00;cursor:pointer;padding-right:10px;'>
								[$co_cnt]</a></span>";
				}

					if($re_cnt>0){
						echo "<span style='color:#f00;cursor:pointer;' id='btn1$row[num]'>답글 $re_cnt"."개</span>";
					}

				?>
				</div>
				<div id="list_item3"><?= $row[id] ?> </div>
				<div id="list_item7">
				<?
					for($j=0; $j < 5; $j++)
					{
					if($file_copied[$j])
					{
						$showname = $file_name[$j];
						$realname = $file_copied[$j];
						$realtype = $file_type[$j];
						$filepath = './data/'.$real_name;
						$filesize = filesize($file_path);

						echo "<a href='download.php?table=$table&num=$number&real_name=$realname&show_name=$showname&file_type=$realtype'>
							<img src=../img/dddd.jpg style='width:15px;'></a>";
					?> <?}
				}
?>
</div>

				<div id="list_item4"><?=substr($row[regist_day], 0, 10) ?></div>
				<div id="list_item5"><?= $row[hit] ?></div>
			</div> <!-- id="list_item" -->

<?
}	if($re_cnt>0){
?>
<script>
$(document).ready(function(){
	$("#list_content_re<?=$row[num]?>").hide();
    $("#btn1<?=$row[num]?>").click(function(){
        $("#list_content_re<?=$row[num]?>").toggle();
    });
		});

</script>

		<div id="list_content_re<?=$row[num]?>">
<?
		for($ii=1; $row_re=mysqli_fetch_array($rs_re); $ii++){

			$file_name_re[0]   = $row_re[file_name_0];
			$file_name_re[1]   = $row_re[file_name_1];
			$file_name_re[2]   = $row_re[file_name_2];

			$file_copied_re[0] = $row_re[file_copied_0];
			$file_copied_re[1] = $row_re[file_copied_1];
			$file_copied_re[2] = $row_re[file_copied_2];

			$renumber = $row_re[num];

			$sql_reco = "select * from free_ripple where parent='$renumber' and type='$table.re'";
		//echo $sql_re; exit;
			$rs_reco = mysqli_query($conn, $sql_reco);
			$reco_cnt = mysqli_num_rows($rs_reco);

?>
			<div id="list_item_re">
				<div id="list_item1_re"><?= $renumber ?></div>

<div id="list_item2_re">
	<img src=<?$_SERVER['DOCUMENT_ROOT']?>"/img/reply.png" width="10" height="10" border="0" alt="답글아이콘"><a href="view.php?table=<?=$table?>&num=<?=$row_re[num]?>&pag=<?=$page?>"><?= $row_re[subject] ?></a>

		</div>
		<div id="list_item3_re"><?= $row_re[id] ?></div>
		<div id="list_item7_re">
</div>
				<div id="list_item4_re"><?= substr($row_re[regist_day], 0, 10) ?></div>
				<div id="list_item5_re"><?= $row_re[hit] ?></div>

			</div> <!-- id="list_item_re" -->
<?
		} //for($ii
?>
        </div> <!-- end of list content_re -->
<?	}
    }
    mysqli_free_result($result2);
}
?>
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
	if($p_id && $table!='reserve')
	{
?>
		<a href="write_form.php?table=<?=$table?>"><input class="btn btn-default" type="button" value="글작성"></a>
<?
} else if($p_id && $table=="reserve") {
	?>
	<a href="list.php?table=odreserve&mode=order"><input class="btn btn-default" type="button" value="예약하기"></a>
<?}?>

				</div>
			</div> <!-- end of page_button -->

        </div> <!-- end of list content -->

		<div class="clear"></div>
