
    <script type="text/javascript" language="JavaScript">
<!--
function confirmWhat(theForm){if(theForm.kw2.value!=''){theForm.submit();}else{alert('搜索关键词不能空！');return false;}}

-->
</script>
    <form id="f2" name="f2" action="search.php?is=wangye" method="get" target="_blank" onsubmit="return confirmWhat(this);">
      <input name="is" id="is2" type="hidden" value="wangye" /><input name="go" id="go2" type="hidden" value="http://www.baidu.com/s?ie=utf-8&wd=" />
      <input name="kw" id="kw2" type="text" maxlength="100" />
      <button id="su2" type="submit" onclick="this.form.action='search.php';">集成搜索</button>
      <input name="get" type="hidden" value="search_site" />
      <button id="su2" type="button" onclick="this.form.action='member.php?get=search_site';confirmWhat(this.form);">站内搜索</button>
    </form>

