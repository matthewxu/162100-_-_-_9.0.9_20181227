var referrerTop={
};


var referrerLinkText = '';
for(var http in referrerTop){
  referrerLinkText += '<a href="'+http+'">'+referrerTop[http]+'</a> ';
}
if (referrerLinkText != '') {
  document.write(referrerLinkText);
} else {
  document.write(' <span style="color:#999999;">暂无友情来路链接</span>');
}
/**/
(function(){
function addReferrerLink(){
  var rf=document.referrer.toString();
  if(rf!='' && rf.indexOf(location.hostname)==-1){
    //rf=rf.replace(/^([^\/]+\:\/\/)?([^\/]+)(\/.*)?$/i, 'http://$2');
    var url='';
    var num=50; //保留条数
    if(referrerTop[rf]!=undefined && referrerTop[rf]){
      for(var i in referrerTop){
        break;
      }
      if(i!=undefined && i!=rf){
        url+='&url='+encodeURIComponent(rf)+'&o=0';
      }
    }else{
      url+='&url='+encodeURIComponent(rf)+'&o=1';
    }
    if(url!=''){
      if($('addRFrame')==null){
        var s=document.createElement('IFRAME');
        s.id='addRFrame';
        s.style.display='none';
        document.body.appendChild(s);
      }
      $('addRFrame').src='member.php?post=write_referrerfriedlink'+url+'&num='+num+'';
    }
  }
}

if(document.all){
  window.attachEvent('onload',addReferrerLink);
}else{
  window.addEventListener('load',addReferrerLink,false);
}
})();