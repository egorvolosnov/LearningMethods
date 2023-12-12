<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

function sendEmail($to, $subject, $body) {
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->isHTML(true);

    $mail->setFrom('info@a0894011.xsph.ru');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $body;

    return $mail->send();
}

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->isHTML(true);

$mail->setFrom('info@a0894011.xsph.ru');
$mail->addAddress('learningmethods@a0894011.xsph.ru');
$mail->Subject = 'Форма от клиента';
$body = '<h1>Встречайте письмо!</h1>';
if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Имя: </strong>'.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))){
    $body.= '<p><strong>E-mail:</strong>'.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['message']))){
    $body.= '<p><strong>Идея:</strong>'.$_POST['message'].'</p>';
}
$mail->Body = $body;


if(!$mail->send()){
    $messageAdmin = 'Ошибка';
}else{
    $messageAdmin = 'Данные отправлены!';
}

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $to = $_POST['email'];
    $subjectClient = 'Спасибо за отправку данных!';
    $bodyClient = 'Благодарим вас за отправку данных. Мы свяжемся с вами в ближайшее время.';
    sendEmail($to, $subjectClient, $bodyClient);
}

$response = ['message' => $messageAdmin];

header('Content-type: application/json');
echo json_encode($response);
?>