<?
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

if(!$p_id && $mode=='view')
{
	echo "<script>
	alert('로그인이 필요한 서비스입니다.')
	location.href ='../member/loginform.php';
	</script>";
}


if($mode=='view' || $mode=='edit')
{
	$table='reserve';
	$sql = "select * from $table where num=$num";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);

	$item_num     = $row[uno];
	$item_id      = $row[iname];
	$item_strlist    = $row[strlist];
	$item_total1   = $row[total1];
	$item_codes = $row[code];
	$item_hp = $row[hp];

	$stcount=$row[stcount];

	$item_hit     = $row[hit];

	$item_date    = $row[register_date];
	$item_comment    = $row[comment];
	$item_reservation_date_time = $row[reservation_date_time];

	$new_hit = $item_hit + 1;
	$sql2 = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysqli_query($conn, $sql2);

	$item_code=explode(",",$item_codes);
	$aa=count($item_code);

	for($j=0; $j<$aa; $j++)
	{
		if($item_code[$j]=='C')
		{
		}
	}
}
?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style media="screen">
form > table.table.table-bordered.table-condensed > tbody:nth-child(0) > tr:nth-child(2) > td
{
	width:230px;
}
form > table.table.table-bordered.table-condensed > tbody:nth-child(2) > tr:nth-child(2) > td
{
	width:250px;
}
</style>
<?

