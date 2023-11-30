<?php 
$title = 'contact';
global $isConnected;
global $base_url;

ob_start()?>
    <h2>Nous Contacter</h2>
    <div class="container">
        <div class="img-container">
            <img class="img-fluid" src="uploads/Quennie.jpeg" alt="adopter un animal maurice">
        </div>
       <form action="">
            <input type="text" placeholder="Nom" name="name" id="name">
            <input type="email" placeholder="Email" name="email" id="email">
            <input type="tel" placeholder="Téléphone" name="tel" id="tel">
            
            <input type="text" placeholder="Objet" name="object" id="object">
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
            <button class="button" type="submit">Valider</button>
    
        </form>
    </div>
    <?php
    $content = ob_get_clean();
    require "layout.php";
?>