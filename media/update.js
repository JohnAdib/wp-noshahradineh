var $buo = function(op,test) {
var jsv=5;
var n = window.navigator,b;
this.op=op||{};
this.op.l = op.l||n["language"]||n["userLanguage"]||document.documentElement.getAttribute("lang")||"en";
this.op.vsakt = {i:7,f:10,o:12,s:5.1,n:20};
this.op.vsdefault = {i:8,f:4,o:10.1,s:5,n:10};
this.op.vs =op.vs||this.op.vsdefault;
for (b in this.op.vsakt)
if (this.op.vs[b]>=this.op.vsakt[b])
this.op.vs[b]=this.op.vsakt[b]-0.05;
if (!op.reminder || op.reminder<0.1 )
this.op.reminder=0;
else
this.op.reminder=op.reminder||24;
this.op.onshow = op.onshow||function(o){};
this.op.url= op.url||"http://www.opera.com/download";
this.op.pageurl = op.pageurl || window.location.hostname || "unknown";
this.op.newwindow=op.newwindow||false;
this.op.test=test||op.test||false;
if (window.location.hash=="#test-bu")
this.op.test=true;
function getBrowser() {
var n,v,t,ua = navigator.userAgent;
var names={i:'اینترنت اکسپلورر',f:'فایرفاکس',o:'اپر',s:'سافاری',n:'Netscape Navigator', c:"گوگل کروم", x:"Other"};
if (/like firefox|chromeframe|seamonkey|opera mini|meego|netfront|moblin|maemo|arora|camino|flot|k-meleon|fennec|kazehakase|galeon|android|mobile|iphone|ipod|ipad|epiphany|rekonq|symbian|webos/i.test(ua)) n="x";
else if (/trident.(\d+\.\d+);/.test(ua)) n="io";
else if (/MSIE (\d+\.\d+);/.test(ua)) n="i";
else if (/Chrome.(\d+\.\d+)/i.test(ua)) n="c";
else if (/Firefox.(\d+\.\d+)/i.test(ua)) n="f";
else if (/Version.(\d+.\d+).{0,10}Safari/i.test(ua))	n="s";
else if (/Safari.(\d+)/i.test(ua)) n="so";
else if (/Opera.*Version.(\d+\.?\d+)/i.test(ua)) n="o";
else if (/Opera.(\d+\.?\d+)/i.test(ua)) n="o";
else if (/Netscape.(\d+)/i.test(ua)) n="n";
else return {n:"x",v:0,t:names[n]};
if (n=="x") return {n:"x",v:0,t:names[n]};
v=new Number(RegExp.$1);
if (n=="so") {
v=((v<100) && 1.0) || ((v<130) && 1.2) || ((v<320) && 1.3) || ((v<520) && 2.0) || ((v<524) && 3.0) || ((v<526) && 3.2) ||4.0;
n="s";
}
if (n=="i" && v==7 && window.XDomainRequest) {
v=8;
}
if (n=="io") {
n="i";
if (v>4) v=9;
else if (v>3.1) v=8;
else if (v>3) v=7;
}	return {n:n,v:v,t:names[n]+" "+v}
}
this.op.browser=getBrowser();
if (!this.op.test && (!this.op.browser || !this.op.browser.n || this.op.browser.n=="x" || this.op.browser.n=="c" || document.cookie.indexOf("browserupdateorg=pause")>-1 || this.op.browser.v>this.op.vs[this.op.browser.n]))
return;
if (!this.op.test) {
var i = new Image();
}
if (this.op.reminder>0) {
var d = new Date(new Date().getTime() +1000*3600*this.op.reminder);
document.cookie = 'browserupdateorg=pause; expires='+d.toGMTString()+'; path=/';
}
var ll=this.op.l.substr(0,2);
var languages = "en";
if (languages.indexOf(ll)!==false)
this.op.url="http://www.opera.com/download";
var tar="";
if (this.op.newwindow)
tar=' target="_blank"';
function busprintf() {
var args=arguments;
var data = args[ 0 ];
for( var k=1; k<args.length; ++k ) {
data = data.replace( /%s/, args[ k ] );
}
return data;
}
var t = 'شما با یک  غیرمدرن <b>(%s) </b>این سایت را مشاهده می نمایید. ما استفاده از <a%s>مرورگر <b>اپرا</b></a> و یا <b>فایرفاکس</b> را به شما پیشنهاد می کنیم.';
if (op.text)
t = op.text;
this.op.text=busprintf(t,this.op.browser.t,' href="'+this.op.url+'"'+tar);
var div = document.createElement("div");
this.op.div = div;
div.id="buorg";
div.className="buorg";
div.innerHTML= '<div>' + this.op.text + '<div id="buorgclose">X</div></div>';
var sheet = document.createElement("style");
var style = ".buorg {position:absolute;z-index:111111;\
width:100%; top:0px; right:0px; display:block;\
border-bottom:1px solid #A29330; \
background:#FDF2AB no-repeat 10px center url(http://www.static.evazzadeh.com/images/dialog-warning.gif);\
text-align:center; cursor:pointer; \
color:#000; font-size: 16px;}\
.buorg div { padding:5px 36px 5px 40px; } \
.buorg a,.buorg a:visited  {color:#E25600;}\
#buorgclose { position: absolute; right: .5em; top:.2em; height: 20px; width: 12px; font-weight: bold;font-size:14px; padding:0; }";
document.body.insertBefore(div,document.body.firstChild);
document.getElementsByTagName("head")[0].appendChild(sheet);
try {
sheet.innerText=style;
sheet.innerHTML=style;
}
catch(e) {
try {
sheet.styleSheet.cssText=style;
}
catch(e) {
return;
}
}
var me=this;
div.onclick=function(){
if (me.op.newwindow)
window.open(me.op.url,"_blank");
else
window.location.href=me.op.url;
return false;
};
div.getElementsByTagName("a")[0].onclick = function(e) {
var e = e || window.event;
if (e.stopPropagation) e.stopPropagation();
else e.cancelBubble = true;
return true;
}
this.op.bodymt = document.body.style.marginTop;
document.body.style.marginTop = (div.clientHeight)+"px";
document.getElementById("buorgclose").onclick = function(e) {
var e = e || window.event;
if (e.stopPropagation) e.stopPropagation();
else e.cancelBubble = true;
me.op.div.style.display="none";
document.body.style.marginTop = me.op.bodymt;
return true;
}
op.onshow(this.op);
}
var $buoop = $buoop||{};
$bu=$buo($buoop);