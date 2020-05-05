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
		 
			<section id="atalhos">
			  <h2>Atalhos do Sistema</h2><hr>
			  <a href="contatos.php">
				<div class="grid-3 grid-home">
				<div class="simbolocontato"></div>
				Contatos
				</div>
			  </a>
			  <a href="compromissos.php">
				<div class="grid-3 grid-home">   
				<div class="simbolocompromisso"></div>
				Compromissos
				</div>
			  </a>
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
				<img src="image/carregando.gif" id="imagemcarregando" style="display:block;" />
				<div id="listagemdecompromissos"></div>
			</section>
			
		 </article>
		</main>
		
		<footer>
		</footer>
		
	</body>
</html>