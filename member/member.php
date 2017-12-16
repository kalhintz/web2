<?
session_start();
require("../lib/util.php");
require("../lib/dbconn.php");

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/css/style2.css" rel="stylesheet" type="text/css">
<script src="/js/common.js" type="text/javascript"></script>
<script type="text/javascript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<link href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/common.css" rel="stylesheet" type="text/css" media="all">
<link href=<?$_SERVER['DOCUMENT_ROOT']?>"/css/<?=$table?>.css" rel="stylesheet" type="text/css" media="all">
<script>
function execDaumPostcode() {
		new daum.Postcode({
				oncomplete: function(data) {
						// 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

						// 각 주소의 노출 규칙에 따라 주소를 조합한다.
						// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
						var fullAddr = ''; // 최종 주소 변수
						var extraAddr = ''; // 조합형 주소 변수

						// 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
						if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
								fullAddr = data.roadAddress;

						} else { // 사용자가 지번 주소를 선택했을 경우(J)
								fullAddr = data.jibunAddress;
						}

						// 사용자가 선택한 주소가 도로명 타입일때 조합한다.
						if(data.userSelectedType === 'R'){
								//법정동명이 있을 경우 추가한다.
								if(data.bname !== ''){
										extraAddr += data.bname;
								}
								// 건물명이 있을 경우 추가한다.
								if(data.buildingName !== ''){
										extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
								}
								// 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
								fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
						}

						// 우편번호와 주소 정보를 해당 필드에 넣는다.
						document.getElementById('postcode').value = data.zonecode;
						document.getElementById('address').value = fullAddr;

						// 커서를 상세주소 필드로 이동한다.
			//			document.getElementById('address2').focus();
				}
		}).open();
};
</script>
<?php include $_SERVER['DOCUMENT_ROOT']."/lib/menu.php"; ?>
</head>

<body>
<div class="clearfix">
</div>
	<div class="container col-lg-8 col-md-8 col-sm-8 centered">
    <div class="page-header">
  		<h1>회원가입</h1>

  	</div>
                   <!-- 본문 들어가는 부분 -->
           <form name="memberfrm" class="form-horizontal " role="form" method="post" action="member_insert.php">
               <div class="form-group">
                   <label for="provision" class="col-lg-2 control-label">회원가입약관</label>
                   <div class="col-lg-10" id="provision">
                       <textarea class="form-control" rows="8" style="resize:none">
【 제 1 장 총 칙 】
제 1 조 (목적)
본 약관은 신대감갈비나라가 제공하는 신대감갈비나라 서비스(이하 "서비스"라 한다)를 회원이 이용함에 있어, 신대감갈비나라와 회원간의 권리와 의무를 규정함에 목적이 있습니다.
제 2 조 (용어의 정의)
본 약관 및 신대감갈비나라에서 사용하는 용어의 정의는 다음과 같습니다.
① 회원 : 신대감갈비나라와 서비스 이용계약을 체결한 자로서 개인에 한함 (본 약관은 무료회원을 기준으로 함)
② 회원가입 : 신대감갈비나라와 서비스 이용계약을 체결하는 행위
③ 회원탈퇴 : 신대감갈비나라와의 서비스 이용계약을 해지하는 행위
④ 서비스 : 신대감갈비나라가 인터넷주소 http://sindaegam.kr을 통하여 회원에게 제공합니다.
⑤ 아이디(ID) : 회원 식별과 회원의 서비스 이용을 위하여 회원이 선정하고 신대감갈비나라가 승인하는 문자와 숫자의 조합
⑥ 비밀번호 : 회원의 비밀 보호를 위해 회원 자신이 선정한 문자와 숫자의 조합
⑦ 이용요금 : 서비스 이용계약 체결직후부터 해지전까지의 서비스 이용에 대한 대가로서 부과되는 금액(부가가치세 포함)
⑧ 운영자 : 서비스의 전반적인 관리와 원활한 운영을 위하여 신대감갈비나라에서 선정한 사람

【 제 2 장 서비스 이용계약 】

제 3 조 (약관의 게시 및 개정)

