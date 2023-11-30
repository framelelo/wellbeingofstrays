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
            showAdoptions();
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
            require('templates/single.php') ;
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