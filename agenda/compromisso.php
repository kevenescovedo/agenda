<?php

require_once ("conexao.php");
require_once ("valida.php");






$id = "";
$data = "";
$hora = "";
$descricao = "";
$status = "";
date_default_timezone_set('America/Sao_Paulo');
$date =  date('Y-m-d');
$date = date('Y-m-d',strtotime($date));


$email = false;
$email_enviar = "";
  $usuario = $_SESSION['id'];


if(isset($_GET['id'])) {
  $id= $_GET['id'];
  $_POST["id"] = $id;
 
  $sql = "select * from compromisso where id_compromisso = $id ";

 
  $prepare = $conn->prepare($sql);
  $prepare->execute();
  $retorno = $prepare-> fetchObject();
  if($prepare->rowCount() >= 1) {
    
	
    $data = $retorno->dt_compromisso;
    $hora = $retorno->hr_compromisso;
    
    $descricao = $retorno->descricao_compromisso;
    
    $status = $retorno->status_compromisso;
    $data = $retorno->dt_compromisso;

  }
  
}


$usuario = $_SESSION['id'];
if (isset($_POST["enviar"])) {
  
 
  $data = $_POST["data"];
  $hora = $_POST["hora"];
  $descricao = $_POST["descricao"];
  $status = $_POST["status"];
  $id = $_POST["id"];
 
  
 

  if  ( $id != "" && $data != "" && $hora != "" && $descricao != "" && $status != "" ) {

    $sql = "UPDATE compromisso SET dt_compromisso = :dt, hr_compromisso = :hora, descricao_compromisso = :descricao, status_compromisso = :st WHERE id_compromisso = :id";
  
    $prepare = $conn->prepare($sql);
    $prepare->bindParam(':dt', $data);
    $prepare->bindParam(':hora', $hora);
        $prepare->bindParam(':descricao', $descricao);
        $prepare->bindParam(':st', $status);
        $prepare->bindParam(':id', $id);
        $retorno= $prepare->execute();
        

  }
  if  ( $id == "" && $data != "" && $hora != "" && $descricao != "" && $status != "" ) {
  
    try {
      
      $sql = " insert into compromisso (dt_compromisso,hr_compromisso,status_compromisso,descricao_compromisso,id_usuario) VALUES(:data,:hora,:status,:descricao,:user)";
      $prepare= $conn->prepare($sql);
           
    $prepare->bindParam(':data', $data);
    $prepare->bindParam(':hora', $hora);
        $prepare->bindParam(':descricao', $descricao);
        $prepare->bindParam(':status', $status);
      
      $prepare->bindParam(':user', $usuario);
     
  
           $retorno= $prepare->execute();
          
          if(! $retorno) {
          
            $_SESSION['mensagem'] = "0";
            $id =0;

            $id = "";
            $data = "";
            $hora = "";
            $descricao = "";
            $status = "";
            
  
  
       header('location: compromisso.php');
          
  
          }
          
        
          }
          catch(PDOException $e) {
            echo 'Error:'.$e->getMessage();
          }
      }
      else {
  
      }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Estilo customizado -->
    
    <link rel="stylesheet" type="text/css" href="css/contato.css">
    

    <!--teste 
    <link rel="stylesheet" href="css/boots.css">-->
    <style type="text/css">
      #home {
  
  color: white;
}
div {
  width: auto;
  height: auto;
}
input {
  margin-top: 20px;
}
h1 {
  color: white;
}
p {
  color: white;
}
/* The element to apply the animation to */
 nav {
  
 }

  
  




body {
 background-color: #d3d3d3 !important;
 height: auto;
 width: 100%;
 display: table;
  
}

footer p a {
  margin: 5px 15px;
  color: #ffc107;
  text-decoration: none;
}
#botao {
  margin-left: 400px;
}
h2 {
  color: blue;;
}
main {
  
  height: auto;
  padding-top: 100px;
  width: 100%;
}
form {

   padding-top: 40px;
   padding-bottom: 40px;
   padding-left: 40px;
   padding-right:  40px;
  background-color: #1C1B1B;
  

  
}

.formulario {
  width: 40%;
  padding-top:30px;
  padding-bottom: 30px;
  margin: 0 auto;
  background-color: #1C1B1B;
  text-align: center;

  
}
.formulario img {
width: 120px;
height: 120px;
margin-top:-60px;
margin-bottom: 30px;
}
input#usuario {
  background-image: url(../imagem/icone-usuario.png);
  background-repeat: no-repeat;
  background-position: 10px;
