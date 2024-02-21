<?php

/**
 * LOGIN USER IF CREDENTIALS ARE CORRECT
 * 
 * @param string $email
 * @param string $pwd
 * 
 * 
 * @return void
 */
function signIn(): void
{
    global $base_url;
    if ($_POST) {

        $email  = htmlspecialchars($_POST['email']);
        $pwd = $_POST['password'];

        // Check if email and password are not empty
        if ($email && $pwd) {

            $login = login($email, $pwd);
            if ($login) {
                header("Location: $base_url");
            } else {
                echo '<div class="modal"><p>Merci de vérifier vos identifiants</p></div>';
            }
        } else {
            echo '<div class="modal"><p>Merci de vérifier vos identifiants</p></div>';
        }
    }

    showLoginPage();
}

/**
 * 
 * ADD NEW USER IN DATABASE
 * 
 * @param string $firstName,
 * @param string $lastName, 
 * @param string $tel, 
 * @param string $email, 
 * @param string $pwd
 * 
 * @return void
 */
function newRegistrer(): void
{
    global $base_url;
    if ($_POST) {

        $firstName = htmlspecialchars($_POST['first-name']);
        $lastName = htmlspecialchars($_POST['last-name']);
        $tel = $_POST['tel'];
        $email  = htmlspecialchars($_POST['email']);
        $pwd = $_POST['pwd'];

        if ($firstName && $lastName && $tel && $email && $pwd) {

            // PASSWORD SHOULD CONTAIN MINIMUM 8 CHARACTERS, 1 LETTER, 1 NUMBER
            if (strlen($pwd) >= 8 && preg_match("#[0-9]+#", $pwd) && preg_match("#[A-Z]+#", $pwd) && preg_match("#[a-z]+#", $pwd)) {

                $registrer = register($firstName, $lastName, $tel, $email, $pwd);
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
 * LOGOUT
 * 
 * @return void
 */
function logOut(): void
{
    global $base_url;
    session_destroy();

    header("location: $base_url");
};
