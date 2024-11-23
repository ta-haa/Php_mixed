<form method="POST">
    <input type="text" name="username">
    <input type="text" name="password">
    <input type="submit" name="sha256" value="tikla">
</form>

<?php
//sha 256 ile veri ekleme işlemleri


if(isset($_POST["sha256"]))
{
    $username=$_POST["username"];
    $pass=$_POST["password"];
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

?>