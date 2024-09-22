<?php
function showLoginPage()
{

    // Set title and page name
    $title = 'Aide aux animaux';
    $page =  'connexion';

    // Start buffer
    ob_start() ?>
    <div class="login-page">
        <div class="container">
            <form method="post">
                <h2>Connexion</h2>
                <input type="email" placeholder="Email" name="email" id="login-id">
                <input type="password" placeholder="Mot de passe" name="password" id="login-password">
                <button class="button" type="submit">Valider <i class="fas fa-arrow-right"></i></button>
            </form>
        </div>
    </div>
<?php

    // End buffer and display it through layout.php with the variable $content
    $content = ob_get_clean();
    require "layout.php";
}
?>