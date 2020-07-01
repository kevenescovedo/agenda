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
$numero = "";
$usuario = $_SESSION['id'];




if(isset($_GET['id'])) {
  $id= $_GET['id'];
  $_POST["id"]= $id;
  $sql = "select * from contato where id_contato = $id ";

 
  $prepare = $conn->prepare($sql);
  $prepare->execute();
  $retorno = $prepare-> fetchObject();
  if($prepare->rowCount() >= 1) {
    
  
    $celular = $retorno->cel_contato;
    $email = $retorno->email_contato;
    $telefone = $retorno->tel_contato;
    $endereco = $retorno->endereco_contato;
    $nome = $retorno->nome_contato;
    $bairro = $retorno->bairro_contato;
    $cidade = $retorno->cidade_contato;
    $uf = $retorno->uf_contato;
    $cep = $retorno->cep_contato;
     $numero = $retorno->numero_contato;
    
    
   
 
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
$numero = $_POST["numero"];

if( $id != "" && $nome != "" ) {

try {
  $sql = "UPDATE contato SET nome_contato = :nome, email_contato = :email, cel_contato = :cel, tel_contato = :tel, endereco_contato = :endereco, bairro_contato = :bairro, cidade_contato = :cidade, cep_contato  = :cep, uf_contato = :uf, numero_contato = :numero WHERE id_contato = :id";
  
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
      $prepare->bindParam(':numero', $numero);
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
$numero ="";
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
$_POST{"numero"} = $numero;


   header('location: contato.php');
      

      
      
    
    
    }
  }
      catch(PDOException $e) {
        echo 'Error:'.$e->getMessage();
      }
  
  
  }




if  ( $id == "" && $nome != "") {
  
  try {
    
    $sql = " insert into contato (nome_contato,email_contato,tel_contato,cel_contato,endereco_contato,bairro_contato,cep_contato,cidade_contato,uf_contato,id_usuario,numero_contato) VALUES(:nome,:email,:tel,:cel,:endereco,:bairro,:cep,:cidade,:uf,:user,:numero)";
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
    $prepare->bindParam(':numero', $numero);
   

         $retorno= $prepare->execute();
        
        if(!$retorno) {
        
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
$numero = "";






     header('location: contato.php');
        $_POST["nome"] = "";
$_POST["email"] = "";
$telefone = $_POST["telefone"] = "";
$_POST["celular"] = "";
$_POST["endereco"] = "";
$_POST["bairro"] = "";
$_POST["cep"] = "";
$_POST["cidade"] = "";
$_POST["uf"] = "";
$_POST["id"] = "";
$_POST["numero"] = "";

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
    
   
    
    <link rel="stylesheet" type="text/css" href="css/contato.js">
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
  background-color: #d3d3d3;
  width: 100%;
  height: auto;
  background-repeat: no-repeat;
  background-attachment: auto;
  
     height: auto;
   
  
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
  width: auto;
  display:block;
  margin-left: auto;
  margin-right: auto;
  background-color: white;
}
#lista {

  
   position: absolute;
   top: 70%;
  width:100%;
    background-color: #C0C0C0;
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
  width: : 100%;
  display:block;
  margin-left: auto;
  margin-right: auto;
  background-color: transparent;
}
nav {
  width: auto;
  height: auto;
}
header {
  height:auto !important;
}

    </style>
   
    <script>
  
      function getporCep(cep) {
      
       let url = 'https://api.postmon.com.br/v1/cep/'+ cep
       let xmlhttp = new XMLHttpRequest()
       xmlhttp.open('GET',url)
       xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
        let dadosJason = xmlhttp.responseText
        let dadosJasonobj = JSON.parse(dadosJason)
       
        console .log( dadosJasonobj.bairro)
        console .log( dadosJasonobj.localidade)
        console.log(dadosJasonobj.logradouro)
        document.getElementById("rua").value =  dadosJasonobj.logradouro
        document.getElementById("bairro").value =  dadosJasonobj.bairro
         document.getElementById("cidade").value =  dadosJasonobj.cidade
        document.getElementById("uf").value =  dadosJasonobj.estado
        document.getElementById("numero").focus()

        }

       }
      
       xmlhttp.send()
      }
    </script>
  </head>
  <body>
    
    <header><!-- inicio Cabecalho -->
    <nav class="navbar navbar-expand-sm navbar-light bg-primary">
        <div class="container">
          
          <a href="inicial.php" class="navbar-brand">
            <img src="imagem/agenda.png" width="70" style = "height:3em;">
          </a>
                
        
            <ul class="nav ml-auto ">
            <li class="nav-item" >
              
              <a href="inicial.php
              " class="btn btn-outline-light ml-4" id= ""> <i class="fas fa-home" alt="tela inicial" title ="tela inicial"></i> </a>
