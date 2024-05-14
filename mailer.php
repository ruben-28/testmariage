<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'envoyeurdemail@gmail.com';                     //SMTP username
    $mail->Password   = 'tkas eqsc krnu wnrb';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('envoyeurdemail@gmail.com', 'Mailer');
    $mail->addAddress('rubensbensimon@gmail.com', 'Joe User');     //Add a recipient
   // $mail->addAddress('ellen@example.com');               //Name is optional

    //Attachments
   


    $nom = $_POST ['nom'];
    $prenom = $_POST ['prenom'];
    $assisstepas = isset($_POST ['vientpas']) ? "oui" : "non";
    $assisstemairie = isset($_POST ['mairie']) ? "oui" : "non";
    $assisstehoupa = isset($_POST ['houpa']) ? "oui" : "non";
    $assisstesoiree = isset($_POST['reception']) ? "oui" : "non";
    $numofguest = $_POST['numberOfGuests'];
    $messagepourlesmariés = $_POST['messageMariés'];

    $mailbody .= "Nom : $nom\n";
    $mailbody.= "Prénom : $prenom\n";
    $mailbody.= "N'Assistera pas à la cérémonie : $assisstepas\n";
    $mailbody.= "Assistera à la cérémonie à la mairie : $assisstemairie\n";
    $mailbody.= "Assistera à la cérémonie à la houpa : $assisstehoupa\n";
    $mailbody.= "Assistera à la soirée de réception : $assisstesoiree\n";
    $mailbody.= "Nombre d'invités : $numofguest\n";
    $mailbody.= "Message pour les mariés :\n $messagepourlesmariés\n";



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $mailbody;
    $mail->AltBody = $mailbody;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


