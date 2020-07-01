
<?php
date_default_timezone_set('America/Sao_Paulo');
$date =  date('Y-m-d');
$date = date('Y-m-d',strtotime($date));




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
    
    
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
   

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
  background-color: #d3d3d3;
  height: auto;
  width: 100%;
  background-size: cover;
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
  width: 100%;
  height: auto;
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
    background-color: #transparent;
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
              " class="btn btn-outline-light ml-4 " style ="margin-left:1em;"> <i class="fas fa-home" alt="tela inicial" title ="tela inicial"></i> </a>
</li>
             
              <li class="nav-item" >
              
              <a href="contato.php
              " class="btn btn-outline-light ml-4  " ><i class="far fa-address-book" alt="contato" title= "contato"></i></a>
</li>
             
             
              <li class="nav-item">
              <a href="compromisso.php" class="btn btn-outline-light ml-4 " ><i class="far fa-calendar-check" alt="compromisso" title= "compromisso"></i></i></a>
              </li>
              <li class="nav-item">
                <a href="sair.php" class="btn btn-outline-light ml-4 " ><i class="fas fa-power-off" alt="desligar" title="desligar"></i></a>
              </li>
            </ul>
          </div>

        </div>
      </nav>
    
     
    </header><!--/fim Cabecalho -->
    <body style="height: 50em;">
    <main> 
   
   
       <form style = " top : 30%; position: absolute;"  class=" container col-xs-12 col-sm-12 col-md-12 col-lg-12"  class="" name="form" method="post" action="inicial.php" >
       <h4 style = "color: white; text-align:center;"> Selecione o dia do compromisso </h4>
          
          <input type="date" class="form-control container col-xs-4 col-sm-4 col-md-4 col-lg-4" id ="data" $  required name="data" class="form-control" value="<?php print $date; ?>"> <br/>
      
      
</form>
        <!-- Listagem de compromissos  -->
        <section id="lista"> 
            
            <img src="imagem/loading.gif" id="imagemcarregando" style="display:block;" />
            
           
            <section id="listagemdecompromissos">
         
            </section>
              
           

            </section>
          
                    
          
           
            </main>
         
			
    </body>
      <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="ajax.js"></script>
 <script src="js/jquery.min.js"></script>
<script src="js/util.js"></script>
</html>