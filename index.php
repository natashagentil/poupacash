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
    <title>Login Poupa Cash</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap-responsive.min.css">
    <!-- Estilo padrão-->
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>
    <div class="container"> 
      <h1 class="centro">Login Poupa Cash</h1>
      <form class="form-horizontal well span5 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          <div class="control-group">

            <!-- Entrada do login do usuário -->
            <label class="control-label" for="inputEmail">Login:</label>
            <div class="controls">
                <input type="text" id="inputEmail" name="email" placeholder="Digite seu login">
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
            <!-- Botão de entrar -->
            <label class="controls" for="semCadastro"><a href="usuario.php">Não possui cadastro?</a></label>
            <div class="controls">
                <input type="submit" id="logar" name="login" placeholder="logando" class="btn btn-success" value="Entrar">
            </div>
          </div>
          
      </form>
    </div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <?php
      //estrutura de controle de decisão para validar as chamadas POST em uma mesmas página
      if (isset($_POST['login'])){
        
        // dados capturados pelo formulário
        $email = $_POST['email']; 
        $senha = $_POST['senha'];

        // comando sql SELECT
        $sql = mysql_query("SELECT * FROM Usuario WHERE email = '$email' and senha = '$senha'");

        // quantidade de linhas encontradas na tabela do bd que satisfazem a busca SELECT
        $row = mysql_num_rows($sql);

        if($row > 0 && ($email != null || $senha != null)) {
          // abrindo uma sessão com o usuário
          session_start();


          $_SESSION['email'] = $_POST['email'];
          $_SESSION['senha'] = $_POST['senha'];
          echo ("
            <script>
              window.location.href = \"menu.php\";
            </script>
          "); 
        } else {
          echo ("
          <script>
            alert(\"Erro de conexão \\nLogin/Senha não existentes\");
          </script>
        ");
        }
      }

    ?>
  </body>
</html>