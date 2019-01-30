<?php
require ('authentication_manager.php');
?>
<!--h5 class="list_title"><a class="list_title_in">基本参数管理</a></h5-->
<div class="note">提示：以下信息必须认真填写，尽量不要用特殊符号，如 \ : ; * ? ' &lt; &gt; | ，必免导致错误。</div>
<form action="?post=set" method="post">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="right">&nbsp;</td>
      <td><p><b>管理员帐户</b></p><p><div class="redword" style="font-size:12px; line-height:normal;">注！请在配置完数据库参数后才能更改此项，以便和数据库中的名字同步更改<br />
如果想与162100手机Wap版网址导航程序共享管理员（及成员帐户通行），需满足以下条件<br />
<ol>
<li>同一域内（根域名相同）</li>
<li>同一主机</li>
<li>同名数据库，且《承载成员档案的表名》也相同</li>
<li>设成相同的管理员名和密码</li>
</ol>
否则各管各的</div></p></td>
    </tr>
    <tr>
      <td width="200" align="right">基础管理员名称：</td>
      <td><input type="text" name="manager" value="<?php echo $web['manager']; ?>" size="30" /></td>
    </tr>
    <tr>
      <td width="200" align="right">基础管理员密码：</td>
      <td><input type="text" name="password" value="" size="30" /><span class="grayword">（留空默认原密码，否则更新原密码）</span></td>
    </tr>
    <tr name="login_key" id="login_key">
      <td width="200" align="right">&nbsp;</td>
      <td><p>&nbsp;</p>
      <p><b>登录接口</b></p></td>
    </tr>
    <tr>
      <td width="200" align="right">配置接口参数：</td>
      <td><div class="note">
<?php

if ($arr_lk = @glob('login_key/*', GLOB_ONLYDIR)) {
  foreach ($arr_lk as $val) {
    $title = @file_get_contents($val.'/title.txt');
    $seturl = @file_get_contents($val.'/seturl.txt');
    $val = basename($val);
    if ((string)$val == '162100') {
      continue;
    }

    echo '<img src="readonly/images/'.$val.'.png" /> <a href="'.$seturl.'" target="_blank" title="'.$title.'帐户登录接口" onmouseover="sSD(this,event);">配置</a> <label for="login_key_'.$val.'"><input type="checkbox" name="login_key['.$val.']" id="login_key_'.$val.'" value="'.($web['login_key'][$val] == 1 ? 1 : 0).'" title="'.$title.'帐户登录接口" onmouseover="sSD(this,event);"'.(array_key_exists($val, $web['login_key']) ? ' checked="checked"' : '').' />开启</label> <input type="checkbox" class="checkbox" name="login_key_show['.$val.']" value="1"'.($web['login_key'][$val] == 1 ? ' checked' : '').' onclick="if(this.checked==true){$(\'login_key_'.$val.'\').value=1;}else{$(\'login_key_'.$val.'\').value=0;}" /> 若开启登录接口，首页显示该接口小图标<br />';
  }
}
unset($arr_lk, $val);

