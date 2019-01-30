


function changeTV(obj, player, channel, w, h) {
  w = !arguments[3] ? 560 : w;
  h = !arguments[4] ? 420 : h;

  var leshi = '<iframe id="channeliframe" name="channeliframe" width="540" height="540" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" src="http://sports.letv.com/zt/hzsports262/index.html?streamid='+channel+'&alsc=x0" name="runtime" id="runtime"></iframe>';
  var live = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="file=http://live.64ma.com/livePlay.asp?sohuId='+channel+'&type=video&streamer=&autostart=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  
  var live1 = '<iframe src="writable/__web__/js/hdplayer.html?channel='+channel+'" frameborder="0" scrolling="No" width="'+w+'" height="'+h+'"></iframe>';
  var live2 = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="file=http://qqlive.dnion.com:1863/'+channel+'.flv&type=video&streamer=&autostart=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  var live3 = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="file=http://116.213.146.71:554/'+channel+'&type=video&streamer=&autostart=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  var live4 = '<iframe src="http://tvbar.uusee.com/uusee/2011/player2.html?guid={'+channel+'}&stype=0&uuid=baidu" frameborder="0" scrolling="No" width="540" height="540"></iframe>';
  var live5 = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="streamer=rtmp://live.cnlive.com:1935/live/&file='+channel+'&type=video&autostart=true&controlbar=bottom&caption=false&fullscreen=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  var live6 = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="streamer=rtmp://114.112.58.107:1935/live/&file='+channel+'&type=video&autostart=true&controlbar=bottom&caption=false&fullscreen=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  var live7 = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="streamer=rtmp://114.112.58.107:1936/live/&file='+channel+'&type=video&autostart=true&controlbar=bottom&caption=false&fullscreen=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  var pp = '<iframe id="TVFrime" name="TVFrime" width="600" height="540" frameborder="0" marginwidth="0" marginheight="0" scrolling="No" allowtransparency="true" src="http://app.aplus.pptv.com/tgapp/baidu/live/main?s_param='+channel+'"></iframe>';
  //var uu = '<iframe id="TVFrime" name="TVFrime" width="800" height="540" frameborder="0" marginwidth="0" marginheight="0" scrolling="No" allowtransparency="true" src="http://player.uusee.com/apps/baidu/index.html?keyword='+channel+'"></iframe>';
  var flv2 = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="streamer='+channel+'&file=flv2&type=video&autostart=true&controlbar=bottom&caption=false;fullscreen=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  var flv3 = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="streamer='+channel+'&file=livestream&type=video&autostart=true&controlbar=bottom&caption=false&fullscreen=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  //浙江
  var zj = '<iframe width="540" height="550" frameborder="0" marginwidth="0" marginheight="0" scrolling="No" allowtransparency="true" src="'+channel+'"></iframe>';
  //重庆
  var chongqingtv = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="streamer=rtmp://live5.cqnews.net:1935/live&file='+channel+'&type=video&autostart=true&controlbar=bottom&caption=false&" allowfullscreen="true" allowscriptaccess="always"></embed>';
  var flvsmg = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="streamer=http://edgews.yicai.com/channels/'+channel+'/400.flv/live&file=livestream&type=video&autostart=true&controlbar=bottom&caption=false&fullscreen=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  var flvsmg1 = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="streamer=http://live-cdn2.smgbb.tv/channels/'+channel+'/400.flv/live&file=livestream&type=video&autostart=true&controlbar=bottom&caption=false&fullscreen=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  var flvsmg2 = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="streamer=http://cnwf01tve001cdn.smgbb.tv/channels/'+channel+'/400.flv/live&file=livestream&type=video&autostart=true&controlbar=bottom&caption=false&fullscreen=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  var flvsmg3 = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="streamer=http://live-cdn1.smgbb.tv/channels/bbtv/'+channel+'/flv:sd/live&file=livestream&type=video&autostart=true&controlbar=bottom&caption=false&fullscreen=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  //var live9 = "";
  var shanghaibeiyong = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="streamer=http://live-cdn.smgbb.tv/channels/'+channel+'/64.flv/live&file=livestream&type=video&autostart=true&controlbar=bottom&caption=false&fullscreen=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  //深圳卫视
  var sztv = '<iframe src="http://www.s1979.com/flashapp/cutv_fms_player.swf?flvPath='+channel+'" frameborder="0" scrolling="no" width="540" height="540"></iframe>';
  //广西卫视
  var gxtv = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="streamer=http://221.7.192.194:5000/nn_live.flv?id='+channel+'&file=livestream&type=video&autostart=true&controlbar=bottom&caption=false&fullscreen=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  //山东卫视
  var sdtv = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="streamer=rtmp://112.231.23.27:554/live&file='+channel+'&type=video&autostart=true&controlbar=bottom&caption=false&" allowfullscreen="true" allowscriptaccess="always"></embed>';
  //
  var wasu2 = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="file='+channel+'&type=video&streamer=rtmp://livertmp1.wasu.cn/live&autostart=true" allowfullscreen="true" allowscriptaccess="always"></embed>';
  var wasutiyu = '<embed width="540" height="540" src="writable/__web__/js/player.swf" type="application/x-shockwave-flash" flashvars="streamer=http://livehttp.wasu.cn:18080/'+channel+'.flv&file=livestream&type=video&autostart=true&controlbar=bottom&caption=false&" allowfullscreen="true" allowscriptaccess="always"></embed>';

  if ($('now_tv_is') != null) {
    $('now_tv_is').id = '';
    obj.id = 'now_tv_is';
  }
  $('now_tv').innerHTML = eval(player);
}
