<?php
require ('authentication_manager.php');
?>
<iframe id="lastFrame" name="lastFrame" frameborder="0" style="display:none;"></iframe>
<!--h5 class="list_title"><a class="list_title_in">数据库管理</a></h5-->
<div class="note">提示：
    <ol>
      <li>请确定您的空间支持PHP+Mysql。</li>
      <li>正常情况下，虚拟主机提供商会为你分配Mysql份额，请确保上述所填与该Mysql份额各参数相同。</li>
      <li>如果分配给你的Mysql份额只有一个，那么你无法再创建第二个数据库（提交时不必点选“创建新/启动数据库”）。</li>
      <li>如果你已通过自己虚拟主机的Mysql管理后台（一般如PhpMyAdmin）对数据库进行了更改，请保持上述各项参数与之相匹配。</li>
    </ol>
</div>
<script>

function chkT(){
  if($('create').checked==true || $('tableset').checked==true){
    if (get_checkbox('beifen')==0){
	  alert('必须选择数据表备份源，以便导入数据！');
	  return false;
	}
  }
  return true;
}

</script>
<?php

$sql['sql_version'] = '未知';

$sub = $ok = $err = $chd = '';
if (!isset($sql['db_err'])) {
  $db = db_conn();
}

if ($sql['db_err'] == '') {
  $sql['sql_version'] = preg_replace('/[^\d\.]+/', '', db_version($db));
  /*
  //查看分区：SELECT * FROM INFORMATION_SCHEMA.partitions WHERE TABLE_SCHEMA='web162100' AND TABLE_NAME='yzsou_reply';
  */
  $result = db_query($db, 'SHOW VARIABLES LIKE "%partition%"');
  $row = db_fetch($db, $result);
  $sql['sql_part'] = $row; //[Variable_name] => have_partitioning  [Value] => YES
  $result = NULL;
  unset($row);
  $eval_part = '';
  if (!($sql['sql_version'] >= '5.1' && $sql['sql_part']['Variable_name'] == 'have_partitioning' && $sql['sql_part']['Value'] == 'YES')) {
    $sql_err = '<img src="readonly/images/i.gif" /> <span class="redword">告知：你的MYSQL服务器分区功能被禁用</span>';
  } else {
    $sql_err = '<img src="readonly/images/ok.gif" /> 你的MYSQL服务器支持分区';
  }
  $sub .= '重新';
  $err .= '<img src="readonly/images/ok.gif" /> 数据库连接成功！';
  $ok = 'ok';
} else {
  $chd = ' checked="checked"';
  $err .= '<img src="readonly/images/i.gif" /> 数据库连接出现故障：'.$sql['db_err'];
}


echo '<div class="output" style="background-color:#FFCCCC;">'.preg_replace('/<div id="db_err_text".+\/div>/isU', '', $err).'</div>
<div class="output" id="table_err" style="display:none; background-color:#FFCCCC;"></div>';
if (preg_match('/^[\d\.]+$/', $sql['sql_version']) && $sql['sql_version'] < '5.0') {
  echo '<div class="siteannounce"><img src="readonly/images/i.gif" /> 服务器数据库版本（'.$sql['sql_version'].'）太低！数据可能显示不正常。本程序建设基于MySQL版本5.0以上</div>';
}

echo '<p style="clear:both; height:10px; overflow:hidden;">&nbsp;</p>
  <table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table" style="display:block; min-height:400px; z-index:999; zoom:1;">
<form method="post" action="?post=sql" onsubmit="addSubmitSafe()">
    <tr>
      <th style="width:150px">参数</th>
      <th style="width:400px">值</th>
      <th>说明</th>
    </tr>
    <tr>
      <td style="width:150px;text-align:left">选择驱动</td>
      <td style="width:400px;text-align:left">';
