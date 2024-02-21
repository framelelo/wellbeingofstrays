<?php

/** 
 * UPDATE PROFILE IN DATABASE IF CONDITIONS ARE MET
 * 
 * @param int $id
 * @param string $firstName
 * @param string $lastName
 * @param int $tel
 * @param string $email
 * @param string $pwd
 * 
 */

function updateProfile()
{
    global $base_url, $token;
    
    // Check if the form has been submitted and the token is valid
    if ($_POST && isset($_POST['token']) && hash_equals($token, $_POST['token'])) {
        // Validate and sanitize user input
        $firstName = htmlspecialchars($_POST['first-name']);
        $lastName = htmlspecialchars($_POST['last-name']);
        $tel = $_POST['tel'];
        $email = htmlspecialchars($_POST['email']);
        $pwd = $_POST['pwd'];
        $confirmPwd = $_POST['confirmation-pwd'];
        $role = isset($_POST['role']) ? $_POST['role'] : null;

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
 * DELETE PROFILE IN DATABASE IF ID IS SET
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
