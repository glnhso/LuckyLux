<?php
require "../../autoload.php";

$hospedeResponsavel = new HospedeResponsavel();

$hospedeResponsavel->setNome($_POST['nome']);
$hospedeResponsavel->setTelefone($_POST['telefone']);

$categoriaHospede = new CategoriaHospede();
$categoriaHospede->setId($_POST['idcategoria_hospede']);

$hospedeResponsavel->setCategoriaHospede($categoriaHospede);

$dao = new HospedeResponsavelDAO();

$dao->create($hospedeResponsavel);

header('Location: index.php');
exit;