foreach (array('PDO_MySQL', 'MySQLi', 'MySQL') as $k=>$vo) {
  $v = strtolower($vo);
  if (extension_loaded($v) && file_exists($GLOBALS['WEATHER_DATA'].'readonly/function/php_'.$v.'.php')) {
    $conn_ok_no1 = ' title="你的主机支持" onmouseover="sSD(this,event);"';
    $conn_ok_no2 = ' <b class="greenword">√</b>';
    $conn_button = '';
  } else {
    $conn_ok_no1 = ' title="糟糕！该数据库连接模式不被支持" onmouseover="sSD(this,event);"';
    $conn_ok_no2 = ' <b class="redword">×</b>';
    $conn_button = ' disabled="disabled"';
  }
  echo '<label for="dbconn'.$k.'" style=" background-color:#EFEFEF; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;display:inline-block; *display:inline; *zoom:1; margin:3px 0; padding:5px 10px; cursor:pointer;"'.$conn_ok_no1.'><input name="dbconn" id="dbconn'.$k.'" type="radio" class="radio" value="'.$v.'"'.($v == $sql['conn'] ? ' checked="checked"' : '').''.$conn_button.' />'.$vo.$conn_ok_no2.'</label>';
  unset($k, $v, $vo, $conn_ok_no1, $conn_ok_no2, $conn_button);
}
echo '</td>
      <td style="text-align:left">点击可切换数据库连接操作模式</td>
    </tr>
    <tr>
      <td style="width:150px;text-align:left">服务器类型</td>
      <td style="width:400px;text-align:left"><input name="dbtype" type="text" value="'.$sql['type'].'" style="width:220px" /> <span class="orangeword">必填</span></td>
      <td style="text-align:left">一般是mysql</td>
    </tr>
    <tr>
      <td style="width:150px;text-align:left">服务器地址</td>
      <td style="width:400px;text-align:left"><input name="dbhost" type="text" value="'.$sql['host'].'" style="width:220px" /> <span class="orangeword">必填</span></td>
      <td style="text-align:left">一般是localhost</td>
    </tr>
    <tr>
      <td style="width:150px;text-align:left">服务器端口</td>
      <td style="width:400px;text-align:left"><input name="dbport" type="text" value="'.$sql['port'].'" style="width:220px" /> <span class="orangeword">必填</span></td>
      <td style="text-align:left">一般是3306</td>
    </tr>
    <tr>
      <td style="width:150px;text-align:left">数据库名</td>
      <td style="width:400px;text-align:left"><input name="dbname" type="text" value="'.$sql['name'].'" style="width:220px" /> <span class="orangeword">必填</span>
<br>
<input name="tableset" id="tableset" type="radio" class="radio" onclick="if(this.checked==true){$(\'t_default\').style.display=\'block\';}" value="1" style="margin-left:10px;"'.$chd.' />一同建立数据表<br>';

