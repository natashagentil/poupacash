<?php
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 00a1de77f0a614587c081433cae5a4b3ad59f783
  $host = 'localhost'; // conexão do bd
  $user = 'root'; // usuário do bd
  $pass = '123456'; // senha do bd
  $banco = 'poupacash'; // nome do bd
<<<<<<< HEAD
=======

  // variável responsável pela conexão com o bd
  $conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
  mysql_select_db($banco) or die (mysql_error());
?>

<?php
  session_start();
  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit;
  }
?>



=======
	$host = 'localhost'; // conexão do bd
	$user = 'root'; // usuário do bd
	$pass = '123456'; // senha do bd
	$banco = 'poupacash'; // nome do bd
>>>>>>> 00a1de77f0a614587c081433cae5a4b3ad59f783

  // variável responsável pela conexão com o bd
  $conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
  mysql_select_db($banco) or die (mysql_error());
?>

<?php
  session_start();
  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit;
  }
?>

>>>>>>> 0297b06dded843734064aee000bd538c95338793
<!DOCTYPE html>
<html>
  <head>
    <title>Login Poupa Cash</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap-responsive.min.css">
    <!-- Estilo padrão-->
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>
<<<<<<< HEAD
    <div class="container"> 
      <h1 class="centro">Menu Poupa Cash</h1>
      <form class="form-horizontal well span5 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          <div class="control-group centro">

            <input type="button" class="btn-large btn-primary" name"gasto" value="Gasto" onclick="location.href='inserirgasto.php'">
            <input type="button" class="btn-large btn-info" name"renda" value="Renda" onclick="location.href='inserirrenda.php'">
           
          </div>
          
          <div class="control-group centro">
            
                <input type="submit" id="logar" name="login" placeholder="logando" class="btn-large btn-success" value="Visualizar Gastos">
            
          </div>

          <div class="control-group centro">
            
                
                <input type="button" class="btn btn-danger" name"botao2" value="Sair" onclick="location.href='logout.php'">
          </div>
          
      </form>
    </div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
=======
<<<<<<< HEAD

    //data-toggle="button"

    <label class="controls" for="gasto"><a href="gasto.php">Inserir Gasto</a></label>
            <div class="controls">

                <button type="button" class="btn btn-gasto" data-toggle="button">Inserir Gasto</button>
               
            </div>


            <div class="controls"
            <button type="button" class="btn btn-renda" data-toggle="button">Inserir Renda</button>

            </div>


    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
=======
>>>>>>> 0297b06dded843734064aee000bd538c95338793
    
>>>>>>> 00a1de77f0a614587c081433cae5a4b3ad59f783
  </body>
</html>