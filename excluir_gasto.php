<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao();  // instancia classe de conxao
    $con->connect(); // abre conexao com o banco

    $crud = new crud('FormaPagamento');
    $id = $_GET['id']; //pega id para exclusao caso exista
    $crud->excluir("HistoricoGasto_id_historico_gasto = $id");

    $crud = new crud('Gasto'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro

    $crud->excluir("id_gasto = $id"); // exclui o registro com o id que foi passado

    $con->disconnect(); // fecha a conexao

    //header("Location: resultado.php"); // redireciona para a listagem
?>