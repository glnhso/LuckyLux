
<?php
require "../../autoload.php";

// Instanciar o DAO de Categoria
$daoCategoriaHospede = new CategoriaHospedeDAO();
?>

<!doctype html>
<html lang="pt-br" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastrar Hóspede Responsável</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/dashboard.css" rel="stylesheet">
</head>

<body>

<header class="navbar sticky-top bg-dark p-0 shadow"
        data-bs-theme="dark">
    <a class="navbar-brand px-3 text-white" href="#">
        Sistema de Hotel
    </a>
</header>

<div class="container-fluid">
    <div class="row">

        <div class="sidebar border-end col-md-3 col-lg-2 p-0 bg-body-tertiary">
            <?php include "../menu/navbar.php"; ?>
        </div>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Cadastro de Hóspede Responsável</h1>
            </div>

            <div class="table-responsive">

                <form action="insert.php" method="post">

                    <div class="form-group mb-3">
                        <label for="nome">Nome</label>

                        <input
                            type="text"
                            name="nome"
                            id="nome"
                            class="form-control"
                            required
                        >
                    </div>

                    <div class="form-group mb-3">
                        <label for="telefone">Telefone</label>

                        <input
                            type="text"
                            name="telefone"
                            id="telefone"
                            class="form-control"
                            required
                        >
                    </div>
                     <div class="form-group mb-3">
                        <label for="idcategoria_hospede">
                            Categoria do Hóspede
                        </label>

                        <select
                            name="idcategoria_hospede"
                            id="idcategoria_hospede"
                            class="form-select"
                            required
                        >
                            <option value="">
                                Selecione uma categoria
                            </option>

                            <?php foreach($daoCategoriaHospede->read() as $categoriaHospede) : ?>

                                <option value="<?= $categoriaHospede->getId() ?>">
                                    <?= htmlspecialchars($categoriaHospede->getDescricao()) ?>
                                </option>

                            <?php endforeach; ?>

                        </select>
                    </div>

                  
                    <div class="form-group mt-3">

                        <input
                            type="reset"
                            value="Limpar"
                            class="btn btn-secondary"
                        >

                        <input
                            type="submit"
                            value="Salvar"
                            class="btn btn-success"
                        >


                    </div>

                </form>

            </div>

        </main>
    </div>
</div>

<script src="../../js/bootstrap.bundle.min.js"></script>

</body>
</html>
