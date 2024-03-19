<?php
require_once '../assets/plugin/twilio-php-main/src/Twilio/autoload.php';
//token y id de twilio
$sid = "AC2e553c07d66cb0989ca1ead21116d1f9";
$token = "142bb0d409f008a156280b8d8036c1d2";
$twilio = new Twilio\Rest\Client($sid, $token);


// Verificar si se recibieron los datos del formulario
if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['celular'])) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];

    // Construir el mensaje con los datos del formulario
    $mensaje_whatsapp = "Hola,una persona intenta ponerse en contacto contigo, sus datos son:\n\n";
    $mensaje_whatsapp .= "Nombre: $nombre\n";
    $mensaje_whatsapp .= "E-Mail: $email\n";
    $mensaje_whatsapp .= "Celular: $celular\n";

    try {
        // Enviar el mensaje por WhatsApp utilizando Twilio
        $message = $twilio->messages
            ->create(
                "whatsapp:+51934890639", // número de teléfono del destinatario
                array(
                    "from" => "whatsapp:+14155238886", // número de teléfono de Twilio Sandbox
                    "body" => $mensaje_whatsapp // mensaje a enviar
                )
            );

        echo "enviado"; // Devolver mensaje de éxito
    } catch (Exception $e) {
        // Manejar cualquier excepción que se produzca durante el envío del mensaje
        echo 'Error al enviar el mensaje: ' . $e->getMessage();
    }
} else {
    echo "No se recibieron datos del formulario";
}
