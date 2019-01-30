<?php
require ('authentication_manager.php');
?>
<?php
@set_time_limit(0);  //若配置为 0 则不限定最久时间

if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}


@ require ('readonly/function/write_file.php');

if ($_POST['act'] == 'close') {
  if (!file_exists('addfunds.php')) {
    err('商业版才能进行此项！');
  }

$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);

  if ($_POST['act2'] == 'del') {
    echo '<p style="padding-left:40px; text-align:left;">';
    @ob_flush();@flush();
    if (file_exists('index.html')) {
      @unlink('index.html');
      echo '<span class="grayword">index.html 删除成功！</span><br />';
      @ob_flush();@flush();
    }

    if ($htmls = @glob('./*.html')) {
      foreach ($htmls as $html) {
        $v = basename($html);
        if ($v != '404.html' && $v != 'about_blank.html') {
          @unlink($html);
          echo '<span class="grayword">'.$v.' 删除成功！</span><br />';
          @ob_flush();@flush();
        }
      }
    }

    echo '</p>';
    echo '<script>
  function scrollToBottom() {
    //window.scrollTo(0, document.body.offsetHeight);
    location.href="#htmlend";
  }
  if(document.all){
    window.attachEvent("onload",scrollToBottom);
  }else{
    window.addEventListener("load",scrollToBottom,false);
  }
  </script>';
    @ob_flush();@flush();
    write_file('writable/set/set_html.php', '<?php
$web[\'html\'] = false;
?>');

    alert('<a name="htmlend" id="htmlend"></a>各频道下的栏目、分类静态页面删除成功', '?get=html');
  } else {
    write_file('writable/set/set_html.php', '<?php
$web[\'html\'] = false;
?>');
    @unlink('index.html');

    err('已关闭静态。<br />
以首页为起始，再次进入各分类页面时为动态分类页面<br /><br /><ul style="width:50%;text-align:left;">对于静态页面的处理：<li>仍然保留</li><li><form action="?post=html" method="post" style="display:inline;"><input type="hidden" name="act" value="close" /><input type="hidden" name="act2" value="del" /><button type="submit" style=" letter-spacing:0; background:none; color:#667788;">我想全部删除它们</button></form></li></ul><br /><br />', 'ok');

  }





} else {

  @ require ('writable/set/set_area.php');

  $persistent = 1;

  echo '<p style="padding-left:40px; text-align:left;">';
  echo '<span class="grayword">首页 - index.html生成中...</span> ';
  @ob_flush();@flush();
  $web['html'] = true;
  echo reset_indexhtml('index.php', 'index.html') ? '成功<br />' : '失败<br />';
  echo '<br />';
  @ob_flush();@flush();

  unset($_GET);

  $text_correct = $column_py = '';

  foreach ((array)$web['area'] as $column_id => $column) {
    //$column = (array)$column;
    $_GET['column_id'] = $column_id;
    $column_py = $column['name'][1];
    
    echo '<span class="grayword">频道<b>'.$column['name'][0].'</b> - '.$column_py.'.html生成中...</span> ';
    @ob_flush();@flush();

    $web['html'] = true;
    echo reset_indexhtml('column.php', $column_py.'.html') ? '成功<br />' : '失败<br />';
    @ob_flush();@flush();

    $web['area'][$_GET['column_id']]['name'][0] = $column['name'][0];
    $web['area'][$_GET['column_id']]['name'][1] = $column['name'][1];
    unset($column['name']);
    foreach ($column as $class_id => $class) {
      $_GET['class_id'] = $class_id;
      echo '<span class="grayword">栏目<b>'.$class[0].'</b> - '.$column_py.'_'.$class[1].'.html生成中...</span> ';
      @ob_flush();@flush();

      $web['html'] = true;
      echo reset_indexhtml('class.php', $column_py.'_'.$class[1].'.html') ? '成功<br />' : '失败<br />';
      @ob_flush();@flush();
    }
    //unset($_GET, $column_py);
  }

  //生成专题
  $priority_arr = array();
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {

    $result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE detail_title<>"" AND http_name_style="" AND class_priority<>"" GROUP BY detail_title');
    if ($result != false) {
      while ($row = db_fetch($db, $result)) {
        //if (array_key_exists($row['column_id'], $web['area']) && array_key_exists($row['class_id'], $web['area'][$row['column_id']])) {
        if (isset($web['area'][$row['column_id']]) && isset($web['area'][$row['column_id']][$row['class_id']])) {
          $priority_arr[$row['column_id'].'_'.$row['class_id'].'_'.$row['detail_title']] = 1;
        }
        unset($row);
      }
    }
    $result = NULL;

  }/* else {
    $err .= $sql['db_err'];
  }*/
  db_close($db);

  unset($_GET);
  if (count($priority_arr) > 0) {
    echo '<br /><b>正在生成专题...</b><br />';
    @ob_flush();@flush();

    foreach ($priority_arr as $priority_key => $priority_val) {
      list($_GET['column_id'], $_GET['class_id'], $detail_title) = @explode('_', $priority_key);
      list($_GET['detail_title'], $detail_py, ) = @explode('|', $detail_title);
      $web['html'] = true;
	  echo '<span class="grayword">专题<b>'.$_GET['detail_title'].'</b> - '.$detail_py.'.html生成中...</span>';
      @ob_flush();@flush();
      echo reset_indexhtml('detail.php', $detail_py.'.html') ? '成功<br />' : '失败<br />';
      @ob_flush();@flush();
      unset($_GET, $detail_title ,$detail_py);
    }
  }
  echo '</p>';

  write_file('writable/set/set_html.php', '<?php
$web[\'html\'] = true;
?>');

  echo '<script>
  function scrollToBottom() {
    //window.scrollTo(0, document.body.offsetHeight);
    location.href="#htmlend";
  }
  if(document.all){
    window.attachEvent("onload",scrollToBottom);
  }else{
    window.addEventListener("load",scrollToBottom,false);
  }
  </script>';


  if (!isset($SET_RELOAD)) {
    alert('全站静态执行完毕。<br />
· 如果生成未完全成功，请<a href="javascript:location.reload();">刷新一下本页面</a>）<a name="htmlend" id="htmlend"></a>', 'webmaster_central.php?get=html');
  }
}






?>