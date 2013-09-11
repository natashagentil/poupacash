<?php
  session_start();
  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit;
  }
  $id = (int) $_SESSION['id'];
  $usuario = $_SESSION['nome'];
?>

<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
    
?>

<?php
	$gasto = 0;
  	$renda = 0;
  	$rendaTotal = 0;

   	$consulta = mysql_query("SELECT * FROM Gasto WHERE TipoGasto_id_tipo_gasto = '$id'");
   	while($campo = mysql_fetch_array($consulta)){ 
   		$gasto = $gasto + $campo['valor_medio'];
	}

	$consulta = mysql_query("SELECT * FROM Renda WHERE Usuario_id_usuario = '$id'");
	while($campo = mysql_fetch_array($consulta)){ 
		$renda = $renda + $campo['valor'];
	}
        			
	$rendaTotal = $renda - $gasto;
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
    	<link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.css">
    	<link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap-responsive.css">
    
    	<!-- Estilo padrão-->
    	<link rel="stylesheet" type="text/css" href="estilo.css">
    	<link rel="icon" type="image/png" href="img/icone.png" />
  	</head>
  <body>
  	<div class="container">
  		<h1 class="centro">Balanço Geral</h1>
    	
    	<table class="table table-hover table-bordered span5 offset3">
       
	        <tr >
		        <th>Usuário:</th>
		        <th><?php echo $usuario;?></th>  
	        </tr>

           	<tr>
           		<td>Renda Total:</td>
		        <td><?php echo $renda ?></td>
		    </tr>

		    <tr>
		    	<td>Gasto Total:</td>
		        <td><?php echo $gasto ?></td>
		    </tr>
		    
		    <?php 
		    	if($rendaTotal < 0) {
		    		echo "<tr style='background-color: #f2dede'>
		    				<th>Renda Final:</th>
		    				<th>$rendaTotal</th>
		    			</tr>";
				} else {
					echo "<tr style='background-color: #dff0d8'>
							<th>Renda Final:</th>
							<th>$rendaTotal</th>
						</tr>";
				}
		    ?>         
        </table>
        <div class="control-group offset3" style="clear:both;">
            <input type="button" class="btn btn-inverse" name"botao3" value="Voltar" onclick="location.href='menu.php'">
            <input type="button" class="btn btn-danger" name"botao2" value="Sair" onclick="location.href='logout.php'">
        </div>      
    </div>
  </body>
</html>