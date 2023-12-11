<?php
function updateProfile()
{
    global $base_url;


    if ($_POST) {

        $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $tel = $_POST['tel'];
        $email  = $_POST['email'];
        $pwd = $_POST['pwd'];
        $confirmationPwd = $_POST['confirmation-pwd'];
        $role = isset($_POST['role']) ? $_POST['role'] : null;

        if ($firstName && $lastName && $tel && $email && $pwd) {
            if ($pwd === $confirmationPwd) {

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $update = updateProfiles($id, $firstName, $lastName, $tel, $email, $pwd, $role);

                    if ($update) {
                        header("Location: $base_url/?page=profils");
                    } else {
                        echo '<div class="modal">Merci de vérifier !</div>';
                    }
                } else {
                    newProfile($firstName, $lastName, $tel, $email, $pwd, $role);
                }
            } else echo '<div class="modal"><p>Les mots de passe ne correspondent pas.</p></div>';
        } else echo '<div class="modal"><p>Merci de vérifier.</p></div>';
    };

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $selectedProfile = showProfile($id);
    } else $selectedProfile = [];

    $profiles = showAllProfiles();
    showProfilePage($profiles, $selectedProfile);
}
function removeProfile($id)
{
    global $base_url;

    if (isset($_GET["a"])) {
        $action = $_GET["a"];
        $id = $_GET["id"];

        if ($action == 'delete') {
            removeProfiles($id);

            header("location: $base_url/?page=profils");
        } else echo '<div class="modal"><p>Une erreur s\est produite !</p></div>';
    }
}
