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
<?php
 
// definir a constante com quantos registos queremos por página
define('POR_PAGINA', 5);
 
// contar o total de registos da nossa tabela e total de páginas
$sqlTotalRegistos = mysql_query('SELECT COUNT(*) FROM Gasto') or die(mysql_query());
$totalRegistos = mysql_result($sqlTotalRegistos, 0, 0);
 
$totalPaginas = ceil($totalRegistos / POR_PAGINA);
 
// obter o número de página actual, é a primeira por omissão
$pagina = 1;
if( !empty($_GET['pagina']) ){
  $p = intval($_GET['pagina']);
 
  if( $p <= 0 || $p > $totalPaginas ){
    header('Location: ?pagina=1');
    exit();
  }
 
  $pagina = $p;
}
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
          
         $sqlPagina = mysql_query('SELECT * FROM Gasto LIMIT '.(($pagina - 1) * POR_PAGINA).' , '.POR_PAGINA) or die(mysql_error());
          while($campo = mysql_fetch_array($sqlPagina)){ // laço de repetiçao que vai trazer todos os resultados da consulta
          $real = $campo['valor_medio'];

          $source = $campo['data_base_pgto'];
          $date = new DateTime($source);

          ?>

            <tr>
              <td><?php echo $campo['id_gasto']; ?></td>
              <td><?php echo $campo['descricao']; ?></td>
              <td><?php echo "R$ $real,00" ?></td>
              <td><?php echo $date->format('d/m/Y'); ?></td>
              
              <td style="border:none;">
                <a class="btn" href="editar_gasto.php?id=<?php echo $campo['id_gasto']; //pega o campo ID para a ediçao ?>"><i class="icon-pencil"></i></a>
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
          <?php for( $i = 1 ; $i <= $totalPaginas ; $i++ ){
 
          // Não criar uma ligação para a própria página que estamos a visualizar
          if( $i == $pagina )
          echo $i.' ';
          else
          echo '<a style="margin:10px;" class="btn" href="?pagina='.$i.'">'.$i.'</a>';
          } 
          ?>
        </div>
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