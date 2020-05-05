<?php 
require_once("ClassConexao.php");
if ( session_status() !== PHP_SESSION_ACTIVE )
 {
    session_start();
}


class Usuario extends Conexao {

//atributos

private $id;
private $nome;
private $email;
private $username;
private $senha;


//Metodos construtor

function __construct($id = 0,  $nome = "", $email = "", $username="", $senha="")
 {
	$this->SetId($id);
	$this->SetNome($nome);
	$this->SetEmail($email);
	$this->SetUsuario($username);
	$this->SetSenha($senha);	 
 }
 

//metodo get e set (metodo de acesso) 

public function SetUsuario($valor) {
	$this->usuario = $valor;
	
}
public function GetUsuario(){
	return $this->usuario;
}
public function SetSenha($valor) {
	$this->senha = $valor;
}
public function GetSenha(){
	return $this->senha;
}
 public function SetId($valor) {
	$this->id = $valor;
}
public function GetId(){
	return $this->id;
}
public function SetNome($valor) {
	$this->nome = $valor;
}
public function GetNome(){
	return $this->nome;
}
public function SetEmail($valor) {
	$this->email = $valor;
}
public function GetEmail(){
	return $this->email;
}
//*****Metodos da classe *****


//Login do usuario select do banco
 function Logar(){
		
		$username = $this->GetUsuario();
		$senha = $this->GetSenha();
		
		
		 $conn = $this->getConn(); 	 
		
		$sql = "select * from usuarios where username = :username and senha = :senha";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':senha', $senha);
		$stmt->execute();
		$retorno = $stmt->fetch(PDO::FETCH_OBJ);
		
		if($stmt->rowCount()!= 0)
		{			
			$_SESSION["usuario"] = $retorno->username;
			$_SESSION["id"] = $retorno->id_usuario;
			return 1;
		}
		else
		{
			return 0;
		}
 }
 
 //Cadastrar o usuario Insert into do banco 
 function Cadastrar()
 {
	$nome = $this->GetNome();
	$email = $this->GetEmail();
	$username = $this->GetUsuario();
	$senha = $this->GetSenha();	
	 
	 $conn = $this->getConn();
	 
	$sql = "insert into usuarios(nome, email, username, senha) VALUES(:nome, :email, :username, :senha)";
	$stmt  = $conn->prepare($sql);
	$stmt->bindParam(':nome', $nome);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':username', $username);
	$stmt->bindParam(':senha', $senha);
	
	$retorno = $stmt->execute();
	return $retorno;	
 }
 
 //Logout do usuario encerrar sessao
 function Sair(){


session_destroy();
unset($_SESSION);
header("location:index.php");

 }

 //validar login do usuario para nao acessar a pagina pelo navegador
  function ValidaLogin(){
	 if(!isset($_SESSION['usuario'])) 	
	  header("location:/agenda/index.php");
 }
}
?>