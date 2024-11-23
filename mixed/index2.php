<?php
$con=mysqli_connect("localhost","root","","deneme");
$con->query("SET CHARACTER SET utf8");
$con->query("set names 'utf8'");
if(!$con)
{
    echo "bağlantı hatası".mysqli_connect_error();
}


?>