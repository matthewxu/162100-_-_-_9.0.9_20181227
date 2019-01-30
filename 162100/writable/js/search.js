


/* 象这样框着我的这种代码勿动！ */


function addRemenber(type) {
  var cookieStr;
  var reg = new RegExp('' + type + '(<a [^\\\|]+)', 'i');
  var val = (stratSearchHot[type] && typeof(stratSearchHot[type]) != 'undefined') ? stratSearchHot[type] : '';
  if (cookieStr = getCookie('searchHot')) {
    if (cookieStr = cookieStr.match(reg)) {
      val = '' + cookieStr[1] + ' <a href="javascript:void(0)" onclick="delRemenber(\'' + type + '\');return false;" style="display:inline-block !important; display:inline; zoom:1; width:13px; height:13px; line-height:14px; font-family:宋体; font-size:12px; border-radius:7px; -moz-border-radius:7px; -webkit-border-radius:7px; text-decoration:none; text-align:center;" class="s_c" title="清除">×</a>'
    }
  }

  /* search_under_ad */
var search_under_ad = '<a href="http://www.162100.com/">162100网址导航</a>';
/* /search_under_ad */

  if ($('search_hot_word') != null) {
    $('search_hot_word').innerHTML = search_under_ad + ' ' + val;
  }
};

/* search_default_bar */
var search_default_type = 'wangye';
var search_default_id = 'baidu';
/* /search_default_bar */

var searchBarO = getCookie('searchBarBody').toString();
var nowSearchBody = (searchBarO == '1' || searchBarO == '2' || searchBarO == '3') ? searchBarO : defaultBayId;
var searchSelect = {};

/* search_bar */
searchSelect = {
  'wangye': {
    0 : '搜网页',
    '360': ['http://www.haosou.com/s?ie=utf-8&q=', '360'],
    'baidu': ['https://www.baidu.com/s?ie=utf-8&wd=', '百度'],
    'Google': ['http://www.google.com.hk/search?hl=zh-CN&q=', 'Google'],
    'sougou': ['http://www.sogou.com/web?ie=utf8&query=', '搜狗'],
    'jichengsousuo': ['search.php?is=wangye&go=https%3A%2F%2Fwww.baidu.com%2Fs%3Fie%3Dutf-8%26wd%3D&kw=', '集成搜索'],
    'zhanneisousuo': ['member.php?get=search_site&kw=', '站内搜索']
  },
  'shangpin': {
    0 : '搜商品',
    'taobao': ['http://search.taobao.com/search?commend=all&source=search1&q=', '淘宝'],
    'zhuoyue': ['http://www.amazon.cn/s/?ie=utf-8&keywords=', '卓越']
  },
  'tupian': {
    0 : '搜图片',
    'Google': ['http://images.google.com.hk/images?hl=zh-CN&q=', 'Google'],
    'baidu': ['http://image.baidu.com/search/index?tn=baiduimage&word=', '百度']
  },
  'yinle': {
    0 : '搜音乐',
    'baidu': ['http://music.baidu.com/search?ie=utf-8&key=', '百度'],
    'Google': ['http://www.google.cn/music/search?q=', 'Google'],
    'sougou': ['http://d.sogou.com/music.so?ie=utf8&query=', '搜狗'],
    'yiting': ['http://so.1ting.com/all.do?q=', '一听']
  },
  'shipin': {
    0 : '搜视频',
    '56': ['http://so.56.com/all/ /?', '56'],
    'baidu': ['http://video.baidu.com/v?ie=utf-8&word=', '百度'],
    'youku': ['http://www.soku.com/search_video/q_', '优酷'],
    'ku6': ['http://so.ku6.com/search/?q=', '酷6'],
    'xinlang': ['http://so.video.sina.com.cn/s?wd=', '新浪']
  },
  'xinwen': {
    0 : '搜新闻',
    'baidu': ['http://news.baidu.com/ns?word=', '百度'],
    'Google': ['http://www.google.com.hk/search?hl=zh-CN&q=', 'Google']
  },
  'youxi': {
    0 : '搜游戏',
    '17173': ['http://search.17173.com/jsp/game.jsp?keyword=', '17173'],
    'baidu': ['http://youxi.baidu.com/search.xhtml?c=searchGame&q=', '百度'],
    '52pk': ['http://so.52pk.com/search.php?keyword=', '52pk']
  },
  'ditu': {
    0 : '搜地图',
    'Google': ['http://ditu.google.cn/maps?hl=zh-CN&q=', 'Google'],
    'baidu': ['http://ditu.baidu.com/?s=s%26wd%3D', '百度']
  }
};
/* /search_bar */

