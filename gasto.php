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
  $formaPagamento = "";
  if(isset ($_POST['check'])){
    for($i = 0; $i < count($_POST['check']); $i++) {
      $formaPagamento = $formaPagamento.$_POST['check'][$i];
    }
  }
  //$formaPagamento = $_POST['check'][0];
?>
<?php
  if(isset ($_POST['enviar'])){  // caso nao seja passado o id via GET cadastra
        $descricao = $_POST['descricaogasto'];
        $gasto = (float) $_POST['gasto'];
        $data = $_POST['data'];
        $id = (int) $_SESSION['id'];
        $tipoGasto = $_POST['optionsRadios'];

        $crud = new crud('Gasto');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
        $crud->inserir("descricao, valor_medio, data_base_pgto, gasto, TipoGasto_id_tipo_gasto", "'$descricao', '$gasto', '$data', '$tipoGasto', '$id'"); // utiliza a funçao INSERIR da classe crud
        
        $sqlGasto = mysql_query("SELECT * FROM Gasto ORDER BY id_gasto DESC LIMIT 1");

        $idGasto=0;
        while($campoGasto = mysql_fetch_array($sqlGasto)){
          $idGasto = $campoGasto['id_gasto'];
        }

        $crud = new crud('FormaPagamento'); // instancia classe com as operações crud, passando nome da tabela como parametro
        $crud ->inserir("descricao, HistoricoGasto_id_historico_gasto", "'$formaPagamento', '$idGasto'");
        //header("Location: menu.php"); // redireciona para a listagem
    
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
    <link rel="icon" type="image/png" href="img/icone.png" />
  </head>
  <body>     
    <h1><center>Inserir Gasto</center></h1>
    <form class="form-horizontal well span5 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

    <div class="container"> 
        <form class="form-horizontal well span6 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="control-group">
          <!-- Opção do tipo do gasto (Fixo ou variável) -->        
          <label class="control-label" for="inputTipoGasto"> Escreva o tipo do gasto:</label>
            <div class="controls">
              <input type="radio" name="optionsRadios" id="optionsRadios1" value="Fixo" checked> Fixo
        
              <input type="radio" name="optionsRadios" id="optionsRadios2" value="Variável"> Variavel
            </div>
          </div>
          <div class="control-group">
            <!-- Entrada para a descrição do gasto -->  
            <label class="control-label" for="inputDescricaogasto">Descricao:</label>
            <div class="controls">
              <input type="text" id="inputDescricaoGasto" name="descricaogasto" placeholder="Digite uma breve descricao sobre seu gasto" value="<?php echo @$campo['descricao']; ?>" >
            </div>
          </div>

          <div class="control-group">
            <!-- Entrada para o valor do gasto inserido -->  
            <label class="control-label" for="inputValorGasto">Valor:</label>
            <div class="controls">
              <input type="text" id="inputValorRenda" name="gasto" placeholder="Digite o valor do gasto" value="<?php echo @$campo['valor_medio']; ?>" >
            </div>
          </div>

          <div class="control-group">
            <!-- Entrada da data do pagamento deste gasto -->
            <label class="control-label" for="inputDataPgto">Data Pagamento:</label>
            <div class="controls">
              <input type="text" id="inputdata_base_pgto" name="data" placeholder="Digite uma data base para o pagamento" value="<?php echo @$campo['data_base_pgto']; ?>">
            </div>
          </div>
          
          <!-- Entrada da informação referente à forma de pagamento do gasto inserido -->
          <div class="control-group">
            <?php
              $cartaoCredito = "Cartão de Crédito";
              $cartaoDebito = "Cartão de Débito";
              $dinheiro = "Dinheiro";
              $boleto = "Boleto";
              $transferenciaOnline = "Transferência Online";
            ?>

            <label class="control-label" for="inputFormaPgto">Forma de pagamento:</label>
            <div class="controls">
                 <label class="checkbox inline">
                    <input type="checkbox" id="inlineCheckbox1" value="Cartao de Credito" name="check[]"> Cartão de Crédito<!--<?php echo " $cartaoCredito";?>-->
                 </label> <br />
                 <label class="checkbox inline">
                    <input type="checkbox" id="inlineCheckbox2" value="Cartão de Debito" name="check[]"> Cartão de Débito<!--<?php echo " $cartaoDebito";?>-->                 </label> <br />
                 <label class="checkbox inline">
                    <input type="checkbox" id="inlineCheckbox3" value="Dinheiro" name="check[]"> Dinheiro<!--<?php echo " $dinheiro";?>-->
                 </label> <br />
                 <label class="checkbox inline">
                    <input type="checkbox" id="inlineCheckbox3" value="Boleto" name="check[]"> Boleto<!--<?php echo " $boleto";?>-->
                 </label> <br />
                 <label class="checkbox inline">
                    <input type="checkbox" id="inlineCheckbox3" value="Transferencia Online" name="check[]"> Transferência Online <!--<?php echo " $transferenciaOnline";?>-->
                 </label> <br />
             </div>
          </div>
          
          <!-- Botões de inserir, voltar e sair -->
          <div class="controls">
            <input type="submit" id="submitGasto" name="enviar" placeholder="Gasto" class="btn btn-primary" value="Inserir">
            <input type="button" class="btn btn-inverse" name"botao3" value="Voltar" onclick="location.href='menu.php'"><br /><br />
            <input type="button" class="btn btn-danger" name"botao2" value="Sair" onclick="location.href='logout.php'">
          </div>
            
        </form>

    </div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>