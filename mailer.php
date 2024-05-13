<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

error_reporting(E_ALL); // Afficher toutes les erreurs
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'envoyeurdemails@gmail.com';
        $mail->Password   = 'tkas eqsc krnu wnrb'; // //mbst hnsm fprf uhxd
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('invitecard.website@gmail.com', 'Mailer');
        $mail->addAddress('rubensbensimon@gmail.com', 'Joe User');

        $nom = $_POST['nom'];
        $prenom = $_POST['prénom'];
        $vientPas = isset($_POST['vientPas']) ? 'Oui' : 'Non';
        $mairie = isset($_POST['mairie']) ? 'Oui' : 'Non';
        $houpa = isset($_POST['houpa']) ? 'Oui' : 'Non';
        $reception = isset($_POST['reception']) ? 'Oui' : 'Non';
        $numberOfGuests = $_POST['numberOfGuests'];
        $messageMariés = $_POST['messageMariés'];

        $emailbody = "Nom: $nom\n";
        $emailbody .= "Prénom: $prenom\n";
        $emailbody .= "Vient pas: $vientPas\n";
        $emailbody .= "Mairie: $mairie\n";
        $emailbody .= "Houpa: $houpa\n";
        $emailbody .= "Reception: $reception\n";
        $emailbody .= "Nombre d'invités: $numberOfGuests\n";
        $emailbody .= "Message aux mariés:\n$messageMariés\n";

        $mail->Subject = 'RSVP Form Submission';
        $mail->Body    = $emailbody;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