text-indent: 20px;
}
input#email {
  background-image: url(../imagem/icons8-e-mail-26.png);
  background-repeat: no-repeat;
  background-position: 50px;
  

}
input#senha {
  background-image: url(../imagem/icone-cadeado.png);
  background-repeat: no-repeat;
  background-position: 10px;
  text-indent: 20px;

}
h1 {
  color: white;
}
p {
  color: white;
}.formulario2 {
  width: 60%;
  padding-top:30px;
  padding-bottom: 30px;
  margin: 0 auto;


  text-align: center;

}
.titulo {
  background-color: black;
  color: white;

  text-indent: 10px;
}
.col1 {
  width: 10%;
  float: left;
  text-align: center;
  min-height: 2.05em;

}
.
#listagemdecompromissos {
  margin-top: 30px;
  width: 100%;
  display:block;
  margin-left: auto;
  margin-right: auto;
  background-color: transparent;
}
#lista {

  
   position: absolute;
   top: 70%;
  width:100%;
    background-color: transparent;

  display:block;
  height: auto;
}
#lista2 {
   position: absolute;
   
  width:100%;
    background-color: transparent;
  display:block;
  height: auto;
}
#imagemcarregando {
  
  display: block;
    margin-left: auto;
    margin-right: auto;
}
#listacontatos {
  margin-top: 30px;
  width: : auto;
  display:block;
  margin-left: auto;
  margin-right: auto;
  background-color: white;
}
nav {
  width: auto;
  height: auto;
}
header {
  height:auto !important;
}

    </style>
   

    </head>
    <header><!-- inicio Cabecalho -->
      <nav class="navbar navbar-expand-sm navbar-light bg-primary">
        <div class="container">
          
          <a href="inicial.php" class="navbar-brand">
            <img src="imagem/agenda.png" width="70" style = "height:3em;">
          </a>

        
            <ul class="nav ml-auto ">
            <li class="nav-item" >
              
              <a href="inicial.php
              " class="btn btn-outline-light ml-4 " id= "" style ="margin-left:1em;"> <i class="fas fa-home" alt="tela inicial" title ="tela inicial"></i> </a>
</li>
             
              <li class="nav-item" >
              
              <a href="contato.php
              " class="btn btn-outline-light ml-4  " id= ""><i class="far fa-address-book" alt="contato" title= "contato"></i></a>
