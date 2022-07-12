<?php

// session Start 
session_start();

 //create constaint to store Non Repeating values
define('SITEURL','http://abeetha/Food_Oder_System/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-oder');


 $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); // Database connection
 $db_select = mysqli_select_db($conn,'food-oder') or die(mysqli_error()); //Selecting Database

?>