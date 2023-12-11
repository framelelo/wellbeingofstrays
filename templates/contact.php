<?php 
function contactPage(){

    $title = 'contact';
$page = 'contact';
global $isConnected;
global $base_url;

ob_start()?>
    <h2>Nous Contacter</h2>
    <div class="container">
        <div class="img-container">
            <img class="img-fluid" src="uploads/Quennie.jpeg" alt="adopter un animal à maurice">
        </div>
       <form method="post">
            <input type="text" placeholder="Nom *" name="name" id="name" required>
            <input type="email" placeholder="Email *" name="email" id="email" required>
            <input type="tel" placeholder="Téléphone" name="tel" id="tel">
            
            <input type="text" placeholder="Objet *" name="object" id="object" required>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Ecrire un message *" required></textarea>
            <button class="button" type="submit">ENVOYER <i class="fa fa-arrow-right"></i></button>
    
        </form>
    </div>
    <?php
    $content = ob_get_clean();
    require "layout.php";

}
        ?>