
<?php
require "../../autoload.php";

// Instanciar o DAO
$dao = new HospedeResponsavelDAO();
?>

<!doctype html>
<html lang="pt-br" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerenciar Hóspedes Responsáveis</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    >

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

            <div class="d-flex justify-content-between
                        flex-wrap flex-md-nowrap
                        align-items-center pt-3 pb-2 mb-3 border-bottom">

                <h1 class="h2">
                    Gerenciar Hóspedes Responsáveis pela Reserva
                </h1>

            </div>

            <p>
                <a href="create.php" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i>
                    Novo Hóspede Responsável
                </a>
            </p>

            <div class="table-responsive">

                <table class="table table-hover table-striped">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach($dao->read() as $hospedeResponsavel) : ?>

                            <tr>

                                <td>
                                    <?= $hospedeResponsavel->getId() ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($hospedeResponsavel->getNome()) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars((string) $hospedeResponsavel->getTelefone()) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($hospedeResponsavel->getCategoriaHospede()->getDescricao()) ?>
                                </td>

                                <td>

                                    <a
                                        title="Editar"
                                        href="edit.php?id=<?= $hospedeResponsavel->getId() ?>"
                                        class="text-primary"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <a
                                        title="Excluir"
                                        href="destroy.php?id=<?= $hospedeResponsavel->getId() ?>"
                                        class="text-danger"
                                        onclick="return confirm('Deseja realmente excluir este hóspede responsável?')"
                                    >
                                        <i class="bi bi-trash3"></i>
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </main>

    </div>

</div>

<script src="../../js/bootstrap.bundle.min.js"></script>

<script src="../../js/dashboard.js"></script>

</body>
</html>
