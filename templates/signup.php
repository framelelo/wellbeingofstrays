<?php
function showRegsitrerPage()
{

    $title = 'inscription';
    $page = 'inscription';

    ob_start() ?>
    <div class="login-page">
        <div class="container">
            <form method="post" onsubmit="return confirmPwd()">
                <h2>Inscription</h2>
                <input type="text" placeholder="Prénom" name="first-name" id="first-name" required>
                <input type="text" placeholder="Nom" name="last-name" id="last-name" required>
                <input type="tel" placeholder="Tél" name="tel" id="tel" required>
                <input type="email" placeholder="Email" name="email" id="email" required>
                <input type="password" placeholder="Mot de passe" name="pwd" id="pwd" required>
                <input type="password" placeholder="Confirmer mot de passe" name="confirmationPwd" id="confirmation-pwd" required>

                <button class="button" type="submit">Valider</button>
            </form>
        </div>
        <div class="modal" id="modal-container"><p>Les mots de passe ne correspondent passss.</p></div>
    </div>

<?php
    $content = ob_get_clean();
    require "layout.php";
};
?>