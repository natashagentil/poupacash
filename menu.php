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
    <title>Menu Poupa Cash</title>
    <meta charset="UTF-8"/>
  </head>
  <body>

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
    
    
  </body>
</html>