① 신대감갈비나라는 본 약관의 내용과 상호, 연락처(전화,팩스,전자우편 주소 등) 등을 이용자가 알 수 있도록 서비스화면에 게시합니다.
② 신대감갈비나라는 신대감갈비나라가 필요하다고 인정하는 경우 본 약관을 개정할 수 있으며, 제5조과 같은 방법으로 통지함으로써 효력을 발생합니다.
③ 회원은 개정된 약관에 대하여 거부할 권리가 있습니다. 회원은 개정된 약관이 공지된 지 15일 이내에 거부의사를 표명할 수 있습니다. 개정된 약관 조항에 대하여 회원이 거부하는 경우 신대감갈비나라는 15일의 기간을 정하여 회원에게 사전통지 후 당해 회원과의 계약을 해지할 수 있습니다. 만약 회원이 거부의사를 표시하지 않는 경우 이는 약관개정에 동의한 것으로 간주됩니다.

제 4 조 (약관의 확인,동의,열람)

① 이용계약 신청시 동의여부에 대한 물음에 "동의함" 단추를 누르면 본 약관에 동의하는 것으로 간주됩니다.
② 회원은 최초 이용계약 신청시 반드시 본 약관의 모든 내용을 확인하여야 하며, 서비스이용도중에도 수시로 약관의 내용을 열람하여 참조하여야 합니다. 약관내용을 확인하지 않음으로 인하여 발생하는 모든 결과에 대한 책임은 회원에게 있습니다.

제 5 조 (회원에 대한 통지)
① 신대감갈비나라가 회원에 대한 통지를 하는 경우, 회원이 신대감갈비나라에 제출한 전자우편 주소로 할 수 있습니다.
② 신대감갈비나라는 불특정다수 회원에 대한 통지의 경우 1주일이상 서비스화면(공지용게시판)에 게시, 공지함으로서 개별 통지에 갈음할 수 있습니다.
③(정보의 제공) 신대감갈비나라는 회원에게 서비스 이용, 각종 행사, 기타 신대감갈비나라에 관한 다양한 정보를 전자우편이나 서신우편, 기타 방법으로 제공할 수 있으며, 이를 원치 않을 경우 회원은 정보수신을 거부할 수 있습니다.

제 6 조 (이용계약의 신청 및 성립)
① 이용계약의 신청은 본인의 책임하에 직접 온라인으로 가입신청서 양식에 내용을 기입함으로써 이루어 집니다.
② 이용계약 성립은 회원의 이용신청에 대하여 신대감갈비나라가 심사 후 승낙함으로써 이루어 집니다.
③ 온라인 가입신청 양식에 기입하는 모든 회원 정보는 실제 데이터인 것으로 간주하며 실명이나 실제정보를 입력하지 않은 사용자는 법적인 보호를 받을 수 없으며, 서비스 사용의 제한을 받을 수 있습니다.

제 7 조 (이용계약신청의 승낙)
① 신대감갈비나라는 회원이 가입신청서의 필수기입 항목을 정확히 기입하여 이용신청을 하였을 때 승낙합니다.
② 신대감갈비나라는 다음 각 호의 1에 해당하는 이용계약신청에 대하여는 승낙을 유보할 수 있습니다.
1. 설비에 여유가 없는 경우
2. 기술상 지장이 있는 경우
3. 기타 신대감갈비나라의 사정상 이용승낙이 곤란한 경우
③ 신대감갈비나라는 다음 각 호의 1에 해당하는 이용계약신청에 대하여는 이를 승낙하지 아니할 수 있습니다.
1. 이름이 실명이 아닌 경우
2. 같은 사용자가 다른 ID로 중복 이용신청을 하려는 경우
3. 이용신청시 서비스를 운영하기 위한 필수정보를 모두 기입하지 않은 경우
4. 이용신청시 필요내용을 허위로 기입한 경우
5. 적법하지 못한 목적으로 이용신청하려는 경우
6. 기타 관계법령을 위반한 경우

제 8 조 (회원ID 관리)
① (변경) 회원식별, 기능구현 등 모든 서비스가 회원의 ID를 기준으로 구현되어 있어, 회원관리 및 서비스의 원활한 운영을 위하여 회원의 ID변경은 불가능합니다. 사생활 침해 및 미풍양속에 어긋나는 등 불가피하게 ID를 변경하여야 할 경우, 회원의 관련데이타를 모두 회원 본인의 저장공간에 저장한 뒤 이용계약의 해지를 신청하여야 합니다.
② (관리) 회원ID와 비밀번호의 관리 및 이용상의 부주의로 인하여 발생되는 과실 또는 제3자에 의한 부정사용 등에 대한 책임은 회원에게 있으며 자신의 아이디(ID)가 부정하게 사용된 경우 회원은 반드시 신대감갈비나라에 그 사실을 통보해야 합니다. 단, 신대감갈비나라의 관리상 고의 또는 과실이 있는 경우에는 그러하지 아니합니다.

