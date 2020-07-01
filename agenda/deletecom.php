<?php 
if(isset($_POST['id'])) {
	require_once("conexao.php");
    
	
	if($_POST ['delete'] == 'yes') {
		try {
			$statement =$conn->prepare('DELETE FROM compromisso WHERE id_compromisso=:id');
			$statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
			$statement->execute();

		} catch(PDOException $exception) {
			//ações a serem realizadas caso não exluir o registro
		}
	}

	header ("Location:compromisso.php");
	exit();

}

?>
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Estilo customizado -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/delete.css">
    <link rel="stylesheet" type="text/css" href="css/contato.js">
    <title>Finans - finanças pessoais</title>
  </head>
  <main>


<form action="deletecom.php" method="post" class="container col-xs-12 col-sm-6 col-md-6 col-lg-3">
<p> Tem certeza que deseja excluir os registros deste compromisso ?</p>
	<input type="hidden" name="id" value="<?php print $_GET ['id']?>"/>
	<button name="delete" class="btn btn-primary" class="display-4" value="yes">SIM</button>
	<button name="delete" class="btn btn-primary" class="display-4" value="no">NÃO</button>
    </form>

    </main>
