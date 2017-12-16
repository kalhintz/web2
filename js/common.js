/*-- 링크클릭시 점선없애기 --*/
function bluring(){
if(event.srcElement.tagName=="A"||event.srcElement.tagName=="IMG") document.body.focus();
}
document.onfocusin=bluring;


/*-- 링크클릭시  주소감추기 --*/
function hidestatus()
{
window.status=''
return true
}
if (document.layers)
document.captureEvents(Event.mouseover | Event.mouseout)
document.onmouseover=hidestatus
document.onmouseout=hidestatus


/*-- rollover --*/
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&id.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}


/*-- 화면가운데 창띄우기 --*/
function opwc(name, url, width, height, toolbar, menubar, statusbar, scrollbar, resizable) {
	var winl = (screen.width - width) / 2;
	var wint = (screen.height - height) / 2;
	opw(name, url, winl, wint, width, height, toolbar, menubar, statusbar, scrollbar, resizable);
}


/*-- 일반 창띄우기 --*/
function opw(name, url, left, top, width, height, toolbar, menubar, statusbar, scrollbar, resizable) {
    toolbar_str = toolbar ? 'yes' : 'no';
    menubar_str = menubar ? 'yes' : 'no';
    statusbar_str = statusbar ? 'yes' : 'no';
    scrollbar_str = scrollbar ? 'yes' : 'no';
    resizable_str = resizable ? 'yes' : 'no';
    window.open(url, name, 'left='+left+',top='+top+',width='+width+',height='+height+',toolbar='+toolbar_str+',menubar='+menubar_str+',status='+statusbar_str+',scrollbars='+scrollbar_str+',resizable='+resizable_str);
}


/*-- 레이어 --*/
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);


/*-- 레이어 숨김보임 --*/
function show(iobject){
	iobject.style.visibility="visible";
}
function hide(iobject){
	iobject.style.visibility="hidden";
}

//
function previews(a, b) {
	var xx = eval(a);
	if(b == 1) {
		xx.style.left = event.clientX + 16;
		xx.style.top = event.clientY;
		xx.style.visibility = 'visible';
	} else {
		xx.style.visibility = 'hidden';
	}
}


/*-- 이미지 미리보기 --*/
function preview_img(frm, pre) {
	if(frm) {
		pre.src = frm;
	}
}


/*-- text area에 원하는 값 넣기 -*/
function saveCurrentPos(objTextArea) {
	if(objTextArea.createTextRange) objTextArea.currentPos = document.selection.createRange().duplicate();
}

function insertText(objTextArea, text) {
	if(objTextArea.createTextRange && objTextArea.currentPos) {
		var currentPos = objTextArea.currentPos;
		currentPos.text = currentPos.text.charAt(currentPos.text.length - 1) == ' ' ? text + ' ' : text;
   } else {
         objTextArea.value  = text;
   }
}

function imgView(src, name) {
	ti = new Image();
	ti.src = src;

	s = "";
	s += "<html><head><title>" + name + "</title>\n";
	s += "<sc"+"ript>\n";
	s += "function resize() {\n";
	s += "	pic = document.myimg;\n";
	s += "	if(eval(pic).height) {\n";
	s += "		var name = navigator.appName\n";
	s += "		if (name == 'Microsoft Internet Explorer') {\n";

	if(ti.width > screen.width || ti.height > screen.height) {
		var imgwin = window.open("",'name','scrollbars=yes,status=no,toolbar=no,resizable=1,location=no,menu=no,top=5000,left=5000,width=1,height=1');
		s += "			myHeight = screen.availHeight - 50; myWidth = screen.availWidth - 50;\n";
		s += "		} else {\n";
		s += "			myHeight = screen.availHeight - 50; myWidth = screen.availWidth - 50;\n";
	} else {
		var imgwin = window.open("",'name','scrollbars=no,status=no,toolbar=no,resizable=1,location=no,menu=no,top=5000,left=5000,width=1,height=1');
		s += "			myHeight = eval(pic).height + 30; myWidth = eval(pic).width + 12;\n";
		s += "		} else {\n";
		s += "			myWidth = eval(pic).height + 9; myWidth = eval(pic).width;\n";
	}
	imgwin.focus(); 
	imgwin.document.open(); 
	
	s += "		}\n";
	s += "		clearTimeout();\n";
	s += "		var height = screen.height;\n";
	s += "		var width = screen.width;\n";
	s += "		var leftpos = width / 2 - myWidth / 2;\n";
	s += "		var toppos = height / 2 - myHeight / 2; \n";
	s += "		self.moveTo(leftpos, toppos);\n";
	s += "		self.resizeTo(myWidth, myHeight);\n";
	s += "	} else {\n";
	s += "		setTimeOut(resize(), 100);\n";
	s += "	}\n";
	s += "}\n";
	s += "</sc"+"ript>\n";
	s += "</head>\n";
	s += "<body topmargin=0 leftmargin=0 marginheight=0 marginwidth=0>\n";
	s += "<img border=0 src='" + src + "' alt='클릭 닫기' name=myimg onclick='self.close();' onload='resize();'>\n";
	s += "</body></html>\n";

	imgwin.document.write(s);
	imgwin.document.close();
}


/*-- cookie 생성 -*/
function setCookie(name, value, expiredays) {
  var todayDate = new Date();
  todayDate.setDate( todayDate.getDate() + expiredays );
  document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
}


/*-- cookie값 받기 -*/
function getCookieVal(offset) {
	var endstr = document.cookie.indexOf (";", offset);
	if(endstr == -1)
		endstr = document.cookie.length;
	return unescape(document.cookie.substring(offset, endstr));
}


/*-- cookie 찾기 --*/
function getCookie(name) {
	var arg = name + "=";
	var alen = arg.length;
	var clen = document.cookie.length;
	var i = 0;
	while (i < clen) {
		var j = i + alen;
		if (document.cookie.substring(i, j) == arg)
			return getCookieVal(j);
		i = document.cookie.indexOf(" ", i) + 1;
		if (i == 0) break;
	}
	return null;
}


/*-- cookie 삭제 --*/
function deleteCookie(name,path,domain) 
{
	if (getCookie(name)) 
	{
		document.cookie = name + "=" +
		((path) ? "; path=" + path : "") +
		((domain) ? "; domain=" + domain : "") +
		"; expires=Thu, 01-Jan-70 00:00:01 GMT";
	}
}

