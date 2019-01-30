var startParHeight=272; //悬浮父框架初始高度

document.writeln('<style type="text/css">');
document.writeln('<!--');
document.writeln('html { min-width:900px; text-align:center; border:none; background:none;  padding:0; }');
document.writeln('body { min-width:900px; width:900px; border-top:none; margin-top:0; margin-left:auto; margin-right:auto; padding:0; border:none; }');
document.writeln('#nav { width:880px; border-left:10px #EFEFEF solid; border-right:10px #EFEFEF solid; border-bottom:4px #EFEFEF solid; margin:0; background-color:#EFEFEF; font-size:13px; text-align:right; }');
document.writeln('#nav a { }');
document.writeln('#nav #nav_mingz { float:left; color:#999999; font-weight:bold; }');
document.writeln('#nav #nav_session img.close { }');
document.writeln('#body { width:880px; margin-bottom:0; padding-left:10px; padding-right:10px; padding-bottom:6px; background-color:#EFEFEF; }');
document.writeln('#body_p { margin:0; width:878px; /*height:'+(startParHeight-50)+'px;*/ overflow:hidden; padding:0; border:1px #D4D4D4 solid; background-color:#FFFFFF; }');
document.writeln('#body_p_in { width:878px; }');
document.writeln('.menu { border:none; }');
document.writeln('.menu_right { width:auto !important; }');
document.writeln('.menu_left { width:149px; }');
document.writeln('#bar_id_ a{ width:136px; }');
document.writeln('.i1 { width:892px; height:1px; overflow:hidden; background-color:#EFEFEF; }');
document.writeln('.i2 { width:896px; height:1px; overflow:hidden; background-color:#EFEFEF; }');
document.writeln('.i3 { width:898px; height:2px; overflow:hidden; background-color:#EFEFEF; }');
document.writeln('.close { vertical-align:text-bottom; }');
document.writeln('#loginform { width:100%; }');

//document.writeln('body { filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50); opacity:0.5; }');
//document.writeln('#page_img { height:'+(startParHeight-38)+'px; top:38px; display:block; background-image:url(readonly/images/loading2.gif); }');

document.writeln('.li_style_title { width:678px; }');
document.writeln('-->');
document.writeln('</style>');

var par=parent.document.getElementById('addCFrame');
if (par != null) {
  par.style.display='block';
}
var parentH = selfH = startParHeight;
var bop=parShowH=null;
//var parShowH = 272;

function parClose(){
  if (typeof parent.delSubmitSafe == 'function')
    parent.delSubmitSafe();
  if (typeof top.delSubmitSafe == 'function')
    top.delSubmitSafe();
  if (par!=null)
    par.style.display='none';
}

function openMy(){
  //if (par!=null){
    //par.style.display='block';
    bop=document.getElementById('body_p');
    parShowH=parent.document.documentElement.clientHeight;
    parentH = par.offsetHeight;
    selfH = document.body.offsetHeight;
	showMy();
  //}
  try{if(typeof(eval(atParSize))=="function"){atParSize();}}catch(e){} //函数在detail_current.php页面
  return;
}
parent.window.onresize = function(){
  if (typeof parent.addSubmitSafe == 'function'){parent.addSubmitSafe();}
  setTimeout(function(){openMy();}, 1000);
}
function showMy(){
  var h;
  par.style.position='fixed';
  par.style.top = '50%';
  par.style.marginTop= '-'+parseInt(parentH/2)+'px';
  if (parShowH < startParHeight+120) { //上下留60+60
    if (parShowH <= startParHeight) {
      par.style.position='absolute';
      par.style.top=0;
      par.style.marginTop=0;
      par.style.height=startParHeight+'px';
    }
    h = startParHeight;
    bop.style.height=(h-50)+'px';
    bop.style.overflowX='hidden';
    if (selfH > startParHeight) {
      bop.style.overflowY='auto'; //应该上一层直接auto，但有的IE可能会露出来滚动条
    }
    return;
  } else {
    bop.style.height='auto';
    bop.style.overflow='hidden';
    selfH = document.body.offsetHeight;
    if (selfH <= parShowH - 120) {
      h = selfH;
    } else {
      h = parShowH - 120;
      bop.style.height=(h-50)+'px';
      bop.style.overflowX='hidden';
      bop.style.overflowY='auto';
    }
  }
  if (parentH == h) {
    return;
  }


/*
*/
		par.style.height=h+'px';
		par.style.marginTop= '-'+parseInt(h/2)+'px';

/*
  if(navigator.userAgent.indexOf("MSIE")!=-1) {
  } else {
	var v = 50;
	(function() {
		var imgChange = setTimeout(arguments.callee, 20);
	document.body.style.filter = 'alpha(opacity=' + v + ')';
    document.body.style.opacity = v / 100;
		if (v >= 100) {
			clearTimeout(imgChange)
		}
		v += 5;
	})();


	var val = parentH - h;
    if (val < 0) {
	  (function() {
		var imgChange = setTimeout(arguments.callee, 5);
		par.style.height=(h+val)+'px';
		par.style.marginTop= '-'+parseInt((h+val)/2)+'px';
		if (val >= 0) {
		par.style.height=h+'px';
		par.style.marginTop= '-'+parseInt(h/2)+'px';
			clearTimeout(imgChange)
		}
		val += 2;
	  })();
    } else {
	  (function() {
		var imgChange = setTimeout(arguments.callee, 5);
		par.style.height=(h+val)+'px';
		par.style.marginTop= '-'+parseInt((h+val)/2)+'px';
		if (val <= 0) {
		par.style.height=h+'px';
		par.style.marginTop= '-'+parseInt(h/2)+'px';
			clearTimeout(imgChange)
		}
		val -= 2;
	  })();
    }
  }
*/
}

try{parent.$('submit_safe').onmousedown=function (){return false;}}catch(e){}

if (document.all) {
  window.attachEvent('onload', openMy);//对于IE
} else {
  window.addEventListener('load', openMy, false);//对于FireFox
}


