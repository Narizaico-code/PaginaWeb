<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $comentario = htmlspecialchars($_POST['comentario']);

    $destinatario = "comentariosexpokinal@gmail.com";
    $asunto = "Nuevo comentario desde la página de Kinal";
    $mensaje = "Nombre: $nombre\nCorreo: $email\n\nComentario:\n$comentario";

    $cabeceras = "From: $email";

    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        echo "<h2>Comentario enviado con éxito.</h2><p><a href='comentarios.html'>Volver</a></p>";
    } else {
        echo "<h2>Error al enviar el comentario.</h2><p><a href='comentarios.html'>Volver</a></p>";
    }
} else {
    echo "Acceso no permitido.";
}
?>