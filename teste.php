<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            //apenas testando a conexao
            if($con->connect() == true){
                echo 'Conectou';
            }else{
                echo 'Não conectou';
            }
        ?>
        <a href="formulario.php">
            Novo
        </a>
        <table style="border: 1px solid red;">
            <thead>
                <tr>
                    <th>
                        Nome
                    </th>
                    <th>
                        Descri&ccedil;&atilde;o
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $consulta = mysql_query("SELECT * FROM Usuario"); // query que busca todos os dados da tabela PRODUTO
                    while($campo = mysql_fetch_array($consulta)){ // laço de repetiçao que vai trazer todos os resultados da consulta
                ?>
                    <tr>
                        <td>
                            <?php echo $campo['nome']; // mostrando o campo NOME da tabela ?>
                        </td>
                        <td>
                            <?php echo $campo['email']; // mostrando o campo DESCRICAO da tabela ?>
                        </td>
                        <td>
                            <?php echo $campo['senha']; // mostrando o campo NOME da tabela ?>
                        </td>
                        <td>
                            <?php echo $campo['media_renda']; // mostrando o campo DESCRICAO da tabela ?>
                        </td>
                        <td>
                            <a href="formulario.php?id=<?php echo $campo['id']; //pega o campo ID para a ediçao ?>">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href="excluir.php?id=<?php echo $campo['id'];  //pega o campo ID para a exclusao ?>">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
<?php $con->disconnect(); // fecha conexao com o banco ?> 