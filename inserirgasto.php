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
    <title>Inserir Gastos</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap-responsive.min.css">
  </head>
  <body>
    <h1><center>Inserir Gastos</center></h1>
    
    <div class="container">

      <form class="form-horizontal well span6 offset3">

        <div class="control-group">
        
          <label class="control-label" for="inputDescricaogasto">Descricao</label>
          <div class="controls">
              <input type="text" id="inputDescricaoGasto" name="descricaogasto" placeholder="Digite uma breve descricao sobre seu gasto">
          </div>

          <label class="control-label" for="inputValorGasto">Valor</label>
          <div class="controls">
              <input type="text" id="inputValorGasto" name="valorgasto" placeholder="Digite o valor do gasto">
          </div>

          <label class="control-label" for="inputDataPgto">Data Pagamento</label>
          <div class="controls">
              <input type="text" id="inputdata_base_pgto" name="DataPgto" placeholder="Digite uma data base para o pagamento">
          </div>
              
        </div>

      </form>

    </div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>