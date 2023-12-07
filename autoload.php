<?php
session_start();

global $base_url;
$base_url = "http://localhost/wellbeingofstrays";



define('ROOT_PATH', realpath(dirname(__FILE__)));

global $isConnected;
$isConnected = $_SESSION && $_SESSION["user"];

require_once("models/databaseModel.php");
require_once("models/authModel.php");
require_once("models/adoptionsModel.php");
require_once("models/eventsModel.php");
require_once("models/profilesModel.php");


require_once("controllers/authController.php");
require_once("controllers/homeController.php");
require_once("controllers/adoptionsController.php");
require_once("controllers/eventsController.php");
require_once("controllers/profilesController.php");


require_once("templates/login.php");
require_once("templates/homepage.php");
require_once("templates/adoptions.php");
require_once("templates/signup.php");
require_once("templates/single.php");
require_once("templates/events.php");
require_once("templates/profils.php");

?>