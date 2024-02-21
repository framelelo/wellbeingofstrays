<?php
function showProfilePage($profiles, $selectedProfile)
{

  // Set title and page name
  $title = 'Sauvetage animal';
  $page = 'profiles';

  $defaultName = isset($selectedProfile['name']) ? $selectedProfile['name'] : 'Prénom';
  $defaultLastName = isset($selectedProfile['last_name']) ? $selectedProfile['last_name'] : 'Nom';
  $defaultTel = isset($selectedProfile['tel']) ? $selectedProfile['tel'] : '06 00 00 00 00';
  $defaultEmail = isset($selectedProfile['email']) ? $selectedProfile['email'] : 'email';
  $defaultPwd = isset($selectedProfile['pwd']) ? $selectedProfile['pwd'] : 'password';

  // Start buffer
  ob_start();
  
  global $token;
  
  ?>
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
      <?php foreach ($profiles as $profile) { ?>
        <div class="profile row">
          <div class="first-name cell">
            <?php if (isset($profile['role']) && $profile['role'] === 'admin') {
              echo "
              <i class='fas fa-user-shield fa-sm'></i> ";
            } echo $profile['name'] ?></div>
          <div class="last-name cell"><?= $profile['last_name'] ?></div>
          <div class="tel cell"><?= $profile['tel'] ?></div>
          <div class="email cell"><?= $profile['email'] ?></div>
          <div class="edit-part cell">
            <a class="edit-btn" href="?page=profils&id=<?= $profile["id"] ?>">
              <i class="fa fa-pen"></i>
            </a>
            <a class="delete-btn" href="?page=supprimer-profils&id=<?= $profile["id"] ?>">
              <i class="fas fa-trash-alt"></i>
            </a>
          </div>
        </div>
      <?php } ?>
    </div>

    <form method="post" onsubmit="return confirmPwd()">
      <h2><?= isset($_GET['id']) ? 'Modifier le profil' : 'Ajouter un profil' ?></h2>
      <input type="text" placeholder="<?= isset($selectedProfile['name']) ? $selectedProfile['name'] : 'Prénom'; ?>" name="first-name" id="first-name" maxlength="30" value="<?= $defaultName; ?>">
      <input type="text" placeholder="<?= isset($selectedProfile['last_name']) ? $selectedProfile['last_name'] : 'Nom'; ?>" name="last-name" id="last-name" maxlength="40" value="<?= $defaultLastName; ?>">
      <input type="tel" placeholder="<?= isset($selectedProfile['tel']) ? $selectedProfile['tel'] : 'Tél.'; ?>" name="tel" id="tel" pattern="[0-9]{8}" placeholder="51234567" value="<?= $defaultTel; ?>">
      <input type="email" placeholder="<?= isset($selectedProfile['email']) ? $selectedProfile['email'] : 'Email'; ?>" name="email" id="email" value="<?= $defaultEmail; ?>">
      <input type="password" placeholder="<?= isset($_GET['id']) ? 'Modifier le mot de passe' : 'Mot de passe' ?>" name="pwd" id="pwd" value="<?= $defaultPwd ?>">
      <input type="password" placeholder="Confirmer le mot de passe" name="confirmation-pwd" id="confirmation-pwd" value="<?= $defaultPwd ?>">
      <div class="checkbox">
        <input type="checkbox" name="role" id="role" value='admin'>
        <label for="role"><i class="fas fa-check"></i> Administrateur</label>
      </div>

      <!-- CSRF token -->
      <input type="hidden" name="token" value="<?= $token ?? '' ?>">

      <button class="button" type="submit"><?= isset($_GET['id']) ? 'Modifier' : 'Ajouter' ?> <i class="fa fa-arrow-right"></i></button>
    </form>
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