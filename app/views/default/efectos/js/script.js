// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by WOW Slider 8.7
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
jQuery.extend(jQuery.easing,{easeInOutQuart:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f+a}return -h/2*((f-=2)*f*f*f-2)+a}});function ws_turn(d,a,b){var f=jQuery;var h=f(this);var c=f("li",b);var e=f(".ws_list",b);var g=f("<div>").addClass("ws_effect ws_turn").css({position:"absolute",top:0,left:0,width:"100%",height:"100%",overflow:"hidden",perspective:500}).appendTo(b);this.go=function(q,l){var s=b.height();var j=b.width();var k={left:["0% 50%",{rotateY:90,translate:[0,0,0.1]},{left:-j}],right:["100% 50%",{rotateY:-90,translate:[0,0,0.1]},{left:j}],up:["50% 0%",{rotateX:-90,translate:[0,0,0.1]},{top:-s}],down:["50% 100%",{rotateX:90,translate:[0,0,0.1]},{top:s}]}[d.direction||["left","right","down","up"][Math.floor(Math.random()*4)]];var i=f("<div>").css({position:"absolute",left:0,top:0,width:"100%",height:"100%",overflow:"hidden",transformOrigin:k[0],transformStyle:"preserve-3d",outline:"1px solid transparent",zIndex:5}).append(f(a.get(q)).clone()),r=f("<div>").css({position:"absolute",left:0,top:0,width:"100%",height:"100%",overflow:"hidden",background:"#000",zIndex:4}).append(f(a.get(l)).clone());g.css({perspectiveOrigin:k[0]});if(d.responsive<3){i.find("img").css("width","100%");r.find("img").css("width","100%")}r.appendTo(g);i.appendTo(g);e.stop(true,true).hide().css({left:-q+"00%"});var p=k[2];var o={top:0,left:0};var n={opacity:1};var m={opacity:0.2};if(d.support.transform){p=k[1];o={rotateX:0,rotateY:0,translate:[0,0,0]}}wowAnimate(i,p,o,d.duration,"easeInOutQuart",function(){h.trigger("effectEnd");i.remove();r.remove()});wowAnimate(r.find("img"),n,m,d.duration,"easeInOutQuart")}};// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by WOW Slider 8.7
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
jQuery.extend(jQuery.easing,{easeInOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}if((f/=h/2)<1){return i/2*(f*f*(((g*=(1.525))+1)*f-g))+a}return i/2*((f-=2)*f*(((g*=(1.525))+1)*f+g)+2)+a}});function ws_cube_over(m,k,b){var e=jQuery,j=e(this),a=/WOW Slider/g.test(navigator.userAgent),g=e(".ws_list",b),c=m.perspective||/MSIE|Trident/g.test(navigator.userAgent)?1000:2000,d={position:"absolute",backgroundSize:"cover",left:0,top:0,width:"100%",height:"100%",backfaceVisibility:"hidden"};var l=/AppleWebKit/.test(navigator.userAgent)&&!/Chrome/.test(navigator.userAgent);var i=e("<div>").css(d).css({transformStyle:"preserve-3d",perspective:(l&&!a?"none":c),zIndex:8});e("<div>").addClass("ws_effect ws_cube_over").css(d).append(i).appendTo(b);if(!m.support.transform&&m.fallback){return new m.fallback(m,k,b)}var h;this.go=function(y,u){var q=e(k[u]);q={width:q.width(),height:q.height(),marginTop:parseFloat(q.css("marginTop")),marginLeft:parseFloat(q.css("marginLeft"))};function p(C,G,F,H){C.parent().css("perspective",c);var D=C.width(),E=C.height();wowAnimate(C,{scale:1,translate:[0,0,(l&&!a)?F:0]},{scale:0.85,translate:[0,0,(l&&!a)?F:0]},m.duration*0.4,"easeInOutBack",function(){wowAnimate(C,{scale:0.85,translate:[0,0,(l&&!a)?F:0]},{scale:1,translate:[0,0,(l&&!a)?F:0]},m.duration*0.4,m.duration-m.duration*0.8,"easeInOutBack",H)});wowAnimate(G.front.item,{rotateY:0,rotateX:0},{rotateY:G.front.rotateY,rotateX:G.front.rotateX},m.duration,"easeInOutBack");wowAnimate(G.back.item,{rotateY:G.back.rotateY,rotateX:G.back.rotateX},{rotateY:0,rotateX:0},m.duration,"easeInOutBack");wowAnimate(G.side.item,{rotateY:G.side.rotateY,rotateX:G.side.rotateX},{rotateY:-G.side.rotateY,rotateX:-G.side.rotateX},m.duration,"easeInOutBack")}if(m.support.transform&&m.support.perspective){if(h){h.stop()}var A=b.width(),v=b.height();var t={left:[A/2,0,0,180,0,-180],right:[A/2,0,0,-180,0,180],down:[v/2,-v/2,180,0,-180,0],up:[v/2,v/2,-180,0,180,0]}[m.direction||["left","right","down","up"][Math.floor(Math.random()*4)]];var B=e("<img>").css(q),s=e("<img>").css(q).attr("src",k.get(y).src);var n=e("<div>").css({overflow:"hidden",transformOrigin:"50% 50% -"+t[0]+"px"}).css(d).append(B).appendTo(i);var o=e("<div>").css({overflow:"hidden",transformOrigin:"50% 50% -"+t[0]+"px"}).css(d).append(s).appendTo(i);var z=e('<div class="ws_cube_side">').css({transformOrigin:"50% 50% -"+t[0]+"px",background:m.staticColor?"":f(s[0],{exclude:["0,0,0","255,255,255"]})}).css(d).appendTo(i);B.on("load",function(){g.hide()});B.attr("src",k.get(u).src).load();i.parent().show();h=new p(i,{front:{item:n,rotateY:t[5],rotateX:t[4]},back:{item:o,rotateY:t[3],rotateX:t[2]},side:{item:z,rotateY:t[3]/2,rotateX:t[2]/2}},-t[0],function(){j.trigger("effectEnd");i.empty().parent().hide();h=0})}else{i.css({position:"absolute",display:"none",zIndex:2,width:"100%",height:"100%"});i.stop(1,1);var r=(!!((y-u+1)%k.length)^m.revers?"left":"right");var n=e("<div>").css({position:"absolute",left:"0%",right:"auto",top:0,width:"100%",height:"100%"}).css(r,0).append(e(k[u]).clone().css({width:100*q.width/b.width()+"%",height:100*q.height/b.height()+"%",marginLeft:100*q.marginLeft/b.width()+"%"})).appendTo(i);var x=e("<div>").css({position:"absolute",left:"100%",right:"auto",top:0,width:"0%",height:"100%"}).append(e(k[y]).clone().css({width:100*q.width/b.width()+"%",height:100*q.height/b.height()+"%",marginLeft:100*q.marginLeft/b.width()+"%"})).appendTo(i);i.css({left:"auto",right:"auto",top:0}).css(r,0).show();i.show();g.hide();x.animate({width:"100%",left:0},m.duration,"easeInOutExpo",function(){e(this).remove()});n.animate({width:0},m.duration,"easeInOutExpo",function(){j.trigger("effectEnd");i.empty().hide()})}};function f(x,o){o=o||{};var z=1,r=o.exclude||[],w;var t=document.createElement("canvas"),q=t.getContext("2d"),p=t.width=x.naturalWidth,D=t.height=x.naturalHeight;q.drawImage(x,0,0,x.naturalWidth,x.naturalHeight);try{w=q.getImageData(o.x?o.x:0,o.y?o.y:0,o.w?o.w:x.width,o.h?o.h:x.height)["data"]}catch(y){console.log("error:unable to access image data: "+y);return"#ccc"}var s=(o.w?o.w:x.width*o.h?o.h:x.height)||w.length,u={},B="",A=[],n={dominant:{name:"",count:0}};var v=0;while(v<s){A[0]=w[v];A[1]=w[v+1];A[2]=w[v+2];B=A.join(",");if(B in u){u[B]=u[B]+1}else{u[B]=1}if(r.indexOf(["rgb(",B,")"].join(""))===-1){var C=u[B];if(C>n.dominant.count){n.dominant.name=B;n.dominant.count=C}}v+=z*4}return["rgb(",n.dominant.name,")"].join("")}};// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by WOW Slider 8.7
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
jQuery.extend(jQuery.easing,{easeOutBack2:function(f,g,e,j,i){var h=(g/=i)*g;var a=h*g;return e+j*(5*a*h+-15*h*h+19*a+-14*h+6*g)},easeOutCubic:function(e,f,a,h,g){return h*((f=f/g-1)*f*f+1)+a},easeInCubic:function(e,f,a,h,g){return h*(f/=g)*f*f+a}});function ws_tv(m,i,b){var d=jQuery;var g=d(this);var k=m.noCanvas||!document.createElement("canvas").getContext;var j=m.width,e=m.height;var f=d("<div>").css({position:"absolute",top:0,left:0,width:"100%",height:"100%",overflow:"hidden"}).addClass("ws_effect ws_tv").appendTo(b);if(!k){var c=d("<canvas>").css({position:"absolute",left:0,top:0,width:"100%",height:"100%"}).appendTo(f);var l=c.get(0).getContext("2d")}function a(n,h,o){return n+(h-n)*o}this.go=function(h,o){if(k){b.find(".ws_list").css("transform","translate3d(0,0,0)").stop(true).animate({left:(h?-h+"00%":(/Safari/.test(navigator.userAgent)?"0%":0))},m.duration,"easeInOutExpo",function(){g.trigger("effectEnd")})}else{j=b.width();e=b.height();c.attr({width:j,height:e});var n=d(i.get(h)).clone().css({opacity:0,zIndex:2,maxHeight:"none"}).appendTo(f);wowAnimate(function(p){l.clearRect(0,0,j,e);var r=j;if(p>=0.95){r*=1-(p-0.95)/(1-0.95)}l.fillStyle="#111";l.fillRect(0,0,j,e);var q=l.createLinearGradient(0,p*e/2,0,e-p*e/2);q.addColorStop(0,"#111");q.addColorStop(a(0,0.5,p),"#fff");q.addColorStop(0.5,"#fff");q.addColorStop(a(1,0.5,p),"#fff");q.addColorStop(1,"#111");l.fillStyle=q;l.fillRect((j-r)/2,p*e/2,r,e*(1-p))},0,1,m.duration*0.3,"easeOutCubic",function(){wowAnimate(n,{scale:[0.9,0],opacity:0.5},{scale:[1,1],opacity:1},m.duration*0.3,m.duration*0.4,"easeOutBack2",function(){b.find(".ws_list").css({left:(h?-h+"00%":(/Safari/.test(navigator.userAgent)?"0%":0))});g.trigger("effectEnd");setTimeout(function(){l.fillStyle="#111";l.clearRect(0,0,j,e);n.remove()},1)})})}}};// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by WOW Slider 8.7
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
function ws_bubbles(b,l,n){var e=jQuery;var f=e(this);var i=b.noCanvas||!document.createElement("canvas").getContext;var k=b.width,p=b.height;var g=e("<div>").css({position:"absolute",top:0,left:0,width:"100%",height:"100%",overflow:"hidden"}).addClass("ws_effect ws_bubbles").appendTo(n);if(!i){var a=e("<canvas>").css({position:"absolute",left:0,top:0,width:"100%",height:"100%"}).appendTo(g);var o=a.get(0).getContext("2d")}var j={easeOutBack:function(u,v,h,z,y,w){if(w==undefined){w=1.70158}return z*((v=v/y-1)*v*((w+1)*v+w)+1)+h},easeOutBackCubic:function(u,v,h,A,z,w){var y=(v/=z)*v;return h+A*(-1.5*y*v*y+2*y*y+4*y*v+-9*y+5.5*v)},easeOutCubic:function(u,v,h,y,w){return y*((v=v/w-1)*v*v+1)+h},easeOutExpo:function(u,v,h,y,w){return(v==w)?h+y:y*(-Math.pow(2,-10*v/w)+1)+h}};var s=[["#bbbbbb",0.5,0.5],["#b3b3b3",0.2,0.2],["#b6b6b6",0.5,0.2],["#b9b9b9",0.8,0.2],["#cccccc",0.2,0.8],["#c3c3c3",0.5,0.8],["#c6c6c6",0.8,0.8]];var c=[[[0.5,0.5,0.7,0.15],[0.5,0.5,0.6,0.3],[0.5,0.5,0.5,0.45],[0.5,0.5,0.4,0.6],[0.5,0.5,0.3,0.75],[0.5,0.5,0.2,0.9],[0.5,0.5,0.1,1]],[[0.5,0.5,0.7,1],[0.5,0.5,0.6,0.9],[0.5,0.5,0.5,0.75],[0.5,0.5,0.4,0.6],[0.5,0.5,0.3,0.45],[0.5,0.5,0.2,0.3],[0.5,0.5,0.1,0.15]]];var m=[[[0.5,0.5,0,1],[0.5,0.5,0,0.9],[0.5,0.5,0,0.75],[0.5,0.5,0,0.6],[0.5,0.5,0,0.45],[0.5,0.5,0,0.3],[0.5,0.5,0,0.15]],[[0.5,0.5,0,0.15],[0.5,0.5,0,0.3],[0.5,0.5,0,0.45],[0.5,0.5,0,0.6],[0.5,0.5,0,0.75],[0.5,0.5,0,0.9],[0.5,0.5,0,1]],[[0.5,7.5,0.7,0.75],[0.5,7.5,0.6,0.15],[0.5,7.5,0.5,1],[0.5,7.5,0.4,0.3],[0.5,7.5,0.3,0.45],[0.5,7.5,0.2,0.6],[0.5,7.5,0.1,0.9]],[[0.5,7.5,0.7,1],[0.5,7.5,0.6,0.9],[0.5,7.5,0.5,0.75],[0.5,7.5,0.4,0.6],[0.5,7.5,0.3,0.45],[0.5,7.5,0.2,0.3],[0.5,7.5,0.1,0.15]]];function d(u){if(Object.prototype.toString.call(u)==="[object Array]"){return u[Math.floor(Math.random()*(u.length))]}else{var h;var t=0;for(var v in u){if(Math.random()<1/++t){h=v}}return/linear|swing/g.test(h)?d(u):h}}function q(B,A,v,z,t){B.clearRect(0,0,k,p);for(var u=0,y=v.length;u<y;u++){var h=Math.max(0,Math.min(1,A-v[u][3]*(1-A)));if(t&&j[t]){h=j[t](1,h,0,1,1,1)}var w=k;if(k/p<=1.8&&k/p>0.7){w*=2}else{if(k/p<=0.7){w=p*2}}var x=v[u][2]*h*w;if(z){x=(v[u][2]+(z[u][2]-v[u][2])*h)*w}x=Math.max(0,x);B.beginPath();B.arc((v[u][0]+((z?z[u][0]:0.5)-v[u][0])*h)*k,(v[u][1]+((z?z[u][1]:0.5)-v[u][1])*h)*p,x,0,2*Math.PI,false);B.fillStyle=s[u][0];B.fill()}}this.go=function(B,w){if(i){n.find(".ws_list").css("transform","translate3d(0,0,0)").stop(true).animate({left:(B?-B+"00%":(/Safari/.test(navigator.userAgent)?"0%":0))},b.duration,"easeInOutExpo",function(){f.trigger("effectEnd")})}else{k=n.width();p=n.height();a.attr({width:k,height:p});var z=l.get(w);for(var x=0,A=s.length;x<A;x++){var u=Math.abs(s[x][1]),h=Math.abs(s[x][2]);s[x][0]=r(z,{x:u*k,y:h*p,w:2,h:2})||s[x][0]}var t=d(c);var v=d(m);var y=d(j);wowAnimate(function(C){q(o,C,t,0,y)},0,1,b.duration/2,function(){n.find(".ws_list").css({left:(B?-B+"00%":(/Safari/.test(navigator.userAgent)?"0%":0))});y=d(j);wowAnimate(function(C){q(o,1-C,v,t,y)},0,1,b.duration/2,function(){o.clearRect(0,0,k,p);f.trigger("effectEnd")})})}};function r(C,t){t=t||{};var E=1,w=t.exclude||[],B;var y=document.createElement("canvas"),v=y.getContext("2d"),u=y.width=C.naturalWidth,I=y.height=C.naturalHeight;v.drawImage(C,0,0,C.naturalWidth,C.naturalHeight);try{B=v.getImageData(t.x?t.x:0,t.y?t.y:0,t.w?t.w:C.width,t.h?t.h:C.height)["data"]}catch(D){return false}var x=(t.w?t.w:C.width*t.h?t.h:C.height)||B.length,z={},G="",F=[],h={dominant:{name:"",count:0}};var A=0;while(A<x){F[0]=B[A];F[1]=B[A+1];F[2]=B[A+2];G=F.join(",");if(G in z){z[G]=z[G]+1}else{z[G]=1}if(w.indexOf(["rgb(",G,")"].join(""))===-1){var H=z[G];if(H>h.dominant.count){h.dominant.name=G;h.dominant.count=H}}A+=E*4}return["rgb(",h.dominant.name,")"].join("")}};// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by WOW Slider 8.7
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
jQuery.extend(jQuery.easing,{easeOutBackCubic:function(e,f,a,j,i,g){var h=(f/=i)*f;return a+j*(-1.5*h*f*h+2*h*h+4*h*f+-9*h+5.5*f)}});function ws_dribbles(p,k,a){var e=jQuery;var j=e(this);var n=p.noCanvas||!document.createElement("canvas").getContext;var m=p.width,f=p.height;var i=e("<div>").css({position:"absolute",top:0,left:0,width:"100%",height:"100%",overflow:"hidden"}).addClass("ws_effect ws_dribbles").appendTo(a);if(!n){var c=e("<canvas>").css({position:"absolute",left:0,top:0,width:"100%",height:"100%"}).appendTo(i);var o=c.get(0).getContext("2d")}var l=[["#bbbbbb",0.1,0.3,0.18],["#b3b3b3",0.9,0.8,0.15],["#b6b6b6",0.68,0.4,0.2],["#b9b9b9",0.25,0.4,0.15],["#cccccc",0.11,0.7,0.15],["#c3c3c3",0.18,0.1,0.15],["#c6c6c6",0.4,0.2,0.15],["#c9c9c9",0.55,-0.04,0.18],["#d3d3d3",0,0.95,0.13],["#d6d6d6",0.5,0.8,0.22],["#d9d9d9",0.9,0.1,0.18],["#eeeeee",0.3,0.9,0.18],["#e3e3e3",0.93,0.5,0.14],["#e6e6e6",0.7,0.9,0.15]];var d=[[[0.1,0.3,0,1],[0.9,0.8,0.15,0.85],[0.68,0.4,0,0.9],[0.25,0.4,0.21,0.79],[0.11,0.7,0.3,0.7],[0.18,0.1,0.45,0.55],[0.4,0.2,0,0.75],[0.55,-0.04,0.48,0.52],[0,0.95,0.21,0.79],[0.5,0.8,0.1,0.9],[0.9,0.1,0.25,0.75],[0.3,0.9,0.18,0.82],[0.93,0.5,0.4,0.6],[0.7,0.9,0.13,0.87]],[[-0.3,-0.2,0.06,1],[-0.1,-0.3,0.12,1],[-0.2,-0.5,0,1],[-0.1,-0.3,0.24,1],[-0.3,-0.4,0.4,1],[-0.5,-0.1,0.76,1],[-0.2,-0.1,0.62,1],[-0.3,-0.3,0.48,1],[-0.4,-0.1,0.05,1],[-0.5,-0.2,0.6,1],[-0.3,-0.25,0.75,1],[-0.1,-0.4,0.3,1],[-0.2,-0.35,0.95,1],[-0.15,-0.25,0.2,1]],[[1.3,1.2,0.06,1],[1.1,1.3,0.12,1],[1.2,1.5,0,1],[1.1,1.3,0.24,1],[1.3,1.4,0.4,1],[1.5,1.1,0.76,1],[1.2,1.1,0.62,1],[1.3,1.3,0.48,1],[1.4,1.1,0.05,1],[1.5,1.2,0.6,1],[1.3,1.25,0.75,1],[1.1,1.4,0.3,1],[1.2,1.35,0.95,1],[1.15,1.25,0.2,1]],[[0.1,1.3,0,1],[0.9,1.34,0.15,0.85],[0.68,1.23,0,0.9],[0.25,1.5,0.21,0.79],[0.11,1.2,0.3,0.7],[0.18,1.4,0.16,0.84],[0.4,1.17,0,0.75],[0.55,1.2,0,0.52],[0,1.5,0.21,0.79],[0.5,1.45,0,0.9],[0.9,1.34,0.25,0.75],[0.3,1.6,0.18,0.82],[0.93,1.2,0.09,0.91],[0.7,1.15,0.13,0.87]],[[0.1,-0.3,0,1],[0.9,-0.34,0.15,0.85],[0.68,-0.23,0,0.9],[0.25,-0.5,0.21,0.79],[0.11,-0.2,0.3,0.7],[0.18,-0.4,0.16,0.84],[0.4,-0.17,0,0.75],[0.55,-0.2,0,0.52],[0,-0.5,0.21,0.79],[0.5,-0.45,0,0.9],[0.9,-0.34,0.25,0.75],[0.3,-0.6,0.18,0.82],[0.93,-0.2,0.09,0.91],[0.7,-0.15,0.13,0.87]],[[-0.2,-0.1,0,1],[1.3,1.1,0.15,0.85],[0.48,1.4,0,0.9],[1.2,1.6,0.21,0.79],[1.11,-0.15,0.3,0.7],[0.28,1.3,0.16,0.84],[-0.1,-0.4,0,0.75],[0.15,1.3,0,0.52],[-0.5,0.85,0.21,0.79],[-0.2,0.7,0,0.9],[1.4,0.2,0.25,0.75],[1.1,1.5,0.18,0.82],[-0.43,-0.2,0.09,0.91],[0.7,1.5,0.13,0.87]]];function b(y,w,t,q){y.clearRect(0,0,m,f);for(var r=0,v=t.length;r<v;r++){var s=2-t[r][3];var x=t[r][2]*(1-w);var h=Math.max(0,Math.min(1,w*s-x));if(q&&e.easing[q]){h=e.easing[q](1,h,0,1,1,1)}var u=m;if(m/f<=1.8&&m/f>0.7){u*=2}else{if(m/f<=0.7){u=f*2}}y.beginPath();y.arc((t[r][0]+(l[r][1]-t[r][0])*h)*m,(t[r][1]+(l[r][2]-t[r][1])*h)*f,l[r][3]*h*u,0,2*Math.PI,false);y.fillStyle=l[r][0];y.fill()}}this.go=function(x,s){if(n){a.find(".ws_list").css("transform","translate3d(0,0,0)").stop(true).animate({left:(x?-x+"00%":(/Safari/.test(navigator.userAgent)?"0%":0))},p.duration,"easeInOutExpo",function(){j.trigger("effectEnd")})}else{m=a.width();f=a.height();var u=Math.floor(Math.random()*(d.length));var y=d[u];var r=d[Math.floor(Math.random()*(d.length))];c.attr({width:m,height:f});var v=k.get(u==0?s:x);for(var t=0,w=l.length;t<w;t++){var q=Math.abs(l[t][1]),h=Math.abs(l[t][2]);l[t][0]=g(v,{x:q*m,y:h*f,w:2,h:2})||l[t][0]}wowAnimate(function(z){b(o,z,y,"easeOutBackCubic")},0,1,p.duration/2,function(){a.find(".ws_list").css({left:(x?-x+"00%":(/Safari/.test(navigator.userAgent)?"0%":0))});wowAnimate(function(z){b(o,1-z,r,"easeOutBackCubic")},0,1,p.duration/2,function(){o.clearRect(0,0,m,f);j.trigger("effectEnd")})})}};function g(z,q){q=q||{};var B=1,t=q.exclude||[],y;var v=document.createElement("canvas"),s=v.getContext("2d"),r=v.width=z.naturalWidth,F=v.height=z.naturalHeight;s.drawImage(z,0,0,z.naturalWidth,z.naturalHeight);try{y=s.getImageData(q.x?q.x:0,q.y?q.y:0,q.w?q.w:z.width,q.h?q.h:z.height)["data"]}catch(A){return false}var u=(q.w?q.w:z.width*q.h?q.h:z.height)||y.length,w={},D="",C=[],h={dominant:{name:"",count:0}};var x=0;while(x<u){C[0]=y[x];C[1]=y[x+1];C[2]=y[x+2];D=C.join(",");if(D in w){w[D]=w[D]+1}else{w[D]=1}if(t.indexOf(["rgb(",D,")"].join(""))===-1){var E=w[D];if(E>h.dominant.count){h.dominant.name=D;h.dominant.count=E}}x+=B*4}return["rgb(",h.dominant.name,")"].join("")}};// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by WOW Slider 8.7
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
function ws_glass_parallax(d,l,m){var f=jQuery;var i=f(this);var j=d.parallax||0.25;var k=f("<div>").css({position:"absolute",display:"none",top:0,left:0,width:"100%",height:"100%",overflow:"hidden"}).addClass("ws_effect ws_glass_parallax").appendTo(m);var h=!d.noCanvas&&!window.opera&&!!document.createElement("canvas").getContext;if(h){try{document.createElement("canvas").getContext("2d").getImageData(0,0,1,1)}catch(q){h=0}}function t(e){return Math.round(e*1000)/1000}var u=f("<div>").css({position:"absolute",left:0,top:0,overflow:"hidden",width:"100%",height:"100%",transform:"translate3d(0,0,0)",zIndex:1}).appendTo(k);var s=u.clone().appendTo(k);var r=u.clone().css({width:"20%"}).appendTo(k);var c;var p=u.clone().appendTo(k).css({zIndex:0});this.go=function(C,A,x){var e=f(l.get(A));e={position:"absolute",width:e.width(),height:e.height(),marginTop:e.css("marginTop"),marginLeft:e.css("marginLeft")};x=x?1:-1;var E=f(l.get(A)).clone().css(e).appendTo(u);var z=f(l.get(C)).clone().css(e).appendTo(s);var v=f(l.get(C)).clone().css(e).appendTo(r);if(x==-1){r.css({left:"auto",right:0});v.css({left:"auto",right:0})}else{r.css({left:0,right:"auto"});v.css({left:0,right:"auto"})}var D=(m.width()||d.width)*1.3;var B=m.height()||d.height;var y;if(h){if(!c){c=f("<canvas>").css({position:"absolute",left:0,top:0}).attr({width:e.width,height:e.height}).appendTo(p)}c.css(e).attr({width:e.width,height:e.height});y=o(f(l.get(C)),e,10,c.get(0))}if(!h||!y){h=0}wowAnimate(function(G){G=f.easing.swing(G);var L=t(x*G*D),F=t(x*(-D+G*D-(1-G)*D*0.2)),J=t(x*(-D*1.4+G*(D*1.4+D/1.3))),w=t(-x*D*j*G),H=t(x*D*j*(1-G)),I=t(-x*D*(j+0.2)*G),K=t(x*(-D*0.2+G*D*0.4));if(d.support.transform){u.css("transform","translate3d("+L+"px,0,0)");E.css("transform","translate3d("+w+"px,0,0)");s.css("transform","translate3d("+F+"px,0,0)");z.css("transform","translate3d("+H+"px,0,0)");r.css("transform","translate3d("+J+"px,0,0)");v.css("transform","scale(1.6) translate3d("+I+"px,0,0)");p.css("transform","translate3d("+K+"px,0,0)")}else{u.css("left",L);E.css("margin-left",w);s.css("left",F);z.css("margin-left",H);r.css("left",J);v.css("margin-left",I);p.css("left",K)}},0,1,d.duration,function(){k.hide();E.remove();z.remove();v.remove();i.trigger("effectEnd")})};function o(C,A,B,v){var F=(parseInt(C.parent().css("z-index"))||0)+1;if(h){var I=v.getContext("2d");I.drawImage(C.get(0),0,0,A.width,A.height);if(!a(I,0,0,v.width,v.height,B)){return 0}return f(v)}var J=f("<div></div>").css({position:"absolute","z-index":F,left:0,top:0}).css(A).appendTo(v);var H=(Math.sqrt(5)+1)/2;var w=1-H/2;for(var z=0;w*z<B;z++){var D=Math.PI*H*z;var e=(w*z+1);var G=e*Math.cos(D);var E=e*Math.sin(D);f(document.createElement("img")).attr("src",C.attr("src")).css({opacity:1/(z/1.8+1),position:"absolute","z-index":F,left:Math.round(G)+"px",top:Math.round(E)+"px",width:"100%",height:"100%"}).appendTo(J)}return J}var g=[512,512,456,512,328,456,335,512,405,328,271,456,388,335,292,512,454,405,364,328,298,271,496,456,420,388,360,335,312,292,273,512,482,454,428,405,383,364,345,328,312,298,284,271,259,496,475,456,437,420,404,388,374,360,347,335,323,312,302,292,282,273,265,512,497,482,468,454,441,428,417,405,394,383,373,364,354,345,337,328,320,312,305,298,291,284,278,271,265,259,507,496,485,475,465,456,446,437,428,420,412,404,396,388,381,374,367,360,354,347,341,335,329,323,318,312,307,302,297,292,287,282,278,273,269,265,261,512,505,497,489,482,475,468,461,454,447,441,435,428,422,417,411,405,399,394,389,383,378,373,368,364,359,354,350,345,341,337,332,328,324,320,316,312,309,305,301,298,294,291,287,284,281,278,274,271,268,265,262,259,257,507,501,496,491,485,480,475,470,465,460,456,451,446,442,437,433,428,424,420,416,412,408,404,400,396,392,388,385,381,377,374,370,367,363,360,357,354,350,347,344,341,338,335,332,329,326,323,320,318,315,312,310,307,304,302,299,297,294,292,289,287,285,282,280,278,275,273,271,269,267,265,263,261,259];var n=[9,11,12,13,13,14,14,15,15,15,15,16,16,16,16,17,17,17,17,17,17,17,18,18,18,18,18,18,18,18,18,19,19,19,19,19,19,19,19,19,19,19,19,19,19,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24];function a(am,U,S,v,w,ad){if(isNaN(ad)||ad<1){return}ad|=0;var ah;try{ah=am.getImageData(U,S,v,w)}catch(al){console.log("error:unable to access image data: "+al);return false}var C=ah.data;var ab,aa,aj,ag,J,M,G,A,B,R,H,T,P,X,ac,K,F,L,N,W;var ak=ad+ad+1;var Y=v<<2;var I=v-1;var af=w-1;var E=ad+1;var ae=E*(E+1)/2;var V=new b();var Q=V;for(aj=1;aj<ak;aj++){Q=Q.next=new b();if(aj==E){var D=Q}}Q.next=V;var ai=null;var Z=null;G=M=0;var O=g[ad];var z=n[ad];for(aa=0;aa<w;aa++){X=ac=K=A=B=R=0;H=E*(F=C[M]);T=E*(L=C[M+1]);P=E*(N=C[M+2]);A+=ae*F;B+=ae*L;R+=ae*N;Q=V;for(aj=0;aj<E;aj++){Q.r=F;Q.g=L;Q.b=N;Q=Q.next}for(aj=1;aj<E;aj++){ag=M+((I<aj?I:aj)<<2);A+=(Q.r=(F=C[ag]))*(W=E-aj);B+=(Q.g=(L=C[ag+1]))*W;R+=(Q.b=(N=C[ag+2]))*W;X+=F;ac+=L;K+=N;Q=Q.next}ai=V;Z=D;for(ab=0;ab<v;ab++){C[M]=(A*O)>>z;C[M+1]=(B*O)>>z;C[M+2]=(R*O)>>z;A-=H;B-=T;R-=P;H-=ai.r;T-=ai.g;P-=ai.b;ag=(G+((ag=ab+ad+1)<I?ag:I))<<2;X+=(ai.r=C[ag]);ac+=(ai.g=C[ag+1]);K+=(ai.b=C[ag+2]);A+=X;B+=ac;R+=K;ai=ai.next;H+=(F=Z.r);T+=(L=Z.g);P+=(N=Z.b);X-=F;ac-=L;K-=N;Z=Z.next;M+=4}G+=v}for(ab=0;ab<v;ab++){ac=K=X=B=R=A=0;M=ab<<2;H=E*(F=C[M]);T=E*(L=C[M+1]);P=E*(N=C[M+2]);A+=ae*F;B+=ae*L;R+=ae*N;Q=V;for(aj=0;aj<E;aj++){Q.r=F;Q.g=L;Q.b=N;Q=Q.next}J=v;for(aj=1;aj<=ad;aj++){M=(J+ab)<<2;A+=(Q.r=(F=C[M]))*(W=E-aj);B+=(Q.g=(L=C[M+1]))*W;R+=(Q.b=(N=C[M+2]))*W;X+=F;ac+=L;K+=N;Q=Q.next;if(aj<af){J+=v}}M=ab;ai=V;Z=D;for(aa=0;aa<w;aa++){ag=M<<2;C[ag]=(A*O)>>z;C[ag+1]=(B*O)>>z;C[ag+2]=(R*O)>>z;A-=H;B-=T;R-=P;H-=ai.r;T-=ai.g;P-=ai.b;ag=(ab+(((ag=aa+E)<af?ag:af)*v))<<2;A+=(X+=(ai.r=C[ag]));B+=(ac+=(ai.g=C[ag+1]));R+=(K+=(ai.b=C[ag+2]));ai=ai.next;H+=(F=Z.r);T+=(L=Z.g);P+=(N=Z.b);X-=F;ac-=L;K-=N;Z=Z.next;M+=v}}am.putImageData(ah,U,S);return true}function b(){this.r=0;this.g=0;this.b=0;this.a=0;this.next=null}};// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by WOW Slider 8.7
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
jQuery.extend(jQuery.easing,{easeInOutSine:function(j,i,b,c,d){return -c/2*(Math.cos(Math.PI*i/d)-1)+b}});function ws_domino(m,i,k){$=jQuery;var h=$(this);var c=m.columns||5,l=m.rows||2,d=m.centerRow||2,g=m.centerColumn||2;var f=$("<div>").addClass("ws_effect ws_domino").css({position:"absolute",width:"100%",height:"100%",top:0,overflow:"hidden"}).appendTo(k);var b=$("<div>").addClass("ws_zoom").appendTo(f);var j=$("<div>").addClass("ws_parts").appendTo(f);var e=k.find(".ws_list");var a;this.go=function(y,x){function z(){j.find("img").stop(1,1);j.empty();b.empty();a=0}z();var s=$(i.get(x));s={width:s.width(),height:s.height(),marginTop:parseFloat(s.css("marginTop")),marginLeft:parseFloat(s.css("marginLeft"))};var D=$(i.get(x)).clone().appendTo(b).css({position:"absolute",top:0,left:0}).css(s);var p=f.width();var o=f.height();var w=Math.floor(p/c);var v=Math.floor(o/l);var t=p-w*(c-1);var E=o-v*(l-1);function I(L,K){return Math.random()*(K-L+1)+L}e.hide();var u=[];for(var C=0;C<l;C++){u[C]=[];for(var B=0;B<c;B++){var q=m.duration*(1-Math.abs((d*g-C*B)/(2*l*c)));var F=B<c-1?w:t;var n=C<l-1?v:E;u[C][B]=$("<div>").css({width:F,height:n,position:"absolute",top:C*v,left:B*w,overflow:"hidden"});var H=I(C-2,C+2);var G=I(B-2,B+2);u[C][B].appendTo(j);var J=$(i.get(y)).clone().appendTo(u[C][B]).css(s);var A={top:-H*v,left:-G*w,opacity:0};var r={top:-C*v,left:-B*w,opacity:1};if(m.support.transform&&m.support.transition){A.translate=[A.left,A.top,0];r.translate=[r.left,r.top,0];delete A.top;delete A.left;delete r.top;delete r.left}wowAnimate(J.css({position:"absolute"}),A,r,q,"easeInOutSine",function(){a++;if(a==l*c){z();e.stop(1,1);h.trigger("effectEnd")}})}}wowAnimate(D,{scale:1},{scale:1.6},m.duration,m.duration*0.2,"easeInOutSine")}};// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by WOW Slider 8.7
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
function ws_stack(d,a,b){var e=jQuery;var g=e(this);var c=e("li",b);var f=e("<div>").addClass("ws_effect ws_stack").css({position:"absolute",top:0,left:0,width:"100%",height:"100%",overflow:"hidden"}).appendTo(b);this.go=function(q,j,i){var k=(d.revers?1:-1)*b.width();c.each(function(s){if(i&&s!=j){this.style.zIndex=(Math.max(0,this.style.zIndex-1))}});var p=e(".ws_list",b);var h=e("<div>").css({position:"absolute",left:0,top:0,width:"100%",height:"100%",overflow:"hidden",zIndex:4}).append(e(a.get(i?q:j)).clone()),r=e("<div>").css({position:"absolute",left:0,top:0,width:"100%",height:"100%",overflow:"hidden",zIndex:4}).append(e(a.get(i?j:q)).clone());if(d.responsive<3){h.find("img").css("width","100%");r.find("img").css("width","100%")}if(i){r.appendTo(f);h.appendTo(f)}else{h.insertAfter(p);r.insertAfter(p)}if(!i){p.stop(true,true).hide().css({left:-q+"00%"});if(d.fadeOut){p.fadeIn(d.duration)}else{p.show()}}else{if(d.fadeOut){p.fadeOut(d.duration)}}var o={left:i?k:0};var m={left:i?0:-k*0.5};var n={left:i?0:k};var l={left:(i?1:0)*b.width()*0.5};if(d.support.transform){o={translate:[o.left,0,0]};m={translate:[m.left,0,0]};n={translate:[n.left,0,0]};l={translate:[l.left,0,0]}}wowAnimate(h,o,n,d.duration,d.duration*(i?0:0.1),"easeInOutExpo",function(){g.trigger("effectEnd");h.remove();r.remove()});wowAnimate(r,m,l,d.duration,d.duration*(i?0.1:0),"easeInOutExpo")}};// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by WOW Slider 8.7
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
jQuery("#wowslider-container1").wowSlider({effect:"turn,cube_over,tv,bubbles,dribbles,glass_parallax,domino,stack",prev:"",next:"",duration:20*100,delay:20*100,width:960,height:630,autoPlay:true,autoPlayVideo:false,playPause:true,stopOnHover:false,loop:false,bullets:1,caption:true,captionEffect:"parallax",controls:true,controlsThumb:false,responsive:2,fullScreen:false,gestures:2,onBeforeStep:0,images:0});