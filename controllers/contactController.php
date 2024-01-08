
<?php

function sendEmail()
{
    require_once 'captchaControllers/autoload.php';

    $secret = '6LdCN0opAAAAALwmhWXAZTjjktNbIwHoDNUc752F';

    if ($_POST) {
        
        $gRecaptchaResponse = $_POST['g-recaptcha-response'];

        $recaptcha = new \ReCaptcha\ReCaptcha($secret);
        $resp = $recaptcha->setExpectedHostname('localhost')
                        ->verify($gRecaptchaResponse, $_SERVER['REMOTE_ADDR']);

        if ($resp->isSuccess()) {
            $to = 'wellbeingofstrays@gmail.com';
            $from = $_POST['email'];
            $tel = isset($_POST['tel']) ? $_POST['tel'] : null;
            $object = $_POST['object'];
            $message = $_POST['message'];

            $headers = "Content-Type: text/plain; charset=utf-8\r\n";
            $headers .= "From: $from\r\n";

            if (mail($to, $from, $message, $headers)) {
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
