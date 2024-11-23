<form method="POST">
<input id="add" type="text" name="ad">
<input id="soyad" type="text" name="soyad">
<input type="submit" name="kaydet" value="kaydet" onclick="tiklaa()">
</form>

<?php
# kelime değiştirme veri ekleme korumalı veri kaydı

if(isset($_POST["kaydet"]))
{
$ad=$_POST["ad"];
$soyad=$_POST["soyad"];

function checkspecial($string) {
	if (preg_match('/[^a-zA-Z]/', $string)) {
		return false;
	} else {
		return true;
	}
} 

if(checkspecial($ad) and checkspecial($soyad) ) {
	
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
else{
	echo "Özel Karakter Hatası !";
}






}

?>

