
var tt_count=document.frm1.mode2.value;


function profit_cost()
{
var tt=0;
var count=0;
var strlist = ttemp = dctemp = '';
var ischk = false;
var playlist = new Array('오전권(9시-13시)-스키[일반]','오전권(9시-13시)-보드[일반]','오전권(9시-13시)-의류','오전권(9시-13시)-리프트[대인]','오전권(9시-13시)-스키[고급]','오전권(9시-13시)-보드[고급]','오후권(13시-17시)-스키[일반]','오후권(13시-17시)-보드[일반]','오후권(13시-17시)-의류','오후권(13시-17시)-리프트[대인]','오후권(13시-17시)-스키[고급]','오후권(13시-17시)-보드[고급]','야간권(18시30분 - 23시)-스키[일반]','야간권(18시30분 - 23시)-보드[일반]','야간권(18시30분 - 23시)-의류','야간권(18시30분 - 23시)-리프트[대인]','야간권(18시30분 - 23시)-스키[고급]','야간권(18시30분 - 23시)-보드[고급]','심야권(22시-5시)-스키[일반]','심야권(22시-5시)-보드[일반]','심야권(22시-5시)-의류','심야권(22시-5시)-리프트[대인]','심야권(22시-5시)-스키[고급]','심야권(22시-5시)-보드[고급]','백야권(24시-5시)-스키[일반]','백야권(24시-5시)-보드[일반]','백야권(24시-5시)-의류','백야권(24시-5시)-리프트[대인]','백야권(24시-5시)-스키[고급]','백야권(24시-5시)-보드[고급]','주간권(9시-17시)-스키[일반]','주간권(9시-17시)-보드[일반]','주간권(9시-17시)-의류','주간권(9시-17시)-리프트[대인]','주간권(9시-17시)-스키[고급]','주간권(9시-17시)-보드[고급]','오후야간권(13시-23시)-스키[일반]','오후야간권(13시-23시)-보드[일반]','오후야간권(13시-23시)-의류','오후야간권(13시-23시)-리프트[대인]','오후야간권(13시-23시)-스키[고급]','오후야간권(13시-23시)-보드[고급]','ALLNIGHT권(18시30분-5시)-스키[일반]','ALLNIGHT권(18시30분-5시)-보드[일반]','ALLNIGHT권(18시30분-5시)-의류','ALLNIGHT권(18시30분-5시)-리프트[대인]','ALLNIGHT권(18시30분-5시)-스키[고급]','ALLNIGHT권(18시30분-5시)-보드[고급]','1:1강습권(반일)','1:1강습권(주간)','2:1강습권(반일)','2:1강습권(주간)','3:1강습권(반일)','3:1강습권(주간)','펜션(커플룸 2인)','펜션(프렌드룸 4인∼6인)','펜션(대형룸 8인이상)');

var titles = "";
var arr_chk=document.getElementsByName('chk[]');
var arr_chkplay=document.getElementsByName('chk_play[]');
var obj = document.frm1;


var tdlist = $("form").find('td[rowspan]');
var tdlistinfo = "";
var chks = $('input:checkbox[name="chk[]"]');
var chkplays = $('[name="chk_play[]"]');
var tot = $('[name="total1"]');
var checkisf = chks.is(':checked');
var strl = $('[name="strlist"]');
var ttt = $('[name="tt_count"]');
var i = 0;


for(i=0; i<chks.length; i++)
{
  if($(chks).eq(i).is(':checked') && $(chkplays).eq(i).val()!="")
  {
    tt += parseInt($(chks).eq(i).val(), 10)*$(chkplays).eq(i).val();
    if(strlist) strlist += ',';
      strlist += playlist[i] + "=" + $(chkplays).eq(i).val() + "매";
      tt_count=tt_count+1;
  }
tot.val(setComma(tt));
strl.val(strlist);
  if(!$(chks).eq(i).is(':checked') && $(chkplays).eq(i).val()>0)
  {
    $(chkplays).eq(i).val("");
  }
}


/*
for(i=0; i<arr_chk.length; i++)
{
  if(arr_chk[i].checked == true && arr_chkplay[i].value!="")
    {
      tt += parseInt(arr_chk[i].value, 10)*arr_chkplay[i].value;

    //  if( strlist ) strlist += ', '
      if(i>62){
        strlist += playlist[i] + "=" +arr_chkplay[i].value +"개";
      }else if(i>56){
        strlist += playlist[i] + "=" +arr_chkplay[i].value +"인";
      }else{
        strlist += playlist[i] + "=" +arr_chkplay[i].value +"매";
      }
      count++;
      tt_count=tt_count+1;
      //alert(arr_chkplay[i].value);
      ischk = true;
  }
}

//obj.total1.value = setComma(tt);
//obj.strlist.value = strlist;
*/
if(!ischk)
{
  return false;
}

return true;
}

function setComma(str) {
  var temp_str = String(str);

  for(var i = 0 , retValue = String() , stop = temp_str.length; i < stop ; i++)
  retValue = ((i%3) == 0) && i != 0 ? temp_str.charAt((stop - i) -1) + "," + retValue : temp_str.charAt((stop - i) -1) + retValue;

retValue += "원";
return retValue;
}
function check_email(cg)
{
mail01 = /[^@]+@[A-Za-z0-9_-]+[.]+[A-Za-z]+/;
mail02 = /[^@]+@[A-Za-z0-9_-]+[.]+[A-Za-z0-9_-]+[.]+[A-Za-z]+/;
mail03 = /[^@]+@[A-Za-z0-9_-]+[.]+[A-Za-z0-9_-]+[.]+[A-Za-z0-9_-]+[.]+[A-Za-z]+/;

if(mail01.test(cg.value)) return true;;
if(mail02.test(cg.value)) return true;
if(mail03.test(cg.value)) return true;
return false;
}

function check(ads)
{
  var frm=document.frm1;
  var strl = $('[name="strlist"]');
  var now  = new Date();
  var regi = document.getElementById('imgDate').value;
  var todayAtMidn = new Date(regi);

  if(now>todayAtMidn)
  {
    alert("예약날짜가 잘못되었습니다.");
    frm.reservation_date_time.focus();
    return false;
  }

if(!strl.val())
  {
    tt_count=0;
  }

if(tt_count==0){
  alert("위의 상품중 1개이상을 선택하시고 예약신청을 하시기 바랍니다.");
  return false;
}
if(frm.iname.value=="")
{
  alert("예약하시는분의 성함을 입력해 주시기 바랍니다.");
  frm.iname.focus();
  return false;
}

if(frm.hp.value=="")
{
  alert("연락가능한 핸드폰번호를 입력해 주시기 바랍니다.");
  frm.hp.focus();
  return false;
}

if(frm.reservation_date_time.value=="")
{
  alert("희망 예약 날짜를 입력해주세요");
  frm.reservation_date_time.focus();
  return false;
}




if(frm.email.value != "")
{
  f_val = document.frm1.email;
  if(!check_email(f_val))
  {
    alert("이메일주소가 올바르지 않습니다.");
    document.frm1.email.focus();
    return true;
  }
}
if(frm.comment.value=="")
{
  alert("남기는말을 간단하게 입력해주세요");
  frm.comment.focus();
  return false;
}

if(confirm("입력하신 정보로 예약을 하시겠습니까?"))
{
  frm.submit();
}
}
