<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Validaciones
    if (empty($name) || empty($email) || empty($message)) {
        echo "Por favor, completa todos los campos obligatorios.";
        exit;
    }
    
    // Validar email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, proporciona un correo electrónico válido.";
        exit;
    }
    
    // Procesa los datos (por ejemplo, enviar un correo electrónico)
    $destinatario = "gianfrancoferrero.e@gmail.com";
    $asunto = "Nuevo mensaje de contacto desde el formulario";
    $cuerpo = "Nombre: $name\nCorreo: $email\nMensaje:\n$message";
    $cabeceras = "From: $email";

    if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {
        echo "¡Gracias por contactarnos! Tu mensaje ha sido enviado.";
    } else {
        echo "Lo sentimos, hubo un problema al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
}
?>
