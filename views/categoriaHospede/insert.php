<?php
    require "../../autoload.php";

    $categoriaHospede = new categoriaHospede();

    $categoriaHospede->setDescricao($_POST['descricao']);

    $dao = new categoriaHospedeDAO();
    $dao->create($categoriaHospede);
    header('Location: index.php');