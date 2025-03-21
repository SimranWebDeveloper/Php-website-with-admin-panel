<?php
require 'config/function.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Composer ile PHPMailer yüklüyse

$mail = new PHPMailer(true);

if (isset($_POST['contactSubmit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $message = $_POST['message'];
}

$host = "smtp.mail.ru";
$port = "465"; // 
$sslOrTls = "tls"; // ssl 

$setUsername = "simran.abbasov.00@mail.ru";
$setPassword = "96JsnLE6qjjH64d1ms9E";

$sendEmailAdress = "simran.abbasov.00@mail.ru";
$receiveEmailAdress = "simran.abb@div.edu.az";
$subject = "HP Sobesi";

$bodyContent = "<div>
    <h4>Name: '.$name'</h4>
    <h4>Email: '.$email'</h4>
    <h4>Phone: '.$phone'</h4>
    <h4>Service: '.$service'</h4>
    <h4>Comment/Message: '.$message'</h4>
</div>";

try {
    // SMTP ayarları
    $mail->isSMTP();
    $mail->Host       = $host;  // Mail.ru SMTP sunucusu
    $mail->SMTPAuth   = true;
    $mail->Username   = $setUsername; // Gönderen Mail.ru adresi
    $mail->Password   = $setPassword; // Mail.ru uygulama şifresi
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Güvenli bağlantı (SSL)
    $mail->Port       = $port; // Mail.ru için SSL portu

    // Gönderen ve alıcı bilgileri
    $mail->setFrom($sendEmailAdress, 'PasaBank Ailesi');
    $mail->addAddress($receiveEmailAdress, 'Alıcı Adı');
    $mail->addReplyTo($email, $name);

    // İçerik
    $mail->isHTML(true);
    $mail->Subject = 'HP Sobesi';
    $mail->Body    = $bodyContent;
    $mail->AltBody = 'Burada Alt Body yazmisim.';

    // Gönder
    $result = $mail->send();
    if ($result) {
        redirect('contact-us.php', 'Thank you for contacting us. We will get back to you asap');
    } else {
        redirect('contact-us.php', 'Something Went Wrong');
    }
} catch (Exception $e) {
    redirect('contact-us.php', 'Something Went Wrong: ' . $mail->ErrorInfo);
}
