<?php 
require_once("ClassConexao.php");

Class Compromissos extends Conexao {

//atributos

private $id;
private $descricao;
private $data;
private $hora;
private $status;
private $id_usuario;




//metodo construtor

function __construct($id = 0, $descricao = "",$data = "", $hora = "", $status = "" , $id_usuario = 0)
	{
		$this->SetId($id);
		$this->SetDescricao($descricao);
		$this->SetData($data);
        $this->SetHora($hora);	
        $this->SetStatus($status)	;
		$this->SetIdUsuario($id_usuario);
			
	}	
	
//metodo get e set (Metodos de acesso)
	
	
public function SetId($valor)
	{
		$this->id = $valor;
	}
public function GetId()
	{
	return $this->id;
	}
public function SetDescricao($valor)
	{
		$this->descricao = $valor;
	}
public function GetDescricao()
	{
	return $this->descricao;
	}
	public function SetData($valor)
	{
		$this->data = $valor;
	}
public function GetData()
	{
	return $this->data;
	}
	public function SetHora($valor)
	{
		$this->hora= $valor;
	}
public function GetHora()
	{
	return $this->hora;
	}
public function SetStatus($valor)
	{
		$this->status = $valor;
	}
public function GetStatus()
	{
	return $this->status;
    }
    public function SetIdUsuario($valor)
	{
		$this->id_usuario = $valor;
	}
public function GetIdUsuario()
	{
	return $this->id_usuario;
	}


	
//***Metodos da classe***

//Metodo para fazer inserção de dados com o banco de dados
function Inserir()
	{
		$descricao = $this->GetDescricao();
		$data = $this->GetData();
		$hora = $this->GetHora();
		$status = $this->GetStatus();		
		$id_usuario = $this->GetIdUsuario();
		
		 $conn = $this->getConn();
		 
		 $sql = "insert into compromissos(descricao, data, hora, status, id_usuario)
		 VALUES(:descricao, :data, :hora, :status, :id_usuario)";		 
		$stmt  = $conn->prepare($sql);
		$stmt->bindParam(':descricao', $descricao);
		$stmt->bindParam(':data', $data);
		$stmt->bindParam(':hora', $hora);
		$stmt->bindParam(':status', $status);		
		$stmt->bindParam(':id_usuario', $id_usuario);
		$retorno = $stmt->execute();
		return $retorno;	
		
	}
function Alterar()
	{
		$id = $this->GetId();
		$descricao = $this->GetDescricao();
		$data = $this->GetData();
		$hora = $this->GetHora();
		$status = $this->GetStatus();		
		$id_usuario = $this->GetIdUsuario();
		
		 $conn = $this->getConn();
		 
		  $sql = "UPDATE compromissos SET descricao = :descricao, data = :data, hora = :hora, status = :status, id_usuario = :id_usuario where id_compromisso = :id_compromisso ";
		  
		$stmt  = $conn->prepare($sql);
		$stmt->bindParam(':descricao', $descricao);
		$stmt->bindParam(':data', $data);
		$stmt->bindParam(':hora', $hora);
		$stmt->bindParam(':status', $status);		
		$stmt->bindParam(':id_usuario', $id_usuario);
		$stmt->bindParam(':id_compromisso', $id);
		$retorno = $stmt->execute();
		return $retorno;
	}
function Excluir()
	{
		$conn = $this->getConn();
		$id = $this->GetId();
		$stmt = $conn->prepare('DELETE FROM compromissos WHERE id_compromisso = :id_compromisso');
		$stmt->bindValue(':id_compromisso', $id, PDO::PARAM_INT);			
		$stmt->execute();
		
		return $retorno;
	}
function ProcurarCompromissos()
	{
		$conn = $this->getConn();
	 
		$sql = "select * from compromissos";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$retorno = $stmt->fetchALL(PDO::FETCH_OBJ);
		return $retorno;
	}
	 function ProcurarCompromisso()
	 {
	 
		$id = $this->GetId();
	 
		$sql = "select * from compromissos where id_compromisso = :id_compromisso";
		$conn = $this->getConn();
		$stmt = $conn->prepare($sql);

		$stmt->bindParam(':id_compromisso', $id);
		$stmt->execute();
		$retorno = $stmt->fetchObject(); 
		return $retorno;
	}
	function ProcurarCompromissosUsuario()
	{
		$conn = $this->getConn();
		$usuario = $this->GetIdUsuario();

		$sql = "select * from compromissos where id_usuario = :id_usuario";
		$conn = $this->getConn();
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id_usuario', $usuario);
		$stmt->execute();		
		$retorno = $stmt->fetchALL(PDO::FETCH_OBJ);
		return $retorno;
	}
	
	function ProcurarCompromissosUsuarioData()
	{
		$conn = $this->getConn();
		$usuario = $this->GetIdUsuario();
		$data = $this->GetData();

		$sql = "select * from compromissos where id_usuario = :id_usuario and data = :data";
		$conn = $this->getConn();
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id_usuario', $usuario);
		$stmt->bindParam(':data', $data);
		$stmt->execute();		
		$retorno = $stmt->fetchALL(PDO::FETCH_OBJ);
		return $retorno;
	}
}
?>