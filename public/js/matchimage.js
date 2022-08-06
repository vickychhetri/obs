'use strict';
// MatchImage - image matching webapp
// Copyright (C) 2018 by Tom Whittaker
// Free to use
// Version 1.1
var MatchImage = new function () {

  var height, width, canimg, ctxi, candraw, ctxd, images;
  var ptr, num, mydiv, xpi, ypi, cbutt, bspace = 40;
  var isDragging, xbeg, ybeg, xib, yib, xie, yie;
  var index;
  var horiz, path, randLeft, randRight;
  var sepColor = "gray";
  var lineColor = "black";
  var wrongColor = "red";
  var rightColor = "green";

  var prompt="Check my connections";

  this.go = function(imgL, imgR, divnam, opts) {
    
    mydiv = document.getElementById(divnam);
    mydiv.style.position = "relative";
    height = parseInt(mydiv.style.height,10);
    width = parseInt(mydiv.style.width,10);

    path = "";
    randLeft = true;
    randRight = true;
    horiz = false;
    
    if (opts != null) {
      var ops = opts.split(";");
      for (var i=0; i<ops.length; i++) {
        var op = ops[i].split("=");
        var ky = op[0].trim();
        if (ky == "path") {
          path = op[1].trim();
        } else if (ky == "left_random" || ky == "top_random") {
          if (op[1].trim().toLowerCase().startsWith("n")) randLeft = false;
        } else if (ky == "right_random" || ky == "bottom_random") {
          if (op[1].trim().toLowerCase().startsWith("n")) randRight = false;
        } else if (ky == "prompt" ) {
          prompt = op[1].trim();
        } else if (ky == "horizontal" ) {
          if (op[1].trim().toLowerCase().startsWith("y")) horiz = true;
        } else if (ky == "separator" ) {
          sepColor = op[1].trim();
        } else if (ky == "line_colors" ) {
          var co = op[1].split(",");
          lineColor = co[0].trim();
          wrongColor = co[1].trim();
          rightColor = co[2].trim();
        }
      }
    }

    canimg = document.createElement("canvas");
    canimg.height = height - bspace;
    canimg.width = width;
    canimg.setAttribute("style","position:absolute;top:0;left:0;z-index:0;");
    ctxi = canimg.getContext("2d");
    ctxi.font = "12pt Arial";
    mydiv.appendChild(canimg);

    candraw = document.createElement("canvas");
    candraw.height = height - bspace;
    candraw.width = width;
    candraw.setAttribute("style","position:absolute;top:0;left:0;z-index:1;");

    ctxd = candraw.getContext("2d");
    ctxd.storkeStyle = lineColor;
    ctxd.lineWidth = 3;
    mydiv.appendChild(candraw);

    var a = imgL.split(",");
    var b = imgR.split(",");

    num = a.length;
    if (horiz) {
      ypi = (height - bspace)/2;
      xpi = Math.round(width/num);
    } else {
      ypi = (height - bspace)/num;
      xpi = Math.round(width/2);
    }

    images = [];
    index = [];
    for (var k=0; k<2; k++) {
      index[k] = [];
      for (var i=0; i<num; i++) {
        index[k][i] = i;
      }
      if (k == 0 && !randLeft) continue;
      if (k == 1 && !randRight) continue;

      for (var i=num-1; i > 0; i--) {
        var r = Math.floor(Math.random() * (i+1));
        var t = index[k][i];
        index[k][i] = index[k][r];
        index[k][r] = t;
      }
    }

    var count = 0;

    for (var k=0; k<2; k++) {
      images[k] = [];
      for (var i=0; i<num; i++) {
        images[k][i] = new Image();
        images[k][i].gotit = false;
        images[k][i].seq = i;
        images[k][i].onload = function() {
          this.gotit = true;
          count++;
          if (count == 2 * num) doGo2();
        }
        images[k][i].src = (k == 0) ? path+a[index[k][i]].trim() : path+b[index[k][i]].trim();
      }
    }
  }

  function doGo2() {
   
    isDragging = false;
    var offset = 0;
    for (var k = 0; k<2; k++) {

      var spaceY = ypi - 10; // border of 5;
      var spaceX = xpi - 10;

      var y = ypi/2;
      var x = xpi/2;

      for (var i=0; i<num; i++) {

        var iW = images[k][i].width;
        var iH = images[k][i].height;
        var sW = iW;  // scaled
        var sH = iH;
        if (sW > spaceX) {
          var sf = spaceX / sW;
          sW = spaceX;
          sH = iH * sf;
        }
        if (sH > spaceY) {
          var sf = spaceY / sH;
          sH = spaceY;
          sW = sW * sf;
        }

        if (horiz) {
          images[k][i].ctrX = x
          images[k][i].ctrY = offset+ypi/2;
        } else {
          images[k][i].ctrX = offset+xpi/2;
          images[k][i].ctrY = y;
        }
        images[k][i].matchConnect = -1;

        ctxi.drawImage(images[k][i],0,0,images[k][i].width, images[k][i].height, images[k][i].ctrX - sW/2,images[k][i].ctrY-sH/2,sW,sH);

        if (horiz) {
          x = x + xpi;
        } else {
          y = y + ypi;
        }
      }
       

      offset = (horiz) ? ypi : width - xpi;  // orgin of R column
    }

    ctxi.strokeStyle = sepColor;
    ctxi.lineWidth = 2;
    ctxi.beginPath();
    if (horiz) {
      ctxi.moveTo(0, ypi);
      ctxi.lineTo(width, ypi);
    } else {
      ctxi.moveTo(width/2,0);
      ctxi.lineTo(width/2, height-bspace);
    }
    ctxi.stroke();
    var m = ctxi.measureText(prompt).width;
    cbutt = document.createElement("button");
    cbutt.innerHTML = prompt;
    cbutt.setAttribute("style", "font:"+ctxi.font+";background-color:yellow;z-index:2;position:absolute;top:"+(height-30)+"px;left:"+Math.round((width-m)/2)+"px;");
    mydiv.appendChild(cbutt);
    cbutt.addEventListener("click", function(e) {
      drawLines(true);
    }, false); 

    function drawLines(check) {
      ctxd.clearRect(0,0,candraw.width,candraw.height);
      for (var i=0;i<num; i++) {
        if (images[0][i].matchConnect != -1) {
          if (check) {
            if (index[0][i] == index[1][images[0][i].matchConnect]) {
              ctxd.strokeStyle = rightColor;
              ctxd.lineWidth = 5;
              if (ctxd.setLineDash) ctxd.setLineDash([]);
            } else {
              ctxd.strokeStyle = wrongColor;
              ctxd.lineWidth = 2;
              if (ctxd.setLineDash) ctxd.setLineDash([5,10]);
            }
          } else {
            ctxd.strokeStyle = lineColor;
            ctxd.lineWidth = 2;
            if (ctxd.setLineDash) ctxd.setLineDash([]);
          }
          ctxd.beginPath();
          ctxd.moveTo(images[0][i].ctrX, images[0][i].ctrY);
          ctxd.lineTo( images[1][images[0][i].matchConnect].ctrX, images[1][images[0][i].matchConnect].ctrY);
          ctxd.stroke();
        }
      }
    }

    ptr = new PEvs(candraw, function(e) {
      // down
      if (horiz) {
        xib = (ptr.getY() > (height/2)) ? 1 : 0;
        yib = Math.floor(ptr.getX()/xpi);
      } else {
        yib = Math.floor(ptr.getY()/ypi);
        xib = (ptr.getX() > (width/2)) ? 1 : 0;
      }
      xbeg = images[xib][yib].ctrX;
      ybeg = images[xib][yib].ctrY;

    },
    function(e) {
      // up
      if (horiz) {
        yie = Math.floor(ptr.getX()/xpi);
        xie = (ptr.getY() > (height/2)) ? 1 : 0;
      } else {
        yie = Math.floor(ptr.getY()/ypi);
        xie = (ptr.getX() > (width/2)) ? 1 : 0;
      }
      if (xie != xib) {
        if (images[xie][yie].matchConnect != -1) {
          images[1-xie][images[xie][yie].matchConnect].matchConnect = -1;
        }
        images[xib][yib].matchConnect = yie;
        images[xie][yie].matchConnect = yib;

      } else {
        if (yib == yie && !isDragging) {
          var yi = Math.floor(ptr.getY()/ypi);
          var xi = (ptr.getX() > (width/2)) ? 1 : 0;
          if (horiz) {
            yi = Math.floor(ptr.getX()/xpi);
            xi = (ptr.getY() > (height/2)) ? 1 : 0;
          }
          window.open(images[xi][yi].src, "_blank", "");
        }
      }
      isDragging = false;
      drawLines(false);

    },null,
    function(e) {
      //drag
      isDragging = true;
      if (images[xib][yib].matchConnect != -1) {
        images[1-xib][images[xib][yib].matchConnect].matchConnect = -1;
      }
      images[xib][yib].matchConnect = -1;

      drawLines(false);
      ctxd.strokeStyle = lineColor;
      ctxd.lineWidth = 2;
      if (ctxd.setLineDash) ctxd.setLineDash([]);
      var x = ptr.getX();
      var y = ptr.getY();
      ctxd.beginPath();
      ctxd.moveTo(xbeg, ybeg);
      ctxd.lineTo(x,y);
      ctxd.stroke();
    }, null, null);

  }

  return this;
};

