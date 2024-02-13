<?php
/** 
 * Update profile
 * 
 * @param int $id, string $firstName, string $lastName, string $tel, string $email, string $pwd
 * 
 * @throws PDOException
 * 
*/

function updateProfile()
{
    global $base_url;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate and sanitize user input
        $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $confirmPwd = $_POST['confirmation-pwd'];
        $role = isset($_POST['role']) ? htmlspecialchars($_POST['role']) : null;

        // Updating existing profiles
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $update = updateProfiles($id, $firstName, $lastName, $tel, $email, $pwd, $role);

            // If password changed
            if ($pwd && $pwd == $confirmPwd) {
                if (strlen($pwd) >= 8 && preg_match("#[0-9]+#", $pwd) && preg_match("#[A-Z]+#", $pwd) && preg_match("#[a-z]+#", $pwd)) {
                    if ($update) {
                        echo '<div class="modal">Profil mis à jour !</div>';
                        header("Location: $base_url/?page=profils");
                        exit; 
                    } else {
                        echo '<div class="modal"><p>Erreur lors de la mise à jour du profil. Merci de vérifier !</p></div>';
                    }
                } else {
                    echo '<div class="modal"><p>Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre.</p></div>';
                }
            } else {
                echo '<div class="modal"><p>Les mots de passe ne correspondent pas !</p></div>';
            }
        }


        // ADDING NEW PROFILES
        else {

            // PASSWORD SHOULD CONTAIN MINIMUM 8 CHARACTERS, 1 LETTER, 1 NUMBER

            if (strlen($pwd) >= 8 && preg_match("#[0-9]+#", $pwd) && preg_match("#[A-Z]+#", $pwd) && preg_match("#[a-z]+#", $pwd) && $pwd == $confirmPwd) {

                $newProfile = newProfile($firstName, $lastName, $tel, $email, $pwd, $role);
                if ($newProfile) {
                    header("Location: $base_url/?page=profils");
                } else {
                    echo '<div class="modal">Merci de vérifier !</div>';
                }
            } else {

                echo '<div class="modal"><p>Le mot de passe doit contenir : <p>
                        <span>Au moins 8 caractères, dont une majuscule, une minuscule et un chiffre</span></div>';
            }
        }
    };

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $selectedProfile = showProfile($id);
    } else $selectedProfile = [];

    $profiles = showAllProfiles();
    showProfilePage($profiles, $selectedProfile);
}

/**
 * Remove profile
 * 
 * @param int $id
 * 
 * 
 */
function removeProfile($id)
{
    global $base_url;

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        removeProfiles($id);

        header("location: $base_url/?page=profils");
    }
}
