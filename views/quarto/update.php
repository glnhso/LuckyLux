<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (bean)
    $quarto = new Quarto();

    // Definir os valores dos atributos a partir dos dados do form
    $quarto->setNumero($_POST['numero']);
    $quarto->setTipo($_POST['tipo']);
    $quarto->setPreco($_POST['preco']);
    $quarto->setDisponivel($_POST['disponivel']);
    $quarto->setId($_POST['id']);

    // Instanciar um objeto da classe ClienteDAO
    $dao = new QuartoDAO();

    // Invocar o método update da classe ClienteDAO
    $dao->update($quarto);

    // Redirecionar para o index
    header('Location: index.php');