var keyC=0;
var nowMode = 'stepN();';
var KeyN, keyP; 
var timeS=null;
var stepOver=1;
var blockA = new Array();
var speed = 10;

function enterAndLeave(ev,obj){var E=ev||window.event;if(E.type!='mouseover'&&E.type!='mouseout'){return flase}var theTarget=null;if(E.relatedTarget){theTarget=E.relatedTarget}else{if(E.type=='mouseover'){thisTarget=E.toElement}else{thisTarget=E.fromElement}}while(theTarget&&theTarget!=obj){theTarget=theTarget.parentNode}return(theTarget!=obj)}

function ShowN(e, obj) {
  if (enterAndLeave(e, obj)) {
	var prev = document.getElementById('n_prev');
	var next = document.getElementById('n_next');
	if (blockA.length > 1) {
        prev.style.display = next.style.display = 'block';
    }
	if (timeS!=null) { 
      clearInterval(timeS);
      timeS=null;
    }

	obj.onmouseout = function(e) {
        if (enterAndLeave(e, this)) {
		  prev.style.display = next.style.display = 'none';
		  timeS = setInterval('' + nowMode + '', 10000);
        }
	}
  }
}


function stepP(id) {
    if (stepOver == 0) return;
	nowMode = 'stepP();';
	keyP = typeof arguments[0] != 'undefined' ? arguments[0] : (keyC <= 0 ? blockA.length - 1 : keyC - 1);
	blockA[keyC].style.display = 'block';
	blockA[keyP].style.display = 'block';
	var val = val1 = blockA[keyP].offsetHeight;
	var valH = blockA[keyC].offsetHeight;
	var speed1 = (blockA[keyP].offsetHeight - blockA[keyC].offsetHeight) * speed / val;
    blockA[keyP].style.top = '-'+blockA[keyP].offsetHeight+'px';
    stepOver=0;
	(function() {
		var imgChangeBack = setTimeout(arguments.callee, 20);
		document.getElementById('extra_more').style.height = valH+'px';
		//ToParentHeight((1+10+28+10+valH+10+1+10+386)); //底下如果有内容的高度
		ToParentHeight((1+10+28+10+valH+10+1));
		blockA[keyC].style.top = ''+(val-val1)+'px';
		blockA[keyP].style.top = ''+(-val1)+'px';
		if (val1 <= 0) {
		  clearTimeout(imgChangeBack);
	      blockA[keyC].style.display = 'none';
		  blockA[keyP].style.top = 0;
	      blockA[keyC].style.top = 0;
	      keyC = Math.abs(keyP);
		  stepOver=1;
          cIdAt(keyP);
	      document.getElementById('extra_more').style.height = val+'px';
		  ToParentHeight(document.body.offsetHeight);
		}
		val1 -= speed;
		valH=valH+speed1;
	})();
}
function stepN(id) {
    if (stepOver == 0) return;
	nowMode = 'stepN();';
	keyN = typeof arguments[0] != 'undefined' ? arguments[0] : (keyC >= blockA.length - 1 ? 0 : keyC + 1);
//alert(id+' '+keyC+' '+keyN);
	blockA[keyC].style.display = 'block';
	blockA[keyN].style.display = 'block';
var preH=blockA[keyC].offsetHeight==0?435:blockA[keyC].offsetHeight;
    blockA[keyN].style.top = ''+preH+'px';
	var val = val1 = valH = preH;
	var speed1 = (blockA[keyN].offsetHeight - blockA[keyC].offsetHeight) * speed / val;
	var endH = blockA[keyN].offsetHeight;
    stepOver=0;
	(function() {
		var imgChangeTo = setTimeout(arguments.callee, 20);
		document.getElementById('extra_more').style.height = valH+'px';
		//ToParentHeight((1+10+28+10+valH+10+1+10+386)); //底下如果有内容的高度
		ToParentHeight((1+10+28+10+valH+10+1));
		blockA[keyC].style.top = ''+(-(val-val1))+'px';
		blockA[keyN].style.top = ''+val1+'px';
		if (val1 <= 0) {
		  clearTimeout(imgChangeTo)
	      blockA[keyC].style.display = 'none';
		  blockA[keyC].style.top = 0;
	      blockA[keyN].style.top = 0;
		  keyC = Math.abs(keyN);
		  stepOver=1;
          cIdAt(keyN);
	      document.getElementById('extra_more').style.height = endH+'px';
		  ToParentHeight(document.body.offsetHeight);
		}
		val1 -= speed;
		valH=valH+speed1;
	})();
}

function cIdAt(id) {
  if (document.getElementById('block_title_is')!=null) {
    document.getElementById('block_title_is').id=document.getElementById('block_title_is').name;
  }
  try {
    document.getElementById('block_title_'+id+'').parentNode.id = 'block_title_is';
  } catch (e) {
  }
}

function atBlock(id) {
  if (stepOver == 0) return;
  if (id == keyC) return;
  try {
    clearInterval(timeS);
    timeS = null;
  } catch(e) {
  }
  if (id > keyC) {
    stepN(id);
  } else {
    stepP(id);
  }
  cIdAt(id);
}
function firstLoad() {
  blockO = document.getElementById('extra_more');
  blockO.innerHTML += document.getElementById('follow').innerHTML.replace(/^[\s\n\r]*<\!\-\-|\-\->[\s\n\r]*$/g, '');
  var blockTitles = new Array('财经/体育', '汽车/娱乐', '军事/历史', '游戏/理财', '房产/家居·文化', '时尚/旅游', '科技/国学', '手机/数码·佛教', '健康/亲子·小说', '动漫/推荐');
  var step = 0;
  //var tempA = blockO.childNodes;
  var tempA = document.getElementsByName('child_block');
  if (tempA!=null && tempA.length > 0) {
    for (var i=0; i<tempA.length; i++) {
      //if (tempA[i].nodeType == 1 && tempA[i].tagName == 'DIV') {
        blockA[step] = tempA[i].parentNode;
        if (typeof(blockTitles[step]) != 'undefined') {
          document.getElementById('block_title').innerHTML += ' <span name="block_title_' + step + '_p"'+(step==0?' id="block_title_is"':' id="block_title_' + step + '_p"')+'><a href="javascript:void(0);" id="block_title_' + step + '" onclick="atBlock(\'' + step + '\');return false;">' + blockTitles[step] + '</a></span> ';
        }
        step++;
      //}
    }
    if (blockA.length > 1) {
      document.body.onmouseover = function(event) {
        ShowN(event, this);
      }
      document.getElementById('extra_more').style.height = document.getElementById('first1').offsetHeight + 'px';
      timeS = setInterval('stepN();', 5000);
    }
  }
  ToParentHeight(document.body.offsetHeight); //1+10+28+10+305+10+1+10+底下如果有内容的高度
}

function ToParentHeight(h) {
  var p = parent.document.getElementById('extraFrameMore');
  if (p != null) {
    p.style.background = 'none';
    p.style.height = h+'px';
  }
}
if (document.all) {
	window.attachEvent('onload', firstLoad);
} else {
	window.addEventListener('load', firstLoad, false);
}
