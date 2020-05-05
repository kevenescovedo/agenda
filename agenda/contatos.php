<?php 
require_once("classes/ClassUsuario.php");
require_once("classes/ClassContatos.php");
	
		$id = "";
		$nome = "";
		$email = "";
		$telefone = "";
		$celular = "";
		$endereco = "";
		$bairro = "";
		$cep = "" ;
		$cidade = "";
		$uf = "";
		$id_usuario = $_SESSION['id'];
	
	
if(isset($_GET['id_contato']))
	{
		$id = $_GET['id_contato'];
		$objContato = new Contatos();
		$objContato->SetId($id);
		
		$retorno = $objContato->procurarContato();
		
		$nome = $retorno->nome;
		$email = $retorno->email;
		$telefone = $retorno->telefone;
		$celular = $retorno->celular;
		$endereco = $retorno->endereco;
		$bairro = $retorno->bairro;
		$cep = $retorno->cep;
		$cidade = $retorno->cidade;
		$uf = $retorno->uf;
		$id_usuario = $retorno->id_usuario;
	
	
	}

if(isset($_POST['Enviar']))
	{
		
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$celular  = $_POST['celular'];
		$endereco = $_POST['endereco'];
		$bairro = $_POST['bairro'];
		$cep = $_POST['cep'];
		$cidade = $_POST['cidade'];
		$uf = $_POST['uf'];
	
	
	}
	


