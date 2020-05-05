<?php
if(isset ($_POST['id_contato']))
{
	require_once ("classes/ClassContatos.php");
	
	$id_contato = $_POST['id_contato'];
	
	if($_POST['delete'] == yes)
	{
			$objContato = new Contatos();
			$objContato->SetId($id_contato);
			$objContato->Excluir();
			
	}
		header("Location:contatos.php");
		exit();
	
}

?>

<p>Tem certeza que deseja deletar o regitro<?php  print $_GET['id_contato']?>?</p>


<form action="delete.php" method="post">

<input type="hidden" name="id_contato" value="<?php print $_GET['id_contato'] ?>" />

	<button name="delete" value="yes"> Sim </button>
	<button name="delete" value="no"> Não </button>	


</form>

