<?php
function updateProfile()
{
    global $base_url;

    
    if($_POST) {

        $firstName = $_POST['first-name']; 
        $lastName = $_POST['last-name']; 
        $tel = $_POST['tel'];
        $email  = $_POST['email']; 
        $pwd = $_POST['pwd']; 
        $confirmationPwd = $_POST['confirmation-pwd'];
        
        if ($firstName && $lastName && $tel && $email && $pwd) {
            
            if(isset($_GET['id']) && ($pwd === $confirmationPwd)) {
                $id = $_GET['id'];
                 
                      $update = updateProfiles($id, $firstName, $lastName, $tel, $email, $pwd);
                 

                  if ($update) {
                      header("Location: $base_url/?page=profils");
                  } else {
                      echo 'Merci de vérifier !';
                  }
              } else {
                    $update = registrer($firstName, $lastName, $tel, $email, $pwd);
                }   
                    
            
            }
            else echo 'Les mots de passe ne correspondent pas';

        };
    
    $profiles = profiles();
    showProfilePage($profiles);
    
}

function removeProfile($id){
        global $base_url;
    
        if (isset($_GET["a"])) {
            $action = $_GET["a"];
            $id = $_GET["id"];
            
            if ($action == 'delete'){
                removeProfiles($id);
            
                header("location: $base_url/?page=profils");
            
        } else echo 'Une erreur s\est produite !';
    }
}

?>