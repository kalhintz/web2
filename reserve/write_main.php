<?
//include $_SERVER['DOCUMENT_ROOT']."/lib/util.php";

if ($mode=="modify" || $mode=="response")
{
	$sql = "select * from $table where num=$num";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);

	$item_subject     = $row[subject];
	$item_content     = $row[content];

	$item_file_[0] = $row[file_name_0];
	$item_file_[1] = $row[file_name_1];
	$item_file_[2] = $row[file_name_2];

	$copied_file_[0] = $row[file_copied_0];
	$copied_file_[1] = $row[file_copied_1];
	$copied_file_[2] = $row[file_copied_2];

	$item_file_type[0]   = $row[file_type_0];
	$item_file_type[1]   = $row[file_type_1];
	$item_file_type[2]   = $row[file_type_2];

	$item_file_size[0]   = $row[file_size_0];
	$item_file_size[1]   = $row[file_size_1];
	$item_file_size[2]   = $row[file_size_2];

	if ($mode=="response")
	{
		$item_subject = "[re]".$item_subject;
		$item_content = ">".$item_content;
		$item_content = str_replace("\n", "\n>", $item_content);
		$item_content = "\n\n".$item_content;
	}
}
?>



<?
if($mode=="modify")
{
	?>
	<form name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">
		<?
	}
	elseif ($mode=="response")
	{
		?>
		<form name="board_form" method="post" action="insert.php?mode=response&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">
			<?
		}
		else
		{
			?>
			<form name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data">
				<?
			}
			?>

			<!--textarea name="ir1" id="ir1" rows="10" cols="100" style="width:100%; height:412px; min-width:610px; display:none;"></textarea-->

			<div id="write_form">
				<div id="write_row1"><div class="col1"> 작성자 </div>
				<div class="col2"><?=$p_id?></div>
			</div>
			<div id="write_row2"><div class="col1"> 제목  </div>
			<div class="col2"><input type="text" name="subject" id="subject" value="<?=$item_subject?>" ></div>
		</div>
		<div class="col2"><textarea name="content" id="ir2" rows="10" cols="100" style="width:868px;"><?=$item_content?></textarea></div>
	</div>
	<?
	if($table!='photo') {?>
	<!-- 첨부파일 영역 -->
		<div class="se2_attach_area" style="display:block">
			<h3>첨부파일<em class="se2_photoinfo_divider" style="display: none;">|</em></h3>
			<div class="se2_bx_attached_size">
				<dl class="husky_se2_attached_size">
				<dt class="bar">사이즈</dt>
				<?
				for($j=0; $j<3; $j++)
				{
				if($item_file_[$j])
				{
					$bbb += $item_file_size[$j];
					$ccc = formatSize($bbb);
				 }
			 }	?><dd><strong><?=$ccc?></strong><span>/</span><span class=ls_0><?=formatSize(5242880)?></span></dd>

				</dl>
			</div>

			<ul class="se2_attached_file_list">
				<?
				for($j=0; $j<3; $j++)
				{
				if($mode=="modify" && $item_file_[$j] )
				{
					$aaa = formatSize($item_file_size[$j]);

					echo "<li style='margin-left: 25px;padding-bottom: 10px;'> 첨부파일".($j >= 0 ? $j+1 : '')."<img src=../img/dddd.jpg style='width:15px;margin-left: 30px;'>&nbsp;&nbsp;&nbsp;&nbsp;$item_file_[$j]
					파일이 등록되어 있습니다. <input type=checkbox name=del_file[] value=$j> 삭제 <span style='float: right;margin-right: 20px;'>$aaa</span></li>";
				 }
			}
			?>
			</ul>

		</div>

		<!-- //첨부파일 영역 -->

	<div id="write_row4"><div class="col1"> 첨부파일1   </div>
	<div class="col2"><input type="file" name="upfile[]" class="upload"> * 5MB까지 업로드 가능!</div>
</div>
<div class="clear"></div>

<div class="write_line"></div>
<div id="write_row5"><div class="col1"> 첨부파일2  </div>
<div class="col2"><input type="file" name="upfile[]" class="upload">  * 5MB까지 업로드 가능!</div>
</div>

<div class="write_line"></div>
<div class="clear"></div>
<div id="write_row6"><div class="col1"> 첨부파일3   </div>
<div class="col2"><input type="file" name="upfile[]" class="upload" >  * 5MB까지 업로드 가능!</div>
</div>
<div class="write_line"></div>
<?}?>
<div class="clear"></div>
</div>


<div id="write_button"><a href="#"><input class="btn btn-default" type="button" value="글작성" onclick="return submitContents(this);"></a>&nbsp;
	<a href="list.php?table=<?=$table?>&page=<?=$page?>"><input class="btn btn-default" type="button" value="글목록"></a>
</div>

<script type="text/javascript" src=<?$_SERVER['DOCUMENT_ROOT']?>"/editor.js" charset="utf-8"></script>
</form>
