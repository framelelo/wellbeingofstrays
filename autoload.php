<?php
session_start();
global $base_url;
$base_url = "http://localhost/wellbeingofstrays/templates/";

global $isConnected;
$isConnected = isset($_SESSION["user"]);


require_once("controllers/adoptionsController.php");


require_once("templates/adoptions.php");