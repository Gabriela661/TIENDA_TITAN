<?php
session_start(); // Iniciar la sesión si no está iniciada aún

require_once '../assets/plugin/twilio-php-main/src/Twilio/autoload.php';

$sid = "AC2e553c07d66cb0989ca1ead21116d1f9";
$token = "142bb0d409f008a156280b8d8036c1d2";
$twilio = new Twilio\Rest\Client($sid, $token);

// Verificar si se recibió el número de teléfono
if (isset($_POST['telefono'])) {
    $telefono = $_POST['telefono'];
    $metodo= $_POST['metodo'];
    // Generar un código de confirmación aleatorio de 6 dígitos y convertirlo a string
    $codigo_confirmacion = strval(rand(100000, 999999));

    // Almacenar el código generado en una variable de sesión
    $_SESSION['codigo_generado'] = $codigo_confirmacion;

    // Establecer la zona horaria a Perú
    date_default_timezone_set('America/Lima');

    // Obtener la hora actual en la zona horaria de Perú
    $hora_pago = date("H:i");

    $mensaje = "Hola, te informo que se ha realizado el pago a través de $metodo con el número $telefono a las $hora_pago, proceda a verificar. El código de confirmación para enviar al cliente es $codigo_confirmacion.";

    $message = $twilio->messages
        ->create(
            "whatsapp:+51934890639", // to
            array(
                "from" => "whatsapp:+14155238886",
                "body" => $mensaje
            )
        );

    echo "Mensaje enviado"; // Devolver mensaje de éxito
}

if (isset($_POST['codigo'])) {
    $codigoIngresado = $_POST['codigo'];

    // Obtener el código generado almacenado en la variable de sesión y convertirlo a string
    $codigoGenerado = strval($_SESSION['codigo_generado']);

    if ($codigoIngresado === $codigoGenerado) {
        echo "correcto";
    } else {
        echo "incorrecto";
    }

}


