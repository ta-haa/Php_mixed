<script src='https://www.google.com/recaptcha/api.js'>

//uye olma //////////////////////////////icindekiler sha256 insert , captcha , validation , özel karakter ,
//değişkenleri düzelt
//değişkenleri düzelt
//değişkenleri düzelt

</script>
<script type="text/javascript">
function get_action() {
var v = grecaptcha.getResponse();
console.log("Resp" + v);
if (v == '') {
document.getElementById('sgncaptcha').innerHTML = "Robot Olmadığınızı Doğrulayın";
return false;
}
else {




var id=document.sgnfrmkkontrol.sgntxtksoyad.value;
var ps=document.sgnfrmkkontrol.sgntxtkad.value;
if(id.length=="" && ps.length=="") 
{
alert("User Name and Password fields are empty");
return false;
}
else
{
if(id.length=="") {
alert("Password is empty");
return false;
}
if (ps.length=="") {
alert("Username field is empty");
return false;
}
}

return true;
}
}
</script>

<body>
<form id="sgnform" name="sgnfrmkkontrol" method="POST" onsubmit = "return get_action()">
<div class="g-recaptcha" data-sitekey="6LeKyT8UAAAAAKXlohEII1NafSXGYPnpC_F0-RBS"></div>
<br>
ad <input type="text" name="sgnad" id="sgntxtkad" require  >
soyad <input type="text" name="sgnsoyad" id="sgntxtksoyad"  >
<input type="submit" name="sgnkaydet" value="kaydet">

<div id="sgncaptcha"></div>
</form>

<br/><br/>

<br/><br/><hr style="border:3px solid red"><br/><br/>
<?php
#veri ekleme

if(isset($_POST["sgnkaydet"]))
{
    



function checkspecial($string) {
	if (preg_match('/[^a-zA-Z0-9]/', $string)) {
		return false;
	} else {
		return true;
	}
} 

$username=$_POST["sgnad"];
    $pass=$_POST["sgnsoyad"];
    

if(checkspecial($username) and checkspecial($pass) ) {
	
  $salt      = '@teka_';
  $hashed    = hash('sha256', $pass . $salt);

    include("index2.php");
    $sql="insert into dene (ad,soyad) values ('$username','$hashed')";
    if(mysqli_query($con,$sql))
    {
        echo "yeni kayıt";
    }
    else
    {
    echo "hata".mysqli_error();
    }
    mysqli_close($con);

}
else{
	echo "Özel Karakter Hatası !";
}


}


?>











