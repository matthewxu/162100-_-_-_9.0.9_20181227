<?php

  $text_err = 0;
  $text = '';
  $tarr = array();
  if (preg_match('/var\s+content\_player\s*\=\s*\[\]\;(.+)window\.content\_player\s*\=\s*content\_player\;/isU', $news_txt, $m_js_all)) {
    preg_match_all('/\'title\'\s*\:\s*\'([^\']+)\'.*\'url\'\s*\:\s*\'([^\']+)\'.*\'imgUrl\'\s*\:\s*\'([^\']+)\'/isU', $m_js_all[1], $m_imgs);
    if (count($m_imgs[3]) > 0) {
      foreach ($m_imgs[3] as $k => $filename) {
        //if ($filename == '' || !preg_match('/^https?:\/\/.+\.(jpg|gif|png)$/i', $filename)) {
        //  die('图片URL输入不合法！网址以http://开头！图片格式限(jpg|gif|png)。');
        //}
        $filename = preg_replace('/[\s\n\r\\\]/', '', $filename);
        $new_filename = $k.'.'.preg_replace('/.+\.(jpg|gif|png)(\?.*)?$/i', '$1', $filename);
        if ($im = read_file($filename)) {
          write_file($extra['img_d'].'/'.$new_filename, $im);
          $img_info = getimagesize($extra['img_d'].'/'.$new_filename);
          if (isset($img_h) && abs($img_h) > 0) {
          } else {
            $img_h = abs($img_info[1] * $extra['w'] / $img_info[0]);
          }

          run_img_resize($extra['img_d'].'/'.$new_filename, $extra['img_d'].'/'.$new_filename, 0, 0, $extra['w'], $img_h, $img_info[0], $img_info[1], 80);
          
          $tarr[$k] = '<a href="'.preg_replace('/\\\/', '', $m_imgs[2][$k]).'" target="_blank" id="e_img_'.$k.'"><img src="inc/'.$extra['img_d'].'/'.$new_filename.'?refresh='.$new_stamp[0].'" /><div class="txt">'.preg_replace('/\\\x22/i', '"', $m_imgs[1][$k]).'</div></a>';

        }
      }
    }
  }
  //echo $text;
  if (!empty($tarr[0])) {
    $text = '
<div id="news_imgs_box">
<div id="news_imgs">
'.$tarr[0].'
</div>
<a href="javascript:void(0);" onclick="stepP();return false;" id="n_prev">&lt;</a><a href="javascript:void(0);" onclick="stepN();return false;" id="n_next">&gt;</a>
<input type="hidden" id="keyC" value="0" /><input type="hidden" id="nowMode" value="N" /></div>
';
  unset($tarr[0]);
    $text .= '
<code id="follow" style="display:none">
<!--'.preg_replace('/<\!\-\-.*\-\->/sU', '', @implode('', $tarr)).'-->
</code>';
  } else {
    $text_err = 1;
    $text = '<ul><li>获取数据失败！1.可能是采集源'.$extra['url'].'有变</li><li>点击<a href="javascript:void(0);" onclick="location.reload();">尝试重新抓取</a></li></ul>';
  }
?>