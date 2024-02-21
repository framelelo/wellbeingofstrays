<?php
// Start session to check if user is connected
session_start();

//  Set global variables
global $base_url, $isConnected, $token;
// Set base url
$base_url = "http://localhost/wellbeingofstrays";

// Check if user is connected
$isConnected = $_SESSION && $_SESSION["user"];



// Generate CSRF token if not already set
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

$token = $_SESSION['token'];

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
