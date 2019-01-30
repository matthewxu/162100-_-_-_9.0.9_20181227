<?php

  $text_err = 0;
  $text = $text1 = $text2 = '';
  $news_txt = preg_replace('/id="pane-recommend".+$/is', '', $news_txt);
  preg_match('/<div class="hotnews" alog-group="focustop-hotnews">.+<\/div>/isU', $news_txt, $m);
  $text1 .= preg_replace('/class="hotnews"/i', 'id="hotnews"', $m[0]);
  unset($m);
  //echo $text;

  if ($text1) {
    $text = '
<div id="news_li_box">
<ul id="news_li">
'.$text1.'
</ul>
<div id="newsMore" style="height:13px; border-top:1px #D8D8D8 dashed; background:url(inc/img/li/fm.gif) 50% 50% no-repeat; overflow:hidden;"></div>
</div>
';
    unset($text1);
    preg_match_all('/<ul class="ulist focuslistnews">.+<\/ul>/is', $news_txt, $m);
    if (count($m[0]) > 0) {
      foreach ($m[0] as $k => $li) {
        $text2 .= $li;
      }
      $text2 = preg_replace('/<i.+\/i>/isU', '', $text2);
      $text2 = preg_replace('/<span.+\/span>/isU', '', $text2);
      $text2 = preg_replace('/<\/?ul[^>]*>/i', '', $text2);
      //$text = preg_replace('/\s+(class|mon)=[^\>\s]+/is', '', $text);
      $text2 = preg_replace('/\s+mon=[^\>\s]+/is', '', $text2);
      $text2 = preg_replace('/<li><a href=(?!\"http:\/\/[^\>\"]+\")[^>]*>.+<\/a><\/li>/isU', '', $text2);
      $text2 = preg_replace('/<\/li>[\s\r\n]*<\!-- sp_tag_end -->[\s\r\n]*<li class="hdline\d+">/i', '', $text2);
    }
    $text .= '
<code id="follow" style="display:none">
<!--'.$text2.'-->
</code>';
    unset($text2, $m);
  } else {
    $text_err = 1;
    $text = '<ul><li>获取数据失败！1.可能是采集源'.$extra['url'].'有变</li><li>点击<a href="javascript:void(0);" onclick="location.reload();">尝试重新抓取</a></li></ul>';
  }

?>