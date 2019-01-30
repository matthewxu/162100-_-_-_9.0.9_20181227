//两个参数，一个是cookie的名子，一个是值
function setCookie(name,value,time){
  //下面代码勿动

  /* time_pos */
  var timePos = 8; //时区
  /* /time_pos */

  var cookieEnabled=(typeof navigator.cookieEnabled!='undefined' && navigator.cookieEnabled)?true:false;
  if(cookieEnabled == false){
    alert('您的浏览器未开通cookie，程序无法正常使用！');
    return false;
  }
  if(!time||isNaN(time))time=365; //此 cookie 将被保存 365 天
  var cookieStr=encodeURIComponent(value);
  var expireStr=' expires='+(new Date(new Date().getTime()+(time*24*60*60+timePos*3600)*1000).toGMTString())+';';
  /*
  if(cookieStr.length > 3072){
    //alert('所设置的cookie数据太大，系统将自动缩减');
    cookieStr=cookieStr.substring(0,3072).replace(/[\|\s]+$/,'');
  }
  */
  document.cookie=name+'='+cookieStr+';'+expireStr+' path=/;';
}

window.onerror=function(){return true;}
var col;

function getCookie(name) {
	var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
	if (arr != null && arr != false) {
		return decodeURIComponent(arr[2]);
	} else {
		//return undefined;
		return '';
	}
}

function addFavor() {
	var sTitle = document.title;
	var sURL = location.href;
	try {
		window.external.addFavorite(sURL, sTitle)
	} catch (e) {
		try {
			window.sidebar.addPanel(sTitle, sURL, '')
		} catch (e) {
			alert('加入收藏失败，请使用Ctrl+D进行添加')
		}
	}
	return false
}

function addC(obj, siteId) {
    clearTimeout(col);
	starImg = document.getElementById('star');
    var old = obj;
	var bodyT = 0;
	if(navigator.userAgent.indexOf('Firefox') >= 0) {  
	  bodyT = parseInt(document.body.currentStyle?document.body.currentStyle['borderTopWidth']/*ie*/:document.defaultView.getComputedStyle(document.body,null)['borderTopWidth']);
    }
    var scrollH = document.getElementById('body_p')!=null ? parseInt(document.getElementById('body_p').scrollTop) : 0;
	if (starImg != null) {
		starName = obj.innerHTML;
		starHttp = obj.href;
		var w, h, l, t;
		w = obj.offsetWidth;
		h = obj.offsetHeight;
		l = obj.offsetLeft;
		t = obj.offsetTop;
		while (old = old.offsetParent) {
			t += old.offsetTop;
			l += old.offsetLeft; /*if(old==document.body)break;*/
		}
		starImg.style.display = '';
		starImg.style.position = 'absolute';
		starImg.style.left = (l + w + 6) + 'px';
		starImg.style.top = (t + (h/2-16) + bodyT*2 - scrollH) + 'px'; //16为图标高
		starImg.style.zIndex = 99;
		starImg.style.cursor = 'pointer';
		starImg.onmouseover = function() {
			clearTimeout(col);
		}
		starImg.onmouseout = function() {
			this.style.display = 'none'
		};
		obj.onmouseout = function() {
			col = setTimeout("if(starImg!=null){starImg.style.display = 'none';} if(starImgD!=null){starImgD.style.display = 'none';}", 3000);
		};
		starImg.onclick = function() {
			document.getElementById('addPFrame').src='member.php?post=collection_add&linkhttp=' + encodeURIComponent(starHttp) + '&linkname=' + encodeURIComponent(starName) + '';
			//window.open('member.php?post=collection_add&linkhttp=' + encodeURIComponent(starHttp) + '&linkname=' + encodeURIComponent(starName) + '', 'addPFrame')
		}

	  starImgD = document.getElementById('star_d');
      if (starImgD != null && arguments[1]) {
        siteId = arguments[1];
        var siteUrl = starHttp;
        if (REG = starHttp.match(/^.*export\.php\?url=(.+)$/i)){
          siteUrl = decodeURIComponent(REG[1]);
        }
        siteUrl = siteUrl.replace(/\/+$/, '');
        if (siteUrl.match(/^https?:\/\/[^\/]+$/i)){

	   	  starImgD.style.display = 'inline';
		  starImgD.style.position = 'absolute';
		  starImgD.style.left = (l + w + 6) + 'px';
		  starImgD.style.top = (t + (h/2+0) + bodyT*2 - scrollH) + 'px'; //16为图标高
		  starImgD.style.zIndex = 99;
		  starImgD.style.cursor = 'pointer';
		  starImgD.onmouseover = function() {
			clearTimeout(col);
		  }
		  starImgD.onmouseout = function() {
			this.style.display = 'none'
		  };
		  starImgD.onclick = function() {
			window.open('site.php?site_id=' + encodeURIComponent(siteId) + '', '_blank')
		  }
        }

      }
	}
}

