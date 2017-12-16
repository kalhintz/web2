<meta charset="utf-8">
<?
$region=Array("","강원","서울","부산","대구","인천","광주","대전","울산","경기","충남","충북","전남","전북","경남","경북","제주","세종");
$regionR=Array("","강원","서울","부산","대구","인천","광주","대전","울산","경기","충청남도","충청북도","전라남도","전라북도","경상남도","경상북도","제주","세종");
$regionCD=Array("","03","01","09","07","11","06","05","08","10","16","02","13","15","04","05","14","17","18");
$regionNM=Array("","강원","서울","부산","대구","인천","광주","대전","울산","경기","충남","충북","전남","전북","경남","경북","제주","세종","임시");

$sigunCD = Array("00","01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19");
$sigunNM = Array("총괄","광역","춘천","원주","강릉","삼척","태백","속초","홍천","횡성","영월","평창","정선","철원","화천","양구","인제","고성","양양","동해");
$ceterNM = Array("총괄취업지원센터","광역취업지원센터","춘천취업지원센터","원주취업지원센터","강릉취업지원센터","삼척취업지원센터","태백취업지원센터","속초취업지원센터","홍천취업지원센터","횡성취업지원센터","영월취업지원센터","평창취업지원센터","정선취업지원센터","철원취업지원센터","화천취업지원센터","양구취업지원센터","인제취업지원센터","고성취업지원센터","양양취업지원센터","동해취업지원센터","00취업지원센터","00취업지원센터","강원도경로장애인과","중앙회","인력개발원");

$biztypeCD = array('','1901','1902','1903','1904','1905','1906','1907','1908','1909','1910','1911','1912','1913','1914','1915','1916','1917','1918','1919','1920','1921');
$biztypeNM = array('','행정사무직','현장관리직','주유원','문화예술방송','운전 및 운송','택배업','영업 및 판매','경비 관련','청소 관련','식당, 서비스','가사도우미','기계, 건설','생산작업','농어촌인력','교육, 강사','산림 관련','골프장 관련','특성화사업','간호사','지자체사업','기타');

$blkbizCD = array('','821001','821002','821003','821004','821005','821006','821007','821008','821009','821010','821011','821012','821013');
$blkbizNM = array('','계속고용 6개월 이내 부당해고','계속고용 없음','근로자 보호규정 미준수','동일기업 퇴사 후 3개월 이내 재참여','보조금 허위 및 부정 청구','지도ㆍ요구 불이행','지침/협약 위반','참여자격 미달','참여자관리 약정위반 및 해지','타사업 중복참여','사회적기업','고령자 친화기업','기타');

$blkempCD = array('','2001','2002','2003','2004','2005');
$blkempNM = array('','당해년도 인턴형 참여완료','동일기업 퇴사 후 3개월 이내 재참여','인턴형 참여 중 타사업장에 중복근무','타사업 중복참여','기타');

$ageCD = array('','82001','82002','82003','82004');
$ageNM = array('','60-69','70-79','80-89','90-99');

$recutypeCD = array('','816001','816002','816003','816004','816005','816006','816007','816008','816009','816010','816011','816012','816013','816014','816015','816016','816017','816018','816019','816020','816021','816022','816023','816024','816025','816026','816027','816028','816029','816030','816031','816099');
$recutypeNM = array('','건설 및 광업관련 종사원','계기검침원/송달원','계산원 및 매표원','고객상담원','교육강사 및 보조교사','기계조작 및 조립종사자','기타 여가 및 스포츠관련 종사원','농림어업관련 종사자','매장정리원','문화/예술관련종사자','사무종사자','상점판매원','세탁관련원','숙박시설서비스원','시설관리 및 감시원','식품가공관련 종사원','안내원','운전 및 운송관련 종사원','보육/육아도우미','복지/의료관련 서비스 종사원','환경/재활용 및 미화원','제조/생산/기타작업 종사원','조리원','주방 및 급식보조원','주유원','주차관리원','택배원','텔레마케터','패스트푸드원','홍보관련 종사자','기타 기능관련 종사자','기타');

