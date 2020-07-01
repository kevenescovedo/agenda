<?php 
$uusario ="";
$senha ="";
$smg="";
$id = 0;
if (session_status() !== PHP_SESSION_ACTIVE)  {
	session_start();
}
require_once("conexao.php");
$msg ="";
//SE O USAURIO CLICAR NO BOTAO ENTRAR
if  (isset($_POST['entrar'])) {
	$usuario = $_POST['usuario'];
  $senha = $_POST['senha'];
  $senha = sha1($senha);
  $senha = base64_encode($senha);
  $senha = base64_encode($senha);
  $usuario = sha1($usuario);
  $usuario = base64_encode($usuario);
  $usuario =  base64_encode($usuario);
  
	//selecionar na tabela usuaios que se relacionam com o campo
	try{
		$sql = ("select * from usuario where username_usuario= :usuario and senha_usuario= :senha");
		//ligando varaivel com as celulas do campo
        $prepare=$conn->prepare($sql);
        $prepare->bindParam(':usuario',$usuario);	
        $prepare->bindParam(':senha',$senha);
        
		$prepare->execute();
		
        //para ver quantas linhas retornaram do select;
        if($prepare->rowCount()==1) {
        	//criar um seccao e salvar a informação do login nela
          $_SESSION['logado']= $usuario;
         
        
            $sql = "select * from usuario where username_usuario='$usuario'";
            $prepare = $conn->prepare($sql);
            $prepare->execute();
            $retorno = $prepare-> fetchObject();
            if($prepare->rowCount() >=1) {
              $id = $retorno->id_usuario;
            
            }
  $_SESSION['id'] = $id;
         

         
          $prepare->execute();
        

      
          header('location:inicial.php');
          

        }
    
        else {
        	$msg = "<div class='alert alert-warning' role='alert'>
            senha e usuario invalidos ou senha e usuario não coicidem !
           </div>" ;
        }
    }
        
    
    //vai aparacer caso ocorra qualquer erro no banco;
        catch(PDOEexcpetion $e) {
        	print "Desculpe deu erro";
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
     <link rel="stylesheet" type="text/css" href="css/entrar.css">

    <title>Agenda2000-sua agenda virtual</title>
  </head>
  <body>
    
    <header><!-- inicio Cabecalho -->
    <nav class="navbar navbar-expand-sm navbar-light bg-primary">
        <div class="container">
          
          
          <a href="index.php" class="navbar-brand">
          <img src="imagem/agenda.png" width="142" style="height:3em; width:30%;">
          </a>

         

         
            <ul class="navbar-nav ml-auto">
            
             
              <li class="nav-item">
                <a href="Cadastrar.php" class="btn btn-outline-light ml-4">Cadastrar</a>
              </li>
            </ul>
          </div>

       
        </nav>
    </header><!--/fim Cabecalho -->
    <body>
    <main> <section class=" container col-xs-12 col-sm-6 col-md-6 col-lg-3"> 
   
       <form  class="" name="form" method="post" action="index.php" >
          
          <input type="text" placeholder=" nome do usuario" class="form-control" required name="usuario" id="usuario" ><br/>
          <input type="password" placeholder="senha" class="form-control" required name="senha" id="senha" ><br/>
          <input type="hidden" name="id" value="<?php print $id; ?>">
            
              <button type="submit" class="btn btn-primary" class="display-4" name="entrar" style="width:100%;">entrar</button> 
</form>         <?php 
    print $msg;
   ?>
            </section> 
            </main>
            <!-- Listagem de Pessoas  -->
			
    </body>
      <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>