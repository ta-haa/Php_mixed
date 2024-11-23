<script>
function validation1()  
{
var id=document.frmkkontrol.txtksoyad.value;
var ps=document.frmkkontrol.txtkad.value;
if(id.length=="" && ps.length=="") {
alert("User Name and Password fields are empty");
return false;
}
else
{
if(id.length=="") {
alert("User Name is empty");
return false;
}
if (ps.length=="") {
alert("Password field is empty");
return false;
}
}
}
</script>
<script>
function validation2()  
{
var id=document.frmgkontrol.txtgid.value;
var ps=document.frmgkontrol.txtgad.value;
var sy=document.frmgkontrol.txtgsoyad.value;
if(id.length=="" && ps.length=="" && sy.length=="") {
alert("User Name and Password fields are empty");
return false;
}
else
{
if(id.length=="") {
alert("User Name is empty");
return false;
}
if (ps.length=="") {
alert("Password field is empty");
return false;
}
if (sy.length=="") {
alert("Surname field is empty");
return false;
}
}
}
</script>
<script>
function validation3()  
{
var id=document.frmskontrol.txtsid.value;
if(id.length=="") {
alert("İd fields are empty");
return false;
}
}

</script>

<form name="frmkkontrol" method="POST" onsubmit = "return validation1()">
ad <input type="text" name="ad" id="txtkad" require  >
soyad <input type="text" name="soyad" id="txtksoyad"  >
<input type="submit" name="kaydet" value="kaydet">
</form><br/><br/>

<form method="POST">
<input type="submit" name="txtlistele" value="listele">
</form><br/><br/>

<form method="POST" name="frmgkontrol" onsubmit = "return validation2()">
id <input type="number" name="txtid" id="txtgid">
ad <input type="text" name="txtad" id="txtgad">
soyad <input type="text" name="txtsoyad" id="txtgsoyad">
<input type="submit" name="btnguncelle" value="güncelle">
</form><br/><br/>

<form method="POST" name="frmskontrol" onsubmit = "return validation3()">
id <input type="number" name="txtidd" id="txtsid">
<input type="submit" name="btnsil" value="sil">
</form>


<br/><br/><hr style="border:3px solid red"><br/><br/>
<?php
#veri ekleme

if(isset($_POST["kaydet"]))
{
$ad=$_POST["ad"];
$soyad=$_POST["soyad"];

include("index2.php");
$sql="insert into dene (ad,soyad) values ('$ad','$soyad')";
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

?>

<?php 
#veri listeleme textbox

if(isset($_POST["txtlistele"]))
{
include("index2.php");
$sql="select * from dene";
$sonuc=mysqli_query($con,$sql);

if(mysqli_num_rows($sonuc)>0)
{
    while($satir=mysqli_fetch_array($sonuc))
    {
        echo "
    id <input type='text' value='$satir[id]'>
    Adı <input type='text' value='$satir[ad]'>
    Soyadı <input type='text' value='$satir[soyad]'><br/>
    ";
    }
}
else
{
    echo "kayıt yok";
}

mysqli_close($con);

}
?>


<?php

#veri güncelleme textbox

if(isset($_POST["btnguncelle"]))
{
include("index2.php");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$id=$_POST["txtid"];
$ad=$_POST["txtad"];
$soyad=$_POST["txtsoyad"];


$sql = "UPDATE dene SET ad='$ad' , soyad='$soyad' WHERE id=$id";

if ($con->query($sql) === TRUE) {
  echo "Kayıt Güncellendi";
} else {
  echo "HATA: " . $con->error;
}

$con->close();


}
?>


<?php
#veri silme textbox

if(isset($_POST["btnsil"]))
{
include("index2.php");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$idd=$_POST["txtidd"];

$sql = "DELETE FROM dene WHERE id=$idd";

if ($con->query($sql) === TRUE) {
  echo "Kayıt Silindi";
} else {
  echo "HATA: " . $con->error;
}

$con->close();

}
?>








