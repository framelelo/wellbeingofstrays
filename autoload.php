<?php
session_start();

global $base_url;
$base_url = "http://localhost/wellbeingofstrays";

global $isConnected;
$isConnected = $_SESSION && $_SESSION["user"];


define('ROOT_PATH', realpath(dirname(__FILE__)));


/** Models */
require_once("models/databaseModel.php");
require_once("models/authModel.php");
require_once("models/adoptionsModel.php");
require_once("models/eventsModel.php");
require_once("models/profilesModel.php");

/** Controllers */
require_once("controllers/authController.php");
require_once("controllers/homeController.php");
require_once("controllers/adoptionsController.php");
require_once("controllers/eventsController.php");
require_once("controllers/profilesController.php");
require_once("controllers/contactController.php");

/** Templates */
require_once("views/login.php");
require_once("views/homepage.php");
require_once("views/adoptions.php");
require_once("views/signup.php");
require_once("views/single.php");
require_once("views/events.php");
require_once("views/profiles.php");
require_once("views/contact.php");
require_once("views/missions.php");