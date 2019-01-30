
function isArray(obj) {
  //return Object.prototype.toString.call(obj) === '[object Array]';
  for (i in obj) {
    if (i) {
      return true;
      break;
    }
  }
  return false;
}

function changeBar() {
  var bar = nowSearchBody==1?2:(nowSearchBody==2?3:1);
  setCookie('searchBarBody', bar, 365);
  location.reload(false);
}

/*
  $('kw').focus();

function addFocus() {
  $('kw').focus();
};
if (document.all) {
  window.attachEvent('onload', addFocus);
} else {
  window.addEventListener('load', addFocus, false);
};

*/
function getSearchSelect(type, n) {
  var strDefault = strOther = '';
  if (n != null) {
    strDefault = '<img src="writable/images/searchmark/' + nowSearchBody + '_' + type + '_' + n + '.gif" title="' + searchSelect[type][n][1] + '" /><br />\n';
  }
  //if (isArray(searchSelect[type])) {
    for (i in searchSelect[type]) {
      if (i != 0 && n != i) {
        strOther += '<img src="writable/images/searchmark/' + nowSearchBody + '_' + type + '_' + i + '.gif" onclick="saveBar(\'' + type + '\',\'' + i + '\');closeOu();" title="' + searchSelect[type][i][1] + '" /><br />\n';
      }
    }
  //}
  return strDefault + strOther;
};
function saveBar(type, n) {
  if (isArray(searchSelect[type])) {
    try {
      $('f').action = $('go').value = searchSelect[type][n][0];
    } catch(e) {}
    try {
      if (nowSearchBody != '3') $('ou_in').innerHTML = getSearchSelect(type, n);
    } catch(e) {}
    var reg = new RegExp('' + type + '\\\{\\\w+\\\}', 'ig');
    var str = (searchBarCookie = getCookie('searchBar')) ? searchBarCookie.replace(reg, '') + '' + type + '{' + n + '}': '' + type + '{' + n + '}';
    setCookie('searchBar', str, 365);
  }
};
function addsearchBar(type, sid) {
  if (isArray(searchSelect[type])) {
    if (searchBarCookie = getCookie('searchBar')) {
      var reg = new RegExp('' + type + '\\\{(\\\w+)\\\}', 'i');
      if (searchBarIs = searchBarCookie.match(reg)) {
        sid = searchBarIs[1];
      }
    } else {
      if (arguments[1]) {
        sid = arguments[1];
      }
    }
    if (sid && typeof(searchSelect[type][sid]) != 'undefined') {
    } else {
      for (i in searchSelect[type]) {
        if (i != 0) {
          sid = i;
          break;
        }
      }
    }
    if ($('searchNavIs') != null) {
      $('searchNavIs').id = $('searchNavIs').name;
    }
    try {
      $('search_bar_type_' + type + '').id = 'searchNavIs';
    } catch(e) {}
    try {
      $('f').action = $('go').value = searchSelect[type][sid][0];
    } catch(e) {}
    try {
      $('ou_in').innerHTML = nowSearchBody == '3' ? getSearchSelect3(type, sid) : getSearchSelect(type, sid);
    } catch(e) {}
    try {
      $('su').innerHTML = searchSelect[type][0];
    } catch(e) {}
    try {
      $('is').value = type;
    } catch(e) {}
    addRemenber(type)
  } else {
    $('su').onclick = function(){
      alert('没有任何搜索引擎被设置，无法执行搜索！');
      return false;
    }
  }
};
function remenber() {
  var strMax = 8;
  var strNum = 6;
  var nowMod = $('is').value;
  var newKey = $("kw").value.replace(/^(\s|\r|\n|　)+|(\s|\r|\n|　)+$/g, "").replace(/[\|\<\>\"\']+/g, "");
  var newUrl = $('go').value;
  var formAc = newUrl + encodeURIComponent(newKey);
  if (newUrl.indexOf(' ') > 0) {
     keyUrlArr = newUrl.split(' ');
     formAc = keyUrlArr[0] + encodeURIComponent(newKey) + keyUrlArr[1];
  }
  window.open(formAc);
  if (newKey != '') {
    var cutKey = cutStr(newKey, strMax);
    var cookieStr;
    if (cookieStr = getCookie('searchHot')) {
      var setArr = cookieStr.split("|");
      if (setArr.length > 0) {
        for (var i = 0; i < setArr.length; i++) {
          if (setArr[i].indexOf(nowMod) == 0) {
            var str = setArr[i].substr(nowMod.length, setArr[i].length);
            break
          }
        }
        if (str) {
          var reg = new RegExp('<a [^>]+>' + cutKey + '<\\\/a>', 'ig');
          str = str.replace(reg, '');
          str += '&nbsp;<a href="' + formAc + '">' + cutKey + '</a>';
          str = str.replace(/^(&nbsp;)+|(&nbsp;)+$/ig, '').replace(/(&nbsp;)+/ig, '&nbsp;');
          var strarr = str.split("&nbsp;").slice( - strNum);
          var reg2 = new RegExp('' + nowMod + '<a [^\\\|]+', 'ig');
          var newStr = cookieStr.replace(reg2, '' + nowMod + strarr.join('&nbsp;'))
        } else {
          var newStr = cookieStr + '|' + nowMod + '<a href="' + formAc + '">' + cutKey + '</a>'
        }
      }
    } else {
      var newStr = '' + nowMod + '<a href="' + formAc + '">' + cutKey + '</a>'
    }
    if (newStr) {
      setCookie('searchHot', newStr, 365)
    }
  }
  addRemenber(nowMod);
  return false
};
function delRemenber(type) {
  var cookieStr;
  if (cookieStr = getCookie('searchHot')) {
    var reg = new RegExp('' + type + '(<a [^\\\|]+)', 'ig');
    cookieStr = cookieStr.replace(reg, '');
    newCookieStr = cookieStr.replace(/^\|+|\|$/g, '').replace(/\|+/g, '\|');
    setCookie('searchHot', newCookieStr, 365)
  }
  $('search_hot_word').innerHTML = (stratSearchHot[type] && typeof(stratSearchHot[type]) != 'undefined') ? stratSearchHot[type] : '';
};
function cutStr(str, len) {
  if (!str || !len) {
    return ''
  }
  var strlen = str.length;
  for (var i = 0; i < strlen; i++) {
    if (str.charCodeAt(i) <= 255) {
      len -= 0.5
    } else {
      len--
    }
    if (len <= -0.5) {
      break
    }
  }
  return str.substr(0, i) + (i < strlen ? '…': '')
};


//document.write('<sc'+'ri'+'pt type="text/javascript" language="javaScript" src="readonly/js/search_bar_' + nowSearchBody + '.js"></sc'+'ri'+'pt>');
switch (nowSearchBody) {
  case '1':
//搜索引擎样式1
document.writeln('<style type="text/css">\
#logo { }\
#search_ { }\
#search_body { width:550px; height:70px; font-size:14px; text-align:center; }\
#search_bar { width:550px; height:30px; position:relative; clear:both; z-index:2; }\
#search_bar_in { width:550px; }\
#search_bar_in a { width:50px; height:29px; padding:1px 0 0 1px; line-height:30px; display:inline-block; *display:inline; *zoom:1; text-align:center; position:relative; z-index:3; }\
#search_bar_in a span { width:51px; height:30px; position:absolute; top:0; left:0; z-index:4; text-align:center; cursor:pointer; }\
#search_bar_in a:hover { /*background-position:-679px 0;*/ background:none; }\
#search_bar_in a#searchNavIs { font-size:14px; font-weight:bold; cursor:default; }\
#search_bar_in a#searchNavIs span { /*background-position:-623px 0;*/ background:none; }\
#search_bar_in a#searchNavIs span { height:31px; color:#666666; text-decoration:none; }\
#f { width:550px; height:40px; background-position:0 0; position:relative; z-index:1; }\
#ou { width:81px; height:38px; margin:1px; float:left; text-align:left; cursor:pointer; position:relative; z-index:6; }\
.ou_in { width:81px; height:38px; text-align:center; overflow:hidden; position:absolute; left:0; top:0; z-index:61; }\
.ou_out { height:auto; overflow:inherit; margin-left:-1px; margin-top:-1px; border:1px #9B9F9F solid; border-radius:2px; -moz-border-radius:2px; -webkit-border-radius:2px; background-color:#FFF; }\
.ou_in img { margin:4px 0; }\
#kw { width:380px; height:32px; line-height:32px; padding:3px; margin:1px 0 1px -1px; }\
#su { width:81px; height:32px; margin:4px 0 0 0; font-size:14px; }\
#search_hot_word { padding-top:7px; padding-bottom:7px; font-size:12px; line-height:150%; }\
#search_hot_word a { margin:0 3px; }\
#changebar { background:url(readonly/images/c_bar_1.gif) 0 0 no-repeat; width:15px; height:15px; overflow:hidden; position:absolute; top:23px; right:2px; z-index:20;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=70); -moz-opacity:0.7; -khtml-opacity:0.7; opacity:0.7; }\
</style><div id="search_body" class="forQQ1"><div id="search_bar"><div id="search_bar_in">');if(isArray(searchSelect)){for(type in searchSelect){var searchBarName=searchSelect[type][0].toString().replace(/搜/g,'');document.writeln('<a id="search_bar_type_'+type+'" name="search_bar_type_'+type+'" href="javascript:void(0);" onclick="addsearchBar(\''+type+'\');return false;" hidefocus="true">'+searchBarName+'<span>'+searchBarName+'</span></a>');delete searchBarName;}}document.write('</div></div><form id="f" name="f" onsubmit="return remenber()"><div id="ou"><div id="ou_in" class="ou_in" onmouseover="showOu(this)"></div></div><input type="text" name="kw" id="kw" maxlength="100" /><button name="su" type="submit" id="su">搜网页</button><input name="go" id="go" type="hidden" /><input name="is" id="is" type="hidden" value="wangye" /><a href="javascript:void(0);" id="changebar" title="切换引擎模式" onclick="changeBar();return false;"></a></form></div><table class="forQQ_1" border="0" cellspacing="0" cellpadding="0"><tr valign="middle"><td id="search_hot_word"></td></tr></table>');var showOu=function (obj){obj.className='ou_in ou_out';obj.onmouseout=function(){obj.className='ou_in';}};var closeOu=function (){return;};
  break;
  case '2':
//搜索引擎样式2
document.writeln('<style type="text/css">\
#search_ { }\
#search_body { width:520px; height:40px; font-size:13px; position:relative; z-index:3; margin-left:0; }\
#f { width:520px; height:40px; background-position:0 -42px; position:relative; }\
#kw { width:407px; height:32px; line-height:32px; margin:4px 0 0 4px; padding-left:3px; padding-right:3px; }\
#su { width:69px; height:32px; margin:4px 0 0 0; font-size:14px; color:#FFFFFF; }\
#search_bar_next { position:relative; z-index:4; float:left; margin-top:7px; width:26px; }\
.ou_in_ { position:absolute; top:0; left:0; z-index:69; margin:0; width:26px; height:26px; overflow:hidden; border:none; background:none; }\
.fc{ background-color:#FFFFFF; filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity:0.5; opacity:0.5; }\
.ou_out_ { width:95px; height:auto; overflow:inherit; margin:0; background-color:#FFFFFF; }\
.ou_in_ img { margin:5px auto; }\
.ou_in_ table { width:95px; }\
#ou_in { width:26px;}\
.ou_in_ #ou_in {}\
.ou_out_ #ou_in { filter:progid:DXImageTransform.Microsoft.Alpha(opacity=100); -moz-opacity:1; -khtml-opacity:1; opacity:1; }\
#search_bar_index { background-color:#EFEFEF; /*border:1px #FFFFFF solid;*/ }\
#search_bar_index a { display:block; height:24px; line-height:24px; font-size:13px; overflow:hidden; }\
#search_bar_index a#searchNavIs { background:#FFFFFF; }\
#search_hot_word { line-height:150%; white-space:normal; }\
#search_hot_word a { margin:0 3px; font-size:12px; text-decoration:underline; }\
#changebar { background:url(readonly/images/c_bar_2.gif) 0 0 no-repeat; width:15px; height:15px; overflow:hidden; position:absolute; top:18px; right:7px; z-index:20;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=70); -moz-opacity:0.7; -khtml-opacity:0.7; opacity:0.7; }\
</style><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td><div id="search_body" class="forQQ2"><form id="f" name="f" onsubmit="return remenber()"><input type="text" name="kw" id="kw" onfocus="$(\'border_side\').style.display=\'block\';" onblur="$(\'border_side\').style.display=\'none\';" maxlength="100" /><div id="search_bar_next" onmousedown="showOu();"><div id="ou_in_" class="ou_in_"><table border="0" cellspacing="0" cellpadding="0"><tr valign="top"><td id="ou_in" title="点击切换引擎" onmouseover="this.className=\'fc\';" onmouseout="this.className=\'\';"></td><td id="search_bar_index">');if(isArray(searchSelect)){for(type in searchSelect){document.write('<a id="search_bar_type_'+type+'" name="search_bar_type_'+type+'" href="javascript:void(0);" onclick="addsearchBar(\''+type+'\');return false;">'+searchSelect[type][0]+'</a>');}}document.writeln('</td></tr></table></div></div><button name="su" type="submit" id="su">搜网页</button><br /><input name="go" id="go" type="hidden" /><input name="is" id="is" type="hidden" value="wangye" /><a href="javascript:void(0);" id="changebar" title="切换引擎模式" onclick="changeBar();return false;"></a></form></div></td><td id="search_hot_word" class="forQQ_2"></td></tr></table>');var showOu=function (){$('ou_in_').className='ou_in_ ou_out_';/*$('ou_in').title='';*/};var closeOu=function (){$('ou_in_').className='ou_in_';};if(typeof(HTMLElement)!="undefined"){HTMLElement.prototype.contains=function(obj){if(obj==this)return true;while(obj=obj.parentNode){if(obj==this)return true;}return false;}};document.onmouseover=function(e){e=e||event;var onMIn=$('ou_in_');if(onMIn.className=='ou_in_ ou_out_'){if(!onMIn.contains(e.target||e.srcElement)){closeOu();}}};
  break;
  default :
//搜索引擎样式3
document.writeln('<style type="text/css">\
#logo { }\
#search_ { }\
#search_body { width:480px; height:96px; font-size:13px; text-align:center; margin-left:0; }\
#search_bar { margin-left:0; width:480px; height:30px; position:relative; z-index:2; }\
#search_bar_in { width:480px; height:30px; font-size:14px; position:absolute; left:0; top:0; z-index:15; }\
#search_bar_in a { width:50px; float:left; padding:1px 0 0 1px; height:29px; line-height:28px; text-align:center; position:relative; }\
#search_bar_in a span { width:51px; height:30px; position:absolute; top:0; left:0; text-align:center; cursor:pointer; }\
#search_bar_in a:hover { /*background-position:-679px 0;*/ }\
#search_bar_in a#searchNavIs { font-size:14px; font-weight:bold; cursor:default; }\
#search_bar_in a#searchNavIs span { /*background-position:-623px 0;*/ height:32px; color:#666666; }\
#f { margin-left:0; width:480px; height:40px; float:left; background-position:0 -83px; position:relative; z-index:1; }\
#ou { height:30px; margin-top:38px; line-height:30px; }\
#ou_in { padding:7px 0; text-align:left; width:480px; white-space:nowrap; overflow:hidden; }\
#ou_in button { margin-left:12px; margin-right:12px; padding:0; background:none; border:none; height:16px; line-height:16px; font-weight:normal; letter-spacing:0; cursor:pointer; }\
#ou_in button#ou_in_is { color:#999; background:#F0EFF0; padding-left:6px; padding-right:6px; font-weight:bold; }\
.ou_out {}.ou_in img {}\
#kw { height:30px; line-height:30px; width:393px; margin:5px 0 0 5px; }\
#su { height:30px; margin:5px 0 0 0; width:78px; font-size:14px; color:#FFFFFF; }\
#search_hot_word { line-height:150%; white-space:normal; }\
#search_hot_word a { margin:0 3px; font-size:12px; text-decoration:underline; }\
#changebar { background:url(readonly/images/c_bar_3.gif) 0 0 no-repeat; width:15px; height:15px; overflow:hidden; position:absolute; top:20px; right:5px; z-index:20;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=70); -moz-opacity:0.7; -khtml-opacity:0.7; opacity:0.7; }\
</style><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td><div id="search_body" class="forQQ3"><div id="search_bar"><div id="search_bar_in">');if(isArray(searchSelect)){for(type in searchSelect){var searchBarName=searchSelect[type][0].toString().replace(/搜/g,'');document.writeln('<a id="search_bar_type_'+type+'" name="search_bar_type_'+type+'" href="javascript:void(0);" onclick="addsearchBar(\''+type+'\');return false;" hidefocus="true">'+searchBarName+'<span>'+searchBarName+'</span></a>');delete searchBarName}}document.write('</div></div><form id="f" name="f" onsubmit="return remenber()"><input type="text" name="kw" id="kw" maxlength="100" /><button name="su" type="submit" id="su">搜网页</button><div id="ou"><div id="ou_in"></div></div><input name="go" id="go" type="hidden" /><a href="javascript:void(0);" id="changebar" title="切换引擎模式" onclick="changeBar();return false;"></a></form></div></td><td id="search_hot_word" class="forQQ_3"></td></tr></table>');function getSearchSelect3(type,n){var strOther='<input name="is" id="is" type="hidden" value="'+type+'">';for(i in searchSelect[type]){if(i!=0){var thisChecked=i==n?' id="ou_in_is" disabled="disabled"':'';
strOther+='<button onclick="saveBar(\''+type+'\',\''+i+'\');if($(\'ou_in_is\')!=null){$(\'ou_in_is\').disabled=false;$(\'ou_in_is\').id=\'\';this.disabled=true;this.id=\'ou_in_is\';}return false;																																																																																																																																																																																																																																							"'+thisChecked+'>'+searchSelect[type][i][1]+'</button>'}}return strOther};
  break;

}
