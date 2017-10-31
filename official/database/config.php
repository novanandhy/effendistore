<?php

/**
 * Database config variables
 */
  
	define("DB_HOST", "mysql.idhostinger.com");
	define("DB_USER", "u671082872_store");
	define("DB_PASSWORD", "MH3NAGjsEsfm");
	define("DB_DATABASE", "u671082872_user");
  	$connect = new MySQLi(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
    
     if ($connect->connect_errno) {
         die("ERROR : -> ".$connect->connect_error);
     }
?>
