<?php
function contactPage()
{

    // Set title and page name
    $title = 'Bien-être animal - île Maurice';
    $page = 'contact';

    // Start buffer
    ob_start() ?>
    <h2>Nous Contacter</h2>
    <div class="container">
        <div class="img-container">
            <img class="img-fluid" loading="lazy" src="uploads/Quennie.jpeg" alt="Adopter un animal à Maurice">
        </div>
        <!-- Contact form -->
        <form method="post">
            <input type="text" placeholder="Nom *" name="name" id="name" required>
            <input type="email" placeholder="Email *" name="email" id="email" required>
            <input type="tel" placeholder="Téléphone" name="tel" id="tel">

            <input type="text" placeholder="Objet *" name="object" id="object" required>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Ecrire un message *" required></textarea>

            <!-- Recaptcha -->
            <div class="g-recaptcha-container">
                <div class="g-recaptcha" data-theme='dark' data-sitekey="6LdCN0opAAAAAI2-4ul6sQFGmtjlFV934baHXzKv"></div>
            </div>

            <button class="button" name="submit" type='submit'>ENVOYER <i class="fa fa-arrow-right"></i>
            </button>
        </form>
    </div>
<?php

    // End buffer and display it through layout.php with the variable $content
    $content = ob_get_clean();
    require "layout.php";
}
?>