제 9 조 (계약사항의 변경)
회원은 이용신청시 기입한 사항이 변경되었을 경우 온라인으로 수정을 하여야 하며, 수정하지 않아 발생하는 모든 결과에 대한 책임은 회원에게 있습니다.

제 10 조 (회원의 개인정보보호 정책)
① 회원의 개인정보에 대해서는 개인정보보호정책(이하 '보호정책)이 적용됩니다. 본 보호정책은 본 약관의 일부분을 구성합니다.
② 회원이 이용신청서에 개인정보를 기입하고 본 약관에 따라 이용신청을 하는 것은, 보호정책의 수락에 동의하고, 향후 본 보호정책이 변경될 수 있다는 것을 인지한 것으로 간주됩니다.

【 제 3 장 서비스 이용 】

제 11 조 (신대감갈비나라의 의무)
① (개인정보보호) 제 10 조에서 명기한 바와 같이, 신대감갈비나라는 서비스 제공과 관련하여 알고 있는 회원의 신상정보를 본인의 승낙없이 제 3자에게 누설, 배포하지 않는 등 개인정보보호정책을 성실히 이행합니다. 단, 전기통신기본법 등 법률의 규정에 의하여 국가기관의 요구가 있는 경우, 범죄에 대한 수사상의 목적이 있거나 정보통신윤리위원회의 요청이 있는 경우, 또는 기타 관계법령에서 정한 절차에 따른 요청이 있는 경우에는 그러하지 않습니다.
② (서비스의 안정적 운영) 신대감갈비나라는 신대감갈비나라에 설치된 서비스용 설비를 지속적이고, 안정적인 서비스 제공에 적합하도록 유지하여야 하며 서비스용 설비에 장애가 발생하거나 또는 그 설비가 못쓰게 된 경우 즉시 그 설비를 수리하거나 복구하여야 합니다.

제 12 조 (회원의 주의사항)
① (금지행위) 회원은 서비스를 이용할 때 다음 각 호의 행위를 하지 않아야
합니다.

[다른 회원 및 기타 이용자 관련]
1. 타인의 서비스 ID 및 비밀번호를 도용하는 행위
2. (결과) 신대감갈비나라의 서비스를 이용,
타인의 명예를 훼손시키거나 불이익을 주는 행위
또는 다른 회원의 정상적인 서비스를 방해하는 행위
3. (과정) 불건전한 또는 비합법적인 서비스 이용 행위
4. 타인 및 기타 이용자의 지적재산권을 침해하는 행위

[신대감갈비나라 및 서비스운영 관련]
5. 신대감갈비나라의 지적재산권을 침해하는 행위
예.서비스에서 얻은 정보를 신대감갈비나라의 사전승낙 없이 회원 이용이외의
목적으로 복제하는 행위 또는 이를 출판 및 방송 등에 사용하거나 제3자에게 제공하는 행위 등
6. 신대감갈비나라의 서비스 운영에 지장을 초래하는 행위
신대감갈비나라에서 제공하는 사이버공간을 다운로드파일(MP3,게임파일 등)을 올려놓는 곳으로 사용하여 공개사이트를 통해 해당 파일을 다운로드받게 함으로써 신대감갈비나라 서비스 네트웍에 과부하를 초래한다고 판단되는 행위 등
7. 본 신대감갈비나라의 명예를 훼손하는 행위

[정부 정보통신 정책 관련]
8. 국익 및 미풍양속에 반하여 서비스이용을 계획/실행하는 행위
9. 정보통신설비의 오동작이나 정보 등의 파괴를 유발시키는 컴퓨터 바이러스 프로그램을 유포하는 행위
10.기타 법령에 위배되는 행위
② (게시판 열람) 회원은 신대감갈비나라 서비스화면의 게시판을 수시로 열람하여, 서비스이용에 참조하여야 하며, 이용제한이 있을 경우 이를 준수하여야 합니다.
③ (영업행위 금지) 회원은 신대감갈비나라에서 허용한 경우를 제외하고는 서비스를 이용하여 영업행위를 할 수 없습니다. 당해 영업행위의 결과 발생하는 상황에 대해서는 신대감갈비나라는 책임을 지지 않으며. 이와 같은 회원의 부당한 영업행위로 인하여 신대감갈비나라가 입은 손해는 회원이 배상하여야 합니다.

제 13 조 (양도의 금지)
회원이 서비스를 받을 권리는 이를 양도하거나 증여 등을 할 수 없으며 질권의 목적으로 사용할 수 없다.

제 14 조 (서비스의 내용변경)
① 서비스의 세부내용은 신대감갈비나라의 정책으로, 시장환경/수익구조 등의 상황에 따라 변경될 수 있습니다. 이 경우에는 변경 15일전에 서비스화면에 게시하거나 기타의 방법으로 회원에게 공지합니다.
② 변경된 세부내용은 변경시점을 기준으로 이후 서비스 이용분만 적용됩니다(소급적용되지 않습니다)

제 15 조 (회원의 게시물)
신대감갈비나라는 회원이 게시하거나 등록하는 서비스내의 내용물이 다음 각 호의 1에 해당한다고 판단되는 경우에 사전통지 없이 삭제할 수 있습니다.
1. 다른 회원 또는 제3자를 비방하거나 중상모략으로 명예를 손상시키는 내용일 경우
2. 공공질서 및 미풍양속에 위반되는 내용일 경우
3. 범죄적 행위에 결부된다고 인정되는 내용일 경우
4. 제3자의 저작권 등 기타 권리를 침해하는 내용일 경우
5. 신대감갈비나라에서 규정한 게시기간을 초과한 경우
6. 게시물을 이용, 서비스이용과 무관한 개인적인 영업활동을 하려할 경우
7. 기타 관계법령에 위반된다고 판단되는 경우

제 16 조 (게시물의 저작권)
서비스에 게재된 자료에 대한 권리는 다음 각 호와 같습니다.
① 게시물에 대한 권리와 책임은 게시자에게 있으며 신대감갈비나라는 게시자의 동의 없이는 이를 영리적 목적으로 사용할 수 없습니다. 단, 비영리적인 경우는 그러하지 아니하며 또한 서비스내의 게재권을 갖습니다.
② 회원은 서비스를 이용하여 얻은 정보를 가공, 판매하는 행위 등 서비스에 게재된 자료를 상업적으로 사용할 수 없습니다.

제 17 조 (서비스 이용시간 및 고객지원)
① 서비스의 이용은 신대감갈비나라의 업무상 또는 기술상 특별한 지장이 없는 한 연중무휴 1일 24시간을 원칙으로 합니다. 다만 정기 점검 등의 필요로 신대감갈비나라가 정한 날이나 시간은 그러하지 않습니다. 신대감갈비나라는 서비스를 일정범위로 분할하여 각 범위별로 이용가능시간을 별도로 정할 수 있으며 이 경우 그 내용을 사전에 공지합니다.
② 문의응답 및 고객지원은 원칙적으로 웹사이트 또는 E-mail을 통해서만
제공되며, 기술지원의 경우 신대감갈비나라의 정규업무시간내에 이루어집니다.

제 18 조 (서비스 제공의 중지)
① 신대감갈비나라는 다음 각 호의 1에 해당하는 경우 서비스 제공을 중지할 수 있습니다.
1. 서비스용 설비의 보수 등 공사로 인한 부득이한 경우
2. 전기통신사업법에 규정된 기간통신사업자가 전기통신서비스를 중지했을 경우
② 신대감갈비나라는 국가비상사태, 정전, 서비스 설비의 장애 또는 서비스 이용의 폭주 등으로 정상적인 서비스 이용에 지장이 있는 때에는 서비스의 전부 또는 일부를 제한하거나 정지할 수 있습니다.

【 제 4 장 계약해지 및 이용제한 】

제 19 조 (계약해지 및 이용제한)
① 신대감갈비나라는 인터넷홈페이지에서 서비스 이용계약의 해지를 신청할 수 있도록 합니다.
② 이용계약의 해지는 회원 본인이 직접 요청하여야 하며, 신대감갈비나라는 필요에 따라 본인여부를 확인할 수 있는 증표를 제시토록 요구할 수 있습니다.
③ 회원의 이용계약 해지 신청이 있을 경우, 신대감갈비나라는 48시간 이내에 본인여부를 확인하고 신청을 수행합니다.
④ 신대감갈비나라는 회원이 다음 각 호의 1에 해당하는 행위를 하였을 경우 사전통지 없이 이용계약을 해지하거나 또는 기간을 정하여 서비스 제공을 중지할 수 있습니다.
1. 제 7 조 제③항의 각 호에 해당되는 사항이 이용신청 승낙 이후에 확인되었을 경우
2. 제 12 조의 규정을 위반한 경우

제 20 조 (계약해지의 효과)
① 제 19 조 ①,②,③항과 관련한 계약해지일 경우, 부칙③에서 명시한 방법에 의해 환불해 드립니다.
② 제 19 조 ④항과 관련한 계약해지일 경우, 잔여월수에 대한 이용요금을 반환하지 않습니다.
③ 신대감갈비나라와 회원간 본 서비스의 이용계약이 해지될 경우, 회원자격은 거부됩니다.

【 제 5 장 서비스 이용요금 】

제 21조 (이용요금)
① 서비스의 이용요금은 무료 이며 이용계약이 체결됨과 동시에, 하나의 ID에 일정기간 동안 신대감갈비나라의 서비스를 이용할 자격을 부여됩니다.

제 22 조 (약관 외 준칙)
이 약관에 명시되지 않은 사항은 전기통신기본법, 전기통신사업법, 정보통신망이용촉진등에관한법률, 방문판매등에관한법률, 전자거래기본법, 전자서명법, 약관의규제등에관한법률, 소비자보호법, 민법 및 기타 대한민국의 관련법령과 상관습에 의합니다.

제 23 조 (관할법원)
본 약관과 관련하여 발생되는 분쟁에 대해 소송이 제기될 경우 신대감갈비나라의 본사 소재지를 관할하는 법원을 전속 관할법원으로 합니다.

(부칙)
① 시행일: 본 약관은 2011년 9월 15일부터 시행됩니다.
                       </textarea>
                       <div class="radio">
                           <label>
                               <input type="radio" id="provisionYn" name="provisionYn" value="Y" autofocus="autofocus" checked>
                               동의합니다.
                           </label>
                       </div>
                       <div class="radio">
                           <label>
                               <input type="radio" id="provisionYn" name="provisionYn" value="N">
                               동의하지 않습니다.
                           </label>
                       </div>
                   </div>
               </div>
               <div class="form-group" id="divId">
                   <label for="inputId" class="col-lg-2 control-label">아이디</label>
                   <div class="col-lg-8">
                       <input type="text" name="m_id" class="form-control onlyAlphabetAndNumber" id="id" data-rule-required="true" placeholder="16자이내의 알파벳, 언더스코어(_), 숫자만 입력 가능합니다." minlength="6" maxlength="16">
                   </div>
									 <div class="col-lg-1">
									 <button type="button" class="btn btn-default" onclick="window.open('/member/CheckID.php?id='+document.memberfrm.m_id.value+'&first=OK','CheckID','location=no,directories=no,resizable=no,status=no,toolbar=no,menubar=no, width=420,height=200,scrollbars=auto'); return false " onFocus="this.blur()" target="_blank">중복확인</button>
								 </div>
							 </div>
               <div class="form-group" id="divPassword">
                   <label for="inputPassword" class="col-lg-2 control-label">패스워드</label>
                   <div class="col-lg-10">
                       <input type="password" class="form-control" id="password" name="m_pwd_1" data-rule-required="true" placeholder="패스워드" maxlength="30">
                   </div>
               </div>
               <div class="form-group" id="divPasswordCheck">
                   <label for="inputPasswordCheck" class="col-lg-2 control-label">패스워드 확인</label>
                   <div class="col-lg-10">
                       <input type="password" class="form-control" id="passwordCheck" name="m_pwd_2" data-rule-required="true" placeholder="패스워드 확인" maxlength="30">
                   </div>
               </div>
               <div class="form-group" id="divName">
                   <label for="inputName" class="col-lg-2 control-label">이름</label>
                   <div class="col-lg-10">
                       <input type="text" class="form-control onlyHangul" id="name" name="ceo_name" data-rule-required="true" placeholder="한글만 입력 가능합니다." maxlength="15">
                   </div>
               </div>

							 <div class="form-group" id="divBusinum">
							 		<label for="inputBusinum" class="col-lg-2 control-label">사업자등록번호</label>
							 		<div class="col-lg-10">
							 				<input type="text" class="form-control" id="nickname" name="m_ps_num_1" data-rule-required="true" placeholder="개인은 생년월일입력" maxlength="15">
							 		</div>
							 </div>

							 <div class="form-group" id="divPhoneNumber">
                   <label for="inputPhoneNumber" class="col-lg-2 control-label">휴대폰 번호</label>
                   <div class="col-lg-10">
                       <input type="tel" name="m_mobile" class="form-control onlyNumber" id="phoneNumber" data-rule-required="true" placeholder="-를 제외하고 숫자만 입력하세요." maxlength="11">
                   </div>
               </div>

							 <div class="form-group" id="divHomeNumber">
                   <label for="inputHomeNumber" class="col-lg-2 control-label">전화 번호</label>
                   <div class="col-lg-10">
                       <input type="tel" name="m_home" class="form-control onlyNumber" id="homeNumber" data-rule-required="true" placeholder="-를 제외하고 숫자만 입력하세요." maxlength="11">
                   </div>
               </div>

							 <div class="form-group" id="divFaxNumber">
                   <label for="inputFaxNumber" class="col-lg-2 control-label">팩스 번호</label>
                   <div class="col-lg-10">
                       <input type="tel" name="m_fax" class="form-control onlyNumber" id="faxNumber" data-rule-required="true" placeholder="-를 제외하고 숫자만 입력하세요." maxlength="11">
                   </div>
               </div>

							 <div class="form-group" id="divAddress">
							 		<label for="inputAdress" class="col-sm-2 control-label">주소</label>
							 		<div class="col-sm-2">
										<input type="text" class="form-control onlyNumber" name="czip1" id="postcode" placeholder="우편번호" data-rule-required="true" readonly>
							 		</div>
									<div class="col-lg-6">
										<input type="text" class="form-control" name="caddress" id="address" placeholder="주소" data-rule-required="true">
							 		</div>
									<div class="col-sm-2">
										<input type="button" class="form-control" onclick="execDaumPostcode()" id="findpost" value="주소 찾기">
									</div>
							 </div>

               <div class="form-group" id="divCompname">
                   <label for="inputCompname" class="col-lg-2 control-label">회사명</label>
                   <div class="col-lg-10">
                       <input type="text" name="com_name" class="form-control" id="compname" data-rule-required="true" placeholder="회사명" maxlength="15">
                   </div>
               </div>

							 <div class="form-group" id="divJikwi">
                   <label for="inputJikwi" class="col-lg-2 control-label">담당자 성명/직위</label>
                   <div class="col-lg-5">
                       <input type="text" name="m_name" class="form-control" id="m_name" data-rule-required="true" placeholder="성명" maxlength="15">
									 </div>
									 <div class="col-lg-5">
												<input type="text" name="jikwi" class="form-control" id="jikwi" data-rule-required="true" placeholder="직위" maxlength="15">
									 </div>
               </div>

               <div class="form-group" id="divEmail">
                   <label for="inputEmail" class="col-lg-2 control-label">이메일</label>
                   <div class="col-lg-10">
                       <input type="email" name="email" class="form-control" id="email" data-rule-required="true" placeholder="이메일" maxlength="40">
                   </div>
               </div>

               <div class="form-group">
                   <label for="inputEmailReceiveYn" class="col-lg-2 control-label">이메일 수신여부</label>
                   <div class="col-lg-10">
                       <label class="radio-inline">
                           <input type="radio" id="emailReceiveYn" name="emailReceiveYn" value="Y" checked> 동의합니다.
                       </label>
                       <label class="radio-inline">
                           <input type="radio" id="emailReceiveYn" name="emailReceiveYn" value="N"> 동의하지 않습니다.
                       </label>
                   </div>
               </div>
               <div class="form-group">
                   <label for="inputPhoneNumber" class="col-lg-2 control-label">SMS 수신여부</label>
                   <div class="col-lg-10">
                       <label class="radio-inline">
                           <input type="radio" id="smsReceiveYn" name="smsReceiveYn" value="Y" checked> 동의합니다.
                       </label>
                       <label class="radio-inline">
                           <input type="radio" id="smsReceiveYn" name="smsReceiveYn" value="N"> 동의하지 않습니다.
                       </label>
                   </div>
               </div>
               <div class="form-group">
                   <div class="col-lg-offset-2 col-lg-10">
                       <button type="submit" class="btn btn-default">Sign in</button>
                   </div>
               </div>
           </form>
               <hr/>
               <!--// 푸터 들어가는 부분 -->
</div>
</body>
           <script src=<?$_SERVER['DOCUMENT_ROOT']?>"/js/validation.js" type="text/javascript"></script>
</html>
