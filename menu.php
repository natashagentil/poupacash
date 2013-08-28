<?php
  $host = 'localhost'; // conexão do bd
  $user = 'root'; // usuário do bd
  $pass = '123456'; // senha do bd
  $banco = 'poupacash'; // nome do bd

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
  </body>
</html>