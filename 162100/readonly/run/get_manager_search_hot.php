<?php
require ('authentication_manager.php');
?>
<!--h5 class="list_title"><a class="list_title_in">编辑默认搜索关键字</a></h5-->
<div class="note">提示：<br />
<ol>
  <li>热门关键词请用<strong>换行符</strong>隔开；关键字不能含 &lt; &gt; 字符。</li>
  <li>可直接输入广告代码如链接，或点选旁边的下拉框自动加链接。</li>
</ol>
</div>
<?php
$val = '';
if ($file = @file_get_contents('writable/js/search.js')) {
  if (preg_match('/\/\* search_under_ad \*\/[\r\n\s]*var\s+search_under_ad\s*=\s*\'(.*)\'\s*;[\r\n\s]*\/\* \/search_under_ad \*\//i', $file, $matches)) {
    $val = preg_replace('/<\/a>[\s\r\n]*<a/i', "</a>\n<a", $matches[1]);
    $val = str_replace("\'", "'", $val);
  }
}
?>


<form action="?post=search_hot" method="post">
  全部：<textarea name="all" id="allb" cols="60" rows="4"><?php echo $val; ?></textarea><br />
  <input type="hidden" name="act" value="all" />
  <input type="checkbox" class="checkbox" name="filter" value="yes" />请系统自动过滤代码<br />
  <a href="javascript:void(0);" onclick="addBaidu();return false;">插入百度搜索风云榜</a><br />
<button type="submit" class="send2" style="border:none;">提交</button> </form><br />
<br />

<form action="?post=search_hot" method="post">
<script type="text/javascript" language="JavaScript">
<!--

function addBaidu(){
  var s=$('allb');
  if(s!=null){
    s.value=s.value.replace(/<iframe id="baidutop"[^>]+><\/iframe>/ig, '');
    try{
    s.value="<iframe id=\"baidutop\" vspace=\"0\" hspace=\"0\" scrolling=\"no\" allowtransparency=\"true\" frameborder=\"0\" width=\"146\" height=\"13\" src=\"writable/chuchuang/baidutop.html\" style=\"vertical-align: text-bottom;\"></iframe>\n\n"+s.value;
    }catch(e){
    }
  }
}

function addH(o,href){
  var inObj=document.getElementById(o);
  var keyArr=inObj.value.replace(/^[\r\n]+|[\r\n]+$/g,"").replace(/[\r\n]+/g,"\n").split("\n");
  var newStr='';
  if(keyArr.length>0){
    for(i in keyArr){
	  var thisKey=keyArr[i].replace(/<[^>]+>/g,'');
      newStr+="<a href=\""+href+encodeURIComponent(thisKey)+"\">"+thisKey+"</a>\n";
	  thisKey=null;
    }
  }
  inObj.value=newStr.replace(/^[\r\n]+|[\r\n]+$/g,'');
}

if(isArray(searchSelect)){
  for(type in searchSelect){
    document.write(''+searchSelect[type][0]+'：<textarea name="mod['+type+']" id="'+type+'" cols="60" rows="4">'+((stratSearchHot[type] && typeof(stratSearchHot[type])!='undefined')?stratSearchHot[type].toString().replace(/<\/a>[\s\r\n]*<a/ig,"</a>\n<a"):'')+'</textarea> 引擎：<select name="goo" id="goo" onchange="addH(\''+type+'\',this.value)"><option>请选择</option>');
    if(isArray(searchSelect[type])){
      for(n in searchSelect[type]){
        if(n==0) continue;
        document.write('<option value="'+searchSelect[type][n][0]+'">'+searchSelect[type][n][1]+'</option>');
      }
    }
    document.write('</select><br />');
  }
}

-->
</script>
<div class="red_err">特别提示：提交前请确定writable/js目录具备写权限，因为要将配置结果写入writable/js/search_h.js文件</div>
<button type="submit" class="send2" style="border:none;">提交</button> <input type="checkbox" class="checkbox" name="filter" value="yes" />请系统自动过滤代码</br />如果发现没有被改动，那十有八九是缓存在作怪，请刷新页面或清除浏览器缓存再观察
</form>

