?>
请确保你在各接口官方已得到授权，即取到了APP ID和APP KEY<br />
<strong>注！强烈建议：</strong>不要用根域名建站（这是不好的习惯），比如QQ互联不支持根域名的回调地址，可能出现redirect uri is illegal（100010）错误，导致无法登录。请保持申请回调地址的域名和此时建站的域名一致，根域名或二级域名差一点都不可以。</div></td>
    </tr>
    <tr>
      <td width="200" align="right">&nbsp;</td>
      <td><p>&nbsp;</p>
      <p><b>站点基本设置</b></p></td>
    </tr>
    <tr>
      <td width="200" align="right">站点名称：</td>
      <td><input type="text" name="sitename" value="<?php echo $web['sitename']; ?>" size="40" maxlength="" /></td>
    </tr>
    <tr>
      <td width="200" align="right">站点简称：</td>
      <td><input type="text" name="sitename2" value="<?php echo $web['sitename2']; ?>" size="40" maxlength="" /></td>
    </tr>
    <tr>
      <td width="200" align="right">站点简介：</td>
      <td><textarea name="description" cols="40" rows="3"><?php echo $web['description']; ?></textarea></td>
    </tr>
    <tr>
      <td width="200" align="right">关键字：</td>
      <td><textarea name="keywords" cols="40" rows="3"><?php echo $web['keywords']; ?></textarea></td>
    </tr>
    <tr>
      <td width="200" align="right">口号：</td>
      <td><textarea name="slogan" cols="40" rows="3"><?php echo preg_replace('/<br>|<br\s*\/>/i',"\n",$web['slogan']); ?></textarea></td>
    </tr>
    <tr>
      <td width="200" align="right">网站logo：</td>
      <td><a href="webmaster_central.php?get=logo" target="_blank">上载Logo</a></td>
    </tr>
    <tr>
      <td width="200" align="right">关于我们：</td>
      <td><a href="webmaster_central.php?get=modify&otherfile=<?php echo get_en_url('writable/require/about.txt'); ?>" target="_blank">编辑关于我们</a></td>
    </tr>
    <tr>
      <td width="200" align="right">&nbsp;</td>
      <td><p>&nbsp;</p>
      <p><b>站点其它设置</b></p></td>
    </tr>
    <tr>
      <td width="200" align="right">全局文件权限：</td>
      <td><input type="text" name="chmod" value="0<?php echo !empty($web['chmod']) ? $web['chmod'] : '777'; ?>" size="5" /><span class="grayword">（0777为最高权限。但控制较严的主机会瘫痪，如免费主机）</span></td>
    </tr>
    <tr>
      <td width="200" align="right">服务器时区调整：</td>
      <td><div class="note"><select name="time_pos" id="time_pos">
        <option value="-12国际日期变更线西">(GMT-12.00)国际日期变更线西</option>
        <option value="-11中途岛，萨摩亚群岛">(GMT-11.00)中途岛，萨摩亚群岛</option>
        <option value="-10夏威夷">(GMT-10.00)夏威夷</option>
        <option value="-9阿拉斯加">(GMT-9.00)阿拉斯加</option>
        <option value="-8太平洋时间（美国和加拿大）；蒂华纳">(GMT-8.00)太平洋时间（美国和加拿大）；蒂华纳</option>
        <option value="-7奇瓦瓦，拉巴斯，马扎特兰">(GMT-7.00)奇瓦瓦，拉巴斯，马扎特兰</option>
        <option value="-7山地时间（美国和加拿大）">(GMT-7.00)山地时间（美国和加拿大）</option>
        <option value="-7亚利桑那">(GMT-7.00)亚利桑那</option>
        <option value="-6瓜达拉哈拉，墨西哥城，蒙特雷">(GMT-6.00)瓜达拉哈拉，墨西哥城，蒙特雷</option>
        <option value="-6萨斯喀彻温">(GMT-6.00)萨斯喀彻温</option>
        <option value="-6中部时间（美国和加拿大）">(GMT-6.00)中部时间（美国和加拿大）</option>
        <option value="-6中美洲">(GMT-6.00)中美洲</option>
        <option value="-5波哥大，利马，基多">(GMT-5.00)波哥大，利马，基多</option>
        <option value="-5东部时间（美国和加拿大）">(GMT-5.00)东部时间（美国和加拿大）</option>
        <option value="-5印第安那州（东部）">(GMT-5.00)印第安那州（东部）</option>
        <option value="-4大西洋时间（加拿大）">(GMT-4.00)大西洋时间（加拿大）</option>
        <option value="-4加拉加斯，拉巴斯">(GMT-4.00)加拉加斯，拉巴斯</option>
        <option value="-4圣地亚哥">(GMT-4.00)圣地亚哥</option>
        <option value="-3纽芬兰">(GMT-3.00)纽芬兰</option>
        <option value="-3巴西利亚">(GMT-3.00)巴西利亚</option>
        <option value="-3布宜诺斯艾利斯，乔治敦">(GMT-3.00)布宜诺斯艾利斯，乔治敦</option>
        <option value="-3格陵兰">(GMT-3.00)格陵兰</option>
        <option value="-2中大西洋">(GMT-2.00)中大西洋</option>
        <option value="-1佛得角群岛">(GMT-1.00)佛得角群岛</option>
        <option value="-1亚速尔群岛">(GMT-1.00)亚速尔群岛</option>
        <option value="0格林威治标准时间，都柏林，爱丁堡，伦敦，里斯本">(GMT)格林威治标准时间，都柏林，爱丁堡，伦敦，里斯本</option>
        <option value="0卡萨布兰卡，蒙罗维亚">(GMT)卡萨布兰卡，蒙罗维亚</option>
        <option value="1阿姆斯特丹，柏林，伯尔尼，罗马，斯德哥尔摩，维也纳">(GMT+1.00)阿姆斯特丹，柏林，伯尔尼，罗马，斯德哥尔摩，维也纳</option>
        <option value="1贝尔格莱德，布拉迪斯拉发，布达佩斯，卢布尔雅那，布拉格">(GMT+1.00)贝尔格莱德，布拉迪斯拉发，布达佩斯，卢布尔雅那，布拉格</option>
        <option value="1布鲁塞尔，哥本哈根，马德里，巴黎">(GMT+1.00)布鲁塞尔，哥本哈根，马德里，巴黎</option>
        <option value="1萨拉热窝，斯科普里，华沙，萨格勒布">(GMT+1.00)萨拉热窝，斯科普里，华沙，萨格勒布</option>
        <option value="1中非西部">(GMT+1.00)中非西部</option>
        <option value="2布加勒斯特">(GMT+2.00)布加勒斯特</option>
        <option value="2哈拉雷，比勒陀利亚">(GMT+2.00)哈拉雷，比勒陀利亚</option>
        <option value="2赫尔辛基，基辅，里加，索非亚，塔林，维尔纽斯">(GMT+2.00)赫尔辛基，基辅，里加，索非亚，塔林，维尔纽斯</option>
        <option value="2开罗">(GMT+2.00)开罗</option>
        <option value="2雅典，贝鲁特，伊斯坦布尔，明斯克">(GMT+2.00)雅典，贝鲁特，伊斯坦布尔，明斯克</option>
        <option value="2耶路撒冷">(GMT+2.00)耶路撒冷</option>
        <option value="3巴格达">(GMT+3.00)巴格达</option>
        <option value="3科威特，利雅得">(GMT+3.00)科威特，利雅得</option>
        <option value="3莫斯科，圣彼得堡，伏尔加格勒">(GMT+3.00)莫斯科，圣彼得堡，伏尔加格勒</option>
        <option value="3内罗毕">(GMT+3.00)内罗毕</option>
        <option value="3德黑兰">(GMT+3.00)德黑兰</option>
        <option value="4阿布扎比，马斯喀特">(GMT+4.00)阿布扎比，马斯喀特</option>
        <option value="4巴库，第比利斯，埃里温">(GMT+4.00)巴库，第比利斯，埃里温</option>
        <option value="4.5喀布尔">(GMT+4.30)喀布尔</option>
        <option value="5叶卡捷琳堡">(GMT+5.00)叶卡捷琳堡</option>
        <option value="5伊斯兰堡，卡拉奇，塔什干">(GMT+5.00)伊斯兰堡，卡拉奇，塔什干</option>
        <option value="5.5马德拉斯，加尔各答，孟买，新德里">(GMT+5.30)马德拉斯，加尔各答，孟买，新德里</option>
        <option value="5.75加德满都">(GMT+5.45)加德满都</option>
        <option value="6阿拉木图，新西伯利亚">(GMT+6.00)阿拉木图，新西伯利亚</option>
        <option value="6阿斯塔纳，达卡">(GMT+6.00)阿斯塔纳，达卡</option>
        <option value="6斯里哈亚华登尼普拉">(GMT+6.00)斯里哈亚华登尼普拉</option>
        <option value="6仰光">(GMT+6.30)仰光</option>
        <option value="7克拉斯诺亚尔斯克">(GMT+7.00)克拉斯诺亚尔斯克</option>
        <option value="7曼谷，河内，雅加达">(GMT+7.00)曼谷，河内，雅加达</option>
        <option value="8北京，重庆，香港特别行政区，乌鲁木齐，台北">(GMT+8.00)北京，重庆，香港特别行政区，乌鲁木齐，台北</option>
        <option value="8吉隆坡，新加坡">(GMT+8.00)吉隆坡，新加坡</option>
        <option value="8珀斯">(GMT+8.00)珀斯</option>
        <option value="8伊尔库茨克，乌兰巴图">(GMT+8.00)伊尔库茨克，乌兰巴图</option>
        <option value="9大坂，东京，札幌">(GMT+9.00)大坂，东京，札幌</option>
        <option value="9汉城">(GMT+9.00)汉城</option>
        <option value="9雅库茨克">(GMT+9.00)雅库茨克</option>
        <option value="9.5阿德莱德">(GMT+9.30)阿德莱德</option>
        <option value="9.5达尔文">(GMT+9.30)达尔文</option>
        <option value="10布里斯班">(GMT+10.00)布里斯班</option>
        <option value="10符拉迪沃斯托克（海参崴）">(GMT+10.00)符拉迪沃斯托克（海参崴）</option>
        <option value="10关岛，莫尔兹比港">(GMT+10.00)关岛，莫尔兹比港</option>
        <option value="10霍巴特">(GMT+10.00)霍巴特</option>
        <option value="10堪塔拉，墨尔本，悉尼">(GMT+10.00)堪塔拉，墨尔本，悉尼</option>
        <option value="11马加丹，索罗门群岛，新喀里多尼亚">(GMT+11.00)马加丹，索罗门群岛，新喀里多尼亚</option>
        <option value="12奥克兰，惠灵顿">(GMT+12.00)奥克兰，惠灵顿</option>
        <option value="12斐济，堪察加半岛，马绍尔群岛">(GMT+12.00)斐济，堪察加半岛，马绍尔群岛</option>
        <option value="13努库阿洛法">(GMT+13.00)努库阿洛法</option>
      </select>
          <script type="text/javascript">
