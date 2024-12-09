<?php


require_once "autoload.php";

/**
 * Show page according to url
 * 
 * @param string $page
 * 
 */
if (isset($_GET["page"])) {
    $page = $_GET["page"];
    switch ($page) {

        case "login":
            if ($isConnected) {
                header("Location: $base_url");
            } else signIn();
            break;
            
        case "signup":
            newRegistrer();
            break;

        case "adoption-animaux":
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
        case "aider-animaux-errants":
            showMissions();
            break;

        case "actions-pour-les-animaux":
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
            sendEmail();
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
