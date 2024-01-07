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
        $role = isset($_POST['role']) ? $_POST['role'] : null;

        if ($firstName && $lastName && $tel && $email && $pwd) {

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $update = updateProfiles($id, $firstName, $lastName, $tel, $email, $pwd, $role);

                    if(strlen($pwd < 8) || !preg_match("#[0-9]+#", $pwd) || !preg_match("#[A-Z]+#", $pwd) || !preg_match("#[a-z]+#", $pwd)) {
                        echo '<div class="modal"><p>Le mot de passe doit contenir : <p>
                        <span>Au moins 8 caractères, dont une majuscule, une minuscule et un chiffre</span></div>';
                        
                    } else {
                        if ($update) {
                            header("Location: $base_url/?page=profils");
                        } else {
                            echo '<div class="modal">Merci de vérifier !</div>';
                        }
                    }
                } 
                
                else {
                        $newProfile = newProfile($firstName, $lastName, $tel, $email, $pwd, $role);
                        if(strlen($pwd < 8) || !preg_match("#[0-9]+#", $pwd) || !preg_match("#[A-Z]+#", $pwd) || !preg_match("#[a-z]+#", $pwd)) {
                            echo '<div class="modal"><p>Le mot de passe doit contenir : <p>
                            <span>Au moins 8 caractères, dont une majuscule, une minuscule et un chiffre</span></div>';
                            
                        }

                        else {
                            if($newProfile){
                                header("Location: $base_url/?page=profils");
                            }
                            else {
                                echo '<div class="modal"><p>L\'email existe déjà.</p></div>';
                            }
                            
                           
                        }
                    
                    newProfile($firstName, $lastName, $tel, $email, $pwd, $role);
                }
            
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
