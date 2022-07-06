<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    function enviarCorreo($datos)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'd28af12396980f';
            $mail->Password = 'f1690b24f97113';
            
            $mail->setFrom('elihuromero2@outlook.com', 'Mailer');
            $mail->addAddress('elihuromero@outlook.com', 'Elihu Romero');     //Add a recipient

            $mail->isHTML(true);
            $mail->Subject = 'Envio de datos';
            //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $message = '
                <html>
                <head>
                <title>Datos enviados en formulario</title>
                </head>
                <body>
                <p>Aqui estan tus datos enviados en el formulario:</p>
                <div>'.$datos.'</div>
                </body>
                </html>
                ';
            $mail->Body = $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return true;
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>