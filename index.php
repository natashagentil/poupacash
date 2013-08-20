<?php
	$host = 'localhost'; // conexão do bd
  $user = 'root'; // usuário do bd
  $pass = '123456'; // senha do bd
  $banco = 'sistema_financeiro'; // nome do bd

  // variável responsável pela conexão com o bd
  $conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
  mysql_select_db($banco) or die (mysql_error());
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Login Poupa Cash</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap-responsive.min.css">
  </head>
  <body>
    <h1><center>Login Poupa Cash</center></h1>

    <div class="container"> 

      <form class="form-horizontal well span6 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

          <!-- Entrada do login do usuário -->
          <label class="control-label" for="inputEmail">Login:</label>
          <div class="controls">
              <input type="text" id="inputEmail" name="email" placeholder="Digite seu login">
          </div>

          <!-- Entrada para a senha do usuário -->
          <label class="control-label" for="inputSenha">Senha:</label>
          <div class="controls">
              <input type="password" id="inputSenha" name="senha" placeholder="Digite sua senha">
          </div>
          
          <!-- Botão de entrar -->
          <label class="controls" for="semCadastro"><a href="usuario.php">Não possui cadastro?</a></label>
          <div class="controls">
              <input type="submit" id="logar" name="login" placeholder="logando" value="Entrar">
          </div>
          
      </form>

    </div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <?php
      if (isset($_POST['login'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = mysql_query("SELECT * FROM Usuario WHERE email = '$email' and senha = '$senha'");
		    $row = mysql_num_rows($sql);
		    
        if($row > 0) {
          session_start();
          $_SESSION['email'] = $_POST['email'];
   		    $_SESSION['senha'] = $_POST['senha'];
   		    echo ("
            <script>
              window.location.href = \"inserirrenda.html\";
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