$schlType = array('','알수없음','무학','초졸','중졸','고졸','전문대졸','대졸','대학원이상');
$fmlyType = array('','알수없음','독거','노인부부','가족(경제력유)동거','가족(경제력무)동거','기타');
$healType = array('','매우좋음','좋은편','보통','나쁜편','매우나쁨');
$reqtMotv = array('','알수없음','경제적도움','자기발전','사회참여','시간활용','건강증진','자원봉사','기타');

$calStat = array('전체','임시 저장','정산 요청','정산 완료');

$search_area_1 = "
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
<tr><td height=\"50px\"  valign=\"top\">
	<table class=\"view\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
	<tr>
		<td class=\"bak01_first\" width=\"90px\">사업연도</td>
		<td class=\"bak02_left\"  width=\"100px\">
			<select name='sLC_projyear' id='sLC_projyear' style='width:60px'>";
for($i=2011; $i<=2020; $i++) {
$search_area_1.= "				<option value=\"$i\" if($i==$planYear) echo \"selected\"; >$i</option>";
}
$search_area_1.= "
			</select>
		</td>
		<td class=\"bak01_first\" style=\"width:90px;\">행정구역</td>
		<td class=\"bak02_left\"  width=\"230px\">
			<table border=0 cellpadding=0 cellspacing=0>
				<tr>
					<td style=\"width:80px;\">
						<select name='sLC_District_L' id='sLC_District_L' style='width:100px' disabled='disabled'>
							<option value='강원도' selected>강원도</option>
						</select>
					</td>
					<td style='padding-left:5px;'>
						<select name='sLC_District_M' id=\"sLC_District_M\" style=\"width:100px\" disabled=\"disabled\">";
for($i=0; $i<=18; $i++){
$search_area_1.= "				<option value='$sigunCD[$i]' if($p_LC_District_M==$sigunCD[$i]) echo 'selected' >$sigunNM[$i]</option>";
}
$search_area_1.= "
						</select>
					</td>
				</tr>
			</table>
		</td>
		<td class=\"bak01_first\" style=\"width:90px;\">운영기관</td>
		<td class=\"bak02_left\">
			<select name=\"sLC_orgcd\" id=\"sLC_orgcd\" style=\"width:130px;\" disabled=\"disabled\">
				<option value=''></option>
				<option value=\"$p_ORG_NAME\" selected >$p_ORG_NAME</option>
			</select>
		</td>
	</tr>

	</table>
</td></tr>
<tr><td height='5px'></td></tr>
</table>
";

$titles = array("notice"=>"공지사항", "free"=>"자유게시판", "photo"=>"포토갤러리", "reserve"=>"예약견적확인", "odreserve"=>"예약신청하기");
$stat = array("0"=>"예약접수", "1"=>"예약승인", "2"=>"예약취소");


function latest_article($table, $loop, $char_limit)
{
 include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

 $sql = "select * from $table where depth = 0 order by num desc limit $loop";
 $result = mysqli_query($conn, $sql);

 while ($row = mysqli_fetch_array($result))
 {
	 $num = $row[num];
	 $len_subject = strlen($row[subject]);
	 $subject = $row[subject];

	 if ($len_subject > $char_limit)
	 {
		 $subject = mb_substr($row[subject], 0, $char_limit, 'euc-kr');
		 $subject = $subject."...";
	 }

	 $regist_day = substr($row[regist_day], 0, 10);

	 echo "
		 <li class='text-center'><a href='./$table/view.php?table=$table&num=$num' style='color:#777;'>$subject</a><span class='pull-right' style='color:#999'>$regist_day</span></li>
		 <div class='clear'></div>
	 ";
 }
 mysqli_close($conn);
}



function formatSize($bytes, $decimals = 2) {
   $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
   $factor = floor((strlen($bytes) - 1) / 3);
   return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}


function head_tit($subtit,$btn1){
$header = "
	<table border=0 cellpadding=0 cellspacing=0 height='30px'>
		<tr width='300px' valign='top'>
			<td height='20px' class='tit'>
				<img src='../images/ico01.gif' width='12' height='14' border='0' alt=''> $subtit
			</td>
";
if($btn1=='save') $header.= "			<td width='61' style='padding-left:5px;'><img id='bt_save' src='../images/btn/btn_save.gif' style='cursor:hand;' onClick='on_Save();'></td>";
$header.= "
		</tr>
	</table>
";
return $header;
}

