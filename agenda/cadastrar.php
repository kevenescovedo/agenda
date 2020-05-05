<?php 
require_once ("classes/ClassUsuario.php");

$nome = "";
$email = "";
$username = "";
$senha = "";

if(isset($_POST['Cadastrar']))
{

	
	$nome = $_POST['nome'];	
	$email = $_POST['email'];
	$username = $_POST['username'];
	$senha = $_POST['senha'];
}
	
if($nome != "" &&  $email != "" && $username != "" && $senha != "")
{

	$objUsuario = new Usuario();	
	$objUsuario->SetNome($nome);
	$objUsuario->SetEmail($email);
	$objUsuario->SetUsuario($username);
	$objUsuario->SetSenha($senha);
	
	$retorno = $objUsuario->Cadastrar();
	
	
}
	
	$nome = "";
	$email = "";
	$username = "";
	$senha = "";
	


?>
<html>
	<head>
		<title> Agenda </title>
		<link rel="stylesheet" type="text/css" href="css/folha.css" media="screen" />
	</head>
	<body id="fundo">
		<header id="topo">
		<div id="image1">
		<img id="icon" src="image/schedule.png" alt="icone de calendario" >
		</div>
		
		</header>
		<main>
			<article>
				<section id="login">
				<div id="formlogin3" >
					
					<form id="form" name="form" action="cadastrar.php" method="post" >					
					<input type="hidden" name="id" value="<?php print $id; ?>" />
					<h1> Cadastre-se </h1> 
						<h3> Nome </h3>
						<input  type="text" name="nome" placeholder="Informe o seu nome" id="nome" required /> 
						<h3> Email </h3>
						<input  type="email" name="email" placeholder="Informe o seu email" id="email" required /> 
						<h3> UserName </h3>
						<input  type="text" name="username" placeholder="Informe o username" id="username" required /> 
						<h3> Senha </h3>
						<input type="password" name="senha"  placeholder="Informe uma senha" id="senha" required /><br /><br />
						
					
						<input class="login2" type="submit" name="Cadastrar" value="Cadastrar" /><br /><br />		
							</form>
						
						</div>
						<div id="formlogin2">
						<form id="form2" name="form" action="index.php" method="post" >						
						<input class="login2" type="submit" name="cancelar" value="Cancelar" /><br /><br />		
						<span id="copyright"> ©Copyright - Agenda </span><br />
						</form>
						</div>
				</section>
				
			</article>
		</main>
		<footer>
		</footer>
	</body>
</html>