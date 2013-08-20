<?php
  $host = 'localhost'; // conexão do bd
    $user = 'root'; // usuário do bd
    $pass = '123456'; // senha do bd
    $banco = 'sistema_financeiro'; // nome do bd

    // variável responsável pela conexão com o bd
    $conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
    mysql_select_db($banco) or die (mysql_error());
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Home</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap-responsive.min.css">
  </head>
  <body>
    <!-- FAZENDO O COMMIT DE TESTE2 -->
    <h1><center>Poupa Cash System</center></h1>
    <div class="container"> 
     


    </div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>