/** @constructor */
function PEvs (ele, down, up, move, drag, click, stopped) {
  var touches, first, isTouching, isDown, downTime, upTime, durTime;
  var element, offsetLeft, offsetTop, didMove, sentStop, timer;
  var callUp, callDown, callDrag, callMove, callClick, callStopped;
  var callWheel;
  var x = 0;
  var y = 0;
  var oldX, oldY;
  var ptrID, isMulti = false, isPinch = false;;
  var dist=0, oldDist=0, dx=0,dy=0;

  var myele = ele;

  var getPosition = function(event) {
    element = event.target; 
    offsetLeft=0; 
    offsetTop=0;
    while (element) {
      offsetLeft += (element.offsetLeft - element.scrollLeft);
      offsetTop += (element.offsetTop - element.scrollTop);
      element = element.offsetParent;
    }

    x = event.pageX - offsetLeft - document.body.scrollLeft;
    y = event.pageY - offsetTop - document.body.scrollTop;
  };

  this.getX = function() { 
    return x; 
  }
  this.getY = function() { 
    return y; 
  }

  var buck = function(e) {
    e.preventDefault();
    if (e.stopImmediatePropagation) {
      e.stopImmediatePropagation();
    } else {
      e.stopPropagation();
    }
  }

  var doDown = function(e) {
    getPosition(e);
    oldX = x;
    oldY = y;
    isDown = true;
    if (callClick != null) downTime  = new Date().getTime();
    if (callDown != null) callDown(e);  // get er rolling
  }

  var doUp = function(e) {
    if (!isDown) return;
    getPosition(e);
    isDown = false;
    if (callClick != null) {
      upTime = (new Date()).getTime();
      durTime = upTime - downTime;
      if (durTime < 300) {
        callClick(e);
      } else {
        if (callUp != null) callUp(e);
      }
    } else {
      if (callUp != null) callUp(e);
    }
  }

  var doMove = function(e) {
    getPosition(e);
    if (Math.abs(x - oldX) < 5 && Math.abs(y - oldY) < 5) {
      return;
    }

    oldX = -9999;
    oldY = -9999;

    if (isDown) {
      if (callDrag != null) callDrag(e);
    } else {
      if (callMove != null) callMove(e);
    }
    if (callStopped != null) doDidMove();
  }

  this.touchDown = function(e) {
    isTouching = true;
    if (e.targetTouches.length > 1) {
      isMulti = true;
      if (callWheel) {
        oldDist = -1;
        buck(e);
      }
      return false;
    }

    touches = e.changedTouches; 
    first = touches[0];
    doDown(first);
  };

  this.touchUp = function(e) {
    if (e.targetTouches.length == 0) {
      isTouching = false;
      isMulti = false;
    }
    buck(e);
    if (isMulti || isPinch) {
      if (!isMulti) isPinch = false;
      return false;
    }
    touches = e.changedTouches; 
    first = touches[0];
    doUp(first);
  };

  this.touchMove = function(e) {
    isTouching = true;
    buck(e);

    if (isMulti) {
      if (callWheel) {
        touches = e.targetTouches;
        isPinch = true;
        dx = touches[0].pageX - touches[1].pageX;
        dy = touches[0].pageY - touches[1].pageY;
        dist = dx*dx + dy*dy;
        if (callWheel && (oldDist > 0) && ((dist-oldDist) != 0)) {
          callWheel( (dist - oldDist)>0?1:-1);
        }
        oldDist = dist;
      }
      return false;
    }

    touches = e.changedTouches;
    first = touches[0];
    doMove(first);
  };

  // begin pointerEvents
  this.pointUp = function(e) {
    buck(e);
    for (var i=0; i<ptrID.length; i++) {
      if (ptrID[i].pointerId == e.pointerId) {
        ptrID.splice(i,1);
        break;
      }
    }
    //isMulti = false;
    if (ptrID.length == 0) {
      isMulti = false;
      isTouching = false;
    }
    if (isMulti || isPinch) {
      if (!isMulti) isPinch = false;
      return false;
    }
    doUp(e);
    return false;
  }

  this.pointDown = function(e) {
    buck(e);
    ptrID.push(e);
    oldDist = -1;
    isTouching = true;
    if (ptrID.length > 1) {
      isMulti = true;
    } else {
      doDown(e);
    }
    return false;
  }

  this.pointMove = function(e) {
    buck(e);
    // update target
    for (var i=0; i<ptrID.length; i++) {
      if (ptrID[i].pointerId == e.pointerId) ptrID[i] = e;
    }
    if (!isMulti && isPinch) return;
    if (isMulti) {
      if (callWheel) {
        isPinch = true;
        dx = ptrID[0].pageX - ptrID[1].pageX;
        dy = ptrID[0].pageY - ptrID[1].pageY;
        dist = dx*dx + dy*dy;
        if (callWheel && (oldDist > 0) && (Math.abs(dist-oldDist) > 3)) {
          callWheel( (dist - oldDist)>0?1:-1);
        }
        oldDist = dist;
      }
      return false;
    }

    doMove(e);
    return false;
  }
  // end pointerEvents


  this.mouseDown = function(e) {
    if (isTouching) return;
    buck(e);
    doDown(e);
  };

  this.clearDown = function() {
    isDown = false;
  }

  this.mouseUp = function(e) {
    if (isTouching) return;
    buck(e);
    doUp(e);
  };

  this.useWheel = function(cw) {
    myele.addEventListener("wheel", this.mouseWheel, true);
    callWheel = cw;
  }

  this.mouseWheel = function(e) {
    getPosition(e);
    var delta = Math.max(-1, Math.min(1, (-e.deltaY || -e.detail)));
    buck(e);
    if (callWheel) callWheel(delta);
  };

  this.mouseClick = function(e) {
    buck(e);
    isDown = false;
  };

  this.mouseMove = function(e) {
    if (isTouching) return;
    buck(e);
    doMove(e);
  };

  this.mouseDragged = function(e) {
    if (isTouching) return;
    buck(e);
    getPosition(e);
    if (callDrag != null) callDrag(e);
    if (callStopped != null) doDidMove();
  };

  var doDidMove = function() {
    clearTimeout(timer);
    timer = setTimeout( function() {
      callStopped();
    },600 );
  }

  x = 0;
  y = 0;
  oldX = 0;
  oldY = 0;
  callDown = down;
  callUp =up;
  callMove = move;
  callDrag = drag;
  callClick = click;
  callStopped = stopped;
  isTouching = false;
  isDown = false;
  didMove = false;
  sentStop = true;
  ptrID = [];
  ele.addEventListener("mousedown",this.mouseDown,false);
  ele.addEventListener("mouseup", this.mouseUp, false);
  ele.addEventListener("mousemove",this.mouseMove, false);
  ele.addEventListener("click",this.mouseClick, false);
  if (window.PointerEvent) {
    ele.addEventListener("pointerdown",this.pointDown, false);
    ele.addEventListener("pointerup", this.pointUp, false );
    ele.addEventListener("pointermove",this.pointMove, false);
    ele.addEventListener("pointerleave", this.pointUp, false );
    ele.addEventListener("pointercancel", this.pointUp, false );
  } else {
    ele.addEventListener("touchstart",this.touchDown,false);
    ele.addEventListener("touchend",this.touchUp,false);
    ele.addEventListener("touchmove",this.touchMove,false);
    ele.addEventListener("touchleave", this.touchUp, false);
    ele.addEventListener("touchcancel", this.touchUp, false);
  }
  ele.addEventListener("contextmenu", function(e) {
    e.preventDefault();
  }, false);


  ele.style["touch-action"] = "none";

  ele.addEventListener("mouseout", function(e) {
    if (!isDown) {
      x = -1;
      y = -1;
      if (callMove != null) callMove(e); 
    }
    isDown = false;
  });

}


