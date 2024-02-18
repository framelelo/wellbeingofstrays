<?php
function showRegsitrerPage()
{

    // Set title and page name
    $title = 'Bien-être animal errant île Maurice';
    $page = 'inscription';

    ob_start() ?>
    <div class="login-page">
        <div class="container">
            <form method="post" onsubmit="return confirmPwd()">
                <h2>Inscription</h2>
                <input type="text" placeholder="Prénom" name="first-name" id="first-name" maxlength="30" required>
                <input type="text" placeholder="Nom" name="last-name" id="last-name" maxlength="40" required>
                <input type="tel" pattern="[0-9]{8}" placeholder="51234567" name="tel" id="tel">
                <input type="email" placeholder="Email" name="email" id="email" required>
                <input type="password" placeholder="Mot de passe" name="pwd" id="pwd" required>
                <input type="password" placeholder="Confirmer mot de passe" name="confirmationPwd" id="confirmation-pwd" required>

                <button class="button" type="submit">Valider</button>
            </form>
        </div>
        <div class="modal" id="modal-container">
            <p>Les mots de passe ne correspondent pas.</p>
        </div>
    </div>

<?php

    // End buffer and display it through layout.php with the variable $content
    $content = ob_get_clean();
    require "layout.php";
};
?>