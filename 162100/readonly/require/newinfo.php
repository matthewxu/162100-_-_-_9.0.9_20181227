<?php

if (empty($web['newinfo_url'][0]) || empty($web['newinfo_url'][1])) {
  $web['newinfo_url'][0] = 'http://info.162100.com/get_newinfo_for162100.php';
  $web['newinfo_url'][1] = 'http://info.162100.com/write.php';
}
echo '
    <div class="column column_side">
      <div class="column_title"><a href="'.$web['newinfo_url'][1].'" class="send">我要发布</a>信 息 窗</div>
      <ul class="class" id="newinfo">载入中…</ul>
    </div>
<iframe src="PseudoXMLHTTP.php?xml_id=newinfo&xml_file='.get_en_url('readonly/run/get_newinfo.php').'" style="display:none;"></iframe>

';


?>