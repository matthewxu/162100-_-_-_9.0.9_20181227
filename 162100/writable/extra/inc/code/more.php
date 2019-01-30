<?php

  $text_err = 0;
  $text = '';



  preg_match('/<div class="ColA wrap clearfix">(.+)(<div class="wrap clearfix">.+)<\!\-\-s_ifeng_index_\d+_ad_text10/isU', $news_txt, $m);
  unset($news_txt);
  if ($m[1]) {
    $m[1] = preg_replace('/<div class="ColALAvt">.*<\/div>[\s\n\r]*<\/div>[\s\n\r]*<\/div>[\s\n\r]*<\/div>[\s\n\r]*<\/div>/isU', '侧栏微微微广告位</div></div>', $m[1]);
    $m[1] = preg_replace('/<div class="FNewRAvtLisBox02.*\-\->[\s\n\r]*<\/div>/isU', '', $m[1]);
    $text .= '<div class="ColA wrap clearfix" id="first1"><input type="hidden" name="child_block" />'.$m[1].'';
  }
  if ($m[2]) {
    $m[2] = preg_replace('/<div class="wrap clearfix">/isU', '<div class="wrap clearfix"><input type="hidden" name="child_block" />', $m[2]);
    $m[2] = preg_replace('/<div class="FNewRAvtLisBox02.*\-\->[\s\n\r]*<\/div>/isU', '', $m[2]);
    $m[2] = preg_replace('/<div class="ColBLAvt".*\-\->[\s\n\r]*<\/div>/isU', '侧栏小广告位', $m[2]);
    $m[2] = preg_replace('/<div class="ColDRAvt">[\s\n\r]*<\!\-\-s_ifeng_index_\d+_ad_banner_\d+.*\-\->[\s\n\r]*<\/div>/isU', '', $m[2]);
    $m[2] = preg_replace('/<div class="ColALBox">[\s\n\r]*<div class="ColDLAvt1?">.*\-\->[\s\n\r]*<\/div>[\s\n\r]*<\/div>/isU', '侧栏大广告位', $m[2]);

    $m[2] = preg_replace('/<div class="ColELAvt1?".*\-\->[\s\n\r]*<\/div>/isU', '侧栏小广告位', $m[2]);
    $m[2] = preg_replace('/<div class="ColFLAvt1?".*\-\->[\s\n\r]*<\/div>/isU', '侧栏小广告位', $m[2]);
    $m[2] = preg_replace('/<div class="ColGLAvt1?".*\-\->[\s\n\r]*<\/div>/isU', '侧栏小广告位', $m[2]);
    $m[2] = preg_replace('/<div class="ColDRAvt".*\-\->[\s\n\r]*<\/div>[\s\n\r]*<\/div>/isU', '', $m[2]);

    $m[2] = preg_replace('/<div class="ColALBox">[\s\n\r]*<div class="ColCLCon">[\s\n\r]*<div class="Tit02">[\s\n\r]*<a [^>]+>关注凤凰.+[\s\n\r]*<\/ul>[\s\n\r]*<\/div>[\s\n\r]*<\/div>[\s\n\r]*<\/div>/isU', '侧栏大广告位', $m[2]);

  }

  if ($text) {
	$text = '
<div id="extra_box">
<div id="block_title"></div>
<div id="extra_more">
'.$text.'
</div>
<a href="javascript:void(0);" onclick="stepP();return false;" id="n_prev">∧</a><a href="javascript:void(0);" onclick="stepN();return false;" id="n_next">∨</a>
</div>
';
    $text .= '
<code id="follow" style="display:none">
<!--'.preg_replace('/<\!\-\-.*\-\->/sU', '', $m[2]).'-->
</code>';

    unset($m);

  } else {
    $text_err = 1;
    $text = '<ul><li>获取数据失败！1.可能是采集源'.$extra['url'].'有变</li><li>点击<a href="javascript:void(0);" onclick="location.reload();">尝试重新抓取</a></li></ul>';
  }





?>	
