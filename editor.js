
var oEditors = [];
var sLang = "ko_KR";	// 언어 (ko_KR/ en_US/ ja_JP/ zh_CN/ zh_TW), default = ko_KR
nhn.husky.EZCreator.createInIFrame({
oAppRef: oEditors,
elPlaceHolder: "ir2",
sSkinURI: "../se2/SmartEditor2Skin.html",
htParams : {
  bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
  bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
  bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
  //bSkipXssFilter : true,		// client-side xss filter 무시 여부 (true:사용하지 않음 / 그외:사용)
  //aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
  fOnBeforeUnload : function(){
    //alert("완료!");
  },
  I18N_LOCALE : sLang
}, //boolean
fOnAppLoad : function(){
  //예제 코드
  //oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
},
fCreator: "createSEditor2"
});

function pasteHTML() {
var sHTML = "<span style='color:#FF0000;'>이미지도 같은 방식으로 삽입합니다.<\/span>";
oEditors.getById["ir2"].exec("PASTE_HTML", [sHTML]);
}

function showHTML() {
var sHTML = oEditors.getById["ir2"].getIR();
alert(sHTML);
}

function submitContents(elClickedObj) {
oEditors.getById["ir2"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.
// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
var ir1 = $("#ir2").val();
var sub = $("#subject").val();
var tet = ir1.replace(/[<][^>]*[>]/gi, "");
//alert(tet); //에디터모드에서 전송될 때 자꾸 태그가붙어서 제거할 때 필요.

        if (sub == ""  || sub == null || sub == '&nbsp;' || sub == '<p>&nbsp;</p>')
        {
            alert("제목을 입력하세요!");
            $("#subject").focus();
            return;
        }
        if(tet == ""  || tet == null || tet == '&nbsp;' || tet == '<p>&nbsp;</p>')  {
             alert("내용을 입력하세요.");
             oEditors.getById["ir2"].exec("FOCUS"); //포커싱
             return;
        }

try {
  document.board_form.submit();
} catch(e) {}
}

function setDefaultFont() {
var sDefaultFont = '궁서';
var nFontSize = 24;
oEditors.getById["ir1"].setDefaultFont(sDefaultFont, nFontSize);
}
