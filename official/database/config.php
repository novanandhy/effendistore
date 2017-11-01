<?php

/**
 * Database config variables
 */
  
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");
	define("DB_DATABASE", "effendistore");
  	$connect = new MySQLi(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
    
     if ($connect->connect_errno) {
         die("ERROR : -> ".$connect->connect_error);
     }
?>
