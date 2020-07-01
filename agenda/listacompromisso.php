

  


<?php 

sleep(2);
 
require_once("valida.php");
require_once ("conexao.php");

	
	$data = $_POST['data'];
	$usuario = $_SESSION['id'];

         $sql= "select * from compromisso where dt_compromisso = '$data' and id_usuario = $usuario";
                    
                
                  $prepare= $conn->prepare($sql);
                   $retorno= $prepare->execute();
                   $retorno = $prepare->fetchAll(PDO::FETCH_OBJ);
                   if($prepare->rowCount()  >= 1 ) 
                   {


                   foreach($retorno as $linha){ 
                    $dataFormatada = trim($linha->dt_compromisso);
                    $dataFormatada = date("d/m/Y", strtotime($dataFormatada));
                     
                    
                   
                   print ("<section class='container col-xs-12 col-sm-12 col-md-6' style='background-color:white;><div class='clearfix'>
            <div class='bg-primary float-none'><h4 style='color:white;'> no dia $dataFormatada ás $linha->hr_compromisso </h4></div>
            <div class='bg-dark float-none'><p style='color:white;'>Numero de registro</p></div>
            <div class='float-none bg-light'>$linha->id_compromisso </div>
             <div class='bg-dark float-none'><p style='color:white;'>Descrição</p></div>
             <div class='float-none bg-light' style='height:auto; word-wrap:  break-word;'>$linha->descricao_compromisso </div>
             <div class='bg-dark float-none'><p style='color:white;'>Situação</p></div>
             <div class='float-none bg-light'>$linha->status_compromisso </div>
           
             <div class='bg-dark float-none'><p style='color:white;'>Alterar &nbsp; &nbsp; &nbsp; &nbsp; Excluir</p></div>
             <div class='float-none bg-light'> <a href= 'compromisso.php?id=$linha->id_compromisso' class= 'btn btn-outline-dark ml-4'><i class='fas fa-user-edit' alt='editar' title='editar'></i></a>

             
            <a href='deletecom.php?id=$linha->id_compromisso'class='btn btn-outline-dark ml-4'><i class='fas fa-trash' alt='excluir' title='excluir'></i></a></div> 	
                  
                  
                  </div></section>");
                  }
                }
                else {
                   print("<section><div class='alert alert-success' role='alert'>
                    você não tem nenhum compromisso agendado, para hoje diverte-se ou leia um livro :-)!!
                    </div></section>");
                  }
                  

    ?>
    