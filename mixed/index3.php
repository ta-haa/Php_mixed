<form method="POST">
<input type="submit" name="txtlistele" value="listele">
</form

<?php 
#veri listeleme

if(isset($_POST["txtlistele"]))
{
include("index2.php");
$sql="select * from dene";
$sonuc=mysqli_query($con,$sql);

if(mysqli_num_rows($sonuc)>0)    
{
    while($satir=mysqli_fetch_array($sonuc))
    {
        echo $satir["id"]."--".$satir["ad"]."--".$satir["soyad"]."--"."<br>";
    }
}
else
{
    echo "kayıt yok";
}
mysqli_close($con);

}

?>