function img_find($img){
require("php/bbs_dbconn.do");
$query = "Select * From img_title where pos=$img;";
$rs = mysqli_query($conn, $query);
$list=mysqli_fetch_array($rs);
if($rs) return $list[m_name];
mysqli_free_result($rs);
}

function err_msg($msg,$bool="1")
{
if ($bool)
{
echo "
<script>
window.alert('$msg');
history.go(-1);
</script>
";
exit;
}
}

function msg($msg) {
echo("
        <script>
	    window.alert('$msg')
	    </script>
	    ");
}

function GoBack($msg) {
echo("
        <script>
	    window.alert('$msg');
		history.back();
	    </script>
	    ");
//echo("<meta http-equiv='Refresh' content='0; URL=javascript:'>");
 }


function err_close($msg)
{
echo "
<script>
window.alert('$msg');
self.close();
</script>
";
exit;
}


function err_msg2($msg,$to,$bool="1")
{
if ($bool)
{
echo "
<script>
window.alert('$msg');
window.open('$to','_self');
</script>
";
exit;
}
}

// 요청하는 페이지로 이동
function redirect($re_url)
{
 echo "<meta http-equiv='Refresh' content='0; URL=$re_url'>";
 exit;
}
function GoParentUrl($url)
{
	echo("<script>
		parent.location.href='$url';
		</script>");
}

function goRoot($mo)
{
	echo("<script>
		parent.location.href='/default.do?mo=$mo';
		</script>");
}

// MYSQL 연결
function my_connect($host,$id,$pass,$db)
{
	$connect=mysqli_connect($host,$id,$pass);
	mysqli_select_db($db);
//	mysql_query("SET NAMES utf8");
	return $connect;
}

// MYSQL 연결
function row_set($connect,$tablename,$key1,$key2,$keydata1,$keydata2,$key3)
{
	$query="select * from $tablename where $key1='$keydata1'"; //사업년도
	if($key2!='')$query.=" and $key2='$keydata2'"; //센터
	if($key3!='')$query.=" and ($key3='' or $key3='임시저장');"; //계획서 상태
	$result = mysqli_query($conn, $query);
	return $result ;
}

// HTML Tag를 제거하는 함수
function del_html( $str )
{
  $str = str_replace( ">", "&gt;",$str );
  $str = str_replace( "<", "&lt;",$str );
  $str = str_replace( "\"", "&quot;",$str );
  return $str;
}


// 각종 HTML 태그를 이용한 테러방지
function avoid_crack($str)
{
  $str=eregi_replace("<","&lt;",$str);
  $str=eregi_replace("&lt;div","<div",$str);
  $str=eregi_replace("&lt;p ","<p ",$str);
  $str=eregi_replace("&lt;font","<font",$str);
  $str=eregi_replace("&lt;b","<b",$str);
  $str=eregi_replace("&lt;marquee","<marquee",$str);
  $str=eregi_replace("&lt;img","<img",$str);
  $str=eregi_replace("&lt;a ","<a ",$str);
  $str=eregi_replace("&lt;embed","<embed",$str);

  $str=eregi_replace("&lt;/div","</div",$str);
  $str=eregi_replace("&lt;/p ","</p ",$str);
  $str=eregi_replace("&lt;/font","</font",$str);
  $str=eregi_replace("&lt;/b","</b",$str);
  $str=eregi_replace("&lt;/marquee","</marquee",$str);
  $str=eregi_replace("&lt;/img","</img",$str);
  $str=eregi_replace("&lt;/a>","</a>",$str);
  $str=eregi_replace("&lt;/embed","</embed",$str);
  $str=eregi_replace("&gt;",">",$str);
  return $str;
}


function page_avg($totalpage,$cpage,$url){

  	if(!$pagenumber) {
     		$pagenumber = 10;
     	}

     	$startpage = intval(($cpage - 1) / $pagenumber) * $pagenumber +1  ;
     	$endpage = intVal(((($startpage -1) +  $pagenumber) / $pagenumber) * $pagenumber) ;

    	if ($totalpage <= $endpage)
       		$endpage = $totalpage;

//		    if ( $startpage == 1 )

    		if ( $cpage > $pagenumber) {
			   $url_page = "<a href='$url&page=1'>";
  //     			echo ("$url_page");
				echo("<li><a href='$url&page=1' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>");

			   $curpage = intval($startpage - 1);
			   $url_page = "<a href='$url&page=$curpage'>";
       	//		echo ("$url_page");
				echo("<li><a href='$url&page=$curpage'>Previous</a></li>");
       		}
			else{
			  echo("<li><a href='$url&page=1' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>");
			  echo("<li><a href='$url&page=$curpage'>Previous</a></li>");
			}

      		$curpage = $startpage;

      		while ($curpage <= $endpage):

       			if ($curpage == $cpage) {
       				echo "<li class='active'><a href='#'>$cpage</a></li>";
       			} else {
       			  $url_page = "<a href='$url&page=$curpage'>";
       			  //echo ("$url_page");
				  echo("<li><a href='$url&page=$curpage'>$curpage</a></li>");
       			}
       			$curpage++;

 		endwhile ;

       	if ( $totalpage > $endpage) {
      		$curpage = intval($endpage + 1);
      		$url_page = " <a href='$url&page=$curpage'>";
      // 		echo ("$url_page");
			echo("<li><a href='$url&page=$curpage'>Next</a></li>");

      		$url_page = "<a href='$url&page=$totalpage'>";
       //		echo ("$url_page");
			echo("<li><a href='$url&page=$totalpage' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>");
      	}
		else{
		  echo("<li><a href='$url&page=$totalpage'>Next</a></li>");
		  echo("<li><a href='$url&page=$totalpage' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>");
		}
  }

function page_avg_intranet($totalpage,$cpage,$url,$HOMEPG){

  	if(!$pagenumber) {
     		$pagenumber = 10;
     	}

     	$startpage = intval(($cpage - 1) / $pagenumber) * $pagenumber +1  ;
     	$endpage = intVal(((($startpage -1) +  $pagenumber) / $pagenumber) * $pagenumber) ;

    	if ($totalpage <= $endpage)
       		$endpage = $totalpage;

//		    if ( $startpage == 1 )

    		if ( $cpage > $pagenumber) {
			   $url_page = "<a href='$url"."&page=1'>";
       			echo ("$url_page");
				echo("<img src='$HOMEPG/img/icon_10.jpg' border='0' align=absmiddle></a> ");

			   $curpage = intval($startpage - 1);
			   $url_page = "<a href='$url"."&page=$curpage'>";
       			echo ("$url_page");
				echo("<img src='$HOMEPG/img/icon_12.jpg' border='0' align=absmiddle></a> ");
       		}
			else{
			  echo("<img src='$HOMEPG/img/icon_10.jpg' border='0' align=absmiddle></a>  ");
			  echo("<img src='$HOMEPG/img/icon_12.jpg' border='0' align=absmiddle></a>  ");
			}

      		$curpage = $startpage;

      		while ($curpage <= $endpage):

       			if ($curpage == $cpage) {
       				echo "<b>$cpage</b>";
       			} else {
       			  $url_page = "<a href='$url"."&page=$curpage'>";
       			  echo ("$url_page");
				  echo("[$curpage]</a>");
       			}
       			$curpage++;

 		endwhile ;

       	if ( $totalpage > $endpage) {
      		$curpage = intval($endpage + 1);
      		$url_page = " <a href='$url"."&page=$curpage'>";
       		echo ("$url_page");
			echo("<img src='$HOMEPG/img/icon_14.jpg' border='0' align=absmiddle></a>");

      		$url_page = " <a href='$url"."&page=$totalpage'>";
       		echo ("$url_page");
			echo("<img src='$HOMEPG/img/icon_16.jpg' border='0' align=absmiddle></a>");
      	}
		else{
		  echo("  <img src='$HOMEPG/img/icon_14.jpg' border='0' align=absmiddle>");
		  echo("  <img src='$HOMEPG/img/icon_16.jpg' border='0' align=absmiddle>");
		}
  }


/* 날짜데이터 형식 변환 : 20020512 --> 2002-05-12 */
function shortdate($strvalue) {
	$date_str = (!$strvalue)? '': substr($strvalue, 0, 4) . "." . substr($strvalue, 4, 2) . "." . substr($strvalue, 6, 2);
	return $date_str;
}

/* 1년1월1일부터 지정 날자까지의 총일수 구하는 함수 */
function totalDays($strDate) {
//1년1월1일부터 지정 날자까지의 총일수 구하는 함수

    $monthdays = array(0,31,28,31,30,31,30,31,31,30,31,30,31);

    $year = substr($strDate,0,4);
    $month = substr($strDate,5,2);
    $day = substr($strDate,8,2);

    // 이전 년도
    $y = $year - 1;

    // 이전 년도까지의 총일수 = 이전년도 * 1년일수(365) + 이전 년도까지의 윤년수
    // 이전 년도까지의 윤년수 = 4년마다 윤년수 - 4년마다 중 윤년이 없는 100의 배수 년도 수
    //                          + 윤년에서 빼준 100의 배수 년도 중 윤년인 400의 배수 년도 수
    // 즉, 4년마다 한번씩 윤년이 있기 때문에 +$y/4
    //     100으로 나누어 떨어지는 해는 윤년이 아니기 때문에 -$y/100
    //     하지만 400으로 나누어 떨어지는 해는 윤년이므로 +$y/400
    $total = $y*365 + (int)($y/4) - (int)($y/100) + (int)($y/400);

    // 지정 년도의 2월 날자수 : 평년 28일, 윤년 29일
    if( ($year % 4 == 0) && ( ($year % 100 != 0) || ($year % 400 == 0)) ) $monthdays[2]=29;

    // 이전 년도까지의 총일수에 이전 월까지의 날자수를 더해준다.
    for($i=0; $i<$month; $i++) {
        $total += $monthdays[$i];
    }

    // 이번 달의 날자를 더해준다.
    $total += $day;

    return $total;
}



/* 한글 문자열 자르기 함수 */
function shortenStr($str, $maxlen) {

  if ( strlen($str) <= $maxlen )
	return $str;

  $effective_max = $maxlen - 3;
  $remained_byte = $effective_max;
  $retStr="";

  $hanStart=0;

  for ( $i=0; $i < $effective_max; $i++ ) {
	$char=substr($str,$i,1);

	if ( ord($char) <= 127 ) {
		$retStr .= $char;
		$remained_byte--;
		continue;
	}

	if ( !$hanStart && $remained_byte > 1 ) {
		$hanStart = true;
		$retStr .= $char;
		$remained_byte--;
		continue;
	}

	if ( $hanStart ) {
		$hanStart = false;
		$retStr .= $char;
		$remained_byte--;
	}
  }
  return $retStr .= "...";
}

/* 관리자인증 */
function AdminAuth() {
if ($_SESSION[p_memtype]=="S" || $_SESSION[p_memtype]=="A"){

} else {
	 msg("관리자만 이용하실 수 있습니다.");
	echo("<script>
		parent.location.href='/';
		</script>");
}
}

/* inline if 함수 */
function iif($str1,$str2,$str3) {
if ($str1){
	echo($str3);
} else {
	echo($str2);
}
}

/* 파일만 있으면 파일만 삭제하고, 디렉토리가 경로가 포함되면 디렉토리 하위 파일 모두 삭제하는 함수 */
/* $ImageLinkData = '파일명.jpg';  <== 파일명.jpg 만 삭제
 or $ImageLinkData = '디렉토리/파일명.jpg';  <== "파일명.jpg"와 상관없이 "디렉토리"에 저장된 모든 파일 삭제
   $Directory = '../../UpLoadImgDirectory'; <==  저장된 디렉토리, 마지막에 '/' 하이픈 넣지 마시구요.
*/
function UpLoadImgDel($ImageLinkData, $Directory) {
    if(ereg("/",$ImageLinkData)) {
      // 디렉토리 삭제

        $tmpDirSampleImg = explode("/",$ImageLinkData);
        $tmpDirSampleImg = $tmpDirSampleImg[0];

      $SampleImg = $Directory.'/'.$tmpDirSampleImg;

      deldir($SampleImg);
    } else {
      // 파일 삭제
      $SampleImg = $Directory.'/'.$ImageLinkData;

//      if(file_exists($SampleImg))
        if(!unlink($SampleImg)) return FALSE;
    }
      return TRUE;
}

// 파일의 종류 파악
function ext_file($file) {
  $ext=explode(".",$file);

   switch ($ext[count($ext)-1])
   {
     case "tar":
     case "z":
     case "gz":
     case "zip":
     case "rar": $return="compress.gif"; break;
     case "mp3": $return="mp3.gif"; break;
     case "exe": $return="exe.gif"; break;
     case "avi":
     case "mpg":
     case "mpeg":
     case "asf":
     case "asx": $return="movie.gif"; break;
	 default: $return="unknown.gif"; break;
  }
  return $return;
}

// 파일의 타입을 출력하는 mime_content_type 함수
function user_mime_content_type($filename) {
 if(!function_exists("mime_content_type")) {
	$type = array(
	"txt" => "text/plain",
	"htm" => "text/html",
	"html" => "text/html",
	"php" => "text/html",
	"css" => "text/css",
	"js" => "application/javascript",
	"json" => "application/json",
	"xml" => "application/xml",
	"swf" => "application/x-shockwave-flash",
	"flv" => "video/x-flv",

   // images
	"png" => "image/png",
	"jpe" => "image/jpeg",
	"jpeg" => "image/jpeg",
	"jpg" => "image/jpeg",
	"gif" => "image/gif",
	"bmp" => "image/bmp",
	"ico" => "image/vnd.microsoft.icon",
	"tiff" => "image/tiff",
	"tif" => "image/tiff",
	"svg" => "image/svg+xml",
	"svgz" => "image/svg+xml",

	// archives
	"zip" => "application/zip",
	"rar" => "application/x-rar-compressed",
	"exe" => "application/x-msdownload",
	"msi" => "application/x-msdownload",
	"cab" => "application/vnd.ms-cab-compressed",

	// audio/video
	"mp3" => "audio/mpeg",
	"qt" => "video/quicktime",
	 "mov" => "video/quicktime",

	// adobe
	"pdf" => "application/pdf",
	"psd" => "image/vnd.adobe.photoshop",
	"ai" => "application/postscript",
	"eps" => "application/postscript",
	"ps" => "application/postscript",

   // ms office
	"doc" => "application/msword",
	"rtf" => "application/rtf",
	"xls" => "application/vnd.ms-excel",
	"ppt" => "application/vnd.ms-powerpoint",

	// open office
	"odt"=>"application/vnd.oasis.opendocument.text",
	"ods"=>"application/vnd.oasis.opendocument.spreadsheet",
   );
   $ext = strtolower(array_pop(explode(".",$filename)));
   if (array_key_exists($ext, $type))
   {
	   return $type[$ext];
	}
	elseif (function_exists("finfo_open"))
   {
	   $finfo = finfo_open(FILEINFO_MIME);
	   $mimetype = finfo_file($finfo, $filename);
	   finfo_close($finfo);
	   return $mimetype;
   }
   else
  {
	  return "application/octet-stream";
  }
}
else
{
	return mime_content_type($filename);
 }
}

function UnComma($input) {
	$str='';
	for($i=0; $i<strlen($input); $i++){
		$chr = substr($input,$i,1);
		if($chr!=',') $str.=$chr;
	}
	return $str;
}

function manAgeVal($birth) {
  $now_year = date("Y");
  $now_month = date("m");
  $now_day = date("d");

  $birth_year=substr($birth,0,2);
  $birth_y=substr($birth,0,1);
  $birth_year+=($birth_y=='0'||$birth_y=='1')? 2000:1900;
  $birth_month=substr($birth,2,2);
  $birth_day=substr($birth,4,2);

  if($birth_month < $now_month)
      $age= $now_year - $birth_year;
  else if($birth_month == $now_month)
  {
      if($birth_day <= $now_day)
        $age= $now_year - $birth_year;
      else
        $age= $now_year - $birth_year-1;
  }
  else
      $age= $now_year - $birth_year-1;

  return($age);
}

?>
