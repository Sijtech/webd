<?php
/**
 * Datum: 14.09.2018
 * Version: 0.9
 * @author Severin, Karin, Joel
 * Projekt: ownCMS
 */
//Fehlermeldungen im Browser anzeigen. Gut für Debugging.
ini_set( "display_errors", true );
date_default_timezone_set( "Europe/Zurich" );
//Legt fest, wo die DB liegt
define( "DB_DSN", "mysql:host=localhost;dbname=cmsDb" );
define( "DB_USERNAME", "groot" );
define( "DB_PASSWORD", "gr00oot" );
//Klassen Dateien
define( "CLASS_PATH", "classes" );
//HTML Template
define( "TEMPLATE_PATH", "templates" );
define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "mypass" );
require( CLASS_PATH . "/Artikel.php" );

function handleException( $exception ) {
  echo "Da ist ein Problem aufgetreten.";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>
