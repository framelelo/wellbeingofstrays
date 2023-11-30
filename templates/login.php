
<?php 
$title = 'connexion';
global $isConnected;
global $base_url;

ob_start()?>   
    <div class="login-page">    
        <div class="container">
            <form action="">
                <h2>Connexion</h2>
                <input type="email" placeholder="Email" name="email" id="login-id">                <input type="password" placeholder="Mot de passe" name="password" id="login-password">
                <button class="button" type="submit">Valider <i class="fas fa-arrow-right"></i></button>
            </form>
        </div>
    </div>
<?php
        $content = ob_get_clean();
        require "layout.php";
    ?>