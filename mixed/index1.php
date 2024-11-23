<form method="POST">
<input type="text" name="ad">
<input type="text" name="soyad">
<input type="submit" name="kaydet" value="kaydet">
</form>

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

