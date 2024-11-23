<script src='https://www.google.com/recaptcha/api.js'>

//uye giris //////////////////////////////icindekiler sha256 select , captcha , validation , özel karakter , 
//değişkenleri düzelt
//değişkenleri düzelt
//değişkenleri düzelt

</script>
<script type="text/javascript">
function get_action() {
var v = grecaptcha.getResponse();
console.log("Resp" + v);
if (v == '') {
document.getElementById('lgncaptcha').innerHTML = "Robot Olmadığınızı Doğrulayın";
return false;
}
else {




var id=document.lgnfrmkkontrol.lgntxtksoyad.value;
var ps=document.lgnfrmkkontrol.lgntxtkad.value;
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
<form id="lgnform" name="lgnfrmkkontrol" method="POST" onsubmit = "return get_action()">
<div class="g-recaptcha" data-sitekey="6LeKyT8UAAAAAKXlohEII1NafSXGYPnpC_F0-RBS"></div>
<br>
ad <input type="text" name="lgnad" id="lgntxtkad" require  >
soyad <input type="text" name="lgnsoyad" id="lgntxtksoyad"  >
<input type="submit" name="lgnkaydet" value="kaydet">

<div id="lgncaptcha"></div>
</form>

<br/><br/>

<br/><br/><hr style="border:3px solid red"><br/><br/>
<?php
#uye girisi

if(isset($_POST["lgnkaydet"]))
{

    include('index2.php');  
    $username = $_POST['lgnad'];
    $password = $_POST['lgnsoyad'];

    $salt      = '@teka_';
    $hashed    = hash('sha256', $password . $salt);

      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $hashed = stripcslashes($hashed);  
        $username = mysqli_real_escape_string($con, $username);  
        $hashed = mysqli_real_escape_string($con, $hashed);  
      
        $sql = "select *from dene where ad = '$username' and soyad = '$hashed'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }   


}


?>











