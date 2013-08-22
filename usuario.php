<?php
	$host = 'localhost'; // conexão do bd
  $user = 'root'; // usuário do bd
  $pass = '123456'; // senha do bd
  $banco = 'poupacash'; // nome do bd

  // variável responsável pela conexão com o bd
  $conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
  mysql_select_db($banco) or die (mysql_error());
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
  </head>

  <body>

    <h1 class="centro">Novo Usuario</h1>

      <div class="container"> 
        <form class="form-horizontal well span6 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          
          <div class="control-group">
            <!-- Entrada para o nome do usuário -->  
            <label class="control-label" for="inputNome">Nome:</label>
            <div class="controls">
              <input type="text" id="inputNome" name="nome" placeholder="Digite seu nome">
            </div>
          </div>

          <div class="control-group">
            <!-- Entrada do email do usuário -->
            <label class="control-label" for="inputEmail">Email:</label>
            <div class="controls">
              <input type="text" id="inputEmail" name="email" placeholder="Digite seu email">
            </div>
          </div>

          <div class="control-group">
            <!-- Entrada da renda média do usuário -->
            <label class="control-label" for="inputRenda">Renda Média:</label>
            <div class="controls">
              <input type="text" id="inputRenda" name="renda" placeholder="Digite sua renda média">
            </div>
          </div>

          <div class="control-group">
            <!-- Entrada para a senha do usuário -->
            <label class="control-label" for="inputSenha">Senha:</label>
            <div class="controls">
              <input type="password" id="inputSenha" name="senha" placeholder="Digite sua senha">
            </div>
          </div>

          <div class="control-group">
            <!-- Entrada para a confirmação de senha do usuário -->
            <label class="control-label" for="inputConfirmaSenha">Confirmar Senha:</label>
            <div class="controls">
              <input type="password" id="inputConfirmaSenha" name="confirmasenha" placeholder="ConfirmaSenha">
            </div>
          </div>
          
          <!-- Botões de cadastrar e limpar -->
          <div class="controls">
            <input type="submit" id="submitCadastro" name="enviar" placeholder="Cadastro" class="btn btn-primary" value="Cadastrar">
            <input type="reset" id="limparCadastro" name="limpar" placeholder="Limpar" class="btn btn-danger" value="Limpar">
            <!--<input type="button" class="btn btn-danger" name"botao2" value="Sair" onclick="location.href='logout.php'">-->
          </div>
            
        </form>

      </div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <?php
      if (isset($_POST['enviar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $renda = (float) $_POST['renda'];
        $confirmasenha = $_POST['confirmasenha'];

        if($senha == $confirmasenha) {
          $sql = mysql_query("INSERT INTO Usuario(nome, email, senha, media_renda) 
          VALUES('$nome', '$email', '$senha', '$renda')");
          echo ("
          <script>
            window.location.href = \"index.php\";
          </script>
          ");
        } else {
          echo ("
          <script>
            alert(\"Senha não confere.\");
          </script>
        ");
        }
         
      }

    ?>
  </body>
</html>