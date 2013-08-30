<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
    
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
    <title>Menu Poupacash</title>
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
      <h1 class="centro">Menu Poupacash</h1>
      <form class="form-horizontal well span5 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          <div class="control-group centro">

            <input type="button" class="btn-large btn-primary" name"gasto" value="Gasto" onclick="location.href='gasto.php'">
            <input type="button" class="btn-large btn-info" name"renda" value="Renda" onclick="location.href='renda.php'">
           
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