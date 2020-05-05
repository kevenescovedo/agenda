<?php 
require_once("classes/ClassUsuario.php");
require_once("classes/ClassCompromissos.php");
	
	$id = "";
	$descricao = "";
	$data = "";
	$hora = "";
	$status = "";
	$id_usuario = $_SESSION['id'];
	
	
if(isset($_GET['id_compromisso']))
{
	
	$id = $_GET['id_compromisso'];
	$objCompromisso = new Compromissos();
	$objCompromisso->SetID($id);
	
	$retorno = $objCompromisso->ProcurarCompromisso();
	
	$descricao = $retorno->descricao;
	$data = $retorno->data;
	$hora = $retorno->hora;
	$status = $retorno->status;
	$id_usuario = $retorno->id_usuario;
	
	
}

if(isset($_POST['Enviar']))
{
	
	$id = $_POST['id'];
	$descricao = $_POST['descricao'];
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	$status  = $_POST['status'];
	$id_usuario = $_POST['id_usuario'];
}
	
if($descricao != "" && $data != "" && $hora != "" && $status != ""  && $id_usuario != 0)
{
	$objCompromisso = new Compromissos();
	$objCompromisso->SetID($id);
	$objCompromisso->SetDescricao($descricao);
	$objCompromisso->SetData($data);
    $objCompromisso->SetHora($hora);	
    $objCompromisso->SetStatus($status)	;
	$objCompromisso->SetIdUsuario($id_usuario);
	
	if($id == "")
	{
		$retorno = $objCompromisso->Inserir();
	}
	else
	{
		$retorno = $objCompromisso->Alterar();
	}

}
	$objusuario = new Usuario();
	$retorno = $objusuario->ValidaLogin();

?>

<html>
	<head>
		<title> Agenda </title>
		<link rel="stylesheet" type="text/css" href="css/folha.css" media="screen" />
	</head>
	<body>
		
		<?php
			include_once("includes.php");		
			include_once("topo.php");
		?>
		
		<main>
			<article>
				<section id="contatos">
				<div id="formcontatos" >
					
					<form id="form" name="form" action="compromissos.php" method="post" >					
					<input type="hidden" name="id" value="<?php print $id; ?>" />
					<input type="hidden" name="id_usuario" value="<?php print $id_usuario; ?>" />
					<h1> Compromissos </h1> 
                    <div id="left">
						<h3> Descrição </h3>
						<input  type="text" name="descricao" value="<?php print $descricao?>"  required /> 
						<h3> Data </h3>
						<input  type="date" name="data"  value="<?php print $data?>" required /> 
						<h3> Hora </h3>
						<input  type="time" name="hora"  value="<?php print $hora?>" required /> 
						<h3> Status </h3>
						<input type="text" name="status" value="<?php print $status?>"    required />                       					
						<input type="submit" name="Enviar" value="Enviar" /><br /><br />		
                        </div>
							</form>	
                        </div>							
				</section>
				<section id="listacompromissos" >
				<?php
				date_default_timezone_set('America/Sao_Paulo');
				$datahoje = date("Y-m-d");
				?>
				<form id="form" name="form" action="compromissos.php" method="post" >					
				    <input type="hidden" name="id" value="<?php print $id; ?>" />
					<input type="hidden" name="id_usuario" value="<?php print $id_usuario; ?>" />			
					<h2>Lista de Compromissos</h2>
					Data Filtro Compromissos
					<input type="date" name="data" id="data" value="<?php print $datahoje; ?>" required /> 	
				    <hr/>
				</form>
				<section id="lista">
				<div id="listagemdecompromissos"></div>
			</section>
			</section>
			</article>
		</main>
		<footer>
		</footer>
	</body>
</html>