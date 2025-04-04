<?php
/**
 * Configuration for database connection
 *
 */
$host = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$port = 3308; // i have to change the port number to 3308 because 3306 is already in use(mysql workbench)

$dsn = "mysql:host=$host;port=$port;dbname=$dbname";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);