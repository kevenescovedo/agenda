<?php 
if(isset($_POST['logar']))
{
	session_start();
	require_once("classes/ClassUsuario.php");
	if($_POST['usuario'] != "" && $_POST['senha'] != "")
	{
		$username = $_POST['usuario'];
		$senha =  $_POST['senha'];
		$objLogar = new Usuario();
		$objLogar->SetUsuario($username);
		$objLogar->SetSenha($senha);
		
		$retorno = $objLogar->Logar();
	
		
		if($retorno == 1)
		{
						
			header("location:contatos.php");
			
		}
		else{
			$msg = "ERRO";
		}
	}
}

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
				<div id="formlogin" >
					
					<form id="form" name="form" action="index.php" method="post" >					
					<input type="hidden" name="id" value="<?php print $id; ?>" />
					<h1> Login </h1> 
						<h3> Usuário </h3>
						<input  type="text" name="usuario" placeholder="Informe o username" id="usuario" required /> <br />
					
						<h3> Senha </h3>
						<input type="password" name="senha"  placeholder="Informe sua senha" id="senha" required /><br /><br />
						
					
						<input class="login2" type="submit" name="logar" value="Log in" /><br /><br />		
							</form>
						
						</div>
						<div id="formlogin2">
						<form id="form2" name="form" action="cadastrar.php" method="post" >						
						<input class="login2" type="submit" name="cadastrar" value="Cadastrar" /><br /><br />		
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