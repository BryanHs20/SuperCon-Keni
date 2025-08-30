<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Carga automática con Composer

// reCAPTCHA Secret Key
$secretKey = '6Ld53bMrAAAAAPkwnQKR1KwEwgnBFUgVApLJ0Aa8';

// Toma el reCAPTCHA response
$recaptchaResponse = $_POST['g-recaptcha-response'];
// Checa si el reCAPTCHA respondido esta vacio
if (empty($recaptchaResponse)) {
    echo json_encode(["success" => false, "message" => "Error: reCAPTCHA incompleto"]);
    exit();
}
// Verify the reCAPTCHA response
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = [
    'secret' => $secretKey,
    'response' => $recaptchaResponse,
    'remoteip' => $_SERVER['REMOTE_ADDR']
];

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$response = json_decode($result, true);

// Check if the reCAPTCHA verification was successful
if ($response['success'] == true) {
    // reCAPTCHA is valid, proceed with sending the email
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];

    try {
        $mail = new PHPMailer(true); // Inicializa PHPMailer

        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com'; // Tu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'contactos@supervision-construccion-keni.com'; // Tu correo
        $mail->Password = 'SCkeni1354$'; // Contraseña de aplicación
        $mail->SMTPSecure = 'tls'; // Seguridad TLS
        $mail->Port = 587;

        // Configuración del correo
        $contacto = $nombre . " " . $apellido;
        $mail->setFrom('contactos@supervision-construccion-keni.com', 'Correo de contacto KENI'); //Cambiar al correo del hosting
        $mail->addAddress('superconkeni@gmail.com'); // Cambiar al correo del cliente
        $mail->Subject = "Nuevo mensaje de contacto: $contacto";

        // Set HTML
        $mail->isHTML(true);

        // HTML Email Template
        $mail->Body = <<<HTML
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Nuevo mensaje de contacto</title>
        </head>
        <body style="margin:0; padding:0; background-color:#f4f4f4; font-family:Arial, sans-serif;">

            <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4;">
                <tr>
                    <td align="center">
                        <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border:1px solid #ddd; border-radius:8px; overflow:hidden; margin:40px auto; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
                            
                            <!-- Encabezado -->
                            <tr>
                                <td style="background-color:#007bff; color:#ffffff; padding:30px 20px; text-align:center;">
                                    <h1 style="margin:0; font-size:24px;">📩 Nuevo mensaje de contacto</h1>
                                </td>
                            </tr>

                            <!-- Contenido -->
                            <tr>
                                <td style="padding:30px 20px; color:#333333;">
                                    <p style="margin:0 0 15px;"><strong>Nombre:</strong> {$nombre}</p>
                                    <p style="margin:0 0 15px;"><strong>Apellido(s):</strong> {$apellido}</p>
                                    <p style="margin:0 0 15px;"><strong>Email:</strong> {$email}</p>
                                    <p style="margin:0 0 15px;"><strong>Teléfono:</strong> {$telefono}</p>
                                    <p style="margin:0 0 15px;"><strong>Mensaje:</strong><br><span style="display:inline-block; margin-top:5px;">{$mensaje}</span></p>
                                </td>
                            </tr>

                            <!-- Pie de página -->
                            <tr>
                                <td style="background-color:#f0f0f0; padding:20px; text-align:center; font-size:14px; color:#666;">
                                    Gracias por contactarnos. Te responderemos lo antes posible.
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>

        </body>
        </html>
        HTML;

        // Enviar el correo
        $mail->send();

        echo json_encode(["success" => true, "message" => "Correo enviado correctamente"]);
    } catch (Exception $e) {
        // Enviar respuesta de error como JSON
        echo json_encode(["success" => false, "message" => "Error al enviar el correo", "error" => $mail->ErrorInfo]);
    }
} else {
    // reCAPTCHA is invalid, handle the error
    echo json_encode(["success" => false, "message" => "Error: reCAPTCHA inválido"]);
}
exit(); // Asegúrate de salir después de imprimir el JSON

?>