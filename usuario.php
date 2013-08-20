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
    <title>Novo Cadastro</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap-responsive.min.css">
  </head>

  <body>

    <h1><center>Novo Usuario</center></h1>

    <!--<div class="container"> 
      <form class="form-horizontal well span6 offset3" method="post" action="cadastro.php">-->

        <div class="container"> 
          <form class="form-horizontal well span6 offset3" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

            <div class="control-group">

              <label class="control-label" for="inputNome">Nome:</label>
            <div class="controls">

              <input type="text" id="inputNome" name="nome" placeholder="Digite seu nome">
            </div>

            <label class="control-label" for="inputEmail">Email:</label>
            <div class="controls">

              <input type="text" id="inputEmail" name="email" placeholder="Digite seu email">
            </div>

            <label class="control-label" for="inputRenda">Renda Média:</label>
            <div class="controls">

              <input type="text" id="inputRenda" name="renda" placeholder="Digite sua renda média">
            </div>

            <label class="control-label" for="inputSenha">Senha:</label>
            <div class="controls">

              <input type="password" id="inputSenha" name="senha" placeholder="Digite sua senha">
            </div>

            <label class="control-label" for="inputConfirmaSenha">Confirmar Senha:</label>
            <div class="controls">

              <input type="password" id="inputConfirmaSenha" name="confirmasenha" placeholder="ConfirmaSenha">
            </div>
            
            <div class="controls">

              <input type="submit" id="submitCadastro" name="enviar" placeholder="Cadastro" value="Cadastrar">
              <input type="reset" id="limparCadastro" name="limpar" placeholder="Limpar" value="Limpar">
            </div>

            
          </form>
        </div>

      <!--</form>

    </div>-->

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
            window.location.href = \"login.php\";
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