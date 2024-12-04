
<?php

/**
 * SEND MAIL
 * 
 */
function sendEmail()
{
    require_once 'captchaControllers/autoload.php';

    $secret = 'secret';

    if ($_POST) {

        $gRecaptchaResponse = $_POST['g-recaptcha-response'];

        $recaptcha = new \ReCaptcha\ReCaptcha($secret);
        $resp = $recaptcha->setExpectedHostname('wellbeingofstrays.com')
            ->verify($gRecaptchaResponse, $_SERVER['REMOTE_ADDR']);

        if ($resp->isSuccess()) {
            $to = 'wellbeingofstrays@gmail.com';
            $name = $_POST['name'];
            $from = $_POST['email'];
            $tel = isset($_POST['tel']) ? $_POST['tel'] : null;
            $object = $_POST['object'];
            $message = $_POST['message'];

            
            $headers .= "From: $from"  . "\r\n" . "Name: " . $name .  "\r\n" ."Tel: " . $tel . "\r\n";

            if (mail($to,  $object, $headers, $message)) {
                echo '<div class="modal"><p>Message envoyé !</p></div>';
            } else {
                echo '<div class="modal"><p>Une erreur s\'est produite, merci de vérifier !</p></div>';
            }
        } else {
            echo '<div class="modal"><p>Merci de remplir le captcha !</p></div>';
        }
    }
    contactPage();
}
?>
