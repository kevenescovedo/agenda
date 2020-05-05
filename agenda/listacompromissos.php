<?php 
sleep(2);
	
	$data = $_POST['data'];
	$id_usuario = $_SESSION['id'];

         $sql= "select * from compromisso where dt_compromisso = '$data' and id_usuario = $usuario";
                    
                
                  $prepare= $conn->prepare($sql);
                   $retorno= $prepare->execute();
                   $retorno = $prepare->fetchAll(PDO::FETCH_OBJ);
                   


	if (!empty($retorno))
	{
	
	$x = 0;
	$classe = "";
	
	print ("<div id='pessoas'>");
	print ("<div class='col12 titulo2'><span>Cod.</span></div>");							
	print ("<div class='col13 titulo2'><span>Descrição</span></div>");
	print ("<div class='col14 titulo2'><span>Data</span></div>");
	print ("<div class='col15 titulo2'><span>Hora</span></div>");
	print ("<div class='col16 titulo2'><span>Status</span></div>");
	print ("<div class='col17 titulo2'><span> Ações </span></div>");
	
	print "<br />";
	
	foreach($retorno as $linha){ 
	
	if(($x % 2) == 0)
		$classe = "par";
		else $classe = "impar";
	
	$dataFormatada = trim($linha->data);
	$dataFormatada = date("d/m/Y", strtotime($dataFormatada));
	
	print ("<div class='col12 $classe'>$linha->id_compromisso</div>");							
	print ("<div class='col13 $classe'>$linha->descricao</div>");
	print ("<div class='col14 $classe'>$dataFormatada</div>");
	print ("<div class='col15 $classe'>$linha->hora</div>");
	print ("<div class='col16 $classe'>$linha->status</div>");
	print ("<div class='col17 $classe'><a href='delete2.php?id_compromisso=$linha->id_compromisso' title='Excluir o registro' > Excluir| </a> <a href='compromissos.php?id_compromisso=$linha->id_compromisso' title='Alterar o Registro'> Editar</a></div>");

	
	print "<br /> ";
	$x++;
	}
	}
	  else {
	  print "Não existem compromissos na data selecionada.";
   }
	

?>

