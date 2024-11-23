<script>
//js php captcha
var time=10;
setInterval("captchatime()",1000)
function captchatime()
{
document.getElementById("yazi").innerHTML=time;
time--;
if(time==0)
{time=10;
let uniquechar = "";
 const randomchar ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (let i = 1; i < 5; i++) {
        uniquechar += randomchar.charAt(
            Math.random() * randomchar.length)
    }
 
    document.getElementById("captchadiv2").innerHTML = uniquechar;
    document.getElementById("captchadiv2").value = uniquechar;

}
}
function captcha ()
{
if(document.getElementById("captchadiv2").value==document.getElementById("txt").value)
{alert("true");
return false;
}
else
{alert("false");
return false;}
}

</script>
</head>
<body id="bodyy">

<label id="yazi" ></label>
<div id="captchadiv"></div>
<div id="captchadiv2"></div>
<div id="captchadiv3"></div>
<form onsubmit = "return captcha()">
<input type="text" id="txt">
<input id="btn" type="submit" value="tıkla">
</form>


<?php

















?>