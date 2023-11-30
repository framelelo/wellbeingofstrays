<?php
require_once "autoload.php";

if (isset($_GET["page"])) {
    $page = $_GET["page"];
    switch ($page) {
        case "adoptions":
            AdoptionPage();
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
        default:
        require('templates/homepage.php');
            break;
    }
} else {
    require('templates/homepage.php');
}