<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "1234");
define("DB_NAME", "crud_app");

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Test connection
if(mysqli_connect_errno()){
	die("DB connection Faild: " . 
		mysqli_connect_error() . 
		" (" . mysqli_connect_errno() . ")"
		);
	}
?>