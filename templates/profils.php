<?php 
    $page = 'profiles';
    $title = 'Sauvetage animal';
    global $isConnected;
    global $base_url;

ob_start()?> 
        <div class="container">
            <h1>Tous les profils</h1>

            <table id="profiles">
                <tr class="header">
                  <th>prénom</th>
                  <th>nom</th>
                  <th>téléphone</th>
                  <th>email</th>
                </tr>
                <tr class="profile">
                  <td class="first-name">Elodie</td>
                  <td class="last-name">François</td>
                  <td class="tel">03 44 55 66 77</td>
                  <td class="email">test@gmail.com</td>
                </tr>
                <tr class="profile">
                    <td class="first-name">Elodie</td>
                    <td class="last-name">François</td>
                    <td class="tel">03 44 55 66 77</td>
                    <td class="email">test@gmail.com</td>
                  </tr>
                  <tr class="profile">
                    <td class="first-name">Elodie</td>
                    <td class="last-name">François</td>
                    <td class="tel">03 44 55 66 77</td>
                    <td class="email">test@gmail.com</td>
                  </tr>
                  <tr class="profile">
                    <td class="first-name">Elodie</td>
                    <td class="last-name">François</td>
                    <td class="tel">03 44 55 66 77</td>
                    <td class="email">test@gmail.com</td>
                  </tr>
            </table>
            <div class="edit-part hr-buttons">
                <button class="edit-btn">
                    <i class="fa fa-pen"></i>
                    Modifier
                </button>
                <button class="delete-btn">
                    <i class="fas fa-trash-alt"></i>
                    Supprimer
                </button>
            </div>
            <form>
                <h2> <i class="fa fa-user-circle"></i>Ajouter un profil</h2>
                <input type="text" placeholder="Prénom" name="first-name" id="first-name">
                <input type="text" placeholder="Nom" name="last-name" id="last-name">
                <input type="tel" placeholder="Tél" name="tel" id="tel">
                <input type="email" placeholder="Email" name="email" id="email">
                <input type="password" placeholder="Mot de passe" name="pwd" id="pwd">
                <input type="password" placeholder="Confirmer mot de passe" name="confirmation-pwd" id="confirmation-pwd">
                
                <button class="button" type="submit">Valider <i class="fa fa-arrow-right"></i></button>
            </form>
        </div>
        <?php
        $content = ob_get_clean();
        require "layout.php";
    ?>