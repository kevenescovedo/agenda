<?php 

abstract class Conexao{



public function getConn(){
	$servername = "localhost";
	$database = "agenda";
	$username = "root";
	$password = "";
	
	try{
		$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
	catch(PDOExcpetion $e){
		echo 'ERROR'.$e->getMessage();
	}
}


 
 public function Desconecta(){
	$this->$conn = NULL;
 }
 
 
}
?>