//if ($chd == ' checked="checked"') {
  echo '<div id="t_default" style="'.($chd == ' checked="checked"'?'':'display:none;').'margin:5px 10px; padding-left:10px; color:green;">选择数据表备份源，以便导入数据（必选）：';
  echo '<div style="padding:2px; border:1px #EEE solid; background-color:#FFFFCC;">';
  $base = @glob('writable/data/all_*');
  $n = count($base);
  if ($n > 0) {
    $shenyu = $n == 1 ? 'return confirm(\'就剩这一个备份了，确定删除么？\');' : 'return confirm(\'确定删除该备份么？\');';
	foreach ($base as $k => $t) {
	  $tname = basename($t);
	  list($bf_type, $table_type) = @explode('_', $tname);
	  if (preg_match('/^(.+)\.zip$/i', $t, $mm)) {
        if (!file_exists($mm[1])) {
	      echo '
	  <div name="beifen_'.$tname.'" id="beifen_start_'.$tname.'" style="border-bottom:1px #EEE solid;" title="此压缩包也可作为备份导入数据" onmouseover="sSD(this,event);"><input name="beifen" type="radio" class="radio" value="'.$t.'"'.($table_type=='default'?' checked="checked"':'').' /><img src="readonly/images/data_zip.gif" /> '.$table_type.'</div>';
        }
      } else {
	    echo '
	  <div name="beifen_'.$tname.'" id="beifen_start_'.$tname.'" style="border-bottom:1px #EEE solid;"><input name="beifen" type="radio" class="radio" value="'.$t.'"'.($table_type=='default'?' checked="checked"':'').' /><img src="readonly/images/data_folder.gif" /> '.$table_type.''.(preg_match('/^\d{14}$/', $table_type) ? '<span class="grayword">（'.preg_replace('/^(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/', '$1/$2/$3 $4:$5:$6', $table_type).'备）</span>' : '').'</div>';
      }
	}
  } else {
    echo '<b class="redword">没有数据备份源！无法导入数据！</b>';
  }
  echo '</div>';
  echo '</div>';
  unset($base, $n, $k, $t, $tname, $bf_type, $table_type, $shenyu);
  
  
  
//}

echo '
<input name="tableset" id="tableset_" type="radio" class="radio" onclick="if(this.checked==true){$(\'t_default\').style.display=\'none\';}" value="0" style="margin-left:10px;"'.($ok == 'ok' ? ' checked' : '').' />不用建立数据表（已建），我只更改数据库参数</td>
      <td style="text-align:left">字母数字（最好字母开头，别纯数字，有的服务器不支持数字开头；如果含有特殊字符，可能会导致不成功）</td>
    </tr>
    <tr>
      <td style="width:150px;text-align:left">数据库用户名</td>
      <td style="width:400px;text-align:left"><input name="dbuser" type="text" value="'.$sql['user'].'" style="width:220px" /> <span class="orangeword">必填</span></td>
      <td style="text-align:left">&nbsp;</td>
    </tr>
    <tr>
      <td style="width:150px;text-align:left">数据库用户密码</td>
      <td style="width:400px;text-align:left"><input name="dbpswd" type="password" value="'.$sql['pass'].'" style="width:220px" /> <input type="checkbox" name="cnp" value="1" /> 我的密码为空 <span class="orangeword">必填或必选</span></td>
      <td style="text-align:left">如密码留空，点选确认</td>
    </tr>
    <tr>
      <td style="width:150px;text-align:left">数据库表名前缀</td>
      <td style="width:400px;text-align:left"><input name="dbpref" type="text" value="'.$sql['pref'].'" style="width:220px" /> <span class="orangeword">必填</span></td>
      <td style="text-align:left">后面必加下划线（必须字母开头）</td>
    </tr>
    <tr>
      <td style="width:150px;text-align:left">数据表编码</td>
      <td style="width:400px;text-align:left"><select name="dbchar">
          <option value="utf8" selected="selected">UTF-8</option>
        </select></td>
      <td style="text-align:left">&nbsp;</td>
    </tr>
  </table>
  <div class="red_err">特别提示：提交前请确定set目录具备写权限，因为要将配置结果写入writable/set/set_sql.php文件，否则虽提示成功，但实际仍配置失败</div>
  <table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table">
    <tr>
      <td style="width:150px;text-align:left">&nbsp;</td>
      <td style="width:400px;text-align:left"><button type="submit" class="send2" onclick="return chkT();">'.$sub.'设置</button></td>
      <td style="text-align:left">&nbsp;</td>
    </tr>
</form>
  </table>
';

?>
<?php

$beifen_sy = array();
/*
if ($ok == 'ok') {
*/
  echo '<br><br>

<div class="note" id="mysql_tables">注：
<ol>
  <li>数据库（<span>版本：'.$sql['sql_version'].'</span>）。</li>
  <li>如果整体数据库太大，也可在上表中单独备份数据表。</li>
  <li>若你一旦备份了某数据表，再次恢复建立时将导入该数据表备份。</li>
</ol>
</div>';
  echo '
<table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table">
  <tr>
    <th style="width:150px">数据表</th>
    <th style="width:400px">状态</th>
    <th>描述</th>
  </tr>
';
//if ($sub != '') {
  $rs = array();
  $step = 0;
  foreach ($sql['data'] as $key => $val) {
    if ($sql['db_err'] == '') {
      $result = db_query($db, 'SHOW TABLES LIKE "'.$sql['pref'].''.$val.'"');
      //$result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$val.'` LIMIT 1');
      if ($rs[$val] = db_fetch($db, $result)) {
        $step++;
      }
      $result = NULL;
    }
    echo '
  <tr>
    <td style="width:150px;text-align:left">'.$sql['pref'].''.$val.'</td>
    <td style="width:400px;text-align:left" id="table_'.$val.'" name="table_'.$val.'">';
    if ($rs[$val]) {
      echo '已建 [
      <a href="?post=sql_table_del&table='.$val.'&act=del" onclick="return confirm(\'确定删除表'.$val.'么？\')">删除</a>
      <a href="?post=sql_table_del&table='.$val.'&act=empty" onclick="return confirm(\'确定清空表'.$val.'么？\')">清空</a>
      <a href="?post=sql_table_del&table='.$val.'&act=index" onclick="return confirm(\'确定更新表'.$val.'索引以优化性能么？\')">建立索引</a>
      <a href="?post=sql_table_del&table='.$val.'&act=index_del" onclick="return confirm(\'确定删除表'.$val.'索引么？\')">删除索引</a>
      <a href="?post=sql_table_del&table='.$val.'&act=reset_id" onclick="return confirm(\'确定重置表'.$val.'排序么？\')">重置主键排序</a>'.($key == '承载网址数据的表名' ? '      <a href="?post=sql_table_del&table='.$val.'&act=clear" onclick="return confirm(\'确定净化表'.$val.'，以便删除垃圾数据么？\')">净化</a>' : '').'
      <a href="?post=sql_backup&table='.$val.'" onclick="return confirm(\'确定备份表'.$val.'么？\')"><strong>备份</strong></a> ]';
    } else {
      $table_err .= ' '.$sql['pref'].$val.' ';
      echo '未建';
    }
    $base = @glob('writable/data/{all,'.$val.'}_*', GLOB_BRACE);
    $n = count($base);
    if ($n > 0) {
      echo '<div style="margin:5px 10px; color:green;">该表有以下备份可供重建：';
      echo '<div style="padding:2px; border:1px #EEE solid; background-color:#FFFFCC;">';
      $beifen_sy[$key] = 1;
      $shenyu = $n == 1 ? 'return confirm(\'就剩这一个备份了，确定删除么？\');' : 'return confirm(\'确定删除该备份么？\');';
      foreach ($base as $k => $t) {
	    $tname = basename($t, '.sql');
	    list($bf_type, $table_type) = @explode('_', $tname);
        echo '<div name="beifen_'.$tname.'" id="beifen_'.$tname.'" style="border-bottom:1px #EEE solid; clear:both;">';
	    if (preg_match('/^(.+)\.zip$/i', $t, $mmm)) {
	      echo '
	  <a href="?post=sql_table_del&act=down_beifen&beifen='.urlencode($t).'" style="float:right; margin:0 5px;">下载</a><a onclick="'.$shenyu.'" style="float:right; margin:0 5px;" href="?post=sql_table_del&act=del_beifen&beifen='.urlencode($t).'&m=1" target="lastFrame">删除</a>'.(file_exists($mmm[1])?'':'<a href="?post=sql_table_set&table='.$val.'&beifen='.urlencode($t).'" title="此压缩包也可作为备份导入数据。点击后自动解压，然后导入" onmouseover="sSD(this,event);" onclick="return confirm(\'确定导入么？该举动会清空现有数据\');" style="float:right; margin:0 5px;">导入</a>').'<img src="readonly/images/data_zip.gif" /> '.$table_type.'';
        } else {
	      echo '
	  <a href="?post=sql_table_del&act=zip_beifen&beifen='.urlencode($t).'" style="float:right; margin:0 5px;" title="打包以便下载到本地备份" onmouseover="sSD(this,event);">打包</a><a onclick="'.$shenyu.'" style="float:right; margin:0 5px;" href="?post=sql_table_del&act=del_beifen&beifen='.urlencode($t).''.(file_exists($t.'.zip')?'"':'&m=1" target="lastFrame"').'>删除</a><a href="?post=sql_table_set&table='.$val.'&beifen='.urlencode($t).'" onclick="return confirm(\'确定导入么？该举动会清空现有数据\');" style="float:right; margin:0 5px;">导入</a><img src="readonly/images/data_folder.gif" /> '.$table_type.''.(preg_match('/^\d{14}$/', $table_type) ? '<span class="grayword">（'.preg_replace('/^(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/', '$1/$2/$3 $4:$5:$6', $table_type).'备）</span>' : '').'';
        }
        echo '</div>';
	  }
      echo '</div>';
      echo '</div>';
    } else {
      //echo '<b class="redword">该表没有备份源！请备份</b>';
    }
    unset($base, $n, $k, $t, $tname, $bf_type, $table_type, $shenyu);



    echo '</td>
    <td>'.$key.''.($key=='承载成员档案的表名'?'<b class="redword">（如果主机上同时使用162100导航手机Wap版，此表共享，请谨慎操作！）</b>':'').'</td>
  </tr>';
    unset($rs[$val]);

  }
  if ($step > 0) {
    echo '
  <tr>
    <td style="width:150px;text-align:left">&nbsp;</td>
    <td style="width:400px;text-align:left" id="table_all" name="table_all"><div>'.(array_sum($beifen_sy) < count($sql['data']) ? '<span style="background-color:#FF6600;color:#FFFFFF;">没有整体备份！强烈建议备份一下</span>' : '').'[<a href="?post=sql_backup" onclick="return confirm(\'确定备份数据库么？\');"><strong>点击整体数据库备份</strong></a>]</div>';
    
    $all = @glob('writable/data/all_*');
    $n_all = count($all);
    if ($n_all > 0) {
      echo '<div style="margin:5px 10px; color:green;">已有如下整体备份：';
      echo '<div style="padding:2px; border:1px #EEE solid; background-color:#FFFFCC;">';
      foreach ($all as $ka => $ta) {
	    $tn = basename($ta);
	    list($bf_t, $table_t) = @explode('_', $tn);
        echo '<div name="beifen_'.$tn.'" id="beifen_'.$tn.'" style="border-bottom:1px #EEE solid; clear:both;">';
	    if (preg_match('/^(.+)\.zip$/i', $ta)) {
	      echo '
	  <a href="?post=sql_table_del&act=down_beifen&beifen='.urlencode($ta).'" style="float:right; margin:0 5px;">下载</a><a onclick="'.$shenyu.'" style="float:right; margin:0 5px;" href="?post=sql_table_del&act=del_beifen&beifen='.urlencode($ta).'">删除</a><img src="readonly/images/data_zip.gif" /> '.$table_t.'';
        } else {
	      echo '
	  <a href="?post=sql_table_del&act=zip_beifen&beifen='.urlencode($ta).'" style="float:right; margin:0 5px;" title="打包以便下载到本地备份" onmouseover="sSD(this,event);">打包</a><a onclick="'.$shenyu.'" style="float:right; margin:0 5px;" href="?post=sql_table_del&act=del_beifen&beifen='.urlencode($ta).'">删除</a><img src="readonly/images/data_folder.gif" /> '.$table_t.''.(preg_match('/^\d{14}$/', $table_t) ? '<span class="grayword">（'.preg_replace('/^(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/', '$1/$2/$3 $4:$5:$6', $table_t).'备）</span>' : '').'';
        }
        echo '</div>';
	  }
      
      echo '</div>';
      echo '</div>';
    }
    echo '
    </td>
    <td>&nbsp;</td>
  </tr>';
  }
  echo '
</table>';
//}

/*
} else {

  echo '<br><br>

<div class="note" id="mysql_tables"><b class="redword">注：下面的数据表无法建立及连接！系统无法使用！请正确配置上面的数据库参数！来连接数据库（表）</b></div>';
  echo '
<table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table">
  <tr>
    <th style="width:150px">数据表</th>
    <th style="width:400px">状态</th>
    <th>描述</th>
  </tr>
';
  foreach ($sql['data'] as $key => $val) {
    $table_err .= ' '.$sql['pref'].$val.' ';
    echo '
  <tr>
    <td style="width$table_err:150px;text-align:left">'.$sql['pref'].''.$val.'</td>
    <td style="width:400px;text-align:left">未建</span>';
  echo '</td>
    <td>'.$key.'</td>
  </tr>';

  }
  echo '
</table>';

}
*/
if (isset($table_err) && !empty($table_err)) {
  $table_ok1 = '<img src=\"readonly/images/i.gif\" />';
  $table_ok2 = '有故障（初次安装系统也会有此提示）！下面有数据表'.$table_err.'没建起！系统无法正常使用！正常情况下，在你初次配置数据库时，点选“一同建立数据表”即可自动建起数据表，如果没选，请点选并重新配置提交，或在页面下部依次导入生成数据表。';
  $table_ok3 = '
  function tableErr() {
    alert("'.$table_ok2.'");
  }

  if (document.all) {
    window.attachEvent("onload", tableErr);
  } else {
    window.addEventListener("load", tableErr, false);
  }

';
} else {
  $table_ok1 = '<img src=\"readonly/images/ok.gif\" />';
  $table_ok2 = '数据表检测正常。';
  $table_ok3 = '';

}
echo '
<script>
if ($("table_err") != null) {
  $("table_err").style.display = "block";
  $("table_err").innerHTML = "'.$table_ok1.' '.$table_ok2.'";
  '.$table_ok3.'

}
</script>
';

db_close($db);









?>
