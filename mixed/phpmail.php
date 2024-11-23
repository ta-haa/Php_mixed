 
///Arkadaşlara şaka yapmak için kullanılabilir...
///Ama bu kodları ileri taşıyarak bir kişiye harbiden çökebilirsiniz ücretli temp mailler var onları kullanılabilir veya kendi eposta
sunucunuzu kurupda birçok insana eposta gönderebilirsiniz lakin sıkıntı şu göndereceğiniz eposta diyelim gmail veya hotmail bunların 
korumaları vardır bunun için birkaç eposta hesabı tanımlayıp hepsinden birer birer gönderebilirsiniz.
///Benim tercihim en iyisi illegal kullanmaktansa bunu legal birşekilde reklam aracı olarak kullanın alfabelerin yerlerini karıştırıcak 
epostalar oluşturup karışık hepsine sallıyorum mesela kendi sitenizin reklamını yapın.
///Bunun diğer ileri boyutu telefon numaralarına sms gönderme.

<?php 
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 
 require 'phpmailer/src/Exception.php';
 require 'phpmailer/src/PHPMailer.php';
 require 'phpmailer/src/SMTP.php';
 
 if (isset($_POST["gonder"])) {
     $name = htmlspecialchars(trim($_POST["ad"]));
     $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
     $password = trim($_POST["sifre"]);
 
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         die('Geçersiz e-posta adresi.');
     }
 
     $mail = new PHPMailer(true);
 
     try {
         $mail->isSMTP();
         $mail->Host       = 'smtp.gmail.com';
         $mail->SMTPAuth   = true;
         $mail->Username   = 'taha@edu.com';
         $mail->Password   = 'qqqweasdqweasdaweasdqwesad';
         $mail->SMTPSecure = 'tls';
         $mail->Port       = 587;
 
         $mail->setFrom('Facebook@info.com', 'Facebook');
         $mail->addAddress($email, $name);
 
         $mail->isHTML(true);
 
         $token = bin2hex(random_bytes(32));
         $teka = '@donerteka_';
         $hashed_token = password_hash($token.$teka, PASSWORD_DEFAULT);
 
         $verifyLink = "http://localhost/emailcode/verify.php?token=" . urlencode($hashed_token);
 
         $mail->Subject = "Email Verification";
         $mail->Body = "
  
             <div class='container'> 
         <p>Merhaba Taha, Facebook şifrenizi yenilemek için bir talep aldık.</p>
        <p>Şifreyi yenilemek için aşağıdaki butona basın.</p>
         <button style='margin-top: 20px;
             padding: 10px 20px;
             background-color: #007bff;
             color: white;
             border: none;
             border-radius: 5px;
             cursor: pointer;
             font-size: 16px;cursor:pointer' class='button'>Mavi Buton</button>
     </div>
         
         ";
 
         $mail->send();
 
         $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
 
         include("connect.php");
 
         $stmt = $conn->prepare("INSERT INTO email (ad, email, sifre, token) VALUES (?, ?, ?, ?)");
         $stmt->bind_param("ssss", $name, $email, $encrypted_password, $hashed_token);
 
         if (!$stmt->execute()) {
             die("Veri eklenirken bir hata oluştu: " . $stmt->error);
         }
 
         $stmt->close();
         $conn->close();
 
         echo "E-posta başarıyla gönderildi.";
     } catch (Exception $e) {
         echo "Mesaj gönderilemedi. Mailer Hatası: {$mail->ErrorInfo}";
     }
 }
 ?>
 
 <form method="POST">
 ad<input type="text" name="ad">
 email<input type="text" name="email">
 sifre<input type="text" name="sifre">
 <input type="submit" name="gonder" value="gonder">
 </form>