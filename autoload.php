<?php
// Start session to check if user is connected
session_start();

//  Set global variables
global $base_url, $isConnected;
// Set base url
$base_url = "http://localhost/wellbeingofstrays";

// Check if user is connected
$isConnected = $_SESSION && $_SESSION["user"];

// Set root path
define('ROOT_PATH', realpath(dirname(__FILE__)));


/** Models */
foreach (glob( "models/*.php") as $filename) {
    require_once $filename;
}

/** Controllers */
foreach (glob( "controllers/*.php") as $filename) {
    require_once $filename;
}

/** Views */
foreach (glob( "views/*.php") as $filename) {
    require_once $filename;
}