<!--
document.getElementById('time_pos').value='<?php echo $web['time_pos']; ?>';
-->
  </script>
          <br />
          <font color="green">这是服务器时区时间：<?php echo $here_date = date('Y/m/d H:i:s'); ?></font><br />
          <font color="blue">这是北京时区时间：<?php echo $beijing_date = gmdate('Y/m/d H:i:s', time() + (floatval($web['time_pos']) * 3600)); ?></font><br />
          <font color="red">
            <?php if ($here_date != $beijing_date){ echo '二者时间差别为'.((strtotime($here_date) - strtotime($beijing_date)) / 3600).'小时，可根据此进行调整'; } else { echo '二者相同'; } ?>
          </font></div></td>
    </tr>


    <tr>
      <td width="200" align="right">&nbsp;</td>
      <td><p>&nbsp;</p>
      <p><b>首页转向</b></p></td>
    </tr>
    <tr>
      <td width="200" align="right">针对手机客户端访问：</td>
      <td><input type="checkbox" class="checkbox" name="goto_iphone" value="1"<?php /*echo (file_exists('addfunds.php')) ? '' : ' onclick="alert(\'此功能对商业用户开放！\');this.checked=false;"';*/ ?><?php echo (file_exists('writable/js/goiphone.js') && ($f_iphone = file_get_contents('writable/js/goiphone.js'))) ? ' checked' : ''; ?> /> 开启自动转向手机站，转向地址：<input type="text" name="goto_iphone_url" value="<?php echo preg_match('/location\.href\s*=\s*"([^\"\']*)"\s*;/i', $f_iphone, $mi)?$mi[1]:'http://';       unset($f_iphone, $mi); ?>" size="40" /><br />
（前提是你已建立了手机站。没建立？去下载一个：<a href="http://download.162100.com" target="_blank">免费版</a> <a href="http://www.162100.com/pay/for_s_2.php" target="_blank">商业版</a><br />
不可以填写当前导航网址或指向当前导航的网址，否则转向死循环，手机访问会不停刷新）</td>
    </tr>
    <tr>
      <td width="200" align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

  </table>
  <!--div class="red_err">特别提示：提交前请确定set目录具备写权限，因为要将配置结果写入writable/set/set.php文件</div-->
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200">&nbsp;</td>
      <td style="padding-top:5px;"><button type="submit" onclick="if(confirm('确定提交吗？！')){addSubmitSafe();return true;}else{return false;}" class="send2" style="border:none;">提交</button></td>
    </tr>
  </table>

</form>
