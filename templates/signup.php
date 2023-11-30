
<?php 
$title = 'inscription';
global $isConnected;
global $base_url;

ob_start()?> 
    <div class="login-page">
        <div class="container">
            <form>
                <h2>Inscription</h2>
                <input type="text" placeholder="Prénom" name="first-name" id="first-name">
                <input type="text" placeholder="Nom" name="last-name" id="last-name">
                <input type="tel" placeholder="Tél" name="tel" id="tel">
                <input type="email" placeholder="Email" name="email" id="email">
                <input type="password" placeholder="Mot de passe" name="pwd" id="pwd">
                <input type="password" placeholder="Confirmer mot de passe" name="confirmation-pwd" id="confirmation-pwd">
                
                <button class="button" type="submit">Valider</button>
            </form>
        </div>
    </div>
    <?php
        $content = ob_get_clean();
        require "layout.php";
    ?>