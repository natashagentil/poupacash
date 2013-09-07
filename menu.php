<?php
  session_start();
  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit;
  }
?>

<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
    
?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $_SESSION['nome'];?></title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap-responsive.min.css">
    <!-- Estilo padrão-->
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="icon" type="image/png" href="img/icone.png" />
  </head>
  <body>
    <div class="container offset4"> 
      <img src="img/logo_poupacash.png" alt="Poupacash" />
    </div>
    <div class="container"> 
      
      <form class="form-horizontal well span5 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          <div class="control-group centro">

            <input type="button" class="btn-large btn-warning" name"gasto" value="Gasto" onclick="location.href='gasto.php'">
            <input type="button" class="btn-large btn-info" name"renda" value="Renda" onclick="location.href='renda.php'">
           
          </div>
          
          <div class="control-group centro">
            
            <input type="button" id="logar" name="login" placeholder="logando" class="btn-large btn-warning" 
              value="Histórico Gasto" onclick="location.href='resultado.php'">

            <input type="button" id="logar" name="login" placeholder="logando" class="btn-large btn-info" 
              value="Histórico Renda" onclick="location.href='historico_renda.php'">
            
          </div>

          <div class="control-group centro">
            
                
                <input type="button" class="btn-large btn-primary" name"botao2" value="Balanço Geral" onclick="location.href='logout.php'">
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