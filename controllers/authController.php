<?php 

function signIn() {
    global $base_url;
    if($_POST) {

        $email  = $_POST['email']; 
        $pwd = $_POST['password']; 
        
        if ($email && $pwd) {
                    
            $login = login($email, $pwd);
                if($login) {
                    header("Location: $base_url");
                }
                else {
                    echo '<div class="modal"><p>Merci de vérifier vos identifiants</p></div>';
                }
        };
    }

    showLoginPage();

}
function newRegistrer() {

    global $base_url;
    if($_POST) {

        $firstName = $_POST['first-name']; 
        $lastName = $_POST['last-name']; 
        $tel = $_POST['tel'];
        $email  = $_POST['email']; 
        $pwd = $_POST['pwd']; 
        $confirmationPwd = $_POST['confirmationPwd'];
        
        if ($firstName && $lastName && $tel && $email && $pwd) {
            
            if ($pwd === $confirmationPwd) {
                    
            $registrer = registrer($firstName, $lastName, $tel, $email, $pwd);
                if($registrer) {
                
                    header("Location: $base_url/?page=login");
                }
                
                else {
                    echo '<div class="modal"><p>Merci de vérifier.</p></div>';
                }
            }
            else echo '<div class="modal"><p>Les mots de passe ne correspondent pas.</p></div>';

        };
    }

    showRegsitrerPage();

}

function logOut(){
    
    global $base_url;
        session_destroy();
        
        header("location: $base_url");
    };


?>