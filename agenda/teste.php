<?php




require_once ("conexao.php");
require_once ("valida.php");

$id =0;
$nome ="";
$email ="";
$telefone = "";
$celular= "";
$endereco = "";
$cep="";
$bairro = "";
$cidade = "";
$uf="";
$id = "";




if(isset($_GET['id'])) {
  $id= $_GET['id'];
  $_POST["id"]= $id;
  $sql = "select * from contato where id_contato = $id ";

 
  $prepare = $conn->prepare($sql);
  $prepare->execute();
  $retorno = $prepare-> fetchObject();
  if($prepare->rowCount() >= 1) {
    
	
    $nome = $retorno->nome_contato;
    $telefone = $retorno->tel_contato;
    
    $celular = $retorno->cel_contato;
    
    $email = $retorno->email_contato;
    
    $endereco = $retorno->endereco_contato;
    
    $bairro = $retorno->bairro_contato;
    
    $cidade = $retorno->cidade_contato;
    
    $cep = $retorno->cep_contato;
    
    $uf = $retorno->uf_contato;
  }
}




$usuario = $_SESSION['id'];

if (isset($_POST["enviar"])) {
  
 
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $telefone = $_POST["telefone"];
  $celular = $_POST["celular"];
 $endereco = $_POST["endereco"];
 $bairro = $_POST["bairro"];
  $cep = $_POST["cep"];
 $cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$id = $_POST["id"];

if( $id != "" && $nome != "" ) {

try {
  $sql = "UPDATE contato SET nome_contato = :nome, email_contato = :email, cel_contato = :cel, tel_contato = :tel, endereco_contato = :endereco, bairro_contato = :bairro, cidade_contato = :cidade, cep_contato  = :cep, uf_contato = :uf WHERE id_contato = :id";
  
  $prepare = $conn->prepare($sql);
  

      
  $prepare->bindParam(':nome', $nome);
  $prepare->bindParam(':email', $email);
      $prepare->bindParam(':cel', $celular);
      $prepare->bindParam(':tel', $telefone);
      $prepare->bindParam(':endereco', $endereco);
      $prepare->bindParam(':cep', $cep);
      $prepare->bindParam(':bairro', $bairro);
      $prepare->bindParam(':cidade', $cidade);
      $prepare->bindParam(':uf', $uf);
      $prepare->bindParam(':id', $id);
      $retorno= $prepare->execute();
      if(! $retorno) {
        
        $_SESSION['mensagem'] = "0";
        $id =0;
$nome ="";
$email ="";
$telefone = "";
$celular= "";
$endereco = "";
$cep="";
$bairro = "";
$cidade = "";
$uf="";
$id = "";

 $_POST["nome"] = $nome;
 $_POST["email"] = $email;
$telefone = $_POST["telefone"] = $telefone;
$_POST["celular"] = $celular;
 $_POST["endereco"] = $endereco;
$_POST["bairro"] = $bairro;
 $_POST["cep"] = $cep;
 $_POST["cidade"] = $cidade;
 $_POST["uf"] = $uf;
$_POST["id"] = $id;



   header('location: teste.php');
      

      
      
    
    
    }
  }
      catch(PDOException $e) {
        echo 'Error:'.$e->getMessage();
      }
  
  
  }




if  ( $id == "" && $nome != "") {
  
  try {
    
    $sql = " insert into contato (nome_contato,email_contato,tel_contato,cel_contato,endereco_contato,bairro_contato,cep_contato,cidade_contato,uf_contato,id_usuario) VALUES(:nome,:email,:tel,:cel,:endereco,:bairro,:cep,:cidade,:uf,:user)";
    $prepare= $conn->prepare($sql);
         
  $prepare->bindParam(':nome', $nome);
  $prepare->bindParam(':email', $email);
      $prepare->bindParam(':cel', $celular);
      $prepare->bindParam(':tel', $telefone);
      $prepare->bindParam(':endereco', $endereco);
      $prepare->bindParam(':cep', $cep);
      $prepare->bindParam(':bairro', $bairro);
      $prepare->bindParam(':cidade', $cidade);
      $prepare->bindParam(':uf', $uf);
    $prepare->bindParam(':user', $usuario);
   

         $retorno= $prepare->execute();
        
        if(! $retorno) {
        
          $_SESSION['mensagem'] = "0";
          $id =0;
$nome ="";
$email ="";
$telefone = "";
$celular= "";
$endereco = "";
$cep="";
$bairro = "";
$cidade = "";
$uf="";
$id = "";

$_POST["nome"] = $nome;
$_POST["email"] = $email;
$telefone = $_POST["telefone"] = $telefone;
$_POST["celular"] = $celular;
$_POST["endereco"] = $endereco;
$_POST["bairro"] = $bairro;
$_POST["cep"] = $cep;
$_POST["cidade"] = $cidade;
$_POST["uf"] = $uf;
$_POST["id"] = $id;




     header('location: teste.php');
        

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
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/contato.css">
    <link rel="stylesheet" type="text/css" href="css/contato.js">
    
  </head>
  <body>
    
    <header><!-- inicio Cabecalho -->
      <nav class="navbar navbar-expand-sm navbar-light bg-primary">
        <div class="container">
          
          <a href="#" class="navbar-brand">
            <img src="imagem/agenda.png" width="142"style="height:3em; width:30%">
          </a>

        
            <ul class="navbar-nav ml-auto">
             
              <li class="nav-item">
              <a href="" class="btn btn-outline-light ml-4 " id= ""><i class="far fa-calendar-check" alt="compromisso" title= "compromisso"></i></i></a>
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
    
    
    <form class="mt-4 mb-4" name="form" method="post" action="teste.php" >
          
          <input type="text" placeholder="nome do contato:" class="form-control"  required name="nome" class="form-control"  value="<?php print $nome; ?>" ><br/>
        
          <input type="email" placeholder="email do contato:" class="form-control"  name="email"class="form-control"  value="<?php print $email; ?>"  ><br/>
          
            <input type="tel" placeholder=" numero de telefone do contato:" class="form-control"  name="telefone"  value="<?php print $telefone; ?>" class="form-control"><br/>
        
            <input type="tel" placeholder=" numero de celular do contato:" class="form-control"  name="celular" class="form-control"  value="<?php print $celular; ?>" ><br/>
                        <input type="text" placeholder=" endereço do contato:" class="form-control" name="endereco"class="form-control"  value="<?php print $endereco; ?>" ><br/>
        
            <input type="tel" placeholder=" cep do contato:" class="form-control"  name="cep"  value="<?php print $cep; ?>" ><br/>
            <input type="text" placeholder=" bairro do contato:" class="form-control"  name="bairro" class="form-control"  value="<?php print $bairro;?>" ><br/>
            <input type="hidden" name="id" value="<?php print $id; ?>">
        
            <input type="text" placeholder=" cidade do contato:" class="form-control"  name="cidade"class="form-control"   value="<?php print $cidade; ?>"><br/>
            
            <select class="form-control" name="uf"  value="<?php print $uf;?>">
            
            <option>AC</option>
            <option>AL</option>
            <option>AM</option>
            <option>AP</option>
            
            <option>BA</option>
            <option>CE</option>
            <option>DF</option>
            <option>ES</option>
            <option>GO</option>
            <option>MA</option>
            <option>MG</option>
            <option>MS</option>
            <option>MT</option>
            <option>PA</option>
            <option>PB</option>
            <option>PE</option>
            <option>PI</option>
            <option>RJ</option>
            <option>RN</option>
            <option>RO</option>
            <option>RR</option>
            <option>RS</option>
            <option>SC</option>
            <option>SE</option>
            <option>SP</option>
            <option>TO </option>

            </select><br/>
            
         
        
            
              <button type="submit" class="btn btn-primary" class="display-4" name="enviar" style="width:100%;">guardar contato</button> 
              
</form>         
            </section>
          
           
  

    <div id="erro">
          <?php 
                   
                 if  (isset($_SESSION['mensagem']) && $_SESSION['mensagem'] == "0") {
                 print "<div class='alert alert-danger' role='alert'>
                 erro ao inserir os dados!!
               </div>" ;
                 }
                ?>
                	<h2>Contatos</h2>
				<?php
            
            $sql="select * from contato where id_usuario='$usuario'";
  
          
            $prepare= $conn->prepare($sql);
             $retorno= $prepare->execute();
             $retorno = $prepare->fetchAll(PDO::FETCH_OBJ);
             if($prepare->rowCount()  >= 1 ) 
             {
                  $sql= "select * from contato ORDER BY nome_contato ASC";
                  $prepare= $conn->prepare($sql);
                   $retorno= $prepare->execute();
                   $retorno = $prepare->fetchAll(PDO::FETCH_OBJ);
                   if($prepare->rowCount()  >= 1 ) 
                   {
                    foreach ($retorno as $linha) {
                     
                  
                print ("<div class=' clearfix'>
               <div class='bg-primary float-none'><h4 style='color:white;'>contato: $linha->nome_contato</h4></div>
               <div class='bg-dark float-none'><p style='color:white;'>Numero de registro</p></div>
               <div class='float-none'>$linha->id_contato </div>
                <div class='bg-dark float-none'><p style='color:white;'>Telefone</p></div>
                <div class='float-none'>$linha->tel_contato </div>
                <div class='bg-dark float-none'><p style='color:white;'>Celular</p></div>
                <div class='float-none'>$linha->cel_contato </div>
                <div class='bg-dark float-none'><p style='color:white;'>Email</p></div>
                <div class='float-none'>$linha->email_contato </div>
                <div class='bg-dark float-none'><p style='color:white;'>Endereço</p></div>
                <div class='float-none'>$linha->endereco_contato</div>
                <div class='bg-dark float-none'><p style='color:white;'>Bairro</p></div>
                <div class='float-none'>$linha->bairro_contato </div>
                <div class='bg-dark float-none'><p style='color:white;'>Cidade</p></div>
                <div class='float-none'>$linha->cidade_contato </div>
                <div class='bg-dark float-none'><p style='color:white;'>Cep</p></div>
                <div class='float-none'>$linha->cep_contato </div>
                <div class='bg-dark float-none'><p>UF</p></div>
                <div class='float-none'>$linha->uf_contato </div>
                <div class='bg-dark float-none'><p style='color:white;'>Alterar</p></div>
                <div class='float-none'> <a href= 'teste.php?id=$linha->id_contato' class= 'btn btn-outline-dark ml-4'><i class='fas fa-user-edit' alt='editar' title='editar'></i></a></div>
                <div class='bg-dark float-none'><p style='color:white;'>Excluir</p></div>
                <div class='float-none'><a href='delete.php?id=$linha->id_contato'class='btn btn-outline-dark ml-4'><i class='fas fa-trash' alt='excluir' title='excluir'></i></a> </div> 	
                    </div> 
                  
                     </div>");
                    }
                   
                  }
                }
                   	else {
                   		print("<div class='alert alert-warning' role='alert'>
                      você não tem nenhum contato na sua agenda, para ter basta inseir nos campos acima!!
                      </div>");

                     }
                    
                   

                 
				?>

      
    </main>
    </body>
    </html>
