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
  $contador = 1;
  $gasto = 0.0;
  $renda = 0.0;
  $id = (int) $_SESSION['id'];
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
  </head>
  <body>     
    <h1><center>Visualisar Gasto</center></h1>
    <form class="form-horizontal well span5 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

    <div class="container"> 
        
            
        </form>
          
            <ul class="nav nav-list span4">
          <?php
          $consulta = mysql_query("SELECT * FROM Gasto WHERE TipoGasto_id_tipo_gasto = '$id'"); // query que busca todos os dados da tabela PRODUTO
          while($campo = mysql_fetch_array($consulta)){ // laço de repetiçao que vai trazer todos os resultados da consulta
          
          ?> 
            <li class="nav-header">Gasto<?php echo " $contador:" ?></li>
             <li><a href="#">Descrição: <?php echo $campo['descricao']; // mostrando o campo NOME da tabela ?></a></li>
             <li><a href="#">Valor: <?php echo $campo['valor_medio']; // mostrando o campo NOME da tabela ?></a></li>
             <li><a href="#">Data: <?php echo $campo['data_base_pgto']; // mostrando o campo NOME da tabela ?></a></li>
          <?php $gasto = $gasto + $campo['valor_medio']; $contador++;?>
          <?php } ?>
          <br />
          Gasto Total: <?php echo "R$$gasto,00";?><br />

          <?php
          $consulta = mysql_query("SELECT * FROM Renda WHERE Usuario_id_usuario = '$id'"); // query que busca todos os dados da tabela PRODUTO
          while($campo = mysql_fetch_array($consulta)){ // laço de repetiçao que vai trazer todos os resultados da consulta
            $renda = $renda + $campo['valor'];
          }
          ?> 
          <?php $renda = $renda - $gasto;?>
          <h2>Renda Atual: <?php echo "R$$renda,00";?></h2>
          <br />
          <input type="button" class="btn btn-inverse" name"botao3" value="Voltar" onclick="location.href='menu.php'">
          <input type="button" class="btn btn-danger" name"botao2" value="Sair" onclick="location.href='logout.php'">
          </ul>
          

    </div>
    </form>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>