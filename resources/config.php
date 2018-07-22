<?php

//ob_start(); // Turn on output bufferring
session_start();
//session_destroy();

// Defining a separator-- makes path compatible with all applications-- Linux or Windows
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

// defining template paths
defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ .DS. "templates/front");
defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ .DS. "templates/back");

// Defining database constants/info
defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USER") ? null : define("DB_USER", "root");

defined("DB_PASSWORD") ? null : define("DB_PASSWORD", "");
defined("DB_NAME") ? null : define("DB_NAME", "patakeja_db");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
require_once("functions.php");





?>