var blockA=new Object();
var keyC, keyPor;
var timeS=null;

if (typeof $ != 'function') {
  function $(objId) {
    return document.getElementById(objId);
  }
}

function SetOpacity(ev, v) {
	ev.style.filter = 'alpha(opacity=' + v + ')';
    ev.style.opacity = v / 100
}

function ShowN(e, obj) {
  if (enterAndLeave(e, obj)) {
	var prev = $('n_prev');
	var next = $('n_next');
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
        if ($('nowMode').value == 'N') {
		  timeS = setInterval(function(){stepN();}, 4000);
        } else {
          timeS = setInterval(function(){stepP();}, 4000);
        }
      }
	}
  }
}

function enterAndLeave(ev,obj){var E=ev||window.event;if(E.type!='mouseover'&&E.type!='mouseout'){return flase}var theTarget=null;if(E.relatedTarget){theTarget=E.relatedTarget}else{if(E.type=='mouseover'){thisTarget=E.toElement}else{thisTarget=E.fromElement}}while(theTarget&&theTarget!=obj){theTarget=theTarget.parentNode}return(theTarget!=obj)}

function stepP() {
    $('nowMode').value = 'P';
	keyC = Math.abs($('keyC').value);
	keyPor = keyC <= 0 ? blockA.length - 1 : keyC - 1;
	blockA[keyC].style.zIndex = 2;
	blockA[keyC].style.display = 'block';
    blockA[keyPor].style.zIndex = 1;
    blockA[keyPor].style.display = 'block';
	SetOpacity(blockA[keyPor], 100);
	var val = 100;
	(function() {
		var imgChange = setTimeout(arguments.callee, 20);
		SetOpacity(blockA[keyC], val);
		if (val <= 0) {
			clearTimeout(imgChange)
	        //blockA[keyPor].style.zIndex = 1;
	        blockA[keyC].style.zIndex = 0;
	        blockA[keyC].style.display = 'none';
			$('keyC').value = keyPor;
		}
		val -= 5;
	})();
}

function stepN() {
    $('nowMode').value = 'N';
	keyC = Math.abs($('keyC').value);
	keyPor = keyC >= blockA.length - 1 ? 0 : keyC + 1;
	blockA[keyC].style.zIndex = 2;
	blockA[keyC].style.display = 'block';
    blockA[keyPor].style.zIndex = 1;
    blockA[keyPor].style.display = 'block';
	SetOpacity(blockA[keyPor], 100);
	var val = 100;
	(function() {
		var imgChange = setTimeout(arguments.callee, 20);
		SetOpacity(blockA[keyC], val);
		if (val <= 0) {
			clearTimeout(imgChange)
	        //blockA[keyPor].style.zIndex = 1;
	        blockA[keyC].style.display = 'none';
	        blockA[keyC].style.zIndex = 0;
			$('keyC').value = keyPor;
		}
		val -= 5;
	})();
}

function putLoad() {
    document.body.onmouseover=function(event){
        ShowN(event, this);
    }
    keyC = 0;
    $('keyC').value = 0;
    $('nowMode').value = 'N';
	newsImgObj = $('news_imgs');


    newsImgObj.innerHTML += $('follow').innerHTML.replace(/^[\s\n\r]*<\!\-\-|\-\->[\s\n\r]*$/g, '');


	blockA = newsImgObj.getElementsByTagName('A');
	blockA[keyC].style.zIndex = 2;
	blockA[keyC].style.display = 'block';
    var imgObj0=blockA[keyC].getElementsByTagName('IMG')[0];
	ToParentHeight(imgObj0.offsetWidth, imgObj0.offsetHeight);
	if (blockA.length > 1) {
		timeS = setInterval(function(){stepN();}, 5000);
	}
}


function ToParentHeight(w, h) {
  var p = parent.$('extraFrameImg');
  if (p != null) {
    var imgW = w > 0 ? w : 228;
    var imgH = h > 0 ? h : 124;
    var pW = p.offsetWidth;
    pW = pW > 0 ? pW : 228;
    p.style.height = parseInt(imgH * pW / imgW)+'px';
  }
}

if (document.all) {
	window.attachEvent('onload', putLoad);
} else {
	window.addEventListener('load', putLoad, false);
}
