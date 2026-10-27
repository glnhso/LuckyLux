<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe  (bean)
    $formaPagamento = new FormaPagamento();

    // Definir os valores dos atributos a partir dos dados do form
    $formaPagamento->setTipo($_POST['tipo']);
    

    // Instanciar um objeto da classe 
    $dao = new FormaPagamentoDAO();

    // Invocar o método update da classe 
    $dao->update($formaPagamento);

    // Redirecionar para o index
    header('Location: index.php');