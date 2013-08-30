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
?>

<?php
  if(isset ($_POST['enviar'])){  // caso nao seja passado o id via GET cadastra
        $descricao = $_POST['descricaogasto'];
        $gasto = (float) $_POST['gasto'];
        $data = $_POST['data'];
        $id = (int) $_SESSION['id'];
        
        $crud = new crud('Gasto');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
        $crud->inserir("descricao, valor_medio, data_base_pgto, TipoGasto_id_tipo_gasto", "'$descricao', '$gasto', '$data', '1'"); // utiliza a funçao INSERIR da classe crud
        header("Location: menu.php"); // redireciona para a listagem
    
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Gasto</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap-responsive.min.css">
    <!-- Estilo padrão-->
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>     
    <h1><center>Inserir Gasto</center></h1>
    <form class="form-horizontal well span5 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

    <div class="container"> 
        <form class="form-horizontal well span6 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          
          <div class="control-group">
            <!-- Entrada para o valor da renda do usuário -->  
            <label class="control-label" for="inputDescricaogasto">Descricao:</label>
            <div class="controls">
              <input type="text" id="inputDescricaoGasto" name="descricaogasto" placeholder="Digite uma breve descricao sobre seu gasto" value="<?php echo @$campo['descricao']; ?>" >
            </div>
          </div>

          <div class="control-group">
            <!-- Entrada para o valor da renda do usuário -->  
            <label class="control-label" for="inputValorGasto">Valor:</label>
            <div class="controls">
              <input type="text" id="inputValorRenda" name="gasto" placeholder="Digite o valor do gasto" value="<?php echo @$campo['valor_medio']; ?>" >
            </div>
          </div>

          <div class="control-group">
            <!-- Entrada da data da renda do usuário -->
            <label class="control-label" for="inputDataPgto">Data Pagamento:</label>
            <div class="controls">
              <input type="text" id="inputdata_base_pgto" name="data" placeholder="Digite uma data base para o pagamento" value="<?php echo @$campo['data_base_pgto']; ?>">
            </div>
          </div>
          
          <!-- Botões de cadastrar e limpar -->
          <div class="controls">
            <input type="submit" id="submitGasto" name="enviar" placeholder="Gasto" class="btn btn-primary" value="Inserir">
            <input type="button" class="btn btn-danger" name"botao2" value="Sair" onclick="location.href='logout.php'">
          </div>
            
        </form>

    </div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>