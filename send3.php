<?php

require 'PHPMailer/PHPMailerAutoload.php';

//Create an instance; passing `true` enables exceptions


//if(isset($_POST['send'])){

   // $to = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['message'];

    $mail = new PHPMailer;

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'your email';                     //SMTP username
    $mail->Password   = 'your password';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('your email');
   // $mail->addAddress($to);     //Add a recipient
   // $mail->addAddress('ellen@example.com');               //Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mysql = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($mysql, 'emailstore');
    $result = mysqli_query($mysql, 'SELECT Email FROM emailids');

    foreach ($result as $row) {
        try {
            $mail->addAddress($row['Email']);
        } catch (Exception $e) {
            echo 'Invalid address skipped: ' . htmlspecialchars($row['Email']) . '<br>';
            continue;
        }

        try {
            $mail->send();
            //echo "message sent";
            header("Location: bulkmail.php");
            //Mark it as sent in the DB
        } catch (Exception $e) {
            echo 'Mailer Error (' . htmlspecialchars($row['Email']) . ') ' . $mail->ErrorInfo . '<br>';
            //Reset the connection to abort sending this message
            //The loop will continue trying to send to the rest of the list
            $mail->getSMTPInstance()->reset();
        }
        //Clear all addresses and attachments for the next iteration
        $mail->clearAddresses();
        //$mail->clearAttachments();
    }
//}
