<?php
  session_start();
  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit;
  }
  $contador = 1;
  $com = 1;
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
// ligação à base de dados (não esquecer de trocar pelos dados correctos)
//mysql_connect('localhost', 'root', '123456') or die(mysql_error());
//mysql_select_db('teste');
 
// definir a constante com quantos registos queremos por página
define('POR_PAGINA', 10);
 
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
 
// obter os registos para esta página, usando a consulta SQL genérica
$sqlPagina = mysql_query('SELECT * FROM Gasto LIMIT '.(($pagina - 1) * POR_PAGINA).' , '.POR_PAGINA) or die(mysql_error());
while($campo = mysql_fetch_array($sqlPagina)){ // laço de repetiçao que vai trazer todos os resultados da consulta
          $real = $campo['valor_medio'];

          $source = $campo['data_base_pgto'];
          $date = new DateTime($source);

?>
<html>
<head>
  <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.min.css">    
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap-responsive.min.css">
    <!-- Estilo padrão-->
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<table class="table table-hover table-bordered span7">
<tr>
              <td><?php echo " $contador" ?></td>
              <td><?php echo $campo['descricao']; ?></td>
              <td><?php echo "R$ $real,00" ?></td>
              <td><?php echo $date->format('d/m/Y') ?></td>
              
              <td style="border:none;">
                <a class="btn" href=""><i class="icon-pencil"></i></a>
              </td>
              <td style="border:none;">

                  <a class="btn" href="excluir_gasto.php?id=<?php echo $campo['id_gasto'];  //pega o campo ID para a exclusao ?>"><i class="icon-trash"></i></a>
                  
              </td>
              <td style="border:none;">
                <a class="btn" href="#"><i class="icon-align-justify"></i></a>
              </td>
            </tr>
              <?php //$contador++;
              if($com =< 10) {
                  $contador++;
              } else if(){

              }
                
              ?>
<?php }?>
</table>
</body>
</html>
// gerar ligações para saltar entre páginas
<?php for( $i = 1 ; $i <= $totalPaginas ; $i++ ){
 
	// Não criar uma ligação para a própria página que estamos a visualizar
	if( $i == $pagina )
		echo $i.' ';
	else
		echo '<a href="?pagina='.$i.'">'.$i.'</a> ';
}	
?>