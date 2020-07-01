<?php

 # Informa qual o conjunto de caracteres será usado.
$servername="localhost";
$database="agenda";
$username="root";

$password = "";
//criar conexão
try {
	$conn= new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$conn-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	

}
catch(PDOException $e) {
	echo "ERROR". $e->getMessage();
}


?>