?>
<div class="table-responsive">
	<form name="frm1" method="post" action="sub_ok.php?mode=<?=$mode?>&uno=<?=$item_num?>" onsubmit="return check()">
		<table class="table table-bordered table-condensed" style="text-align: center;">
			<thead>
				<tr class="info">
					<th class="text-center">구분</th>
					<th class="text-center">스키</th>
					<th class="text-center">보드</th>
					<th class="text-center">의류</th>
					<th class="text-center">리프트</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td rowspan="3">오전권 9시 - 13시</td>
				</tr>
				<tr>
					<td><span id="titles">일반요금 : 10,000원</span>
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[0]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[1]!='N')echo "value=$item_code[1]";?>>
					</td>
					<td>일반요금 : 10,000원
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[2]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[3]!='N')echo "value=$item_code[3]";?>>
					</td>
					<td>요금 : 10,000원
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[4]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[5]!='N')echo "value=$item_code[5]";?>>
					</td>
					<td>대인요금 : 28,700원
						<input type="checkbox" name="chk[]" value="28700" onClick='profit_cost()'<?if($item_code[6]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[7]!='N')echo "value=$item_code[7]";?>>
					</td>
				</tr>
				<tr>
					<td>고급요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[8]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[9]!='N')echo "value=$item_code[9]";?>>
					</td>
					<td>고급요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[10]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[11]!='N')echo "value=$item_code[11]";?>>
					</td>
				</tr>
				<tr>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td rowspan="3">오후권 13시 - 17시</td>
				</tr>
				<tr>
					<td width="230px">일반요금 : 10,000원
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost(this)'<?if($item_code[12]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[13]!='N')echo "value=$item_code[13]";?>>
					</td>
					<td>일반요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[14]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[15]!='N')echo "value=$item_code[15]";?>>
					</td>
					<td>요금 : 10,000원
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[16]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[17]!='N')echo "value=$item_code[17]";?>>
					</td>
					<td>대인요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[18]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[19]!='N')echo "value=$item_code[19]";?>>
					</td>
				</tr>
				<tr>
					<td>고급요금 : 10,000원
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[20]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[21]!='N')echo "value=$item_code[21]";?>>
					</td>
					<td>고급요금 : 30,800원
						<input type="checkbox" name="chk[]" value="30800" onClick='profit_cost()'<?if($item_code[22]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[23]!='N')echo "value=$item_code[23]";?>>
					</td>
				</tr>
				<tr>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td rowspan="3">야간권 18시30분 - 23시</td>
				</tr>
				<tr>
					<td>일반요금 : 10,000원
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[24]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[25]!='N')echo "value=$item_code[25]";?>>
					</td>
					<td>일반요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[26]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[27]!='N')echo "value=$item_code[27]";?>>
					</td>
					<td>요금 : 10,000원
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[28]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[29]!='N')echo "value=$item_code[29]";?>>
					</td>
					<td>대인요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[30]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[31]!='N')echo "value=$item_code[31]";?>>
					</td>
				</tr>
				<tr>
					<td>고급요금 : 10,000원
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[32]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[33]!='N')echo "value=$item_code[33]";?>>
					</td>
					<td>고급요금 : 30,800원
						<input type="checkbox" name="chk[]" value="30800" onClick='profit_cost()'<?if($item_code[34]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[35]!='N')echo "value=$item_code[35]";?>>
					</td>
				</tr>
				<tr>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td rowspan="3">심야권 22시 - 05시</td>
				</tr>
				<tr>
					<td width="230px">일반요금 : 10,000원
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[36]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[37]!='N')echo "value=$item_code[37]";?>>
					</td>
					<td>일반요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[38]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[39]!='N')echo "value=$item_code[39]";?>>
					</td>
					<td>요금 : 10,000원
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[40]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[41]!='N')echo "value=$item_code[41]";?>>
					</td>
					<td>대인요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[42]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[43]!='N')echo "value=$item_code[43]";?>>
					</td>
				</tr>
				<tr>
					<td>고급요금 : 10,000원
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[44]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[45]!='N')echo "value=$item_code[45]";?>>
					</td>
					<td>고급요금 : 32,900원
						<input type="checkbox" name="chk[]" value="32900" onClick='profit_cost()'<?if($item_code[46]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[47]!='N')echo "value=$item_code[47]";?>>
					</td>
				</tr>
				<tr>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td rowspan="3">백야권 24시 - 05시</td>
				</tr>
				<tr>
					<td width="230px">일반요금 : 10,000원
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[48]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[49]!='N')echo "value=$item_code[49]";?>>
					</td>
					<td>일반요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[50]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[51]!='N')echo "value=$item_code[51]";?>>
					</td>
					<td>요금 : 10,000원
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[52]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[53]!='N')echo "value=$item_code[53]";?>>
					</td>
					<td>대인요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[54]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[55]!='N')echo "value=$item_code[55]";?>>
					</td>
				</tr>
				<tr>
					<td>고급요금 : 10,000원
						<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[56]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[57]!='N')echo "value=$item_code[57]";?>>
					</td>
					<td>고급요금 : 25,900원
						<input type="checkbox" name="chk[]" value="25900" onClick='profit_cost()'<?if($item_code[58]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[59]!='N')echo "value=$item_code[59]";?>>
					</td>
				</tr>
				<tr>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td rowspan="3">주간 (오전+오후) 9시 - 5시</td>
				</tr>
				<tr>
					<td width="230px">일반요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[60]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[61]!='N')echo "value=$item_code[61]";?>>
					</td>
					<td>일반요금 : 20,000원
						<input type="checkbox" name="chk[]" value="20000" onClick='profit_cost()'<?if($item_code[62]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[63]!='N')echo "value=$item_code[63]";?>>
					</td>
					<td>요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[64]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[65]!='N')echo "value=$item_code[65]";?>>
					</td>
					<td>대인요금 : 20,000원
						<input type="checkbox" name="chk[]" value="20000" onClick='profit_cost()'<?if($item_code[66]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[67]!='N')echo "value=$item_code[67]";?>>
					</td>
				</tr>
				<tr>
					<td>고급요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[68]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[69]!='N')echo "value=$item_code[69]";?>>
					</td>
					<td>고급요금 : 42,000원
						<input type="checkbox" name="chk[]" value="42000" onClick='profit_cost()'<?if($item_code[70]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[71]!='N')echo "value=$item_code[71]";?>>
					</td>
				</tr>
				<tr>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td rowspan="3">오후야간 13시 - 23시</td>
				</tr>
				<tr>
					<td width="230px">일반요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[72]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[73]!='N')echo "value=$item_code[73]";?>>
					</td>
					<td>일반요금 : 20,000원
						<input type="checkbox" name="chk[]" value="20000" onClick='profit_cost()'<?if($item_code[74]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[75]!='N')echo "value=$item_code[75]";?>>
					</td>
					<td>요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[76]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[77]!='N')echo "value=$item_code[77]";?>>
					</td>
					<td>대인요금 : 20,000원
						<input type="checkbox" name="chk[]" value="20000" onClick='profit_cost()'<?if($item_code[78]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[79]!='N')echo "value=$item_code[79]";?>>
					</td>
				</tr>
				<tr>
					<td>고급요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[80]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[81]!='N')echo "value=$item_code[81]";?>>
					</td>
					<td>고급요금 : 46,200원
						<input type="checkbox" name="chk[]" value="46200" onClick='profit_cost()'<?if($item_code[82]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[83]!='N')echo "value=$item_code[83]";?>>
					</td>
				</tr>
				<tr>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td rowspan="3">ALLNIGHT 18시30분 - 05시</td>
				</tr>
				<tr>
					<td width="230px">일반요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[84]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[85]!='N')echo "value=$item_code[85]";?>>
					</td>
					<td>일반요금 : 20,000원
						<input type="checkbox" name="chk[]" value="20000" onClick='profit_cost()'<?if($item_code[86]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[87]!='N')echo "value=$item_code[87]";?>>
					</td>
					<td>요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[88]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[89]!='N')echo "value=$item_code[89]";?>>
					</td>
					<td>대인요금 : 20,000원
						<input type="checkbox" name="chk[]" value="20000" onClick='profit_cost()'<?if($item_code[90]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[91]!='N')echo "value=$item_code[91]";?>>
					</td>
				</tr>
				<tr>
					<td>고급요금 : 15,000원
						<input type="checkbox" name="chk[]" value="15000" onClick='profit_cost()'<?if($item_code[92]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[93]!='N')echo "value=$item_code[93]";?>>
					</td>
					<td>고급요금 : 46,200원
						<input type="checkbox" name="chk[]" value="46200" onClick='profit_cost()'<?if($item_code[94]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="50" name=chk_play[] onchange="profit_cost()" <?if($item_code[95]!='N')echo "value=$item_code[95]";?>>
					</td>
				</tr>
				<tr>
				</tr>
			</tbody>
		</table>



		<table class="table table-bordered table-condensed" align="center" style="text-align: center;width:70%;">
			<thead>
				<tr class="info">
					<th class="text-center">강습권</th>
					<th class="text-center">반일권</th>
					<th class="text-center">주간</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td rowspan="2">1:1 강습</td>
				</tr>
				<tr>
					<td >요금 : 1인당 120,000원
						<input type="checkbox" name="chk[]" value="120000" onClick='profit_cost()'<?if($item_code[96]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="10" name=chk_play[] onchange="profit_cost()" <?if($item_code[97]!='N')echo "value=$item_code[97]";?>>
					</td>
					<td>요금 : 1인당 200,000원
						<input type="checkbox" name="chk[]" value="200000" onClick='profit_cost()'<?if($item_code[98]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
						<input type="number" min="1" max="10" name=chk_play[] onchange="profit_cost()" <?if($item_code[99]!='N')echo "value=$item_code[99]";?>>
					</td>
				</tbody>
				<tbody>
					<tr>
						<td rowspan="2">2:1 강습</td>
					</tr>
					<tr>
						<td >요금 : 1인당 70,000원
							<input type="checkbox" name="chk[]" value="70000" onClick='profit_cost()'<?if($item_code[100]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
							<input type="number" min="1" max="10" name=chk_play[] onchange="profit_cost()" <?if($item_code[101]!='N')echo "value=$item_code[101]";?>>
						</td>
						<td>요금 : 1인당 100,000원
							<input type="checkbox" name="chk[]" value="10000" onClick='profit_cost()'<?if($item_code[102]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
							<input type="number" min="1" max="10" name=chk_play[] onchange="profit_cost()" <?if($item_code[103]!='N')echo "value=$item_code[103]";?>>
						</td>
					</tbody>
					<tbody>
						<tr>
							<td rowspan="2">3:1 강습</td>
						</tr>
						<tr>
							<td >요금 : 1인당 50,000원
								<input type="checkbox" name="chk[]" value="50000" onClick='profit_cost()'<?if($item_code[104]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
								<input type="number" min="1" max="10" name=chk_play[] onchange="profit_cost()" <?if($item_code[105]!='N')echo "value=$item_code[105]";?>>
							</td>
							<td>요금 : 1인당 70,000원
								<input type="checkbox" name="chk[]" value="70000" onClick='profit_cost()'<?if($item_code[106]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
								<input type="number" min="1" max="10" name=chk_play[] onchange="profit_cost()" <?if($item_code[107]!='N')echo "value=$item_code[107]";?>>
							</td>
						</tbody>
					</table>


					<table class="table table-bordered table-condensed" align="center" style="text-align: center;width:70%;">
						<thead>
							<tr class="info">
								<th class="text-center">펜션 커플룸</th>
								<th class="text-center">펜션 프렌드룸</th>
								<th class="text-center">펜션 대형룸</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td >요금 : 100,000원
									(2인용)
									<input type="checkbox" name="chk[]" value="100000" onClick='profit_cost()'<?if($item_code[108]=='C')echo "checked"; else echo "";?>><span class=td_comment_select>선택</span>
									<input type="number" min="1" max="10" name=chk_play[] onchange="profit_cost()" <?if($item_code[109]!='N')echo "value=$item_code[109]";?>>
								</td>
								<td>요금 : 150,000원
									(4인∼6인)

									<input type="checkbox" name="chk[]" value="150000" onClick='profit_cost()'<?if($item_code[110]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
									<input type="number" min="1" max="10" name=chk_play[] onchange="profit_cost()" <?if($item_code[111]!='N')echo "value=$item_code[111]";?>>
								</td>
								<td>요금 : 180,000원
									(8인이상)
									<input type="checkbox" name="chk[]" value="180000" onClick='profit_cost()'<?if($item_code[112]=='C')echo "checked";?>><span class=td_comment_select>선택</span>
									<input type="number" min="1" max="10" name="chk_play[]" onchange="profit_cost()" <?if($item_code[113]!='N')echo "value=$item_code[113]";?>>
								</td>
							</tbody>
						</table>

						<br/><br/><br/>
						<table align="center" class=" table-striped table-bordered" style="text-align: center;">
							<tr>
								<td colspan=3 height=5 bgcolor=#cccccc></td>
							</tr>
							<tr>
								<td width=1 bgcolor=#cccccc></td>

								<td style="padding:5px;font-weight:bold;">
									※ 선택된 상품내역
								</td>

								<td width=1 bgcolor=#cccccc></td>
							</tr>
							<tr>
								<td colspan=3 height=1 bgcolor=#cccccc></td>
							</tr>
							<tr>
								<td width=1 bgcolor=#cccccc></td>

								<td height=50>
									<br>
									<textarea name='strlist' class="board5" style='width:630px; height:70px; border=0;overflow:hidden;text-align:center;color:#cc0000;font-weight:bold;'><?=$item_strlist?></textarea>
								</td>

								<td width=1 bgcolor=#cccccc></td>
							</tr>
							<tr>
								<td colspan=3 height=1 bgcolor=#cccccc></td>
							</tr>
							<tr>
								<td width=1 bgcolor=#cccccc></td>

								<td style="padding:5px;font-weight:bold;">
									<table cellpadding=5 cellspacing=0 width=100%>
										<tr>
											<td align=center>
												합계 가격 : <input type=text name=total1 value="<?=$item_total1?>" class="product2" style='border=0; width:100px; height:16px;color:#cc0000;font-weight:bold;' readonly>
											</td>
										</tr>
									</table>
								</td>
								<td width=1 bgcolor=#cccccc></td>
							</tr>
							<tr>
								<td colspan=3 height=1 bgcolor=#cccccc></td>
							</tr>
							<tr>
								<td colspan=3>
									<br><br>
									<style type=text/css>
									.input_style { border:1 solid #cccccc; }
									</style>
									* 위의 예약항목으로 예약을 합니다. 아래에 예약자 정보를 입력해주세요.<br>
									<table cellpadding=5 cellspacing=1 bgcolor=#cccccc width=100%>
										<tr>
											<td bgcolor=#eeeeee align=center>
												<b>예약자 이름 *</b>
											</td>
											<td bgcolor=#ffffff>
												<input name=iname id="iname" class=input_style size=8 value=<?=$item_id?>>
											</td>
											<td bgcolor=#eeeeee align=center>
												<b>핸드폰번호 *</b>
											</td>
											<td bgcolor=#ffffff>
												<input name=hp class=input_style size=15 value="<?=$item_hp?>" onkeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"> - 없이숫자로만입력<br>
											</td>
										</tr>
										<tr>
											<td bgcolor=#eeeeee align=center>
												이메일
											</td>
											<td bgcolor=#ffffff>
												<input name=email class=input_style>
											</td>
											<td bgcolor=#eeeeee align=center>
												<b>희망사용날짜 *</b>
											</td>
											<td bgcolor=#ffffff>
												<input type="date" id="imgDate" name="reservation_date_time" align="absmiddle" style="cursor:hand" alt="달력" value=<?=$item_reservation_date_time?>>
											</td>
										</tr>
										<tr>
											<td bgcolor=#eeeeee align=center>
												<b>남기는 말씀 *</b>
											</td>
											<td bgcolor=#ffffff colspan=3>
												<textarea name=comment class=input_style style="width:100%;height:100;"><?=$item_comment?></textarea>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>

						<br/>
						<button type="button" class="btn btn-primary btn-lg center-block" onclick="check();">예약하기</button>
						<input type=hidden name=mode2 value=<?=$stcount?>>
					</form>
				</td>
			</tr>
			<!-- /본문 내용 부분 -->
			<br><br>
					<script src="check.js"></script>
		</div>
