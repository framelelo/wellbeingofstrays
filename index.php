<?php
require_once "autoload.php";

if (isset($_GET["page"])) {
    $page = $_GET["page"];
    switch ($page) {

        case "login":
            signIn();
            break; 
            
        case "signup":
            newRegistrer();
            break;   
 
        case "adoptions":
            AdoptionPage();
        break;

        case "remove-adoption":
            removeAdoption($id);
        break;

        case "update-adoption": 
            if(isset($_GET['id']) && ($isConnected) ) {
            $id = $_GET['id'];
            updateAdoption($id);
        };
        break;

        case "missions":
            require('templates/missions.php') ;
        break;

        case "evenements":
            eventPage();
            break; 

        case "remove-event":
            removeEvent($id);
        break; 

        case "contact":
            require('templates/contact.php') ;
            break;

        case "profils":  
            if(isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] !== null){ 
                updateProfile();
            } else {
                homePage();
            }
        break;

        case "remove-profile":
            removeProfile($id);
        break;

        case "single":
            if(isset($_GET['id'])  ) {
                $id = $_GET['id'];
                singleAdoption($id);
            }
            else {
                homePage();
            }
            break;
        case "logout":
            logOut();
            break;  
               
        default:
        homePage();
            break;
    }
} else {
    homePage();
}