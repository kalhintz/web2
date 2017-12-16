<?
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
	$sql = "select * from $table where num=$num";
	$result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

	$sql2 = "SELECT * FROM `download` WHERE content like '%img src%'";
	$result2 = mysqli_query($conn, $sql);
	$row2 = mysqli_fetch_assoc($result2);

	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  $item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$file_name[0]   = $row[file_name_0];
	$file_name[1]   = $row[file_name_1];
	$file_name[2]   = $row[file_name_2];

	$file_type[0]   = $row[file_type_0];
	$file_type[1]   = $row[file_type_1];
	$file_type[2]   = $row[file_type_2];

	$file_copied[0] = $row[file_copied_0];
	$file_copied[1] = $row[file_copied_1];
	$file_copied[2] = $row[file_copied_2];

	$file_size[0]   = $row[file_size_0];
	$file_size[1]   = $row[file_size_1];
	$file_size[2]   = $row[file_size_2];

	$item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$item_content = str_replace(" ", "&nbsp;", $item_content);
	$item_content = stripslashes($item_content);
	$item_content = trim($item_content);

	$item_content2 = $row2[content];
	$item_content2 = stripslashes($item_content2);
	$item_content2 = trim($item_content2);

	for ($i=0; $i<3; $i++)
	{
		if ($file_copied[$i])
		{
			$imageinfo = GetImageSize("./data/".$file_copied[$i]);

			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;
	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysqli_query($conn, $sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/common.css" rel="stylesheet" type="text/css" media="all">
<link href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/board4.css" rel="stylesheet" type="text/css" media="all">
<script>
function check_input()
{
	if (!document.ripple_form.ripple_content.value)
	{
		alert("내용을 입력하세요!");
		document.ripple_form.ripple_content.focus();
		return;
	}
	document.ripple_form.submit();
	}

    function del(href)
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
<?php include $_SERVER['DOCUMENT_ROOT']."/lib/menu.php"; ?>
</head>

<body>

	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" id="col2" style="left:150px;">
		<div class="page-header">
			<?if($table=="notice")echo"<h1>공지사항</h1>"?>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
					<div id="view_title1"><b><?= $item_subject ?></b></div><div id="view_title2"><?= $item_id ?> | 조회 : <?= $item_hit ?>
																| <?= $item_date ?> </div>
					</div>


		<div id="view_comment"> &nbsp;</div>
		<div class="panel-body" id="view_content">
<?
	for ($i=0; $i<3; $i++)
	{
		if ($file_copied[$i])
		{
			$show_name = $file_name[$i];
			$real_name = $file_copied[$i];
			$real_type = $file_type[$i];
			$file_path = "./data/".$real_name;
			$file_size = filesize($file_path);
			//$real_size = $file_size[$i];

			echo "<span style='float: right; padding-right: 10px;'>▷ 첨부파일 : <a href=\"$file_path\">$show_name</a> ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       <a href='download.php?table=$table&num=$num&real_name=$real_name&show_name=$show_name&file_type=$real_type'>[다운로드]</a></span><br>";
		}
	}
?>
			<br>
		 	<? echo $item_content2; ?>
		</div>

		<div class="panel-footer" id="ripple">
			<?

			$sql_re = "select * from free_ripple where parent='$item_num' and type='$table'";
	//echo $sql_re; exit;
			$rs_co = mysqli_query($conn, $sql_re);
			$co_cnt = mysqli_num_rows($rs_co);
			//echo $re_cnt;
			?>
				<form  name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>&mode=<?if($re_cnt>0)echo'response'?>">
				<strong>댓글(<?=$co_cnt?>)</strong>
				<div clas="container" id="ripple_box">
					<!--<div id="ripple_box1"><img src=<?$_SERVER['DOCUMENT_ROOT']?>"/img/title_comment.gif"></div>-->
					<div id="ripple_box2"><textarea class="form-control" name="ripple_content"></textarea>
					</div>
					<div id="ripple_box3"><a href="#" class="btn btn-primary text-center"  role="botton" onclick="check_input()">등록</a></div>
				</div>
				</form>
		<?
		//답변글
		$sql_re = "select * from $table where num='$item_num' and depth>0 order by ord asc";
//echo $sql_re; exit;
		$rs_re = mysqli_query($conn, $sql_re);
		$re_cnt = mysqli_num_rows($rs_re);

		if($re_cnt>0)
		$sql = "select * from free_ripple where parent='$item_num' and type='$table.re'";
		else
			$sql = "select * from free_ripple where parent='$item_num' and type='$table'";
			$ripple_result = mysqli_query($conn, $sql);

		while ($row_ripple = mysqli_fetch_array($ripple_result))
		{
			$ripple_num     = $row_ripple[num];
			$ripple_id      = $row_ripple[id];
			$ripple_nick    = $row_ripple[nick];
			$ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
			$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
			$ripple_date    = $row_ripple[regist_day];
		?>
			<div id="ripple_writer_title">
			<ul>
			<li id="writer_title1"><?=$item_id?></li>
			<li id="writer_title2"><?=$ripple_date?></li>
			<li id="writer_title3">
					<?
					if($p_memtype=="A" || $p_id==$ripple_id)
								echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>[삭제]</a>";
				?>
			</li>
			</ul>
			</div>
			<div id="ripple_content"><?=$ripple_content?></div>
			<div class="hor_line_ripple"></div>
		<?
		}
		?>

		</div> <!-- end of ripple -->
</div>
		<div id="view_button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>"><input class="btn btn-default" type="button" value="목록"></a>&nbsp;
<?
	if($p_id && ($p_id==$item_id) )
	{
?>
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>"><input class="btn btn-default" type="button" value="수정"></a>&nbsp;
				<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')"><input class="btn btn-default" type="button" value="삭제"></a>&nbsp;
<?
	}
?>
<?
	if($p_id && $table!='notice')
	{
?>
				<a href="write_form.php?table=<?=$table?>&mode=response&num=<?=$num?>&page=<?=$page?>"><input class="btn btn-default" type="button" value="답글달기"></a>&nbsp;
				<a href="write_form.php?table=<?=$table?>"><input class="btn btn-default" type="button" value="글작성"></a>
<?
	}
?>
		</div>
		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
