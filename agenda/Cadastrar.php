<?php
session_start();
require_once ("conexao.php");

$ok = "";
$usuario ="";
$email = "";
$senha="";
$nome="";
$id= "";
$_SESSION['mensagem'] = "";

if (isset($_POST["enviar"])) {
 
  $usuario = $_POST["usuario"];
  $email = $_POST["email"];
  $nome = $_POST["nome"];
  $senha = $_POST["senha"];
  $senha = sha1($senha);
  $senha = base64_encode($senha);
  $senha = base64_encode($senha);
  $usuario = sha1($usuario);
  $usuario = base64_encode($usuario);
  $usuario =  base64_encode($usuario);

  if  ($usuario != "" && $email != "" && $senha !="" && $id == "" && $nome != "") {
   
  $sql = "select * from usuario where username_usuario = :usuario and email_usuario = :email ";
  $prepare = $conn->prepare($sql);
  $prepare->bindParam(':usuario',$usuario);
  $prepare->bindParam(':email',$email);
  $prepare->execute();
  $retorno = $prepare-> fetchObject();
   
  if($prepare->rowCount()==1) 
  {
    $_SESSION['mensagem'] = "3";
  }
  else {
    $sql = "select * from usuario where username_usuario = :usuario  ";
    $prepare = $conn->prepare($sql);
    $prepare->bindParam(':usuario',$usuario);
    
    $prepare->execute();
    $retorno = $prepare-> fetchObject();
    if($prepare->rowCount()==1) 
    {
      $_SESSION['mensagem'] = "5";
    }
    else {
 
      $sql = "select * from usuario where email_usuario = :email  ";
      $prepare = $conn->prepare($sql);
      $prepare->bindParam(':email',$email);
      
      $prepare->execute();
      $retorno = $prepare-> fetchObject();
      if($prepare->rowCount()==1) 
      {
        $_SESSION['mensagem'] = "4";
      }else
      {
      try {
          $sql = " insert into usuario (username_usuario,email_usuario,senha_usuario,nome_usuario) VALUES(:usuario,:email,:senha,:nome)";
          $prepare= $conn->prepare($sql);
          $prepare->bindParam(':usuario', $usuario);
          $prepare->bindParam(':email', $email);
              $prepare->bindParam(':senha', $senha);
              $prepare->bindParam(':nome', $nome);
              $retorno= $prepare->execute();
              
              if(! $retorno) {
              
                $_SESSION['mensagem'] = "0";
                
              
      
              }
              if($retorno) {
               
              $ok = "1";
              $usuario= "";
              $id = "";
              $senha = "";
              $email= "";
              $_SESSION['mensagem'] ="1";
              header( "location:index.php");
             
            
              }
             
          }
      catch(PDOException $e) {
        echo 'Error:'.$e->getMessage();
      }
            
      }

 
}
  }

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
    <link rel="stylesheet" type="text/css" href="css/estilo.css">

    <title>Agenda-sua agenda virtual</title>
  </head>
  <body>
    
    <header><!-- inicio Cabecalho -->
    <nav class="navbar navbar-expand-sm navbar-light bg-primary">
        <div class="container">
          
          
          <a href="#" class="navbar-brand">
            <img src="imagem/agenda.png" width="142" style="height:3em; width:30%;">
          </a>

         

         
            <ul class="navbar-nav ml-auto">
            
             
              <li class="nav-item">
                <a href="index.php" class="btn btn-outline-light ml-4">Entrar</a>
              </li>
            </ul>
          </div>

       
        </nav>
    </header><!--/fim Cabecalho -->
    <body>
<main>
    <section id="home"><!-- Início seção home -->
      <div class="container">
        <div class="row">
          <div class="col-md-6 d-flex"><!-- Textos da seção -->
            <div class="align-self-center">
              <h1 class="display-4">Cadastro</h1>
              <p>
              Agenda 2000 é um sistema onde você armazena contatos e compromissos.
              </p>

              <form class="mt-4 mb-4" name="form" method="post" action="Cadastrar.php">
          
                <input type="text" placeholder=" nome do usuario:" class="form-control" required name="usuario"><br/>
                  <input type="email" placeholder="Seu e-mail:" class="form-control" required name="email"><br/>
                  <input type="text" placeholder="Seu nome completo:" class="form-control" required name="nome"><br/>
                  <input type="password" placeholder="Sua senha:" class="form-control" required name="senha"><br/>
               
              
                  
                    <button type="submit" class="btn btn-primary" class="display-4" name="enviar">Cadastre-se Agora mesmo!</button>
                     
                 
             

            </div>
          
</div>
          </div>
        
          </div><!--/fim textos da seção -->
         
                
              </div>
          
    </section><!--/fim seção home -->
   
    <div id="erro">
          <?php 
                   
                 if  (isset($_SESSION['mensagem']) && $_SESSION['mensagem'] == "0") {
                 print "<div class='alert alert-danger' role='alert'>
                 erro ao inserir os dados!!
               </div>" ;
                 }
                ?>
                
              </div>
             <div id="acerto"> 
                <?php 
                 if  (isset($_SESSION['mensagem']) && $_SESSION['mensagem']  == "1" ) {
               print ("<div class='alert alert-success' role='alert'>
               dados inseridos com sucesso!!
             </div>") ;
                 }
                ?>    
             </div>
             <div id="aviso"> 
                <?php 
                 if  (isset($_SESSION['mensagem']) && $_SESSION['mensagem']  == "3" ) {
               print ("<div class='alert alert-warning' role='alert'>
               nome de usuario ou email já cadastrado!! por favor tente outro nome de usuario ou email.!!
             </div>") ;
                 }
                ?>    
             </div>
             <div id="aviso"> 
                <?php 
                 if  (isset($_SESSION['mensagem']) && $_SESSION['mensagem']  == "4" ) {
               print ("<div class='alert alert-warning' role='alert'>
              email já cadastrado no sistema por favor tente outro!!
             </div>") ;
                 }
                ?>    
             </div>
             
             <div id="aviso"> 
                <?php 
                 if  (isset($_SESSION['mensagem']) && $_SESSION['mensagem']  == "5" ) {
               print ("<div class='alert alert-warning' role='alert'>
              usuario já cadastrado no sistema por favor tente outro!!
             </div>") ;
                 }
                ?>    
             </div>
     </main>
  </body>
</html>