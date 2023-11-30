<?php
session_start();

global $base_url;
$base_url = "http://localhost/wellbeingofstrays/";

global $isConnected;
$isConnected = $_SESSION && $_SESSION["user"];

require_once("models/databaseModel.php");
require_once("models/authModel.php");

require_once("controllers/adoptionsController.php");
require_once("controllers/authController.php");


require_once("templates/login.php");
require_once("templates/homepage.php");
require_once("templates/adoptions.php");
require_once("templates/signup.php");

?>