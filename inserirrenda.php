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
    <title>Inserir Renda</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap-responsive.min.css">
  </head>
  <body>
    <h1><center>Inserir Renda</center></h1>
    
    <div class="container"> 
      <form class="form-horizontal well span6 offset3">

        <div class="control-group">
        
          <label class="control-label" for="inputDescricao">Descricao</label>
          <div class="controls">
            <input type="text" id="inputDescricaoRenda" name="descricaorenda" placeholder="Digite uma breve descricao sobre a sua renda">
          </div>

          <label class="control-label" for="inputValorRenda">Valor</label>
          <div class="controls">
            <input type="text" id="inputValorRenda" name="valorrenda" placeholder="Digite o valor da renda">
          </div>

          <label class="control-label" for="inputdatalancamento">Data Lancamento</label>
          <div class="controls">
            <input type="text" id="inputDataLancamento" name="datalancamento" placeholder="Digite a data do lancamento">
          </div>
             
        </div>

      </form>

    </div>
    
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  
  </body>
</html>