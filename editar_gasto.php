<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
   
    /*@$getId = $_GET['id'];  //pega id para ediçao caso exista
    if(@$getId){ //se existir recupera os dados e tras os campos preenchidos
        $consulta = mysql_query("SELECT * FROM Gasto WHERE id = + $getId");
        $campo = mysql_fetch_array($consulta);
    }*/
    $id = $_GET['id']; 
    if(isset ($_POST['editar'])){ // caso  seja passado o id via GET edita 
        $descricao = $_POST['descricao']; //pega o elemento com o pelo NAME
        $valor = (float) $_POST['valor'];
        $data = $_POST['data'];
        $crud = new crud('Gasto'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
        $crud->atualizar("descricao='$descricao', valor_medio='$valor', data_base_pgto='$data'", "id_gasto='$id'"); // utiliza a funçao ATUALIZAR da classe crud
        header("Location: historico_gasto.php"); // redireciona para a listagem
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Novo Cadastro</title>
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

    <h1 class="centro">Editar Gasto</h1>

      <div class="container"> 
        <form class="form-horizontal well span6 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          
          <div class="control-group">
            <!-- Entrada para o nome do usuário -->  
            <label class="control-label" for="inputNome">Descrição:</label>
            <div class="controls">
              <input type="text" id="inputNome" name="descricao" placeholder="Digite uma nova descrição" value="<?php echo @$campo['nome']; ?>" >
            </div>
          </div>

          <div class="control-group">
            <!-- Entrada do email do usuário -->
            <label class="control-label" for="inputEmail">Valor:</label>
            <div class="controls">
              <input type="text" id="inputEmail" name="valor" placeholder="Digite um novo valor" value="<?php echo @$campo['email']; ?>">
            </div>
          </div>

          <div class="control-group">
            <!-- Entrada da renda média do usuário -->
            <label class="control-label" for="inputRenda">Data:</label>
            <div class="controls">
              <input type="text" id="inputRenda" name="data" placeholder="Digite sua nova data" value="<?php echo @$campo['renda']; ?>">
            </div>
          </div>
          
          <!-- Botões de cadastrar e limpar -->
          <div class="controls">
            <input type="submit" id="submitCadastro" name="editar" placeholder="Editar" class="btn btn-primary" value="Editar">
            <input type="reset" id="limparCadastro" name="limpar" placeholder="Limpar" class="btn btn-danger" value="Limpar"><br /><br />
            <input type="button" class="btn btn-inverse" name"botao3" value="Voltar" onclick="location.href='historico_gasto.php'">
            <!--<input type="button" class="btn btn-danger" name"botao2" value="Sair" onclick="location.href='logout.php'">-->
          </div>
            
        </form>

      </div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>