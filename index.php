<?php


require_once "autoload.php";

/**
 * Affichage des pages ou appel des fonctions selon les 'cases' de l'url définit par la variable 'page'
 * 
 * @param string $page
 * 
 */
if (isset($_GET["page"])) {
    $page = $_GET["page"];
    switch ($page) {

        case "login":
            if ($isConnected) {
                homePage();
            } else signIn();
            break;

        case "signup":
            newRegistrer();
            break;

        case "adoptions":
            AdoptionPage();
            break;

        case "supprimer-adoption":
            if (isset($_GET['id']) && ($isConnected)) {
                $id = $_GET['id'];
                removeAdoption();
            } else {
                homePage();
            };
            break;
        case "modifier-adoption":
            if (isset($_GET['id']) && ($isConnected)) {
                $id = $_GET['id'];
                updateAdoption($id);
            } else {
                homePage();
            };
            break;
        case "missions":
            showMissions();
            break;

        case "evenements":
            eventPage();
            break;

        case "supprimer-evenement":
            removeEvent();
            break;

        case "profils":
            if (isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] === 'admin' && ($isConnected)) {
                updateProfile();
            } else {
                homePage();
            }
            break;

        case "supprimer-profils":
            removeProfile($id);
            break;

        case "single":
            singleAdoption();

            break;

        case "contact":
            contactPage();
            break;

        case "mentions_legales":
            showMentions();
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