</li>
             
             
              <li class="nav-item">
              <a href="compromisso.php" class="btn btn-outline-light ml-4 " id= ""><i class="far fa-calendar-check" alt="compromisso" title= "compromisso"></i></i></a>
              </li>
              <li class="nav-item">
                <a href="sair.php" class="btn btn-outline-light ml-4 " id= ""><i class="fas fa-power-off" alt="desligar" title="desligar"></i></a>
              </li>
            </ul>
          </div>

        </div>
      </nav>
    
     
    </header><!--/fim Cabecalho -->
    <main> 
    <a href="compromisso.php"> <h1 style =" color : white; text-align: center;"> Compromisso </h1> </a>
 <!-- <section class="compromisso_hj"> 
     <h1>Compromisso(os) Para Hoje:</h1> -->
     <?php
         
         /*     $sql= "select * from compromisso where dt_compromisso = '$date' and id_usuario = $usuario";
                    
                
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

                 //   if ($email == true) {

                     // $sql= "select * from compromisso where dt_compromisso = '$date' and id_usuario = $usuario  and hr_compromisso  = '$hor'";
                    
                
                    //  $prepare= $conn->prepare($sql);
                    //   $retorno= $prepare->execute();
                    //   $retorno = $prepare->fetchAll(PDO::FETCH_OBJ);
                       
                       
                      // if($prepare->rowCount()  >= 1 ) 
                      // {
                      // print("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
                       //exit();
                       //$sql = "select * from usuario where id_usuario = '$usuario' ";

 
//  $prepare = $conn->prepare($sql);
 // $prepare->execute();
  //$retorno = $prepare-> fetchObject();
 // if($prepare->rowCount() >= 1) {
  //  mail();

    
    
    
   
    
//require_once("..\PHPMailer-master\src/PHPMailer.php");
//require_once("..\PHPMailer-master\src/Exception.php");


//$assunnto = "Você tem um compromisso";
//$mensagem = " aceesse a agenda 2000 para ver seu compromisso";
//$mailer = new PHPMailer();

 //$mail->IsSMTP(); 
 //$mail->CharSet = 'UTF-8';
 
 //$mail->Host = "agendadoismil@gmail.com"; // Servidor SMTP
 //$mail->SMTPSecure = "tls"; // conexão segura com TLS
 //$mail->Port = 587; 
 //$mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
 //$mail->Username = "agendadoismil@gmail.com"; // SMTP username
 //$mail->Password = "Kes@1003"; // SMTP password
 //$mail->From = $email_enviar; // From
 //$mail->FromName = "Agenda 2000" ; // Nome de quem envia o email
 //$mail->AddAddress($email_enviar, $nome_enviar); // Email e nome de quem receberá //Responder
 //$mail->WordWrap = 50; // Definir quebra de linha
 //$mail->IsHTML = true ; // Enviar como HTML
 //$mail->Subject = "Compromisso para Hoje"; // Assunto
// $mail->Body = "<br/>' acesse o nosso site para ver compromisso <a>agenda2000.epizy.com</a>'<br/>' " ; //Corpo da mensagem caso seja HTML
 //$mail->AltBody = "$mensagem" ; //PlainText, para caso quem receber o email não aceite o corpo HTML
 //print_r($mail);
 //exit();
//$enviado = $mail->Send();




              }
                   
                else {
                    print("<div class='alert alert-success' role='alert'>
                   você não tem nenhum compromisso agendado, para hoje diverte-se ou leia um livro :-)!!
                   </div>");
                   } */
              

              
             
            
                  
     ?>
    



    <section>
 
    <form class="container col-xs-12 col-sm-6 col-md-6 col-lg-7" style = "margin-top: 60px; margin-bottom: 40px; background-color: #1C1B1B; padding-top: 30px; padding-bottom: 30px;"  name="form" method="post" action="compromisso.php" >
    <h4 style = "color: white;"> Selecione o dia do compromisso </h4>
          <input type="date" class="form-control"  required name="data" class="form-control" value="<?php print $data; ?>"> <br/>
          <h4 style = "color: white;"> Selecione  o horário do compromisso </h4>
    
        
          <input type="time" class="form-control" required name="hora" class="form-control" value="<?php print $hora; ?>" ><br/>
          
          <h4 style = "color: white;"> Descrição  do compromisso </h4>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="descricao" required  > <?php echo $descricao; ?></textarea><br/>
          <h4 style = "color: white;"> Situação do compromisso </h4>
        
  <input type="radio"  name="status" value="feito" <?php if($status=='feito'){echo 'checked';}?> required>
  <label style = "color: white;"  >Feito</label>
  <input type="radio"  name="status" value="não feito" <?php if($status=='não feito'){echo 'checked';}?>  required>
  <label style = "color: white;" >Não Feito</label>
  <input type="radio" name="status" value="fazendo" <?php if($status=='fazendo'){echo 'checked';}?>  required>
  <label style = "color: white;" >Em Andamento</label>

  <input type="radio" name="status"  value="fazer" <?php if($status=='fazer'){echo 'checked';}?>  required>
  <label  style = "color: white;" >Á fazer</label>

  <input type="hidden" name="id" value="<?php print $id; ?>">
            
              <button type="submit" class="btn btn-primary" class="display-4" name="enviar" style="width:100%;">guardar compromisso</button> 
              
</form>         
        
          
           
      
            
              <?php
            
           /* $sql="select * from compromisso where id_usuario='$usuario'";
  
          
            $prepare= $conn->prepare($sql);
             $retorno= $prepare->execute();
             $retorno = $prepare->fetchAll(PDO::FETCH_OBJ);
             if($prepare->rowCount()  >= 1 ) 
             {
                  
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
                   
                  }
                
                    else {
                      print("<div class='alert alert-warning' role='alert'>
                      você não tem nenhum compromisso na sua agenda, para ter basta inseir nos campos acima!!
                      </div>");

                     } */
                     
                    
                   

                 
        ?>
        </section>

    
        <form style = "margin-top:50px; background-color: transparent;"  class=" container col-xs-12 col-sm-12 col-md-12 col-lg-12"  class="" name="form" method="post" action="inicial.php" >
       <h4 style = "color: white; text-align:center;"> Selecione o dia do compromisso </h4>
          
          <input type="date" class="form-control container col-xs-4 col-sm-4 col-md-4 col-lg-4" id ="data" $  required name="data" class="form-control" value="<?php print $date; ?>"> <br/>
      
      
</form>
        <!-- Listagem de compromissos  -->
        <section id="lista2" style ="background-color: transparent;"> 
            <img src="imagem/loading.gif" id="imagemcarregando" style="display:block;" />
         

            <section id="listagemdecompromissos" >
         
            </section>
            </section>

      
   
</main>

 

    </body>
    

    <script src="ajax.js"></script>
 <script src="js/jquery.min.js"></script>
<script src="js/util.js"></script>

	
    </html>
    
