
<?php
function sendEmail() {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $to = "framelelo89@gmail.com";
$sub = "test";
$message = "msg";

$headers = "Content-Type: text/plain; charset=utf-8\r\n";  // Fixing the typo and setting the correct Content-Type header
$headers .= "From: wellbeingofstrays@gmail.com\r\n";  // Using .= to append the "From" header

if (mail($to, $sub, $message, $headers)) {
    echo '<div class="modal"><p>Bravo</p></div>';
} else {
    echo '<div class="modal"><p>Une erreur s\'est produite</p></div>';
}}
    contactPage();
}
?>