</li>
             
              <li class="nav-item" >
              
              <a href="contato.php
              " class="btn btn-outline-light ml-4" id= ""><i class="far fa-address-book" alt="contato" title= "contato"></i></a>
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
  
    <section class="ww">
    <a href="contato.php"> <h1 style =" color : white; text-align: center;"> Contatos </h1> </a>
    <form  name="form" method="post" action="contato.php"  class="container col-xs-12 col-sm-6 col-md-6 col-lg-7" style = "margin-top: 60px; margin-bottom: 40px; background-color: #1C1B1B; padding-top: 30px; padding-bottom: 30px;" >
          
          <input type="text" placeholder="nome do contato:" class="form-control"  required name="nome" class="form-control"  value="<?php print $nome; ?>" ><br/>
        
          <input type="email" placeholder="email do contato:" class="form-control"  name="email"class="form-control"  value="<?php print $email; ?>"  ><br/>
          
            <input type="tel" placeholder=" numero de telefone do contato:" class="form-control"  name="telefone"  value="<?php print $telefone; ?>" class="form-control"><br/>
        
            <input type="tel" placeholder=" numero de celular do contato:" class="form-control"  name="celular" class="form-control"  value="<?php print $celular; ?>" ><br/>
             <input type="text" placeholder=" cep do contato:" class="form-control" id="cep"  name="cep"  value="<?php print $cep; ?>"onblur="getporCep(this.value)" ><br/>
            <input type="text" placeholder=" rua do contato:" id = "rua" class="form-control" name="endereco"class="form-control"  value="<?php print $endereco; ?>" ><br/>
        
           
            <input type="text" placeholder=" bairro do contato:" id = "bairro" class="form-control"  name="bairro" class="form-control"  value="<?php print $bairro;?>" ><br/>
            <input type="hidden" name="id" value="<?php print $id; ?>">
        
            <input type="text" placeholder=" cidade do contato:" id ="cidade" class="form-control"  name="cidade"class="form-control"   value="<?php print $cidade; ?>"><br/>
            
            <select class="form-control" name="uf" id="uf" <?php print $uf;?>>
            
            <option <?php if($uf=='AL'){echo 'selected';}?>>AC</option>
            <option <?php if($uf=='AL'){echo 'selected';}?>>AL</option>
            <option <?php if($uf=='AM'){echo 'selected';}?>>AM</option>
            <option <?php if($uf=='AP'){echo 'selected';}?>>AP</option>
            
            <option <?php if($uf=='BA'){echo 'selected';}?>>BA</option>
            <option <?php if($uf=='CE'){echo 'selected';}?>>CE</option>
            <option <?php if($uf=='DF'){echo 'selected';}?>>DF</option>
            <option <?php if($uf=='ES'){echo 'selected';}?>>ES</option>
            <option <?php if($uf=='GO'){echo 'selected';}?>>GO</option>
            <option <?php if($uf=='MA'){echo 'selected';}?>>MA</option>
            <option <?php if($uf=='MG'){echo 'selected';}?>>MG</option>
            <option <?php if($uf=='MS'){echo 'selected';}?>>MS</option>
            <option <?php if($uf=='MT'){echo 'selected';}?>>MT</option>
            <option <?php if($uf=='PA'){echo 'selected';}?>>PA</option>
            <option <?php if($uf=='PB'){echo 'selected';}?>>PB</option>
            <option <?php if($uf=='PE'){echo 'selected';}?>>PE</option>
            <option <?php if($uf=='PI'){echo 'selected';}?>>PI</option>
            <option <?php if($uf=='RJ'){echo 'selected';}?>>RJ</option>
            <option <?php if($uf=='RN'){echo 'selected';}?>>RN</option>
            <option <?php if($uf=='RO'){echo 'selected';}?>>RO</option>
            <option <?php if($uf=='RR'){echo 'selected';}?>>RR</option>
            <option <?php if($uf=='RS'){echo 'selected';}?>>RS</option>
            <option <?php if($uf=='SC'){echo 'selected';}?>>SC</option>
            <option <?php if($uf=='SE'){echo 'selected';}?>>SE</option>
            <option <?php if($uf=='SP'){echo 'selected';}?>>SP</option>
            <option <?php if($uf=='TO'){echo 'selected';}?>>T0</option>

            </select><br/>
            <input type="text" placeholder=" numero da residência do contato:" id ="numero" class="form-control"  name="numero"class="form-control"   value="<?php print $numero; ?>"><br/>
         
        
            
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
                	
        <section id="lista2">
          
        <h2 style ="color: blue; text-align:center;">Contatos</h2>
				<?php
            
            $sql="select * from contato where id_usuario= '$usuario'";

           
            $prepare= $conn->prepare($sql);
             $retorno= $prepare->execute();
             $retorno = $prepare->fetchAll(PDO::FETCH_OBJ);
             
             if($prepare->rowCount()  >= 1 ) 
             {
                  $sql= "select * from contato where id_usuario = '$usuario' ORDER BY nome_contato ASC";
                  $prepare= $conn->prepare($sql);
                   $retorno= $prepare->execute();
                   $retorno = $prepare->fetchAll(PDO::FETCH_OBJ);
                 
                 
                   if($prepare->rowCount()  >= 1 ) 
                   {
                    foreach ($retorno as $linha) {
                     
                  
                print ("<section id='listacontatos' class ='col-xs-12 col-sm-12 col-md-6' style='background-color:white;'><div class=' clearfix'>
               <div class='bg-primary float-none'><h4 style='color:white;'>contato: $linha->nome_contato</h4></div>
          <div class='bg-dark float-none' ><p style='color:white;'>Telefone</p></div>
                <div class='float-none bg-light ' style = 'margin:0 auto;'>$linha->tel_contato </div>
                <div class='bg-dark float-none'><p style='color:white;'>Celular</p></div>
                <div class='float-none bg-light'>$linha->cel_contato </div>
                <div class='bg-dark float-none'><p style='color:white;'>Email</p></div>
                <div class='float-none bg-light'>$linha->email_contato </div>
                <div class='bg-dark float-none'><p style='color:white;'>Endereço</p></div>
                <div class='float-none bg-light'>$linha->endereco_contato</div>
                <div class='bg-dark float-none'><p style='color:white;'>Bairro</p></div>
                <div class='float-none bg-light'>$linha->bairro_contato </div>
                <div class='bg-dark float-none bg-light'><p style='color:white;'>Cidade</p></div>
                <div class='float-none bg-light'>$linha->cidade_contato </div>
                <div class='bg-dark float-none'><p style='color:white;'>Cep</p></div>
                <div class='float-none bg-light'>$linha->cep_contato </div>
                <div class='bg-dark float-none'><p>UF</p></div>
                <div class='float-none bg-light'>$linha->uf_contato </div>
                <div class='bg-dark float-none'><p>Numero</p></div>
                <div class='float-none bg-light'>$linha->numero_contato </div>
                <div class='bg-dark float-none'><p style='color:white;'>Alterar &nbsp; &nbsp; &nbsp; &nbsp; Excluir</p></div>
                <div class='float-none bg-light'> <a href='contato.php?id=$linha->id_contato' class= 'btn btn-outline-dark ml-4'><i class='fas fa-user-edit' alt='editar' title='editar'></i></a>
            
                <a href='delete.php?id=$linha->id_contato'class='btn btn-outline-dark ml-4'><i class='fas fa-trash' alt='excluir' title='excluir'></i></a>	
                    </div> 
                  
                     </div></section>");
                    }
                   
                  }
                }
                   	else {
                   		print("<div class='alert alert-warning' role='alert'>
                      você não tem nenhum contato na sua agenda, para ter basta inseir nos campos acima!!
                      </div> </section>");

                     }
                    
                   

                 
				?>
      </section>
        </section>
                  

      
    </main>
    </body>
    </html>
