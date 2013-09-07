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
    
  </head>
  <body>     
    <h1><center>Histórico Gasto</center></h1>
    <form class="form-horizontal span4 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <div class="container">
    <table class="table table-hover table-bordered span7">
       
            <tr>
              <th>ID</th>
              <th>Descrição</th>
              <th>Valor</th>
              <th>Data</th>
              <td style="display:none"></td>
              <td style="display:none"></td>
              <td style="display:none"></td>
            </tr>
            <?php
          
          $consulta = mysql_query("SELECT * FROM Gasto WHERE TipoGasto_id_tipo_gasto = '$id'"); // query que busca todos os dados da tabela PRODUTO
          while($campo = mysql_fetch_array($consulta)){ // laço de repetiçao que vai trazer todos os resultados da consulta
          $real = $campo['valor_medio'];

          $source = $campo['data_base_pgto'];
          $date = new DateTime($source);
          ?>

            <tr>
              <td><?php echo " $contador" ?></td>
              <td><?php echo $campo['descricao']; ?></td>
              <td><?php echo "R$ $real,00" ?></td>
              <td><?php echo $date->format('d/m/Y'); ?></td>
              
              <td style="border:none;">
                <a class="btn" href=""><i class="icon-pencil"></i></a>
              </td>
              <td style="border:none;">

                  <a class="btn" href="excluir_gasto.php?id=<?php echo $campo['id_gasto'];  //pega o campo ID para a exclusao ?>"><i class="icon-trash"></i></a>
                  
              </td>
              <td style="border:none;">
                <a class="btn" href="#"><i class="icon-align-justify"></i></a>
              </td>
              <?php $contador++;?>
          <?php } ?>
          <br />
          
          </table>
            <!--<div class="form-horizontal well span5 offset3">
            </h4>
            <h4 style="clear:both;" class="offset1">
              <?php
          $consulta = mysql_query("SELECT * FROM Renda WHERE Usuario_id_usuario = '$id'"); // query que busca todos os dados da tabela PRODUTO
          while($campo = mysql_fetch_array($consulta)){ // laço de repetiçao que vai trazer todos os resultados da consulta
            $renda = $renda + $campo['valor'];
          }
          ?> 
          <?php $renda = $renda - $gasto;?>
          Renda Atual: <?php echo "R$$renda,00";?>
            </h4>
          </div>-->
          <div class="control-group offset" style="clear:both;">
            <input type="button" class="btn btn-inverse" name"botao3" value="Voltar" onclick="location.href='menu.php'">
            <input type="button" class="btn btn-danger" name"botao2" value="Sair" onclick="location.href='logout.php'">
          </div>
            
    </div>
    </form>
    
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>