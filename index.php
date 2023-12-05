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

        case "remove":
            removeAdoption($id);
        break;

        case "missions":
            require('templates/missions.php') ;
        break;

        case "evenements":
            require('templates/evenements.php') ;
            break; 

        case "contact":
            require('templates/contact.php') ;
            break;

        case "profils":
            require('templates/profils.php') ;
            break;

        case "single":
            
            if(isset($_GET['id']) && ($isConnected) ) {
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