if($nome != "" && $telefone != "" && $email != "" && $celular != ""  && $endereco != "" && $bairro != "" && $cep != "" && $cidade != "" && $uf != "" && $id_usuario != 0)
	{
		$objContato = new Contatos();
		$objContato->SetID($id);
		$objContato->SetNome($nome);
		$objContato->SetTelefone($telefone);
		$objContato->SetEmail($email);
		$objContato->SetCelular($celular);
		$objContato->SetEndereco($endereco);
		$objContato->SetBairro($bairro);
		$objContato->SetCep($cep);
		$objContato->SetCidade($cidade);
		$objContato->SetUf($uf);
		$objContato->SetIdUsuario($id_usuario);
		
		if($id == "")
			$retorno = $objContato->Inserir();
		else
			$retorno = $objContato->Alterar();
		
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
					
					<form id="form" name="form" action="contatos.php" method="post" >					
					<input type="hidden" name="id" value="<?php print $id; ?>" />
					<input type="hidden" name="id_usuario" value="<?php print $id_usuario; ?>" />
					<h1> Contatos </h1> 
                    	<h3> Nome </h3>
						<input  type="text" name="nome" value="<?php print $nome; ?>" required /> 
						<h3> Email </h3>
						<input  type="email" name="email"   value="<?php print $email; ?>" required /> 
						<h3> Telefone </h3>
						<input  type="text" name="telefone" value="<?php print $telefone; ?>"  required /> 
						<h3> Celular </h3>
						<input type="text" name="celular"   value="<?php print $celular; ?>" required />
                        <h3> CEP </h3>
						<input type="text" name="cep" id="cep" value="<?php print $cep; ?>"  required />
						<h3> Endereço </h3>
						<input type="text" name="endereco" id="rua"   value="<?php print $endereco; ?>" required />
						<h3> Número </h3>
						<input type="text" name="numero" id="numero"   value="<?php print $endereco; ?>" required />
                        <h3> Bairro </h3>
						<input type="text" name="bairro" id="bairro" value="<?php print $bairro; ?>"   required />
              
						<h3> Cidade </h3>
						<input type="text" name="cidade" id="cidade" value="<?php print $cidade; ?>" required />
						<h3> UF </h3>
						<select id="uf" name="uf" value="<?php print $uf?>">
							<option value="AC" <?php if($uf == "AC") print "selected";?>>AC</option>
							<option value="AL" <?php if($uf == "AL") print "selected";?>>AL</option>
							<option value="AP"<?php if($uf == "AP") print "selected";?>>AP</option>
							<option value="AM" <?php if($uf == "AM") print "selected";?>>AM</option>
							<option value="BA" <?php if($uf == "BA") print "selected";?>>BA</option>
							<option value="CE"<?php if($uf == "CE") print "selected";?>>CE</option>
							<option value="DF" <?php if($uf == "DF") print "selected";?>>DF</option>
							<option value="ES" <?php if($uf == "ES") print "selected";?>>ES</option>
							<option value="GO" <?php if($uf == "GO") print "selected";?>>GO</option>
							<option value="MA" <?php if($uf == "MA") print "selected";?>>MA</option>
							<option value="MT" <?php if($uf == "MT") print "selected";?>>MT</option>
							<option value="MS" <?php if($uf == "MS") print "selected";?>>MS</option>
							<option value="MG" <?php if($uf == "MG") print "selected";?>>MG</option>
							<option value="PA" <?php if($uf == "PA") print "selected";?>>PA</option>
							<option value="PB" <?php if($uf == "PB") print "selected";?>>PB</option>
							<option value="PR" <?php if($uf == "PR") print "selected";?>>PR</option>
							<option value="PE" <?php if($uf == "PE") print "selected";?>>PE</option>
							<option value="PI" <?php if($uf == "PI") print "selected";?>>PI</option>
							<option value="RJ" <?php if($uf == "RJ") print "selected";?>>RJ</option>
							<option value="RN" <?php if($uf == "RN") print "selected";?>>RN</option>
							<option value="RS" <?php if($uf == "RS") print "selected";?>>RS</option>
							<option value="RO" <?php if($uf == "RO") print "selected";?>>RO</option>
							<option value="RR" <?php if($uf == "RR") print "selected";?>>RR</option>
							<option value="SC" <?php if($uf == "SC") print "selected";?>>SC</option>
							<option value="SP" <?php if($uf == "SP") print "selected";?>>SP</option>
							<option value="SE" <?php if($uf == "SE") print "selected";?>>SE</option>
							<option value="TO" <?php if($uf == "TO") print "selected";?>>TO</option>
							
						</select> <br/><br/>
                        											
						<?php 
						    $id = "";
							$nome = "";
							$email = "";
							$telefone = "";
							$celular = "";
							$endereco = "";
							$bairro = "";
							$cep = "" ;
							$cidade = "";
							$uf = "";
						?>
						<input type="submit" name="Enviar" value="Enviar" /><br /><br />		
                        </div>
							</form>	
                    </div>	

						<h2>Lista de Contatos</h2>
						<hr/>
						<?php 
							
							$objContato = new Contatos();
							$objContato->SetIdUsuario($_SESSION['id']);
							$retorno = $objContato->ProcurarContatosUsuario();
							
							if (!empty($retorno))
							{
							
							$x = 0;
							$classe = "";
							
							print ("<div id='pessoas'>");
							print ("<div class='col1 titulo'><span>Cod.</span></div>");							
							print ("<div class='col2 titulo'><span>Nome</span></div>");
							print ("<div class='col3 titulo'><span>Telefone</span></div>");
							print ("<div class='col4 titulo'><span> Celular</span></div>");
							print ("<div class='col5 titulo'><span> E-mail</span></div>");
							print ("<div class='col6 titulo'><span> Endereço </span></div>");
							print ("<div class='col7 titulo'><span> Bairro </span></div>");
							print ("<div class='col8 titulo'><span> CEP </span></div>");
							print ("<div class='col9 titulo'><span> Cidade </span></div>");
							print ("<div class='col10 titulo'><span> UF </span></div>");
							print ("<div class='col11 titulo'><span> Ações </span></div>");
							
							print "<br />";
							
							foreach($retorno as $linha){ 
							
							if(($x % 2) == 0)
								$classe = "par";
								else $classe = "impar";
							
							
							print ("<div class='col1 $classe'>$linha->id_contato</div>");							
							print ("<div class='col2 $classe'>$linha->nome</div>");
							print ("<div class='col3 $classe'>$linha->telefone</div>");
							print ("<div class='col4 $classe'>$linha->celular</div>");
							print ("<div class='col5 $classe'>$linha->email</div>");
							print ("<div class='col6 $classe'>$linha->endereco</div>");
							print ("<div class='col7 $classe'>$linha->bairro</div>");
							print ("<div class='col8 $classe'>$linha->cep</div>");
							print ("<div class='col9 $classe'>$linha->cidade</div>");
							print ("<div class='col10 $classe'>$linha->uf</div>");
							print ("<div class='col11 $classe'><a href='delete.php?id_contato=$linha->id_contato' title='Excluir o registro' > Excluir| </a> <a href='contatos.php?id_contato=$linha->id_contato' title='Alterar o Registro'> Editar</a></div>");
				
							
							print "<br /> ";
							$x++;
							}
							}  else {
							print "Nenhum resultado retornado.";
							}
							
						
							
						
						?>
				</section>
				
			</article>
		</main>
		<footer>
		</footer>
	</body>
</html>