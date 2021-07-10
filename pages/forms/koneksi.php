<?php
define("HOST", "localhost"); // Host database
define("USER", "root"); // Username database
define("PASSWORD", ""); // Password database
define("DATABASE", "rumahsakit_db"); // Nama database

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

if($mysqli->connect_error){
	trigger_error('Koneksi ke database gagal: ' . $mysqli->connect_error, E_USER_ERROR);	
}
?>