<?php
require_once("conexao.php");
require_once("inicial.php");
$date = $_POST["data"];
$date = ('Y-m-d',strtotime($date));

$sql= "select * from compromisso where dt_compromisso = '$date' and id_usuario = $usuario";
                    
                
$prepare= $conn->prepare($sql);
 $retorno= $prepare->execute();
 $retorno = $prepare->fetchAll(PDO::FETCH_OBJ);
 
 
 if($prepare->rowCount()  >= 1 ) 
 {
   $email = true;

foreach ($retorno as $linha) {


print ("<div class=' clearfix'>
<div class='bg-primary float-none'><h4 style='color:white;'> no dia $linha->dt_compromisso ás  $linha->hr_compromisso </h4></div>
<div class='bg-dark float-none'><p style='color:white;'>Numero de registro</p></div>
<div class='float-none'>$linha->id_compromisso </div>
<div class='bg-dark float-none'><p style='color:white;'>Descrição</p></div>
<div class='float-none'>$linha->descricao_compromisso </div>
<div class='bg-dark float-none'><p style='color:white;'>Situação</p></div>
<div class='float-none'>$linha->status_compromisso </div>

<div class='bg-dark float-none'><p style='color:white;'>Alterar</p></div>
<div class='float-none'> <a href= 'compromisso.php?id=$linha->id_compromisso' class= 'btn btn-outline-dark ml-4'><i class='fas fa-user-edit' alt='editar' title='editar'></i></a></div>
<div class='bg-dark float-none'><p style='color:white;'>Excluir</p></div>
<div class='float-none'><a href='deletecom.php?id=$linha->id_compromisso'class='btn btn-outline-dark ml-4'><i class='fas fa-trash' alt='excluir' title='excluir'></i></a> </div> 	
</div> 

</div>");
  }

  if ($email == true) {

    $sql= "select * from compromisso where dt_compromisso = '$date' and id_usuario = $usuario  and hr_compromisso  = '$hor'";
  

    $prepare= $conn->prepare($sql);
     $retorno= $prepare->execute();
     $retorno = $prepare->fetchAll(PDO::FETCH_OBJ);
     
     

?>