function $(objId) {
	return document.getElementById(objId);
}

function addSubmitSafe() {
	var parShowH = document.documentElement.clientHeight;
	var parBodyH = document.body.clientHeight;
    parBodyH = parBodyH < parShowH ? parShowH : parBodyH;

	//var thisH = 13 + 20; //图片高
	//var thisH = 32; //行高
	if ($('submit_safe') == null) {
		var s = document.createElement('DIV');
		s.id = 'submit_safe';
		s.style.height = parBodyH+'px';
		document.body.appendChild(s);
		var i = document.createElement('IMG');
		i.id = 'loading2';
		i.src = 'readonly/images/loading2.gif';
		document.body.appendChild(i);
		//document.body.insertBefore(i, null);
		/*
		var ie6 = !-[1, ] && !window.XMLHttpRequest;
		if (ie6) {
			var parBodyH = document.body.offsetHeight;
			parBodyH = parBodyH < parShowH ? parShowH : parBodyH;
			var parScTop = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
			var t = (parScTop + (parShowH - thisH) / 2);
			s.style.height = parBodyH + 'px'
		} else {
			var t = (parShowH - thisH) / 2
		}
		s.innerHTML = '<div id="submit_safe_in" style="margin-top:' + t + 'px;">&#x8BF7;&#x7A0D;&#x5019; &#x2026;</div>';
		*/
		s.innerHTML = '<table width="100%" height="100%" style="height:'+parShowH+'px;"><tr><td>&#x8BF7;&#x7A0D;&#x5019; &#x2026;</td></tr></table>';
		if (arguments[0] == 1) {
			return
		}
		s.onmousedown = function() {
			s.innerHTML = '<table width="100%" height="100%"><tr><td>&#x6B63;&#x5728;&#x5173;&#x95ED;&#x906E;&#x7F69; &#x2026;</td></tr></table>';
			setTimeout('delSubmitSafe();', 3000)
		}
	}
}

function delSubmitSafe() {
	while ($('submit_safe') != null) {
		$('submit_safe').style.display='none';
		document.body.removeChild($('submit_safe'))
	}
	while ($('loading2') != null) {
		$('loading2').style.display='none';
		document.body.removeChild($('loading2'))
	}
}

function addM(obj) {
	if (getCookie('usercookie')) {
		var starName = obj.innerHTML;
		var starHttp = obj.href;
		document.getElementById('addPFrame').src='member.php?post=memory_website&linkhttp=' + encodeURIComponent(encodeURIComponent(starHttp)) + '&linkname=' + encodeURIComponent(encodeURIComponent(starName)) + '';
	}
}

function addEvent(obj,type,fn){
    if(obj.attachEvent){
        obj.attachEvent('on'+type,function(){
            fn.call(obj);
        })
    }else{
        obj.addEventListener(type,fn,false);
    }
}

(function(){function addPoint(rf){if(!getCookie('yourpcaddfunds')){var runAdd=false;if(session&&session.length>=4){var myDate=new Date();var myToday=myDate.getFullYear()+'-'+(myDate.getMonth()+1).toString().replace(/^(\d{1})$/,'0$1')+'-'+myDate.getDate().toString().replace(/^(\d{1})$/,'0$1')+'';if(session[1].indexOf(myToday)==-1){runAdd=true}}else{if(!rf){return}var allianceKey=false;if(allianceKeyM=window.location.search.toString().match(/^\?(\d+)/)){allianceKey=allianceKeyM[1];delete allianceKeyM;setCookie('alliancekey',allianceKey,0)}else{allianceKey=getCookie('alliancekey')}if(allianceKey){runAdd=true}}if(runAdd==true){if($('addPFrame')==null){var s=document.createElement('IFRAME');s.id='addPFrame';s.style.display='none';document.body.appendChild(s)}$('addPFrame').src='addfunds.php?entrance='+encodeURIComponent(location.href)+'&alliance_key='+allianceKey+'&referrer='+encodeURIComponent(rf)+''}}}function addLoadElement(){var rf=document.referrer?document.referrer:window.location.href;var timeS=true;addEvent(window,'scroll',function(){if(timeS==true){setTimeout(function(){addPoint(rf)},200);timeS=false}})}if(document.all){window.attachEvent('onload',addLoadElement)}else{window.addEventListener('load',addLoadElement,false)}})();

