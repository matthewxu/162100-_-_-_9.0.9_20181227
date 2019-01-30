<?php

$web['pagesize'] = 30; //页码

$arr_page = array(10, 30, 50, 100, 200);
if (isset($_GET['pn'])) {
  //$_GET['pn'] = abs($_GET['pn']);
  if (in_array($_GET['pn'], $arr_page)) {
    $web['pagesize'] = $_GET['pn']; //分页记录数
  }
}

//页数
function get_page($n, $ps = false) {
  global $web, $arr_page;
  $ps = $ps ? $ps : $web['pagesize'];
  @ $_GET['p'] = abs($_GET['p']);
  if (!$_GET['p'] || $_GET['p'] < 1) {
    return 1;
  } elseif ($n && $_GET['p'] > ceil($n / $ps)) {
    return ceil($n / $ps);
  } else {
    return floor($_GET['p']);
  }
}

//分页
function get_page_foot($totallists, $pagesize, $p, $mpurl_before, $mpurl_after = '', $pagestep = 10, $target = '_self', $code_other = '') {
  global $web, $arr_page;
  $text = '<div style="text-align:center; clear:both;">';
  if (!isset($GLOBALS['page_style'])) {
    $text .= '<span id="page_style"><style type="text/css">
<!--
/*页码*/
.page_table { padding-bottom:10px; }
.page { display:inline-block !important; display:inline; zoom:1; margin-top:10px; margin-bottom:10px; background-color:#FFFFFF; border:1px #DDDDDD solid; height:24px; padding:2px; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; line-height:24px !important; font-size:12px; }
.page_table .page { margin-top:0; margin-bottom:0; }
.page .pagein, .pagein { display:inline-block !important; display:inline; zoom:1; line-height:24px !important; }
.rightmenu .page { margin-top:10px; margin-bottom:0; }
.page a, .page strong { display:inline-block !important; display:inline; zoom:1; margin-left:1px; margin-right:1px; padding-left:5px; padding-right:5px; cursor:pointer; }
.page a b { }
.page strong { color:#FF6600; background-color:#ECECEC; cursor:auto; }
.page a { text-decoration:none; background-color:#F4F4F4; }
.page a:hover { color:#FF6600; background-color:#ECECEC; }
.page .prev, .page .next { }
.page .totallists { font-weight:bold; width:auto; margin-right:2px; float:left; display:inline-block !important; display:inline; zoom:1; height:24px; padding:0 6px; background-color:#ECECEC; }
.page #pagego { padding:0; margin:0; margin-top:-3px; width:26px; height:20px; border:1px #CCCCCC inset; background:url(inc/images/enter.gif) 6px 6px no-repeat; display:inline-block !important; display:inline; zoom:1; }
.pnis { color:#FF6600; text-decoration:underline; font-weight:bold; }
.pagein a, .pagein b, .pagein span, .pagein strong { line-height:24px !important; font-size:12px;}
-->
</style></span>
';
    $GLOBALS['page_style'] = true;
  }

  $totalpages = 1;
  if ($totallists > $pagesize) {
    $text .= '<div class="page"><div class="pagein">';
    $offset = 4; //当前页前面显几页
    $totalpages = @ceil($totallists / $pagesize);
    if ($pagestep > $totalpages) {
      $fr = 1;
      $to = $totalpages;
    } else {
      $fr = $p - $offset;
      $to = $fr + $pagestep - 1;
      if ($fr < 1) {
        $to = $p + 1 - $fr;
        $fr = 1;
        if ($to - $fr < $pagestep) {
          $to = $pagestep;
        }
      } elseif ($to > $totalpages) {
        $fr = $totalpages - $pagestep + 1;
        $to = $totalpages;
      }
    }

    $text .= '<span class="totallists" title="总记录数" style="width:auto">'.$totallists.'</span>';
    $text .= ($p - $offset > 1 && $totalpages > $pagestep ? '<a target="'.$target.'" href="'.$mpurl_before.'1'.$mpurl_after.'&pn='.$_GET['pn'].'" class="first"><b>1 …</b></a>' : '').($p > 1 ? '<a target="'.$target.'" href="'.$mpurl_before.($p - 1).$mpurl_after.'&pn='.$_GET['pn'].'" class="prev" title="前一页"><b>&lt;&lt;</b></a>' : '');
    for ($i = $fr; $i <= $to; $i++) {
      $text .= $i == $p ? '<strong><b>'.$i.'</b></strong>' : '<a target="'.$target.'" href="'.$mpurl_before.$i.$mpurl_after.'&pn='.$_GET['pn'].'" title="第'.$i.'页"><b>'.$i.'</b></a>';
    }
    $text .= ($p < $totalpages ? '<a target="'.$target.'" href="'.$mpurl_before.($p + 1).$mpurl_after.'&pn='.$_GET['pn'].'" class="next" title="后一页"><b>&gt;&gt;</b></a>' : '').($to < $totalpages ? '<a target="'.$target.'" href="'.$mpurl_before.$totalpages.$mpurl_after.'&pn='.$_GET['pn'].'" class="last" title="最后页"><b>… '.$totalpages.'</b></a>' : '');
    $text .= ($totalpages > $pagestep ? '<input type="text" name="pagego" id="pagego" size="3" title="按回车直接跳页" onblur="$(\'pagego\').value=this.value;" onkeydown="if(event.keyCode==13&&!isNaN(this.value)&&this.value>=1&&this.value<='.$totalpages.'){window.location=\''.$mpurl_before.'\'+this.value+\''.$mpurl_after.'&pn='.$_GET['pn'].'\';return false;}" />' : '');
    $text .='</div>';
    if ($code_other == '') {
      $text .= ' | <div class="pagein">以每页 ';
      foreach ($arr_page as $val) {
        $text .= '<a href="'.$mpurl_before.$p.$mpurl_after.'&pn='.$val.'"'.($_GET['pn']==$val?' class="pnis"':'').' target="'.$target.'">'.$val.'</a> ';
        if ($val >= $totallists) break;
      }
      $text .= '条浏览</div>';
    } else {
      $text .= $code_other;
    }
    $text .= '</div>';
  } else {
    if ($totallists > 0) {
      $text .= '<div class="page"><div class="pagein">';
	  $text .= '<span class="totallists" title="总记录数" style="width:auto">'.$totallists.'</span> 共1页';
      $text .= '</div>';
      $text .= '</div>';
    }
  }
  $text .= '</div>';
  return $text;
}

//分页
function get_page_foot2($totallists, $pagesize, $p, $url, $target = '_self', $class_n) {
  global $web;
  $text = '';
  if ($totallists > $pagesize * $p) {
    if (!isset($GLOBALS['page_style'])) {
      $text .= '<span id="page_style"><style type="text/css">
<!--
.class .page2 { border:1px #FFCC00 solid; line-height:36px; }
.class .page2 a { color:#FFCC00; font-size:12px; font-weight:bold; }
-->
</style></span>
';
      $GLOBALS['page_style'] = true;
    }
    $text .= '<center><span class="class_w_'.$class_n.'"><div class="class_wrap page2">';
    $text .= '<a target="'.$target.'" href="'.$url.($p+1).'">下 一 页 ︾</a>';
    $text .= '</div></span></center>';
  }
  return $text;
}







?>