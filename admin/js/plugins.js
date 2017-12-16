// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.
function del(obj){
  var tbl=document.getElementById("tbrt");
  var del=document.getElementById("delbt");
  var obj=obj.parentNode.parentNode;
  var len=tbl.rows.length;
  obj.parentNode.removeChild(obj);
}

$(document).on("click","#users tr td:nth-child(2)", function(){
  alert($(this).text());
});

$(document).on("keyup", "#search", function(){ //ajax 로 전달받은 값들은 동적메소드를 사용하여야 조작할수있음.
  var value=$(this).val().toLowerCase();
  var types=$("#sctype").val();

      $("#users>tr").filter(function(){
      $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
    })
});


$(document).on("change", ":file", function(){
  var fileN = $(this).val().split('\\').pop();
  var def = $(this).val().split('.').pop().toLowerCase();
  if($.inArray(def,['gif','png','jpg','bmp','jpeg'])==-1)
  {
    alert('첨부하려는 파일이 이미지형식이 아닙니다.')
    return false;
  }
  else
  {
    $(this).prev().val(fileN);
  }
  return true;
});

$(document).on("click","#enter",function(){
  var form = $('form')[0];
  var formData = new FormData(form);
  $.ajax({
    url: '/admin/lib/upload.php',
    processData: false,
    contentType: false,
    data: formData,
    type: 'POST',
    success: function(result){
      alert(result)
    }
  });
});


/*
function imgchk(obj)
{
  var fileN = obj.value;
  if(fileN != '')
  {
    var def = fileN.slice(fileN.lastIndexOf(".")+1).toLowerCase();

    if(!(def == 'gif'))
    alert(def);
    return false;
  }
}
*/
