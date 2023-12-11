
<?php
function sendEmail()
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $to = "framelelo89@gmail.com";
        $sub = "test";
        $message = "msg";

        $headers = "Content-Type: text/plain; charset=utf-8\r\n";
        $headers .= "From: wellbeingofstrays@gmail.com\r\n";

        if (mail($to, $sub, $message, $headers)) {
            echo '<div class="modal"><p>Message envoyé !</p></div>';
        } else {
            echo '<div class="modal"><p>Une erreur s\'est produite, merci de vérifier !</p></div>';
        }
    }
    contactPage();
}
?>
