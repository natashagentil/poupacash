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

<?php

// CRUD DA TABELA INSERIR GASTOS

  // CREATE

  //$info = $_POST['contatos'];

  //$data = json_decode(stripslashes($info));

 
  $descricao = $data->descricao;
  $valor_medio = $data->valor_medio;
  $data_base_pgto = $data->data_base_pgto;

  //consulta sql
  // insere a informação do Gasto
  $query = sprintf("INSERT INTO Gasto (descricao, valor_medio, data_base_pgto) values ('%s', '%s', '%s')",
    mysql_real_escape_string($descricao),
    

  $rs = mysql_query($query);

  echo json_encode(array(
    "success" => mysql_errno() == 0,
    "Gasto" => array(
      "descricao" => $descricao,
      "valor_medio" => $valor_medio,
      "data_base_pgto" => $data_base_pgto
    )
  ));

  // DELETE

  $id = $data->id;

  //consulta sql
  // exclui a informação do gasto
  $query = sprintf("DELETE FROM Gasto WHERE id=%d",
    mysql_real_escape_string($id));

  $rs = mysql_query($query);

  echo json_encode(array(
    "success" => mysql_errno() == 0
  ));


  // UPDATE

  $descricao = $data->descricao;
  $valor_medio = $data->valor_medio;
  $data_base_pgto = $data->data_base_pgto;
  $id = $data->id;

  //consulta sql no bd pra fazer o UPDATE
  $query = sprintf("UPDATE Gasto SET descricao = '%s', valor_medio = '%s', data_base_pgto = '%s' WHERE id=%d",
    mysql_real_escape_string($descricao),
    mysql_real_escape_string($valor_medio),
    mysql_real_escape_string($data_base_pgto),
    mysql_real_escape_string($id));

  $rs = mysql_query($query);

  echo json_encode(array(
    "success" => mysql_errno() == 0,
    "contatos" => array(
      "id" => $id,
      "descricao" => $descricao,
      "valor_medio" => $valor_medio,
      "data_base_pgto" => $data_base_pgto
    )
  ));



?>

<!DOCTYPE html>
<html>
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