function toQzoneLogin(v) {
	var iW = 900;
	var iH = 380;
	var oW = parent.document.documentElement.clientWidth;
	var oH = parent.document.documentElement.clientHeight;
	var oT = window.screen.availHeight - oH;
	var iT = oT + (oH - (iH + 58)) / 2;
	var iL = (oW - 10 - iW) / 2;
	window.open("login_key/"+v+"/", "TencentLogin", "width=" + iW + ",height=" + iH + ",top=" + iT + ",left=" + iL + ",menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
}



var temptitle='';
function getMouseLocation(e){var mouseX=0;var mouseY=0;var scrollL=Math.max(document.body.scrollLeft,document.documentElement.scrollLeft);var scrollT=document.documentElement.scrollTop||window.pageYOffset||document.body.scrollTop;mouseX=e.clientX+scrollL;mouseY=e.clientY+scrollT;return{x:mouseX,y:mouseY}};function sSD(o,e){var e=window.event||e;var dObj=$('site_d');if(dObj==null){var dObj=document.createElement('DIV');dObj.id='site_d';document.body.insertBefore(dObj,null)}var p=getMouseLocation(e);dObj.style.display='block';dObj.style.left=(p.x-4)+'px';dObj.style.top=(p.y+20)+'px';temptitle=o.title;

	temptitle = temptitle.replace(/&quot;/g, '"');
	temptitle = temptitle.replace(/&#039;/g, '\'');
	temptitle = temptitle.replace(/&lt;/g, '<');
	temptitle = temptitle.replace(/&gt;/g, '>');

o.title='';dObj.innerHTML='<div class="g1"></div><div class="g2"></div><div class="g3"></div><div class="g4"><span id="site_d_txt">'+temptitle+'</span></div><div class="g3"></div><div class="g2"></div><div class="g1"></div>';

dObj.style.width=($('site_d_txt').offsetWidth)+'px';o.onmousemove=function(e){var e=window.event||e;var p=getMouseLocation(e);dObj.style.left=(p.x-4)+'px';dObj.style.top=(p.y+20)+'px'};o.onmouseout=function(){

	temptitle = temptitle.replace(/\"/g, '&quot;');
	temptitle = temptitle.replace(/\'/g, '&#039;');
	temptitle = temptitle.replace(/\</g, '&lt;');
	temptitle = temptitle.replace(/\>/g, '&gt;');

o.title=temptitle;
temptitle='';dObj.style.width='268px';dObj.style.display='none'}};


var lunarInfo=new Array(0x04bd8,0x04ae0,0x0a570,0x054d5,0x0d260,0x0d950,0x16554,0x056a0,0x09ad0,0x055d2,0x04ae0,0x0a5b6,0x0a4d0,0x0d250,0x1d255,0x0b540,0x0d6a0,0x0ada2,0x095b0,0x14977,0x04970,0x0a4b0,0x0b4b5,0x06a50,0x06d40,0x1ab54,0x02b60,0x09570,0x052f2,0x04970,0x06566,0x0d4a0,0x0ea50,0x06e95,0x05ad0,0x02b60,0x186e3,0x092e0,0x1c8d7,0x0c950,0x0d4a0,0x1d8a6,0x0b550,0x056a0,0x1a5b4,0x025d0,0x092d0,0x0d2b2,0x0a950,0x0b557,0x06ca0,0x0b550,0x15355,0x04da0,0x0a5d0,0x14573,0x052d0,0x0a9a8,0x0e950,0x06aa0,0x0aea6,0x0ab50,0x04b60,0x0aae4,0x0a570,0x05260,0x0f263,0x0d950,0x05b57,0x056a0,0x096d0,0x04dd5,0x04ad0,0x0a4d0,0x0d4d4,0x0d250,0x0d558,0x0b540,0x0b5a0,0x195a6,0x095b0,0x049b0,0x0a974,0x0a4b0,0x0b27a,0x06a50,0x06d40,0x0af46,0x0ab60,0x09570,0x04af5,0x04970,0x064b0,0x074a3,0x0ea50,0x06b58,0x055c0,0x0ab60,0x096d5,0x092e0,0x0c960,0x0d954,0x0d4a0,0x0da50,0x07552,0x056a0,0x0abb7,0x025d0,0x092d0,0x0cab5,0x0a950,0x0b4a0,0x0baa4,0x0ad50,0x055d9,0x04ba0,0x0a5b0,0x15176,0x052b0,0x0a930,0x07954,0x06aa0,0x0ad50,0x05b52,0x04b60,0x0a6e6,0x0a4e0,0x0d260,0x0ea65,0x0d530,0x05aa0,0x076a3,0x096d0,0x04bd7,0x04ad0,0x0a4d0,0x1d0b6,0x0d250,0x0d520,0x0dd45,0x0b5a0,0x056d0,0x055b2,0x049b0,0x0a577,0x0a4b0,0x0aa50,0x1b255,0x06d20,0x0ada0);var now=new Date();var SY=now.getFullYear();var SM=now.getMonth();var SD=now.getDate();function leapDays(y){if(leapMonth(y))return((lunarInfo[y-1900]&0x10000)?30:29);else return(0)}function lYearDays(y){var i,sum=348;for(i=0x8000;i>0x8;i>>=1)sum+=(lunarInfo[y-1900]&i)?1:0;return(sum+leapDays(y))}function leapMonth(y){return(lunarInfo[y-1900]&0xf)}function monthDays(y,m){return((lunarInfo[y-1900]&(0x10000>>m))?30:29)}function Lunar(objDate){var i,leap=0,temp=0;var baseDate=new Date(1900,0,31);var offset=(objDate-baseDate)/86400000;this.dayCyl=offset+40;this.monCyl=14;for(i=1900;i<2050&&offset>0;i++){temp=lYearDays(i);offset-=temp;this.monCyl+=12}if(offset<0){offset+=temp;i--;this.monCyl-=12}this.year=i;this.yearCyl=i-1864;leap=leapMonth(i);this.isLeap=false;for(i=1;i<13&&offset>0;i++){if(leap>0&&i==(leap+1)&&this.isLeap==false){--i;this.isLeap=true;temp=leapDays(this.year)}else{temp=monthDays(this.year,i)}if(this.isLeap==true&&i==(leap+1))this.isLeap=false;offset-=temp;if(this.isLeap==false)this.monCyl++}if(offset==0&&leap>0&&i==leap+1)if(this.isLeap){this.isLeap=false}else{this.isLeap=true;--i;--this.monCyl}if(offset<0){offset+=temp;--i;--this.monCyl}this.month=i;this.day=offset+1}function YYMMDD(){return('<span class="YMD">'+(SM+1)+'月'+SD+'日</span>')}function weekday(){var day=new Array("日","一","二","三","四","五","六");return('<font class="WEEK">星期<font'+(now.getDay()==0||now.getDay()==6?' class="WS"':'')+'>'+day[now.getDay()]+'</font></font>')}function cDay(m,d){var nStr1=new Array('正','一','二','三','四','五','六','七','八','九','十');var nStr2=new Array('初','十','廿','卅','卌');var s;if(m>10){s='十'+nStr1[m-10];s=m==12?'腊':s}else{s=nStr1[m];s=m==1?'正':s}s+='月';switch(d){case 10:s+='初十';break;case 20:s+='二十';break;case 30:s+='三十';break;default:s+=nStr2[Math.floor(d/10)];s+=nStr1[d%10]}return(s)}function solarDay2(){var sDObj=new Date(SY,SM,SD);var lDObj=new Lunar(sDObj);return cDay(lDObj.month,lDObj.day)}var styleDate='';function solarDay3(){var sTermInfo=new Array(0,21208,42467,63836,85337,107014,128867,150921,173149,195551,218072,240693,263343,285989,308563,331033,353350,375494,397447,419210,440795,462224,483532,504758);var solarTerm=new Array("小寒","大寒","立春","雨水","惊蛰","春分","清明","谷雨","立夏","小满","芒种","夏至","小暑","大暑","立秋","处暑","白露","秋分","寒露","霜降","立冬","小雪","大雪","冬至");var sFtv={"0101":"元旦*","0214":"情人节*","0305":"学习雷锋纪念日","0308":"妇女节*","0312":"植树节","0315":"消费者权益日*","0401":"愚人节","0407":"世界卫生日","0422":"世界地球日","0501":"劳动节*","0504":"青年节*","0512":"护士节","0601":"儿童节*","0626":"国际禁毒日","0701":"建党节 香港回归纪念*","0707":"抗日战争纪念日","0711":"世界人口日","0801":"建军节*","0808":"父亲节","0903":"抗日胜利纪念日","0910":"教师节*","0918":"国耻日","0928":"孔子诞辰","1001":"国庆节*","1006":"老人节","1024":"联合国日","1111":"光棍节","1201":"世界艾滋病日","1213":"南京大屠杀纪念日*","1220":"澳门回归纪念","1224":"平安夜*","1225":"圣诞节*","1226":"毛主席诞辰"};var lFtv={"0101":"春节*","0102":"大年初二*","0103":"大年初三*","0115":"元宵节*","0202":"龙抬头*","0505":"端午节*","0707":"七夕情人节*","0715":"鬼节","0815":"中秋节*","0909":"重阳节*","1208":"腊八节","1223":"小年","1229":"除夕*","1230":"除夕*"};var sDObj=new Date(SY,SM,SD);var lDObj=new Lunar(sDObj);var lDPOS=new Array(3);var festival='',solarTerms='',solarFestival='',lunarFestival='',tmp1,tmp2;var sMD=(("0"+(SM+1)).slice(-2))+''+(("0"+SD).slice(-2));if(typeof(sFtv[sMD])!="undefined"&&sFtv[sMD]){if(/\*+$/.test(sFtv[sMD])){styleDate=sMD}solarFestival=sFtv[sMD].replace(/\*+$/,'')}var lMD=(("0"+lDObj.month).slice(-2))+''+(("0"+lDObj.day).slice(-2));if(typeof(lFtv[lMD])!='undefined'&&lFtv[lMD]){if(/\*+$/.test(lFtv[lMD])){styleDate=sMD}styleDate=lMD.replace(/\*+$/,'');lunarFestival=lFtv[lMD];if(lMD=='1229'){var tSD=(new Date(now.getTime()+1*24*60*60*1000)).getDate();var lDObjT=new Lunar(new Date(SY,SM,tSD));var lMD=lDObj.month+''+lDObjT.day;if(lMD!='1230'){lMD='1230';lunarFestival='除夕'}else{lunarFestival=''}}if(lMD=='1230'||lMD=='0101'||lMD=='0102'||lMD=='0103'){styleDate='0102'}}tmp1=new Date((31556925974.7*(SY-1900)+sTermInfo[SM*2+1]*60000)+Date.UTC(1900,0,6,2,5));tmp2=tmp1.getUTCDate();if(tmp2==SD)solarTerms=solarTerm[SM*2+1];tmp1=new Date((31556925974.7*(SY-1900)+sTermInfo[SM*2]*60000)+Date.UTC(1900,0,6,2,5));tmp2=tmp1.getUTCDate();if(tmp2==SD)solarTerms=solarTerm[SM*2];if(solarTerms=='清明'){styleDate='0405'}if(solarTerms+solarFestival+lunarFestival!=''){festival='<font class="FES">'+solarTerms+' '+solarFestival+' '+lunarFestival+'</font>'}return festival};var dateBox = solarDay3();

/* jieri_style */
if (styleDate != '') {
  $('my_style').href='writable/css/jieri/'+styleDate+'/style.css';
} else {
  if((nowStyle=getCookie('myStyle')) && (/^(default|jieri|other)\/\d+$/.test(nowStyle))){
    $('my_style').href='writable/css/'+nowStyle+'/style.css';
  } else {
    setCookie('myStyle', '', -366);
  }

}
/* /jieri_style */

function getStyle(obj,attribute){
	return obj.currentStyle?obj.currentStyle[attribute]/*ie*/:document.defaultView.getComputedStyle(obj,null)[attribute]/*ie9 火狐 谷歌*/;
};


/* 以上是函数 */

var session=false;

function stateChangeIE(_frame) {
  //if (_frame.readyState=="interactive") {
  if (_frame.readyState=="Completed") {
    if (document.getElementById("loading2"))
      document.getElementById("loading2").style.display = "none";
    //_frame.style.visibility = "visible";
  }   
}
function stateChangeFirefox(_frame) {
  if (document.getElementById("loading2"))
    document.getElementById("loading2").style.display = "none";
  //_frame.style.visibility = "visible"; 
}

document.write('<iframe id="addCFrame" name="addCFrame" onreadystatechange="stateChangeIE(this)" onload="stateChangeFirefox(this)" width="900" height="480" allowtransparency="true" frameborder="0" scrolling="No" style="display:none"></iframe>');



