<?php
require ('authentication_member.php');
?>
<style type="text/css">
<!--
#ad_table { background-color:#D8D8D8; }
#ad_table th { background-color:#EEEEEE; text-align:center; }
#ad_table th, #ad_table td { padding:5px 10px; font-size:12px; line-height:normal; word-wrap:break-word; word-break:break-all; }
#ad_table td { background-color:#FFFFFF; text-align:center; font-size:14px; }
-->
</style>
<?php
if (basename($_SERVER['PHP_SELF']) == 'member_current.php') {
  echo '<div style="display:none;">
    <script>var defaultBayId=\''.$web['search_bar'].'\';</script>
    <script type="text/javascript" language="javaScript" src="writable/js/search_h.js?'.filemtime('writable/js/search_h.js').'"></script>
    <script type="text/javascript" language="javaScript" src="writable/js/search.js?'.filemtime('writable/js/search.js').'"></script>
    <script type="text/javascript" language="javaScript" src="readonly/js/search.js?'.filemtime('readonly/js/search.js').'"></script>
    <script>addsearchBar(search_default_type,search_default_id);</script>
    </div>
';
}
?>


<table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table">
  <tr>
    <th width="60" height="29">频道</th>
    <th height="29">关键词（每频道最多记忆6词，最长8个字）</th>
  </tr>
<script language="javascript" type="text/javascript">
<!--

function addRemenberB(type){
  var cookieStr;
  var reg=new RegExp(''+type+'(<a [^\|]+)','i');
  var val='<span class="grayword">无</span>';if(cookieStr=getCookie('searchHot')){if(cookieStr=cookieStr.match(reg)){val=''+cookieStr[1]+' <a href="javascript:void(0)" onclick="delRemenberB(\''+type+'\');return false;" style="color:#005ED9">[清除]</a>';}}return val;
}

/*删除记忆关键词*/function delRemenberB(type){var cookieStr;if(cookieStr=getCookie('searchHot')){var reg=new RegExp(''+type+'(<a [^\|]+)','ig');cookieStr=cookieStr.replace(reg,'');newCookieStr=cookieStr.replace(/^\|+|\|$/g,'').replace(/\|+/g,'\|');setCookie('searchHot',newCookieStr,365);}$('show_search_keyword_'+type+'').innerHTML='<span class="grayword">无</span>';}



if(isArray(searchSelect)){
  for(type in searchSelect){
    document.write('<tr>');
    document.write('  <td width="60" height="29">'+searchSelect[type][0]+'</td>');
    document.write('  <td height="29" id="show_search_keyword_'+type+'">'+addRemenberB(type)+'</td>');
    document.write('</tr>');
  }
}


-->
</script>
</table>

