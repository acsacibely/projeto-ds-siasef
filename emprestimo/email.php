<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/vendor/autoload.php';

            $mail = new PHPMailer(true);

            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'cibellyacsa@gmail.com';                     //SMTP username
                $mail->Password   = 'sdobpwsaahwmbnrg';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('cibellyacsa@gmail.com', 'SIASEF');
                $mail->addAddress($emailDisc, 'Discente');     //Add a recipient
                //$mail->addAddress('ellen@example.com');               //Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                
                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                $mail->addAttachment('../img/logo-h-green.png', 'Logo SIASEF');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'SIASEF | COMPROVANTE DE EMPRÉSTIMO';
                $body = '<h1> SIASEF | Registro de Empréstimo </h1>
                <h2>Dados do material</h2>
                <p>Nome: '. $nome . '</p>
                <p>Quantidade: '. $qntdInformada . '</p>
                <p>Estado: '. $estado . '</p>
                <p>Categoria: '. $categoria . '</p>
                <hr>
                <h2>Dados do discente</h2>
                <p>Nome: ' . $nomeDisc . '</p>
                <p>Matrícula: '. $matriDisc . '</p>
                <h2>Dados do responsável</h2>
                <p>Responsável: '. $nomeRespon . '</p>
                <p>Matrícula: '. $matriRespon . '</p>
                <hr>
                <p>Data de empréstimo: '. date('d/m/Y', strtotime($dataEmprestimo)) . '</p>
                <p>Data de devolução prevista: '. date('d/m/Y', strtotime($dataDevol)) . ' </p>
                <hr>
    
                '; 
                $mail->Body    = $body;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo '<script>alert("E-mail enviado com sucesso!")</script>';
                
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }



?>