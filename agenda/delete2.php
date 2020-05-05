<?php
if(isset ($_POST['id_compromisso']))
{
	require_once ("classes/ClassCompromissos.php");
	
	$id_compromisso = $_POST['id_compromisso'];
	
	if($_POST['delete'] == yes)
	{
			$objCompromisso = new Compromissos();
			$objCompromisso->SetId($id_compromisso);
			$objCompromisso->Excluir();
			
	}
		header("Location:compromissos.php");
		exit();
	
}

?>

<p>Tem certeza que deseja deletar o regitro<?php  print $_GET['id_compromisso']?>?</p>


<form action="delete2.php" method="post">

<input type="hidden" name="id_compromisso" value="<?php print $_GET['id_compromisso'] ?>" />

	<button name="delete" value="yes"> Sim </button>
	<button name="delete" value="no"> Não </button>	


</form>

