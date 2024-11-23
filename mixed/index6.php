<form method="POST">
<input type="text" name="ad" >
<input type="text" name="soyad">
<input type="submit" name="login" value="Giris">
</form>


<?php      
// şifreli login giriş doğrulama 
 

if(isset($_POST["login"]))
{

    include('index2.php');  
    $username = $_POST['ad'];
    $password = $_POST['soyad'];

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


