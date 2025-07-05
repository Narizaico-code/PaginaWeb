<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $comentario = htmlspecialchars($_POST['comentario']);

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'comentariosexpokinal@gmail.com'; 
        $mail->Password   = 'kliwtazfxswwecbl'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('comentariosexpokinal@gmail.com', 'Web Expo Kinal'); 
        $mail->addAddress('comentariosexpokinal@gmail.com'); 
        $mail->addReplyTo($email, $nombre);

        $mail->isHTML(false);
        $mail->Subject = 'Nuevo comentario desde la página de Kinal';
        $mail->Body    = "Nombre: $nombre\nCorreo: $email\n\nComentario:\n$comentario";

        $mail->send();
        echo "<h2>Comentario enviado con éxito.</h2><p><a href='index.html'>Volver</a></p>";
    } catch (Exception $e) {
        echo "<h2>Error al enviar el comentario: {$mail->ErrorInfo}</h2><p><a href='index.html'>Volver</a></p>";
    }
} else {
    echo "Acceso no permitido.";
}