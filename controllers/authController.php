<?php

/**
 * Sign in
 * 
 * @throws PDOException
 * 
 */
function signIn()
{
    global $base_url;
    if ($_POST) {

        $email  = $_POST['email'];
        $pwd = $_POST['password'];

        if ($email && $pwd) {

            $login = login($email, $pwd);
            if ($login) {
                header("Location: $base_url");
            } else echo '<div class="modal"><p>Merci de vérifier vos identifiants</p></div>';
        } else {
            echo '<div class="modal"><p>Merci de vérifier vos identifiants</p></div>';
        }
    }

    showLoginPage();
}

/**
 * 
 * Sign up - registrer new user 
 * 
 * @param string $firstName, string $lastName, string $tel, string $email, string $pwd
 * 
 * @throws PDOException
 */
function newRegistrer()
{
    global $base_url;
    if ($_POST) {

        $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $tel = $_POST['tel'];
        $email  = $_POST['email'];
        $pwd = $_POST['pwd'];


        if ($firstName && $lastName && $tel && $email && $pwd) {

            // PASSWORD SHOULD CONTAIN MINIMUM 8 CHARACTERS, 1 LETTER, 1 NUMBER
            if (strlen($pwd) >= 8 && preg_match("#[0-9]+#", $pwd) && preg_match("#[A-Z]+#", $pwd) && preg_match("#[a-z]+#", $pwd)) {
                
                $registrer = registrer($firstName, $lastName, $tel, $email, $pwd);
                if ($registrer) {
                    header("Location: $base_url/?page=login");
                } else {
                    echo '<div class="modal"><p>L\'email existe déjà.</p></div>';
                }
            } else {
                echo '<div class="modal"><p>Le mot de passe doit contenir :</p>
                <ul><li>Au moins 8 caractères,</li> <li>Une majuscule,</li><li>Une minuscule</li> <li>Un chiffre</li></ul></div>';
            }
        }
    }

    showRegsitrerPage();
}

/**
 * Log out
 * 
 * @throws PDOException
 */
function logOut()
{
    global $base_url;
    session_destroy();

    header("location: $base_url");
};
