<?php
    require "../../autoload.php";

    $formaPagamento = new formaPagamento();

    $formaPagamento->setTipo($_POST['tipo']);

    $dao = new formaPagamentoDAO();
    $dao->create($formaPagamento);
    header('Location: index.php');