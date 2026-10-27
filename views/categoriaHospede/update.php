<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe  (bean)
    $categoriaHospede = new categoriaHospede();

    // Definir os valores dos atributos a partir dos dados do form
    $categoriaHospede->setDescricao($_POST['descricao']);
    

    // Instanciar um objeto da classe 
    $dao = new categoriaHospedeDAO();

    // Invocar o método update da classe 
    $dao->update($categoriaHospede);

    // Redirecionar para o index
    header('Location: index.php');