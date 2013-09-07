<?php
  session_start();
  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit;
  }
?>

<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
?>

<?php
  if(isset ($_POST['enviar'])){  // caso nao seja passado o id via GET cadastra
        $renda = (float) $_POST['renda'];
        $data = $_POST['data'];
        $id = (int) $_SESSION['id'];
        
        $crud = new crud('Renda');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
        $crud->inserir("valor, data_recebimento, Usuario_id_usuario", "'$renda', '$data', '$id'"); // utiliza a funçao INSERIR da classe crud
        header("Location: menu.php"); // redireciona para a listagem
        
    }
?>

<!DOCTYPE html>
<html>
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
    <link rel="icon" type="image/png" href="img/icone.png" />
  </head>
  
  <body>
    <h1><center>Inserir Renda</center></h1>
    
    </div>

    <div class="container"> 
        <form class="form-horizontal well span6 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          
          <div class="control-group">
            <!-- Entrada para o valor da renda do usuário -->  
            <label class="control-label" for="inputValorRenda">Valor:</label>
            <div class="controls">
              <input type="text" id="inputValorRenda" name="renda" placeholder="Digite o valor da renda" value="<?php echo @$campo['valor']; ?>" >
            </div>
          </div>

          <div class="control-group">
            <!-- Entrada da data da renda do usuário -->
            <label class="control-label" for="inputdatalancamento">Data Lancamento:</label>
            <div class="controls">
              <input type="text" id="inputDataLancamento" name="data" placeholder="Digite a data do lancamento" value="<?php echo @$campo['email']; ?>">
            </div>
          </div>
          
          <!-- Botões de cadastrar e limpar -->
          <div class="controls">
            <input type="submit" id="submitRenda" name="enviar" placeholder="Renda" class="btn btn-primary" value="Inserir">
            <input type="button" class="btn btn-inverse" name"botao3" value="Voltar" onclick="location.href='menu.php'"><br /><br />
            <input type="button" class="btn btn-danger" name"botao2" value="Sair" onclick="location.href='logout.php'">
          </div>
            
        </form>

    </div>
    
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  
  </body>
</html>