<?php 
function showProfilePage($profiles) {
    $page = 'profiles';
    $title = 'Sauvetage animal';
    global $isConnected;
    global $base_url;

ob_start()?> 
        <div class="container">
            <h1>Tous les profils</h1>

            <div id="profiles">
                <div class="header row">
                  <div class="cell">prénom</div>
                  <div class="cell">nom</div>
                  <div class="cell">téléphone</div>
                  <div class="cell">email</div>
                  <div class="cell"></div>
                </div>
                <?php foreach($profiles as $profile) { ?>
                  <div class="profile row">
                    <div class="first-name cell"><?= $profile['name'] ?></div>
                    <div class="last-name cell"><?= $profile['last_name'] ?></div>
                    <div class="tel cell"><?= $profile['tel'] ?></div>
                    <div class="email cell"><?= $profile['email'] ?></div>
                    <div class="edit-part cell">
                      <a class="edit-btn" href="?page=profils&id=<?= $profile["id"] ?>">
                          <i class="fa fa-pen"></i>
                      </a>
                      <a class="delete-btn" href="?page=remove-profile&a=delete&id=<?= $profile["id"] ?>">
                          <i class="fas fa-trash-alt"></i>
                      </a>
                    </div>
                </div>
               <?php } ?>
            </div>
            
            <form method="post">
                <h2><?= isset($_GET['id']) ? 'Modifier le profil' : 'Ajouter un profil' ?></h2>
                <input type="text" placeholder="Prénom" name="first-name" id="first-name" required>
                <input type="text" placeholder="Nom" name="last-name" id="last-name" required>
                <input type="tel" placeholder="Tél" name="tel" id="tel" required>
                <input type="email" placeholder="Email" name="email" id="email" required>
                <input type="password" placeholder="Mot de passe" name="pwd" id="pwd" required>
                <input type="password" placeholder="Confirmer mot de passe" name="confirmation-pwd" id="confirmation-pwd" required>
                <div class="checkbox">
                    <input type="checkbox" name="role" id="role" value='admin'>
                    <label for="role"><i class="fas fa-check"></i> Administrateur</label>
                </div>
                
                
                <button class="button" type="submit">Valider <i class="fa fa-arrow-right"></i></button>
            </form>
        </div>
        <?php
        $content = ob_get_clean();
        require "layout.php";
      };
    ?>