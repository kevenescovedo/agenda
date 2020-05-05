<?php 
require_once("ClassConexao.php");

Class Contatos extends Conexao {

//atributos

private $id;
private $nome;
private $email;
private $telefone;
private $celular;
private $endereco;
private $bairro;
private $cep;
private	$cidade;
private $uf;
private $id_usuario;

//metodo construtor

function __construct($id = 0, $nome = "", $email = "", $telefone = "", $celular = "", $endereco = "" , $bairro = "", $cep = "", $cidade = "", $uf = "", $id_usuario = 0)
	{
		$this->SetId($id);
		$this->SetNome($nome);
		$this->SetEmail($email);
		$this->SetTelefone($telefone);
		$this->SetCelular($celular);
		$this->SetEndereco($endereco);
		$this->SetBairro($bairro);
		$this->SetCep($cep);
		$this->SetCidade($cidade);
		$this->SetUf($uf);
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
public function SetNome($valor)
	{
		$this->nome = $valor;
	}
public function GetNome()
	{
	return $this->nome;
	}
	public function SetEmail($valor)
	{
		$this->email = $valor;
	}
public function GetEmail()
	{
	return $this->email;
	}
	public function SetTelefone($valor)
	{
		$this->telefone = $valor;
	}
public function GetTelefone()
	{
	return $this->telefone;
	}
public function SetCelular($valor)
	{
		$this->celular = $valor;
	}
public function GetCelular()
	{
	return $this->celular;
	}
public function SetEndereco($valor)
	{
		$this->endereco = $valor;
	}
public function GetEndereco()
	{
	return $this->endereco;
	}
public function SetBairro($valor)
	{
		$this->bairro = $valor;
	}
public function GetBairro()
	{
	return $this->bairro;
	}
public function SetCep($valor)
	{
		$this->cep = $valor;
	}
public function GetCep()
	{
	return $this->cep;
	}
public function SetCidade($valor)
	{
		$this->cidade = $valor;
	}
public function GetCidade()
	{
	return $this->cidade;
	}
public function SetUf($valor)
	{
		$this->uf = $valor;
	}
public function GetUf()
	{
	return $this->uf;
	}
public function SetIdUsuario($valor)
	{
		$this->idusuario = $valor;
	}
public function GetIdUsuario()
	{
	return $this->idusuario;
	}	

	
//***Metodos da classe***

//Metodo para fazer inserção de dados com o banco de dados
function Inserir()
	{
		$nome = $this->GetNome();
		$email = $this->GetEmail();
		$telefone = $this->GetTelefone();
		$celular = $this->GetCelular();
		$endereco = $this->GetEndereco();
		$bairro = $this->GetBairro();
		$cep = $this->GetCep();
		$cidade = $this->GetCidade();
		$uf = $this->GetUf();
		$idusuario = $this->GetIdUsuario();
		
		 $conn = $this->getConn();
		 
		 $sql = "insert into contatos(nome, email, telefone, celular, endereco, bairro, cep, cidade, uf, id_usuario)
		 VALUES(:nome, :email, :telefone, :celular, :endereco, :bairro, :cep, :cidade, :uf, :id_usuario)";
		$stmt  = $conn->prepare($sql);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':telefone', $telefone);
		$stmt->bindParam(':celular', $celular);
		$stmt->bindParam(':endereco', $endereco);
		$stmt->bindParam(':bairro', $bairro);
		$stmt->bindParam(':cep', $cep);
		$stmt->bindParam(':cidade', $cidade);
		$stmt->bindParam(':uf', $uf);
		$stmt->bindParam(':id_usuario', $idusuario);
		$retorno = $stmt->execute();
		return $retorno;	
		
	}
function Alterar()
	{
		$id = $this->GetId();
		$nome = $this->GetNome();
		$email = $this->GetEmail();
		$telefone = $this->GetTelefone();
		$celular = $this->GetCelular();
		$endereco = $this->GetEndereco();
		$bairro = $this->GetBairro();
		$cep = $this->GetCep();
		$cidade = $this->GetCidade();
		$uf = $this->GetUf();
		$idusuario = $this->GetIdUsuario();
		
		 $conn = $this->getConn();
		 
		  $sql = "UPDATE contatos SET nome = :nome, email = :email, telefone = :telefone, celular = :celular, endereco =:endereco, 
						bairro = :bairro, cep = :cep, cidade = :cidade, uf = :uf, id_usuario = :id_usuario where id_contato = :id_contato ";
		  
		$stmt  = $conn->prepare($sql);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':telefone', $telefone);
		$stmt->bindParam(':celular', $celular);
		$stmt->bindParam(':endereco', $endereco);
		$stmt->bindParam(':bairro', $bairro);
		$stmt->bindParam(':cep', $cep);
		$stmt->bindParam(':cidade', $cidade);
		$stmt->bindParam(':uf', $uf);
		$stmt->bindParam(':id_usuario', $idusuario);
		$stmt->bindParam(':id_contato', $id);
		$retorno = $stmt->execute();
		return $retorno;
	}
function Excluir()
	{
		$conn = $this->getConn();
		$id = $this->GetId();
		$stmt = $conn->prepare('DELETE FROM contatos WHERE id_contato = :id_contato');
		$stmt->bindValue(':id_contato', $id, PDO::PARAM_INT);			
		$stmt->execute();
		
		return $retorno;
	}
function ProcurarContatos()
	{
		$conn = $this->getConn();
	 
		$sql = "select * from contatos";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$retorno = $stmt->fetchALL(PDO::FETCH_OBJ);
		return $retorno;
	}
	 function procurarContato()
	 {
	 
		$id = $this->GetId();
	 
		$sql = "select * from contatos where id_contato = :id_contato";
		$conn = $this->getConn();
		$stmt = $conn->prepare($sql);

		$stmt->bindParam(':id_contato', $id);
		$stmt->execute();
		$retorno = $stmt->fetchObject(); 
		return $retorno;
	}
	function ProcurarContatosUsuario()
	{
		$conn = $this->getConn();
		$usuario = $this->GetIdUsuario();

		$sql = "select * from contatos where id_usuario = :id_usuario";
		$conn = $this->getConn();
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id_usuario', $usuario);
		$stmt->execute();		
		$retorno = $stmt->fetchALL(PDO::FETCH_OBJ);
		return $retorno;
	}
}
?>